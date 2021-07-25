<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $comments = Comment::whereApproved(1)->latest()->paginate(20);
        return view('admin.comments.all',compact('comments'));
    }
    public function unapproved(){

        $comments=Comment::query();
        if ($keyword = request('search')) {

            $comments->where('comment', 'LIKE', "%{$keyword}%")
                ->orwhereHas('user',function ($query) use ($keyword){
                $query->where('name', 'LIKE', "%{$keyword}%");
            });

        }
        $comments = $comments->whereApproved(0)->latest()->paginate(20);
        return view('admin.comments.unapproved',compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update(['approved'=>1]);


        $notification = array(
            'message'=>' نظر مورد نظر تایید شد',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $notification = array(
            'message'=>' نظر مورد نظر تایید شد',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
