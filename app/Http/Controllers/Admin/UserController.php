<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class UserController extends Controller
{
    public function getAdd()
    {   
        // 用户添加
        return view('admin.user.add');
    }

    public function postInsert(Request $request)
    {  

        //dd($data);
        
        // 验证用户名是否必填.
        $this -> validate($request,[
            'username' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'age' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            ],[
                'username.required' => '用户名必填',
                'password.required' => '密码必填',
                'repassword.required' => '确认密码',
                'repassword.same' => '确认密码不一致',
                'age.required' => '年龄必填',
                'phone.required' => '手机号必填',
                'email.required' => '邮箱必填',
                'email.email' => '邮箱格式不一致',
            ]);

         // 接收用户提交的值
        $data = $request -> except('_token','repassword');
        $data['password'] = Hash::make($data['password']);
        // 注册时间
        $data['ctime'] = time();
        // token
        $data['token'] = str_random(50);// 随机一个长度为50的字符串

        // 将结果存在数据库  
        $res = DB::table('stu') -> insert($data);

        if($res){
            return redirect('/admin/user/index') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }
    }

    // 用户主页面
    public function getIndex()
    {   // 把所有数据获取到 并且分页分配到主页面
       $data = DB::table('stu') -> paginate(10);
        return view('admin.user.index',['data'=>$data]);
    }  

}
