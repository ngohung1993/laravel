<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Image;
use App\SeoTool;
use Illuminate\Http\Request;
use App\Helpers\FunctionHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
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
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $seo_tool = new SeoTool();

        return view('admin.posts.create', ['post' => $post, 'seo_tool' => $seo_tool]);
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
            $children = DB::table('posts')->whereNull('category_id')->count();
        } else {
            $children = DB::table('posts')->where('category_id', '=', $request->get('category_id'))->count();
        }

        $post = new Post([
            'title' => $request->get('title'),
            'slug' => FunctionHelpers::slug($request->get('title')),
            'page_id' => $request->get('page_id'),
            'avatar' => $request->get('avatar'),
            'content' => $request->get('content'),
            'serial' => $children,
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'icon' => $request->get('icon'),
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0,
            'seo_tool_id' => $seo_tool->id
        ]);

        $post->save();

        $images = json_decode($request->get('images'));

        if ($images) {
            foreach ($images as $key => $image) {
                $image = new Image([
                    'avatar' => $image,
                    'post_id' => $post->id
                ]);

                $image->save();
            }
        }

        return redirect('admin/posts')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::all()->find($id);

        $seo_tool = SeoTool::all()->find($post['seo_tool_id']);

        $images = Image::all()->where('post_id', '=', $id);

        return view('admin.posts.update', ['post' => $post, 'seo_tool' => $seo_tool, 'images' => $images]);
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

        Post::all()->find($id)->update([
            'title' => $request->get('title'),
            'slug' => FunctionHelpers::slug($request->get('title')),
            'page_id' => $request->get('page_id'),
            'avatar' => $request->get('avatar'),
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'icon' => $request->get('icon'),
            'status' => $request->get('status') ? 1 : 0,
            'display_homepage' => $request->get('display_homepage') ? 1 : 0,
            'featured' => $request->get('featured') ? 1 : 0
        ]);

        SeoTool::all()->find(Post::all()->find($id)->first()->seo_tool_id)->update([
            'seo_title' => $request->get('seo_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);

        return redirect('admin/posts')->with('success', 'Stock has been added');
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
        $post = Post::all()->find($id);
        $post->delete();

        return redirect('admin/posts')->with('success', 'Stock has been deleted Successfully');
    }
}
