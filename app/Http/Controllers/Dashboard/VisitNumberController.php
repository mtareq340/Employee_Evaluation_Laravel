<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitNumberRequest;
use App\Visitnumber;

class VisitNumberController extends Controller
{
    
    public function index()
    {
        $visitnumbers = VisitNumber::all();

        return view('dashboard.visitnumbers.index', compact('visitnumbers'));

    }//end of index

  
    public function create()
    {
        return view('dashboard.visitnumbers.create');

    }//end of create

    public function store(VisitNumberRequest $request)
    {
        Visitnumber::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.visitnumbers.index');

    }//end of store
    public function edit(Visitnumber $visitnumber)
    {
        return view('dashboard.visitnumbers.edit', compact('visitnumber'));

    }//end of edit
    
    public function update(VisitNumberRequest $request, Visitnumber $visitnumber)
    {
     
        $visitnumber->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.visitnumbers.index');

    }//end of update

    public function destroy(Visitnumber $visitnumber)
    {
        $visitnumber->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.visitnumbers.index');

    }//end of destroy

}
