<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Http\Controllers\Route;

class CommentController extends Controller
{
  public function store(Request $request)
 {
   $comment=new Comment;
   $comment->comment_content=$request->get('content');
   $comment->user_id=$request->user()->id;
   $comment->forum_id=$request->get('forum_id');

   if($comment->save()){
     return redirect()->back();
   }else{
     return redirect()->back()->withInput()->withErrors('评论失败');
   }
 }
 
}
