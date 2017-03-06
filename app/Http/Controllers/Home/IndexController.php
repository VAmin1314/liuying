<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\Model\Photo;

class IndexController extends Controller
{
    protected $photo;

    public function __construct (Photo $photo)
    {
        $this->photo = $photo;
    }
    public function index ()
    {
        $photo = $this->photo->where('admin_id', 1)->get();

        return view('home.index', compact('photo'));
    }
}
