<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Charts\StatChart;
use App\User;
use Auth;


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
        $totalUserChart = new StatChart;
        $totaluser = User::count();
        $totalUserChart->labels(['Total Users']);
        $totalUserChart->dataset('Users', 'bar', [$totaluser]);
        return view('home', ['totalUserChart' => $totalUserChart]);
    }
}
