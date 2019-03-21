<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Thread;
use Auth;



class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread){
        
        if($user = Auth::user())
        {
            $this->validate($request,[
                'body' => 'required'
            ]);
    
            $comment=new Comment();
            $comment->body=$request->body;
            $comment->user_id=auth()->user()->id;
            $thread->comments()->save($comment);
    
            return back()->withMessage('Replied');
    
        };
     
        
        $this->validate($request,[
            'body' => 'required'
        ]);

      

        return back()->withMessage('Unauthorised');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($user = Auth::user()){
            if($comment->user_id == auth()->user()->id){

                $this->validate($request,[
                    'body' => 'required'
                ]);
    
                $comment->update($request->all());
    
                return back()->withMessage('Edited');


            }
               
            abort('401');
        }
        abort('401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($user = Auth::user()){
            if (auth()->user()->id==$comment->user_id){
                $comment->delete();

                return back()->withMessage('Deleted Comment');
            }
        }  

        return back()->withMessage('Please Login');
    
    }
}
