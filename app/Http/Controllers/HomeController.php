<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $donations = DB::table('donations')->select('amount', 'created_at')->get();
        $donations = $donations->reverse();
        
        $revenue = 0;
        foreach ($donations as $donation) {
            $revenue = $revenue + $donation->amount; 
        }

        return view('home')->with('donations', $donations)->with('revenue', $revenue);
        // return view('home', $donations);
    }
}
