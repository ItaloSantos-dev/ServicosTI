<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function TypeOrder(){
        return $this->belongsTo(OrderTypes::class,'type_id');
    }
    //sempre order_date 
    //se agendado retornar ...+ scheduling_date
    // se completo ...+ scheduling_date + completed_date
    //se cancelado ...+ order_date

    public function TranslateStatus(){
        switch ($this->status) {
            case 'in_analysis':
                return 'EM ANÁLISE';//amarelo
                break;

            case 'scheduled':
                return 'AGENDADO';//azul
                break;

            case 'completed':
                return 'CONCLUÍDO';//verde
                break;

            case 'canceled':
                return 'CANCELADO';//vermelho
                break;

            default:
                return 'STATUS DESCONHECIDO';
        }
    }

}
