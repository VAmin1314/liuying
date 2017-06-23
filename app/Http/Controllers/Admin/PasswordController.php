<?php
namespace App\Http\Controllers\Admin;

use Hash;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    protected $admin;

    public function __construct (Admin $admin)
    {
        $this->admin = $admin;
    }

    public function index ()
    {
        return view('admin.password.index');
    }

    public function store (Request $request)
    {
        $oldPwd = $request->old_password;
        $newPwd = $request->password;
        $rePwd = $request->password_confirmation;

        $msg = '原密码不对';
        $admin = session('admin');
        if ($newPwd != $rePwd) {
            $msg = '两次密码不一致';
        } elseif ($oldPwd == $admin->password) {
            $admin->password = $newPwd;
            $admin->save();

            session(['admin' => null]);
            $msg = '修改成功';
        }

        return back()->with('password_msg', $msg);

        dd(Hash::check($oldPwd, $admin->password));
    }
}
