<?php

return [
    'default' => 'local',
    'cloud' => 's3',

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public/upload'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'uploads' => [
            'driver' => 'local',
            // 文件将上传到storage/app/uploads目录
            // 'root' => storage_path('app/uploads'),
            // 文件将上传到public/uploads目录 如果需要浏览器直接访问 请设置成这个
            'root' => public_path('upload'),
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

    ],

];
