<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Setting;

class SettingController extends Controller
{
    protected $setting;

    /**
     * 构造方法
     * @Author   LiuJian
     * @DateTime 2017-03-06
     */
    public function __construct (Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index ()
    {
        $data = $this->setting->where('key', 'setting')->first();
        $data = json_decode($data->value);

        return view('admin.setting.setting', compact('data'));
    }

    /**
     * 保存设置
     * @Author   LiuJian
     * @DateTime 2017-03-07
     * @return   [type]     [description]
     */
    public function saveSetting (Request $request)
    {
        $data = $request->except('_token');
        $data['bgsound'] = $data['bgsound'] == null ?'':$data['bgsound'];
        $json = json_encode($data);

        $data = $this->setting->where('key', 'setting')->first();
        $data->value = $json;
        $data->save();

        return redirect()->back();
    }
}
