<?php

namespace App\Http\Controllers;

use App\Helpers\FunctionHelpers;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * @param null $category_slug
     * @param null $content_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($category_slug = null, $content_slug = null)
    {
        $category = FunctionHelpers::get_category_by_slug($category_slug);

        if (!$category) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $post = FunctionHelpers::get_record_by_slug($content_slug, 'post');
        $product = FunctionHelpers::get_record_by_slug($content_slug, 'product');
        $classified = FunctionHelpers::get_record_by_slug($content_slug, 'classified');

        switch ($category['page']['key']) {
            case 'news-page':
                if (!$post && $content_slug) {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
                $page = !$post ? 'news-page' : 'detail-news-page';
                break;
            case 'single-page':
                $page = 'single-page';
                break;
            case 'empty-page':
                $page = 'empty-page';
                break;
            case 'classified-page':
                $page = 'classified-page';
                break;
            case 'price-list-page':
                $page = 'price-list-page';
                break;
            case 'contact-page':
                $page = 'contact-page';
                break;
            case 'product-page':
                if (!$product && $content_slug) {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }

                $page = $product ? 'detail-product-page' : 'product-page';
                break;
            default;
                return redirect('/');
                break;
        }

        return view('home.pages.' . $page, [
            'post' => $post,
            'product' => $product,
            'category' => $category,
            'classified' => $classified,
        ]);
    }

    public function theme()
    {
        return view('home.theme');
    }

    public function themeDemo($product_slug)
    {
        $product = FunctionHelpers::get_record_by_slug($product_slug, 'product');
        return view('home.theme-demo', ['product' => $product]);
    }

    /**
     * @param Request $rq
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function sendMail(Request $rq)
    {
        Validator::make($rq->all(), [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|mail',
            'product' => 'required',
        ])->validate();

        $email_root = FunctionHelpers::get_custom_field_by_key('email')->value;
        $full_name = $rq->get('full_name');
        $phone = $rq->get('phone');
        $email = $rq->get('email');
        $product = $rq->get('product');
        $message = $rq->get('message');
        Mail::to($email_root)->send(new SendMail($full_name, $phone, $email, $product, $message));
        Session::flash('success');
        return back();

    }
}
