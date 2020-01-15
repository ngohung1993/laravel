<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\SeoTool;
use App\Classified;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClassifiedsController extends Controller
{
    /**
     * CategoriesController constructor.
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
        $classifieds = Classified::all();

        return view('admin.classifieds.index', compact('classifieds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classified = new Classified();
        $seo_tool = new SeoTool();

        return view('admin.classifieds.create', ['classified' => $classified, 'seo_tool' => $seo_tool]);
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
            'category_id' => 'required'
        ])->validate();

        $seo_tool = new SeoTool([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        $seo_tool->save();

        if ($request->get('parent_id') == null) {
            $children = DB::table('classifieds')->whereNull('category_id')->count();
        } else {
            $children = DB::table('classifieds')->where('category_id', '=', $request->get('category_id'))->count();
        }

        $classified = new Classified([
            'title' => $request->get('title'),
            'slug' => FunctionHelpers::slug($request->get('title')),
            'avatar' => $request->get('avatar'),
            'content' => $request->get('content'),
            'serial' => $children + 1,
            'province_id' => $request->get('province_id'),
            'district_id' => $request->get('district_id'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'seo_tool_id' => $seo_tool->id
        ]);

        $classified->save();

        $images = json_decode($request->get('images'));

        if ($images) {
            foreach ($images as $key => $image) {
                $image = new Image([
                    'avatar' => $image,
                    'classified_id' => $classified->id
                ]);

                $image->save();
            }
        }

        return redirect('admin/classifieds')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classified = Classified::all()->find($id)->first();

        $seo_tool = SeoTool::all()->find($classified->seo_tool_id);

        $images = Image::all()->where('classified_id', '=', $id);

        return view('admin.classifieds.update', ['classified' => $classified, 'seo_tool' => $seo_tool, 'images' => $images]);
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
            'category_id' => 'required'
        ])->validate();

        Classified::all()->find($id)->update([
            'title' => $request->get('title'),
            'slug' => FunctionHelpers::slug($request->get('title')),
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'avatar' => $request->get('avatar'),
            'category_id' => $request->get('category_id'),
            'province_id' => $request->get('province_id'),
            'district_id' => $request->get('district_id'),
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0
        ]);

        SeoTool::all()->find(Classified::all()->find($id)->first()->seo_tool_id)->update([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        return redirect('admin/classifieds')->with('success', 'Stock has been added');
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
