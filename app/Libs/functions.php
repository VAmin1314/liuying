<?php
if (!function_exists('qiniu_path')) {
    function qiniu_path ($key, $type = true)
    {
        $qiniu = new \App\Libs\Qiniu;

        return $qiniu->privatePath($key);
    }
}

if (!function_exists('qiniu_image_view')) {
    function qiniu_image_view ($key, $type = true)
    {
        $qiniu = new \App\Libs\Qiniu;

        return $qiniu->privatePath($key);
    }
}