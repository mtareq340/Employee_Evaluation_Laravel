<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProbertyRequest;
use App\Proberty;
class TechnicalProbertyController extends Controller
{
    public function index()
    {
        $technicalproberties = Proberty::where('title_id', 1)->get();

        return view('dashboard.technicalproberties.index', compact('technicalproberties'));

    }//end of index

    public function create()
    {
        return view('dashboard.technicalproberties.create');

    }//end of create

    public function store(ProbertyRequest $request)
    {
        $request->request->add(['title_id' => 1]);
        Proberty::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.technicalproberties.index');

    }//end of Proberty
    public function edit(Proberty $technicalproberty)
    {
        
        return view('dashboard.technicalproberties.edit', compact('technicalproberty'));

    }//end of edit
    
    public function update(ProbertyRequest $request, Proberty $technicalproberty)
    {
        // $request->request->add(['employee_id' => 1]);
        $technicalproberty->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.technicalproberties.index');

    }//end of update

    public function destroy(Proberty $technicalproberty)
    {
        $technicalproberty->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.technicalproberties.index');

    }//end of destroy
}
