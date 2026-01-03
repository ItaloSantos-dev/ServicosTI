<?php
namespace App\useCases\order;

use App\Models\Order;

class CancellationOrder{
    public function execute($id, $data){
        $order = Order::find($id);
        $order->status = 'canceled';
        $order->reason_for_cancellation=$data['reason_for_cancellation'];
        return $order->save();
    }
}