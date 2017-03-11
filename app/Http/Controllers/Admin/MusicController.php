<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use App\Model\Music;

use Illuminate\Support\Facades\Redis;

class MusicController extends Controller
{
    // 图片模型
    protected $music;

    /**
     * 构造方法
     * @Author   LiuJian
     * @DateTime 2017-03-06
     */
    public function __construct (Music $music)
    {
        $this->music = $music;
    }

    public function index ()
    {
        $data = $this->music->paginate(15);

        return view('admin.music.music_list', compact('data'));
    }

    public function issueMusic ()
    {
        return view('admin.music.issue_music');
    }

    /**
     * 保存图片编辑信息
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @param    Request    $request [description]
     * @param    [type]     $id      [description]
     * @return   [type]              [description]
     */
    public function saveEditMusic (Request $request, $id)
    {
        $data = $request->except('_token');
        $music = $this->music->find($id);
        $music->update($data);

        return redirect()->back();
    }

    /**
     * 图片的编辑
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function editMusic ($id)
    {
        $data = $this->music->find($id);

        return view('admin.music.edit_music', compact('data'));
    }

    /**
     * 删除上传的图片
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function delMusic (Request $request)
    {
        $id = (int) $request->id;

        return $this->music->destroy($id);
    }

    /**
     * 保存音乐信息
     * @Author   LiuJian
     * @DateTime 2017-03-06
     * @return   [type]     [description]
     */
    public function saveMusic (Request $request)
    {
        $data = $request->except('_token');
        $data['admin_id'] = Session::get('admin')->id;

        $this->music->create($data);

        return redirect()->back();
    }
}
