<?php

namespace App\Http\Controllers\Admin;

use App\LocationMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LocationMenusController extends Controller
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
        $location_menus = LocationMenu::all();

        return view('admin.location-menus.index', compact('location_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location_menu = new LocationMenu();
        return view('admin.location-menus.create', compact('location_menu'));
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
            'key' => 'required|unique:location_menus'
        ])->validate();

        $page = new LocationMenu([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        $page->save();

        return redirect('admin/location-menus')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location_menu = LocationMenu::all()->find($id)->first();

        return view('admin.location-menus.update', ['location_menu' => $location_menu]);
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
            'key' => 'required|unique:location-menus'
        ])->validate();

        LocationMenu::all()->find($id)->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        return redirect('admin/location-menus')->with('success', 'Stock has been added');
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
