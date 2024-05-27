<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Web\EventResultRequest;
use App\Http\Resources\API\Web\EventResultResource;
use App\Models\Order;
use Illuminate\Http\Request;

class EventResultController extends BaseController
{
    public function __invoke(EventResultRequest $request){

        $token = $request->token;
        $order = Order::where(['status' => 1, 'order_id' => $token])->first();

        if($order){
            $form = $order->form;
            return $this->sendResponse(new EventResultResource($form), 'success');
        }

        else{
            return $this->sendError('error');
        }


    }
}