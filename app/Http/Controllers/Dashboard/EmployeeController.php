<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Employee;
use App\Title;
use App\Store;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'LIKE', '%' . $request->search . '%');

        })->latest()->paginate(10);

        return view('dashboard.employees.index', compact('employees'));

    }//end of index

    public function storeTechnicals($store_id)
    {
        $technicals = Technical::where('store_id', $store_id)->get();
        $store = Store::FindOrFail($store_id);
        return view('dashboard.technicals.storetechnicals', compact('technicals','store'));

    }//end of index
  
    public function create()
    {
        $stores = Store::all();
        $titles = Title::all();
        return view('dashboard.employees.create', compact('stores','titles'));

    }//end of create

    public function store(EmployeeRequest $request)
    {
      
        Employee::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.employees.index');

    }//end of store
    public function edit(Employee $employee)
    {
        $stores = Store::all();
        $titles = Title::all();
        return view('dashboard.employees.edit', compact('employee','stores','titles'));

    }//end of edit
    
    public function update(EmployeeRequest $request, Employee $employee)
    {
       
        $employee->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.employees.index');

    }//end of update

    public function destroy(Employee $employee)
    {
        $employee->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.employees.index');

    }//end of destroy

}
