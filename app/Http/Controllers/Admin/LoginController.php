<?php
namespace App\Http\Controllers\Admin;

use Session;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * admin 表
     */
    protected $admin;

    public function __construct (Admin $admin)
    {
        $this->admin = $admin;
    }

    public function index ()
    {
        return view('admin.login.login');
    }

    /**
     * 用户登录
     * @Author   LiuJian
     * @DateTime 2017-03-10
     * @param    Request    $request [Request 实例]
     * @return   json              [信息]
     */
    public function login (Request $request)
    {
        $name = $request->name;
        $password = $request->password;

        $admin = $this->admin->where('name', $name)->first();
        if ($admin) {
            if ($admin->password == $password) {
                Session::put('admin', $admin);
                return ['status' => 'success', 'message' => '认证成功'];
            } else {
                return ['status' => 'error', 'message' => '密码不正确'];
            }
        } else {
            return ['status' => 'error', 'message' => '用户名不存在'];
        }
    }

    /**
     * 退出
     * @Author   LiuJian
     * @DateTime 2017-03-10
     * @return   [重定向]     [返回登录界面]
     */
    public function logout ()
    {
        Session::forget('admin');

        return redirect('/backend/login');
    }
}
