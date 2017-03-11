<?php
namespace App\Http\Controllers\Api;

use Qiniu\Auth;

class QiniuController extends Controller
{
    // 七牛初始化
    protected $auth;

    public function __construct ()
    {
        // 用于签名的公钥和私钥
        $accessKey = 'Ln17ry71JodvpMaNDlKDQ0sGl5eP9xTJAqqGlgDH';
        $secretKey = 'oSssYPmwCFjEyfJKwN2sTquCsh1U_Vk7LSUCe5h9';

        $this->auth = new Auth($accessKey, $secretKey);
    }

    public function index ()
    {
        dd($this->auth);
    }

    /**
     * 文件上传
     * @Author   LiuJian
     * @DateTime 2017-03-11
     * @return   [type]     [description]
     */
    protected function upload ($filePath = '', $bucket = 'xphfile')
    {
        $token = $auth->uploadToken($bucket);
        $key = 'my-php-logo.png';

        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        $policy = array(
            'callbackUrl' => 'http://your.domain.com/callback.php',
            'callbackBody' => 'filename=$(fname)&filesize=$(fsize)'
            );

        echo "\n====> putFile result: \n";
        if ($err !== null) {
            var_dump($err);
        } else {
            var_dump($ret);
        }
    }
}