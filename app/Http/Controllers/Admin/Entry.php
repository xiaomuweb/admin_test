<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;


class Entry extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth')->only(['index']);
    }

    public function index()
    {

//        echo 'index';
//        echo 123;
//        $user = DB::table('admin')->get();
//        echo 123;
//        dd($user->toArray());
//        config
        return view('admin/entry/index');
    }


    /**
     * 加载后台登录模板
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function loginForm()
    {
        return view('admin/entry/login');
    }

    public function login(Request $request)
    {
        //使用Request来获取post数据
        //如果使用创建控制器默认引入是Request类，需要实例化来调用input方法
        //这里只能用依赖注入的方式，用　$request = new Request();的方式取不到数据
//        Auth服务默认会去找配置项中defaults里面guard为web的看守，对应到的是user模型，我们需要操作的模型如果不是user，你就需要在调用Auth类的时候调用一下guard()方法，来指定guard,让他去找我们指定的这个守卫
        $status = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
//        dd($status);
        //如果返回的值为真的时候，代表登录成功，为假，代表登录失败
        if ($status) {
            //登录成功，返回后台首页
            return redirect('/admin/index');
        }
        //如果运行到这里，代表登录不成功，继续返回登录页面，提示错误
        return redirect('/admin/login')->with('error', '用户名或密码错误！请重新输入');

    }
    public function loginout(){
        //使用Auth服务来进行退出登录
        Auth::guard('admin')->logout();
        //返回登录页面
        return redirect('/admin/login');
    }

}
