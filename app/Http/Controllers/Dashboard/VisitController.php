<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitRequest;
use App\Visit;
use App\Visitnumber;
use App\Employee;
use App\Store;
class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::all();

        return view('dashboard.visits.index', compact('visits'));

    }//end of index

    public function technicals($store_id, $visit_id)
    {
        $visit = Visit::FindOrFail($visit_id);
      
        $technicals = Employee::where('store_id',  $store_id)
        ->where('title_id',1)->get();

        
        $store = Store::FindOrFail($store_id);
        return view('dashboard.visits.technicalss', compact('technicals','store', 'visit_id'));

    }//end of index

    public function managers($store_id, $visit_id)
    {
        $visit = Visit::FindOrFail($visit_id);
      
        $managers = Employee::where('store_id',  $store_id)
        ->where('title_id',2)->get();

        
        $store = Store::FindOrFail($store_id);
        return view('dashboard.visits.managers', compact('managers','store', 'visit_id'));

    }//end of index

    // public function storeVisits($store_id)
    // {
    //     $visits = Visit::where('store_id',  $store_id)->get();
    //     $store = Store::FindOrFail($store_id);
    //     return view('dashboard.visits.storevisits', compact('visits','store'));

    // }

    // public function visitTechnicals($store_id, $visit_id)
    // {
    //     $visits = Visit::where('store_id',  $store_id)->get();
    //     $store = Store::FindOrFail($store_id);
    //     return view('dashboard.stores.visits', compact('visits','store'));

    // }

    public function create($store_id)
    {
        $visitnumbers = Visitnumber::all();
        return view('dashboard.visits.create', compact('visitnumbers','store_id'));

    }//end of create

    public function store(VisitRequest $request)
    {
        Visit::create($request->all());
        $visits = Visit::where('store_id', $request->store_id)->get();
        $store = Store::FindOrFail($request->store_id);
        $store_id = $store->id;
        session()->flash('success', __('site.added_successfully'));
        // return view('dashboard.stores.visits', compact('visits','store'));
        return redirect()->route('dashboard.stores.visits', compact('store_id'));

    }//end of store
    public function addVisitTechnicalProberty($visit_id)
    {
        $visit = Visit::FindOrFail($visit_id);
        $technicals = Employee::where('store_id',  $visit->store_id)
        ->where('title_id',1)->get();
        $store = Store::FindOrFail($visit->store_id);
        return view('dashboard.technicals.storetechnicals', compact('technicals','store'));

    }//end of store

    public function destroy(Visit $visit)
    {
        $visit->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.stores.index');

    }//end of destroy

    
}
