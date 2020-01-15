<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BackupsController extends Controller
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
        $backups = [];
        $path = 'dashboard/backups';


        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != '.' && $file != '..') {
                        $backups[] = array_merge(explode('.', $file), [filesize($path . '/' . $file) . ' kB']);
                    }
                }
                closedir($dh);
            }
        }

        return view('admin.backups.index', compact('backups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        $file = 'backups/' . time() . '.sql';
        $command = 'mysqldump --opt -h localhost -u root --databases laravel-admin > storage/' . $file;

        exec($command);

        return Storage::disk('public')->download($file);
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
            'key' => 'required|unique:pages'
        ])->validate();

        $menu = new Menu([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        $menu->save();

        return redirect('admin/backups')->with('success', 'Stock has been added');
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

        return view('admin.backups.update', ['menu' => $menu]);
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

        Menu::all()->find($id)->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        return redirect('admin/menus')->with('success', 'Stock has been added');
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
