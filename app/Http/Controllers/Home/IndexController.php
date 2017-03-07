<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\Model\Photo;
use App\Model\Setting;

class IndexController extends Controller
{
    protected $photo;

    public function __construct (Photo $photo, Setting $setting)
    {
        $this->photo = $photo;
        $this->setting = $setting;
    }

    public function index ()
    {
        $photo = $this->photo->where('admin_id', 1)->get();
        $setting = $this->setting->where('key', 'setting')->first();
        $setting = json_decode($setting->value);

        return view('home.index', compact('photo', 'setting'));
    }
}
