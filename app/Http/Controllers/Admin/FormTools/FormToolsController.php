<?php

namespace App\Http\Controllers\Admin\FormTools;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class FormToolsController extends Controller
{
    public function index()
    {
        $sites = Site::get();
        return view('admin.form-tools.index', compact(['sites']));
    }

    public function create()
    {
        return view('admin.form-tools.create');
    }
}
