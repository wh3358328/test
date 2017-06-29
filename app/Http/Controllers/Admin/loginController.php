<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class loginController extends Controller
{
   /**
    *  [login 加载登陆页面] 
    */
   
   public function getLogin()
   {
      return view('admin.login.login');
   }

   /**
    * 验证登录
    */

   public function postDologin(Request $request)
   {
      // 1.处理登录
      $data = $request -> except('_token');

      // 查询
      $res = DB::table('stu') -> where('username',$data['username']) -> first();

      if(!$res){
        return back() -> with('error','用户名不存在');
      }else{
        // 用户名存在 检测密码
        // $res['password']; // 用户密码 加密
        // $data['password']; // 输入密码
        if(Hash::check($data['password'],$res['password'])){
          session(['user_admin'=>$res]);
          // 2.跳转后台主页面
          return redirect('/admin/index/index');
        }else{
          return back() -> with('error','用户名或密码错误');
        }
      }
      
   }
}
