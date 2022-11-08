<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class KidsController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $loginView = 'concurso.index';
}
