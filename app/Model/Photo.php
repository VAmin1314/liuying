<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';

    protected $fillable = ['path', 'title', 'shot_time', 'shot_add',
    'little_title', 'description', 'admin_id', 'qiniu_key', 'qiniu_hash'];
}
