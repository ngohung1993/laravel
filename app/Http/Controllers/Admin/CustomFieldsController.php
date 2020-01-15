<?php

namespace App\Http\Controllers\Admin;

use App\CustomField;
use App\Http\Controllers\Controller;

class CustomFieldsController extends Controller
{
    /**
     * CustomFieldController constructor.
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
        $custom_fields = CustomField::all();

        return view('admin.custom-fields.index', compact('custom_fields'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $custom_field = CustomField::all()->find($id);

        return view('admin.custom-fields.show', compact('custom_field'));
    }
}
