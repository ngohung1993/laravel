<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Product;
use App\SeoTool;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
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
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $seo_tool = new SeoTool();

        return view('admin.products.create', ['product' => $product, 'seo_tool' => $seo_tool]);
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
            'link' => 'required|string',
            'category_id' => 'required'
        ])->validate();

        $seo_tool = new SeoTool([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        $seo_tool->save();

        if ($request->get('category_id') == null) {
            $children = DB::table('products')->whereNull('category_id')->count();
        }
        if ($request->get('category_id') != null) {
            $children = DB::table('products')->where('category_id', '=', $request->get('category_id'))->count();
        }

        $product = new Product([
            'title' => $request->get('title'),
            'slug' => FunctionHelpers::slug($request->get('title')),
            'page_id' => $request->get('page_id'),
            'avatar' => $request->get('avatar'),
            'link' => $request->get('link'),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'serial' => $children + 1,
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'icon' => $request->get('icon'),
            'seo_tool_id' => $seo_tool->id,
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0
        ]);

        $product->save();

        $images = json_decode($request->get('images'));

        if ($images) {
            foreach ($images as $key => $image) {
                $image = new Image([
                    'avatar' => $image,
                    'product_id' => $product->id
                ]);

                $image->save();
            }
        }

        return redirect('admin/products')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::all()->find($id);

        $seo_tool = SeoTool::all()->find($product->seo_tool_id);

        $images = Image::all()->where('product_id', '=', $id);

        return view('admin.products.update', ['product' => $product, 'seo_tool' => $seo_tool, 'images' => $images]);
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

        Product::all()->find($id)->update([
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'slug' => FunctionHelpers::slug($request->get('title')),
            'content' => $request->get('content'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'avatar' => $request->get('avatar'),
            'category_id' => $request->get('category_id'),
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0
        ]);

        SeoTool::all()->find(Product::all()->find($id)->first()->seo_tool_id)->update([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        return redirect('admin/products')->with('success', 'Stock has been added');
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function realestate()
    {
        $products = DB::table('products')->orderBy('serial', 'ASC')->where('category_id', '=', 9)->get()->toArray();
        return view('admin.products.realestate', ['products' => $products]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sell()
    {
        $products = DB::table('products')->orderBy('serial', 'ASC')->where('category_id', '=', 8)->get()->toArray();
        return view('admin.products.sell', ['products' => $products]);
    }
}
