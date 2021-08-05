<?php

namespace App\Http\Controllers\Dashboard;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Store;
use App\Employee;

class WelcomeController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        $technicals = Employee::where('title_id', 1)->get();
        $managers = Employee::where('title_id', 2)->get();
        $employees = Employee::all();


        return view('dashboard.welcome',compact('stores','technicals','managers','employees'));
    
    }//end of index
    
}//end of controller
