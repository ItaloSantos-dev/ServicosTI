<?php

namespace App\Http\Controllers;

use App\Models\OrderTypes;
use App\Models\User;
use App\useCases\order\RegisterOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    private RegisterOrder $registerOrder;

    public function __construct() {
        $this->registerOrder = new RegisterOrder();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientWithOrders = $request->user()->load('client.orders.TypeOrder');
        return view('user.client.orders', compact('clientWithOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orderTypes = OrderTypes::all();
        return view('user.client.newOrder', compact('orderTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$request->user()->checkPassword($request->password)){
            return redirect()->back()->with('info', 'Senha incorreta');
        }
        $credentials = $request->validate([
            'type_id'=>'required|numeric',
            'description'=>'required|string',
            'address'=>'required|string'
        ]);
        $newOrder =  $this->registerOrder->execute($credentials);
        if(!$newOrder){
            dd('faiou');
            return redirect()->back()->with('info', 'falha ao criar pedido');
        }
        return redirect()->route('client.orders');


    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
