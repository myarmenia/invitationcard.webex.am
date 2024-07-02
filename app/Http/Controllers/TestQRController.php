<?php

namespace App\Http\Controllers;

use App\Helpers\QRGenerate;
use App\Helpers\WhatsAppAPI;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TestQRController extends Controller
{
    public function show(){
        // phpinfo();
        $link = 'https://example.com'; // Replace with your desired link

        $from = [222, 0, 255];
        $to = [0, 0, 255];

        $data = QrCode::size(200)
            ->style('dot')
            ->eye('circle')
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->margin(1)
            ->format('png')
            ->generate($link);

        // Convert the binary data to a base64 string
        $base64 = base64_encode($data);
        // dd($base64);
        // $pp = "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";

        WhatsAppAPI::sendImage($base64, '37499116665');
       dd($base64);
    }
}
