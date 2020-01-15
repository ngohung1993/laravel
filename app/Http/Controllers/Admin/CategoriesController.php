<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\SeoTool;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
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
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $seo_tool = new SeoTool();

        return view('admin.categories.create', ['category' => $category, 'seo_tool' => $seo_tool]);
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
            'page_id' => 'required'
        ])->validate();

        $seo_tool = new SeoTool([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        $seo_tool->save();

        if ($request->get('parent_id') == null) {
            $children = DB::table('categories')->whereNull('parent_id')->count();
        } else {
            $children = DB::table('categories')->where('parent_id', '=', $request->get('parent_id'))->count();
        }

        $category = new Category([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'page_id' => $request->get('page_id'),
            'avatar' => $request->get('avatar'),
            'content' => $request->get('content'),
            'serial' => $children + 1,
            'description' => $request->get('description'),
            'parent_id' => $request->get('parent_id'),
            'icon' => $request->get('icon'),
            'seo_tool_id' => $seo_tool->id,
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0
        ]);

        $category->save();

        $images = json_decode($request->get('images'));

        if ($images) {
            foreach ($images as $key => $image) {
                $image = new Image([
                    'avatar' => $image,
                    'category_id' => $category->id
                ]);

                $image->save();
            }
        }

        return redirect('admin/categories')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all()->find($id);

        $seo_tool = SeoTool::all()->find($category['seo_tool_id']);

        $images = Image::all()->where('category_id', '=', $id);

        return view('admin.categories.update', ['category' => $category, 'seo_tool' => $seo_tool, 'images' => $images]);
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
            'page_id' => 'required'
        ])->validate();

        Category::all()->find($id)->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'page_id' => $request->get('page_id'),
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'icon' => $request->get('icon'),
            'avatar' => $request->get('avatar'),
            'parent_id' => $request->get('parent_id'),
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0
        ]);

        SeoTool::all()->find(Category::all()->find($id)->first()->seo_tool_id)->update([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        return redirect('admin/categories')->with('success', 'Stock has been added');
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
        $category = Category::all()->find($id);
        $category->delete();

        return redirect('admin/categories')->with('success', 'Stock has been deleted Successfully');
    }
}
