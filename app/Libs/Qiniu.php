<?php
namespace App\Libs;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

/**
* 七牛存储
*/
class Qiniu
{
    // 鉴权
    public $auth;

    // 上传结果
    public $result = false;

    // 返回的key
    public $key = '';

    // 返回的hash
    public $hash = '';

    // 上传的七牛空间
    public $bucket = 'file';

    protected $url = '';
    protected $accessKey = '';
    protected $secretKey = '';

    /**
     * 生成七牛的鉴权对象
     * @Author   LiuJian
     * @DateTime 2017-05-20
     */
    function __construct()
    {
        $this->accessKey = env('QINIU_ACCESSKEY');
        $this->secretKey = env('QINIU_SECRETKEY');
        $this->url = env('QINIU_URL');

        $this->auth = new Auth($this->accessKey, $this->secretKey);
    }

    /**
     * 文件上传
     * @Author   LiuJian
     * @DateTime 2017-05-20
     * @return   [type]     [description]
     */
    public function upload ($file, $bucket = 'file')
    {
        $this->bucket = $bucket;
        // 生成上传 Token
        $token = $this->auth->uploadToken($this->bucket);
        // 要上传文件的本地路径
        $filePath = $file;
        // 上传到七牛后保存的文件名
        $key = 'image-'.mt_rand(10000, 99999).time();
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err === null) {
            $this->result = true;
            $this->key = $ret['key'];
            $this->hash = $ret['hash'];
        }

        return $this;
    }

    public function status ()
    {
        return $this->result;
    }

    public function publicPath ($key)
    {
        return $this->url.$key;
    }

    public function privatePath ($key)
    {
        $url = $this->url.$key.'?e='.time();

        return $this->getViewUrl($url);
    }

    public function privateView ($key, $type = '1', $width = '200', $height = '200')
    {
        $url = $this->url.$key.'?imageView2/'.$type.'/w/'.$width.'/h/'.$height;
        $url .= '&e='.time();

        return $this->getViewUrl($key);
    }

    public function getViewUrl ($url)
    {
        $hash = hash_hmac('sha1', $url, $this->secretKey, true);
        $hash = $this->accessKey . ':' . \Qiniu\base64_urlSafeEncode($hash);
        $url .= '&token='.$hash;

        return $url;
    }






}