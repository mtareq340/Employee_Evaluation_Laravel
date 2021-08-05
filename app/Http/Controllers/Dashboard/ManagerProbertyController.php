<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProbertyRequest;
use App\Proberty;
class ManagerProbertyController extends Controller
{
    public function index()
    {
        $managerproberties = Proberty::where('title_id', 2)->get();

        return view('dashboard.managerproberties.index', compact('managerproberties'));

    }//end of index

    public function create()
    {
        return view('dashboard.managerproberties.create');

    }//end of create

    public function store(ProbertyRequest $request)
    {
        $request->request->add(['title_id' => 2]);
        Proberty::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.managerproberties.index');

    }//end of Proberty
    public function edit(Proberty $managerproberty)
    {
        
        return view('dashboard.managerproberties.edit', compact('managerproberty'));

    }//end of edit
    
    public function update(ProbertyRequest $request, Proberty $managerproberty)
    {
        // $request->request->add(['employee_id' => 1]);
        $managerproberty->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.managerproberties.index');

    }//end of update

    public function destroy(Proberty $managerproberty)
    {
        $managerproberty->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.managerproberties.index');

    }//end of destroy
}
