<?php

namespace App\Http\Controllers\API\Payment;

use App\Models\Order;
use App\Traits\TariffsTrait;
use Illuminate\Http\Request;
use App\Traits\GenerateLinkTrait;
use App\Http\Controllers\Controller;
use App\Traits\Payments\CheckPaymentStatusTrait;

class ResultController extends Controller
{
    use CheckPaymentStatusTrait, GenerateLinkTrait, TariffsTrait;
    public function __invoke(Request $request)
    {

        $order_number = $request->orderId;
        $order = Order::where('order_id', $order_number)->first();
        $template_route	 = $order->form->template->route;

        $payment_result = $this->checkStatus($order_number);

        if ($payment_result) {

            $link = $this->generateLink($order_number);

            if($link){
                echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am$template_route?event_url=$link'
                </script>";
            }

            echo "<script type='text/javascript'>
                window.location = 'https://invitationcard.webex.am/am/?event_url=error'
            </script>";

        }else{
            echo "<script type='text/javascript'>
                    window.location = 'https://invitationcard.webex.am/am/?event_url=error'
                </script>";

        }

    }
}
