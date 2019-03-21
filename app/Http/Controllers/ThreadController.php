<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Auth;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function _construct(){
         return $this->middleware('auth')->except('index');
     }





    public function index()
    {
        //

        $threads = Thread::paginate(15);
        return view('thread.index',compact('threads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($user = Auth::user()){
        $this->validate($request,[
            'title'=>'required',
            'type'=>'required',
            'content'=>'required'

        ]);


        auth()->user()->threads()->create($request->all());


        return back()->withMessage('Thread Created');
        }
        return back()->withMessage('Please login to create threads');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('thread.read',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.update',compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        if (auth()->user()->id==$thread->user_id){
            $this->validate($request,[
                'title'=>'required',
                'type'=>'required',
                'content'=>'required'
    
            ]);
    
           
            $thread->update($request->all());
    
    
    
            return redirect()->route('thread.show',$thread->id)->withMessage('Thread Updated');
        }
        

        abort(401,"unauthorized");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        if (auth()->user()->id==$thread->user_id){
            $thread->delete();
            return redirect()->route('thread.index')->withMessage("Deleted");
        }
        
        abort(401,"unauthorized");
    }
}
