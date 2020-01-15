<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ThemesController extends Controller
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.themes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editor()
    {
        return view('admin.themes.editor');
    }
}
