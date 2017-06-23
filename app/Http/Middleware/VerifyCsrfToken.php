<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        '/backend/getPhoto',
        '/backend/delPhoto',
        '/getMusicList'
=======
        //
>>>>>>> 3ae9386a0dd1725c8b915992eb23dd9f3fa9d2b8
    ];
}
