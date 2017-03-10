<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\Model\Music;

class MusicController extends Controller
{
    protected $photo;

    public function __construct ()
    {
        //
    }

    public function index ()
    {
        $list = [
            [
                'title' => '最幸福的事',
                'artist' => '梁文音',
                'mp3' => '/bgsound/bgsound.mp3',
                'cover' => 'http://musicdata.baidu.com/data2/pic/26418b044183959c716ebe1c360eee85/262031072/262031072.jpg@s_0,w_300',
            ],
            [
                'title' => 'Gravity2',
                'artist' => 'Jessica',
                'mp3' => 'http://p2.music.126.net/lkK28FliZQJwQ5r1XAZ-KA==/3285340747760477.mp3',
                'cover' => 'http://p4.music.126.net/7VJn16zrictuj5kdfW1qHA==/3264450024433083.jpg?param=106x106',
            ],
        ];

        return $list;
    }
}
