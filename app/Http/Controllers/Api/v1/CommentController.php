<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request , Comment $comment): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {

        $validData=$request->validate($request,[

             'comment' => 'required'

        ]);


        auth()->user()->comments()->create($validData);

        return response([
            'data'=>[

            'message'=>'نظر شما با موفقیت ثبت گردید'

            ],

            'status' =>'success',

        ]);

    }
}
