<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\Model\Photo;
use App\Model\Setting;

class MusicController extends Controller
{
    protected $photo;

    public function __construct (Photo $photo, Setting $setting)
    {
        $this->photo = $photo;
        $this->setting = $setting;
    }

    public function index ()
    {
        $setting = $this->setting->where('key', 'setting')->first();
        $setting = json_decode($setting->value);
        $photo = [];

        // 是否允许别人访问
        if (!empty($setting->is_allow)) {
            $photo = $this->photo->where('admin_id', 1)->get();
        }

        return view('home.index', compact('photo', 'setting'));
    }
}
