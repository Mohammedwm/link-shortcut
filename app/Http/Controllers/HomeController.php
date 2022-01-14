<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $links = Link::orderBy('created_at', 'desc')->get();

        return view('index', [
            'links' => $links,
        ]);
    }
    public function create(Request $request)
    {
        $data['prev_link'] = $request->post('prev_link');
        $data['new_link'] = uniqid();
        $link = Link::create($data);
        return redirect()->route('index');
    }
    public function open($new_link)
    {
        $link = Link::where('new_link',$new_link)->first();
        if (!$link) {
            return abort(404);
        }
        return redirect($link->prev_link);
    }


}
