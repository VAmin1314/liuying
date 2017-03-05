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
        return view('admin.login');
    }

    public function login (Request $request)
    {
        $name = $request->name;
        $password = $request->password;

        $admin = $this->admin->where('name', $name)->first();
        if ($admin) {
            if ($admin->password == $password) {
                Session::put('admin', $admin);
                return redirect('/backend');
            } else {
                return ['status' => 'error', 'message' => '密码不正确'];
            }
        } else {
            return ['status' => 'error', 'message' => '用户名不存在'];
        }
    }
}
