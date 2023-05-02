<?php

namespace App\Http\Controllers\Admin\RecordTools;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordToolsController extends Controller
{

    public function index()
    {
        $sites = Record::select('url')->distinct()->get();
        return view('admin.recording-tools.index', compact(['sites']));
    }

    public function store(Request $request)
    {
        $record = new Record();
        $record->url = $request->url;
        $record->session = $request->session;
        $record->os = $request->os;
        $record->device = $request->device;
        $record->size = $request->size;
        $record->browser = $request->browser;
        $record->country = $request->country;
        $record->save();
    }

    public function sessions(Request $request)
    {
        $sites = Record::where('url', $request->url)->orderby('id', 'DESC')->get();
        return view('admin.recording-tools.sessions', compact(['sites']));
    }

    
    public function show(Request $request)
    {
        $info = Record::where('session', $request->session)->first();
        return view('admin.recording-tools.show', compact(['info']));
    }
}
