<?php

namespace App\Http\Controllers;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class QiniuController
{
    protected $auth;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $accessKey = env('QINIU_ACCESSKEY');
        $secretKey = env('QINIU_SECRETKEY');
        // 构建鉴权对象
        $this->auth = new Auth($accessKey, $secretKey);
    }

    public function upload ()
    {
        $bucket = 'liuying0406';
        // 生成上传 Token
        $token = $this->auth->uploadToken($bucket);
        // 要上传文件的本地路径
        $filePath = $file->getRealPath();
        // 上传到七牛后保存的文件名
        $date = time();
        $key = 'demo/'.$date.'.'.$file->getClientOriginalExtension();
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
            return response()->json(['ResultData'=>'失败', 'info'=>'失败']);
        } else {
            $info = [
                'name'=>$data['name'],
                'level'=>$data['level'],
                'pic'=>$ret['key'],
                'addtime'=>$date,
                'status'=>'1'
            ];
            $ids = \DB::table('data_demo')->insertGetid($info);
            if($ids){
                return redirect('/demo');
            }else{
                dd('添加失败');
            }
        }
    }
}
