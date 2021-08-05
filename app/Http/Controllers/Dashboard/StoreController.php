<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Store;
use App\Employee;
use App\Visit;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return view('dashboard.stores.index', compact('stores'));

    }//end of index

    public function technicals($store_id)
    {
        $technicals = Employee::where('store_id',  $store_id)
        ->where('title_id',1)->get();
        $store = Store::FindOrFail($store_id);
        return view('dashboard.stores.technicals', compact('technicals','store'));

    }//end of index

    public function managers($store_id)
    {
        $managers = Employee::where('store_id',  $store_id)
        ->where('title_id',2)->get();
        $store = Store::FindOrFail($store_id);
        return view('dashboard.stores.managers', compact('managers','store'));

    }//end of index
  

    public function visits($store_id)
    {
        $visits = Visit::where('store_id',  $store_id)->get();
        $store = Store::FindOrFail($store_id);
        return view('dashboard.stores.visits', compact('visits','store'));

    }//end of index
   
    

    public function create()
    {
        return view('dashboard.stores.create');

    }//end of create

    public function store(StoreRequest $request)
    {
      
        Store::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.stores.index');

    }//end of store
    public function edit(Store $store)
    {
        return view('dashboard.stores.edit', compact('store'));

    }//end of edit
    
    public function update(StoreRequest $request, Store $store)
    {
     
        $store->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.stores.index');

    }//end of update

    public function destroy(Store $store)
    {
        $store->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.stores.index');

    }//end of destroy


   
}
