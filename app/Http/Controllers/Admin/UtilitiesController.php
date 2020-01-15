<?php

namespace App\Http\Controllers\Admin;

use App\Utilitie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UtilitiesController extends Controller
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
        $utilities = Utilitie::all();

        return view('admin.utilities.index', compact('utilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.utilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string',
            'key' => 'required|unique:utilities'
        ])->validate();

        $utilities = new Utilitie([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        $utilities->save();

        return redirect('admin/utilities')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilities = Utilitie::all()->find($id)->first();

        return view('admin.utilities.update', ['utilities' => $utilities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => 'required|string',
            'key' => 'required|unique:pages'
        ])->validate();

        Utilitie::all()->find($id)->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        return redirect('admin/utilities')->with('success', 'Stock has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
