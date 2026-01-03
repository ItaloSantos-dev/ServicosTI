<?php
namespace App\useCases\order;

use App\Models\Order;

use function Symfony\Component\Clock\now;

class RegisterOrder{
    public function execute($data){
       $data['client_id'] = auth()->user()->client->id;
       $data['address']='vou fazer input';
       $data['order_date']=now();
       return Order::create($data);
    }
}