<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requsets;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use Mail;

class UsersController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth',[
        'only'=>['edit','update','destroy']
      ]);

      $this->middleware('guest',[
        'only'=>['create']
      ]);

    }

    public function index()
    {
        $users=User::paginate(30);
        return view('users.index',compact('users'));
    }


    public function create()
    {
      return view('users.create');
    }

    public function show($id)
    {
      $user=User::findOrFail($id);
      return view('users.show',compact('user'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name'=>'required|max:50',
        'email'=>'required|email|unique:users|max:255',
        'password'=>'required'
      ]);

      $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
      ]);

      //Auth::login($user);
      $this->sendEmailConfirmationTo($user);
      session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }

    public function sendEmailConfirmationTo($user)
    {
      $view='emails.confirm';
      $data=compact('user');
      $from='longjietan@163.com';
      $name='longjie';
      $to=$user->email;
      $subject='感谢注册，请确认你的邮箱！';

      Mail::send($view,$data,function($message) use ($from,$name,$to,$subject){
        $message->from($from,$name)->to($to)->subject($subject);
      });

    }

    public function edit($id)
    {
      $user=User::findOrFail($id);
      $this->authorize('update',$user);
      return view('users.edit',compact('user'));
    }

    public function update($id,Request $request)
    {
      $this->validate($request,[
        'name'=>'required|max:50',
        'password'=>'confirmed|min:6'
      ]);

      $user=User::findOrFail($id);
      $this->authorize('update',$user);

      $data=array_filter([
        'name'=>$request->name,
        'password'=>$request->password,
      ]);

      $user->update($data);
      session()->flash('success','个人资料更新成功！');
      return redirect()->route('users.show',$id);
    }

    public function destroy($id)
    {
      $user=User::find($id);
      $this->authorize('destroy', $user);
      $user->delete();
      session()->flash('success','删除成功!');
      return back();
    }

    public function confirmEmail($token)
    {
      $user=User::where('activation_token',$token)->firstOrFail();

      $user->activated=true;
      $user->activation_token=null;
      $user->save();

      Auth::login($user);
      session()->flash('success','恭喜你，激活成功！');
      return redirect()->route('users.show',[$user]);
    }
}
