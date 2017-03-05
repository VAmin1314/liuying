<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function index ()
    {
        return view('admin.photo_list');
    }

    public function issuePhoto ()
    {
        return view('admin.issue_photo');
    }
}
