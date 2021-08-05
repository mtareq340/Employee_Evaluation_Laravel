<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMarksRequest;
use App\Http\Requests\TechnicalRequest;
use App\Technical;
use App\Employee;
use App\Proberty;
use App\Visit;
use App\Store;
use DB;
use PdfReport;

class TechnicalController extends Controller
{
    public function index(Request $request)
    {
        $technicals = Employee::where('title_id', 1)->when($request->search, function ($q) use ($request) {

            return $q->where('title_id', 1)->where('name', 'LIKE', '%' . $request->search . '%');

        })->latest()->paginate(10);
        return view('dashboard.technicals.index', compact('technicals'));

    }//end of index

    function reports()
    {
         $technicals = DB::select('SELECT 
         employees.id,employees.name,employees.phone,
         count(*) as countVisits ,SUM(result) as sumResults
         FROM employees
         JOIN visit_employee
             ON employees.id = visit_employee.employee_id
         JOIN visits
             ON visits.id = visit_employee.visit_id
         WHERE employees.title_id = 1 
         GROUP BY  employees.id;
     ');

         $stores = Store::all();
         $store_id = 0;
        return view('dashboard.technicals.reports', compact('technicals','stores','store_id'));
        
    }

    function fetchTechnicals(Request $request)
    {        
        $from_date = \Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
        $to_date = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
        $stores = Store::all();

        $technicals = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE employees.title_id = 1 
            GROUP BY  employees.id;
            ');
        $store_id = 0;

        if($request->from_date == null && $request->to_date == null && $request->store_id == null)
        {
            $technicals = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE employees.title_id = 1 
            GROUP BY  employees.id;
        ');
                $store_id = $request->store_id;

        }
        elseif($request->from_date == null && $request->to_date == null && $request->store_id != null)
        {
            
            $technicals = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE employees.store_id = "'.$request->store_id.'" And employees.title_id = 1 
            GROUP BY  employees.id;
            ');
            $store_id = $request->store_id;


        }
        elseif($request->from_date != null && $request->to_date != null && $request->store_id != null)
        {
            $technicals = DB::select('SELECT 
            employees.id,employees.name,employees.phone,
            count(*) as countVisits ,SUM(result) as sumResults
            FROM employees
            JOIN visit_employee
                ON employees.id = visit_employee.employee_id
            JOIN visits
                ON visits.id = visit_employee.visit_id
            WHERE visit_date BETWEEN "'.$from_date.'" AND "'.$to_date.'"
            AND employees.store_id = "'.$request->store_id.'" And employees.title_id = 1 
            GROUP BY  employees.id;
            ');
            $store_id = $request->store_id;

        }
        
    
      return view('dashboard.technicals.reports', compact('technicals','stores','store_id'));

    }


    public function probertyTechnicals($store_id, $visit_id, $technical_id)
    {
        $proberties = Proberty::where('title_id', 1)->get();
        $technical = Employee::FindOrFail($technical_id);
        // $store = Store::FindOrFail($store_id);
        return view('dashboard.technicals.probertytechnicals', compact('proberties', 'store_id', 'visit_id', 'technical_id', 'technical'));

    }//end of index
    public function results($store_id, $visit_id)
    {
        $visit = Visit::FindOrFail($visit_id);
        $technicals = $visit->employees()->where('store_id', $store_id)->where('title_id',1)->get();  
        $store = Store::FindOrFail($store_id);
        // dd($technicals);
        // $store = Store::FindOrFail($store_id);
        return view('dashboard.technicals.results', compact('store', 'visit_id', 'technicals'));

    }//end of index
    
    
    public function marks(AddMarksRequest $request)
    {
        $technicals = Employee::where('store_id',  $request->store_id)
        ->where('title_id',1)->get();   
        $store = Store::FindOrFail($request->store_id);
        $visit_id = $request->visit_id;
        $store_id = $request->store_id;
        $employee = Employee::FindOrFail($request->technical_id);
        $visit = Visit::FindOrFail($request->visit_id);
        $technicalProbertiesNum = (Proberty::where('title_id', 1)->get())->count() *10;
        
        $employee->proberties()->attach($request->proberties, array('visit_id' => $visit_id));
        
        $result = 0;

        foreach ($request->proberties as $id => $mark) {

            $result +=  $mark['mark'];

        }//end of foreach
        $result = $result * 100/$technicalProbertiesNum;

        $visit->employees()->attach($employee, array('result' => $result));

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.visits.technicals', compact('store_id', 'visit_id'));

    }//end of store

    public function create()
    {
        $stores = Store::all();
        return view('dashboard.technicals.create', compact('stores'));

    }//end of create

    public function store(TechnicalRequest $request)
    {
      
        technical::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.technicals.index');

    }//end of store
    public function edit(Employee $technical)
    {
        $stores = Store::all();
        return view('dashboard.technicals.edit', compact('technical','stores'));

    }//end of edit
    
    public function update(TechnicalRequest $request, Employee $technical)
    {
       
        $technical->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.technicals.index');

    }//end of update

    public function destroy(Employee $technical)
    {
        $technical->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.technicals.index');

    }//end of destroy

}
