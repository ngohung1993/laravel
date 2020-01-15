<?php

namespace App\Http\Controllers\Admin;

use App\LocationMenu;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenusController extends Controller
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
        $menus = Menu::all();

        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = new Menu();
        return view('admin.menus.create', compact('menu'));
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
            'title' => 'required|string'
        ])->validate();

        $menu = new Menu([
            'title' => $request->get('title'),
            'status' => $request->get('status') ? 1 : 0
        ]);

        $menu->save();

        return redirect('admin/menus/' . $menu->id . '/edit')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::all()->find($id)->first();

        return view('admin.menus.update', ['menu' => $menu]);
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
            'title' => 'required|string'
        ])->validate();

        foreach (json_decode($request->get('location_menus')) as $key => $value) {
            LocationMenu::all()->find($value)->update([
                'menus_id' => $id
            ]);
        }

        $locations = LocationMenu::all();
        foreach ($locations as $key => $value) {
            if (in_array($value['id'], json_decode($request->get('location_menus')))) {
                $value['menus_id'] = $id;
            } else {
                if ($value['menus_id'] == $id) {
                    $value['menus_id'] = null;
                    $value->save();
                }
            }

            $value->save();
        }

        Menu::all()->find($id)->update([
            'title' => $request->get('title'),
            'status' => $request->get('status') ? 1 : 0,
            'items' => $request->get('items')
        ]);

        return redirect('admin/menus/' . $id . '/edit')->with('success', 'Stock has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $menu = Menu::all()->find($id);
        $menu->delete();

        return redirect('admin/menus')->with('success', 'Stock has been deleted Successfully');
    }
}
