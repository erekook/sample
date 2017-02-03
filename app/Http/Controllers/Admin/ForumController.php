<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Forum;
use App\Models\User;

class ForumController extends Controller
{
  public function index()
  {
    $forums=Forum::paginate(5);
    //$forums=DB::select('SELECT forums.id,forum_subject,forum_description,forum_content,forums.created_at,name FROM forums,users WHERE forums.user_id=users.id');
    //return view('admin/forum/index')->withForums(Forum::all()->paginate(5));
    return view('admin/forum/index')->with('forums',$forums);
  }

  public function edit($forum_id)
  {
      return view('admin/forum/edit')->withForum(Forum::find($forum_id));
  }

  public function create()
  {
    return view('admin/forum/create');
  }

  public function store(Request $request)
  {
  $this->validate($request,[
    'forum_subject'=>'required|unique:forums|max:255',
    //'forum_content'=>'required',
    'forum_description'=>'required',

    ]);

  $forum=new Forum;
  $forum->forum_subject=$request->get('forum_subject');
  $forum->forum_content=$request->get('content');
  $forum->user_id=$request->user()->id;

  if($forum->save()){
      return redirect('admin/forum');
    }else{
      return redirect()->back()->withInput()->withErrors('保存失败');
    }

  }

  public function destroy($forum_id)
{

    $forum=Forum::where('forum_id',$forum_id);
    $this->authorize('destroy',$forum);
    $forum->delete();
    session()->flash('success','删除成功!');
    return back();
}

  public function show($id)
  {
    return view('forum/show')->withForum(Forum::with('hasManyComments')->find($id));
  }

}
