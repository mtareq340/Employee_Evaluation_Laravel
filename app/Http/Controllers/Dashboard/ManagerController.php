<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\AddMarksRequest;
use App\Manager;
use App\Technical;
use App\Employee;
use App\Proberty;
use App\Visit;
use App\Store;
use DB;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $managers = Employee::where('title_id', 2)->when($request->search, function ($q) use ($request) {

            return $q->where('name', 'LIKE', '%' . $request->search . '%');

        })->latest()->paginate(10);
        return view('dashboard.managers.index', compact('managers'));

    }//end of index

    
    function reports()
    {
        $managers= DB::select('SELECT 
        employees.id,employees.name,employees.phone,
        count(*) as countVisits ,SUM(result) as sumResults
        FROM employees
        JOIN visit_employee
            ON employees.id = visit_employee.employee_id
        JOIN visits
            ON visits.id = visit_employee.visit_id
        WHERE employees.title_id = 2 
        GROUP BY  employees.id;
    ');
         $stores = Store::all();
         $store_id = 0;
        return view('dashboard.managers.reports', compact('managers','stores','store_id'));
        
    }

    function fetchManagers(Request $request)
    {
        $from_date = \Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
        $to_date = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
        $stores = Store::all();

        $managers = DB::select('SELECT 
        employees.id,employees.name,employees.phone,
        count(*) as countVisits ,SUM(result) as sumResults
        FROM employees
        JOIN visit_employee
            ON employees.id = visit_employee.employee_id
        JOIN visits
            ON visits.id = visit_employee.visit_id
        WHERE employees.title_id = 2 
        GROUP BY  employees.id;
    ');
      $store_id = 0;


        if($request->from_date == null && $request->to_date == null && $request->store_id == null)
        {
            $managers = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE employees.title_id = 2 
            GROUP BY  employees.id;
        ');
      $store_id = $request->store_id;

        }
        elseif($request->from_date == null && $request->to_date == null && $request->store_id != null)
        {
            
            $managers = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE employees.store_id = "'.$request->store_id.'" And employees.title_id = 2 
            GROUP BY  employees.id;
            ');
      $store_id = $request->store_id;


        }
        elseif($request->from_date != null && $request->to_date != null && $request->store_id != null)
        {
            $managers = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE visit_date BETWEEN "'.$from_date.'" AND "'.$to_date.'"
            AND employees.store_id = "'.$request->store_id.'" And employees.title_id = 2 
            GROUP BY  employees.id;
            ');
      $store_id = $request->store_id;

        }

      return view('dashboard.managers.reports', compact('managers','stores','store_id'));

    }

    public function probertyManagers($store_id, $visit_id, $manager_id)
    {
        $proberties = Proberty::where('title_id', 2)->get();
        $manager = Employee::FindOrFail($manager_id);
        return view('dashboard.managers.probertymanagers', compact('proberties', 'store_id', 'visit_id', 'manager_id', 'manager'));

    }//end of index

    public function results($store_id, $visit_id)
    {
        $visit = Visit::FindOrFail($visit_id);
        $managers = $visit->employees()->where('store_id', $store_id)->where('title_id',2)->get();  
        $store = Store::FindOrFail($store_id);

        return view('dashboard.managers.results', compact('store', 'visit_id', 'managers'));

    }//end of index

    public function create()
    {
        $stores = Store::all();
        return view('dashboard.managers.create', compact('stores'));

    }//end of create

    public function edit(Employee $manager)
    {
        $stores = Store::all();
        return view('dashboard.managers.edit', compact('manager','stores'));

    }//end of edit
    
    public function update(ManagerRequest $request, Employee $manager)
    {
       
        $manager->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.managers.index');

    }//end of update

    public function marks(AddMarksRequest $request)
    {
        // dd($request);
        $managers = Employee::where('store_id',  $request->store_id)
        ->where('title_id',2)->get();   
        $store = Store::FindOrFail($request->store_id);
        $visit_id = $request->visit_id;
        $store_id = $request->store_id;
        $employee = Employee::FindOrFail($request->manager_id);
        $visit = Visit::FindOrFail($request->visit_id);
        $managerProbertiesNum = (Proberty::where('title_id', 2)->get())->count() *10;
        
        $employee->proberties()->attach($request->proberties, array('visit_id' => $visit_id));
        
        $result = 0;

        foreach ($request->proberties as $id => $mark) {

            $result +=  $mark['mark'];

        }//end of foreach
        $result = $result * 100/$managerProbertiesNum;

        $visit->employees()->attach($employee, array('result' => $result));

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.visits.managers', compact('store_id', 'visit_id'));

    }//end of store


    public function destroy(Employee $manager)
    {
        $manager->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.managers.index');

    }//end of destroy


   
  


}
