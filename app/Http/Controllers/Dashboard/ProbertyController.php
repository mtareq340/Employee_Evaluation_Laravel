<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProbertyRequest;
use App\Proberty;
class ProbertyController extends Controller
{
    public function index()
    {
        $proberties = Proberty::all();

        return view('dashboard.proberties.index', compact('proberties'));

    }//end of index

    public function create()
    {
        return view('dashboard.proberties.create');

    }//end of create

    public function store(ProbertyRequest $request)
    {
      
        Proberty::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.proberties.index');

    }//end of Proberty
    public function edit(Proberty $proberty)
    {
        return view('dashboard.proberties.edit', compact('proberty'));

    }//end of edit
    
    public function update(ProbertyRequest $request, Proberty $proberty)
    {
     
        $proberty->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.proberties.index');

    }//end of update

    public function destroy(Proberty $proberty)
    {
        $proberty->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.proberties.index');

    }//end of destroy


}
