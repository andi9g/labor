<?php

namespace App\Http\Controllers;

use App\Models\asetM;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function message(Request $request) {

        $data = asetM::paginate(20);
        $data->appends($request->all());
        return response()->json($data);
    }
}
