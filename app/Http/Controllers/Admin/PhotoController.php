<?php
namespace App\Http\Controllers\Admin;

use Session;
use App\Model\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libs\Qiniu;

class PhotoController extends Controller
{
    protected $photo;
    protected $qiniu;

    /**
     * 构造方法
     * @Author   LiuJian
     * @DateTime 2017-03-06
     */
    public function __construct (Photo $photo, Qiniu $qiniu)
    {
        $this->photo = $photo;
        $this->qiniu = $qiniu;
    }

    public function index ()
    {
        $data = $this->photo->paginate(15);

        return view('admin.photo.list', compact('data'));
    }

    public function store (Request $request)
    {
        $data = $request->except('_token', '_url');
        $data['admin_id'] = session('admin')->id;

        $qiniuData = $this->qiniu->upload($request->photo);
        $data['qiniu_key'] = $qiniuData->key;
        $data['qiniu_hash'] = $qiniuData->hash;
        $this->photo->create($data);

        return back();
    }

    public function create ()
    {
        return view('admin.photo.issue');
    }

    /**
     * 删除上传的图片
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function delete (Request $request)
    {
        $id = (int) $request->id;

        return $this->photo->destroy($id);
    }


}
