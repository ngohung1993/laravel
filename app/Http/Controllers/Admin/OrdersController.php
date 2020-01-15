<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
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
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
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

        $order = new Order([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        $order->save();

        return redirect('admin/orders')->with('success', 'Stock has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::all()->find($id)->first();

        return view('admin.backups.update', ['order' => $order]);
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

        Order::all()->find($id)->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'key' => $request->get('key')
        ]);

        return redirect('admin/Orders')->with('success', 'Stock has been added');
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
        $order = Order::all()->find($id);
        $order->delete();

        return redirect('admin/menus')->with('success', 'Stock has been deleted Successfully');
    }
}
