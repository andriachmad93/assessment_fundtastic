<?php

namespace App\Http\Controllers\APIController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderAPIController extends Controller
{
    private $user;
    public function __construct(Order $order){
        $this->order = $order;
        $this->middleware('jwt.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>true,'message'=>'Order retrieved successfully','data'=>Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $this->order->create([
            'invoice' => str_random(10),
            'product_name' => $request->get('name'),
            'email' => $request->get('email'),
            'price' => $request->get('price')
        ]);
        return response()->json(['status'=>true,'message'=>'Order created successfully','data'=>$order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        if(!$order){
            return response()->json(['status'=>false,'message'=>'Order Not Found'], 404);
        }

        return response()->json(['status'=>true,'message'=>'Order retrieved successfully','data'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if(!$order){
            return response()->json(['status'=>false,'message'=>'Order Not Found'], 404);
        }

        $order->update($request->all());

        return response()->json(['status'=>true,'message'=>'Order updated successfully','data'=>$order]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if(!$order){
            return response()->json(['status'=>false,'message'=>'Order Not Found'], 404);
        }

        $order->delete();

        return response()->json(['status'=>true,'message'=>'Order deleted successfully']);
    }
}
