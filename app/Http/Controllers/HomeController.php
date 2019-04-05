<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Charts\StatChart;
use App\User;
use Auth;
use App\Thread;
use App\Comment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this;
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
        $totalThread = Thread::count();
        $totalComment = Comment::count();

        $totalUserChart->labels(['Data Count']);
        $totalUserChart->dataset('Users', 'bar', [$totaluser])->backgroundColor([
            '#00a6eb', 
        ]);
        $totalUserChart->dataset('Threads', 'bar', [$totalThread])->backgroundColor([
            '#f71118', 
        ]);;
        $totalUserChart->dataset('Comments', 'bar', [$totalComment])->backgroundColor([
            '#fff60c', 
        ]);;
        
        
       


        return view('home', ['totalUserChart' => $totalUserChart]);
    }
}
