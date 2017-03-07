<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use App\Model\Photo;

use Illuminate\Support\Facades\Redis;

class PhotoController extends Controller
{
    // 图片模型
    protected $photo;

    /**
     * 构造方法
     * @Author   LiuJian
     * @DateTime 2017-03-06
     */
    public function __construct (Photo $photo)
    {
        $info = Redis::get('1');
        dd($info);
        $this->photo = $photo;
    }

    public function index ()
    {
        $data = $this->photo->paginate(15);

        return view('admin.photo_list', compact('data'));
    }

    public function issuePhoto ()
    {
        return view('admin.issue_photo');
    }

    /**
     * 保存图片编辑信息
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @param    Request    $request [description]
     * @param    [type]     $id      [description]
     * @return   [type]              [description]
     */
    public function saveEditPhoto (Request $request, $id)
    {
        $data = $request->except('_token');
        $photo = $this->photo->find($id);
        $photo->update($data);

        return redirect()->back();
    }

    /**
     * 图片的编辑
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function editPhoto ($id)
    {
        $data = $this->photo->find($id);

        return view('admin.edit_photo', compact('data'));
    }

    /**
     * 删除上传的图片
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function delPhoto (Request $request)
    {
        $id = (int) $request->id;
        return $this->photo->destroy($id);
    }

    /**
     * 保存图片信息
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function savePhoto (Request $request)
    {
        $data = $request->except('_token');
        $data['admin_id'] = Session::get('admin')->id;

        $this->photo->create($data);

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
                $filename = date('Y-m-d_H:i:s') . '__' . uniqid() . '.' . $ext;
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
