<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function index ()
    {
        return view('admin.photo_list');
    }

    public function issuePhoto ()
    {
        return view('admin.issue_photo');
    }

    /**
     * 保存图片信息
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function savePhoto (Request $request)
    {
        $photo = new Photo();
        // dd($request->all());
        $data = $request->except('_token');
        $data['admin_id'] = Session::get('admin')->id;

        $photo->create($data);
        return redirect()->back();
    }

    /**
     * 接受图片上传
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function getPhoto (Request $request)
    {

        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()){
                $originalName = $request->file('photo')->getClientOriginalName(); // 文件原名
                $ext = $request->file('photo')->getClientOriginalExtension();     // 扩展名
                $realPath = $request->file('photo')->getRealPath();   // 临时文件的绝对路径
                $type = $request->file('photo')->getClientMimeType();     // image/jpeg

                // $path = $request->photo->store('upload');
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                if ($bool) {
                    return ['path' => '/upload/'.$filename, 'status' => 'success'];
                } else {
                    return ['path' => '', 'status' => 'error'];
                }
            }
        }
    }

}
