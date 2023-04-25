<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Headers: Authorization, Content-Type');

Auth::routes();




