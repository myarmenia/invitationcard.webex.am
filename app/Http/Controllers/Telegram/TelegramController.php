<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function __invoke(){


        $response = Telegram::senMessage([
            'chat_id' => '-4280219646',
            'text' => 'yyyyy'
        ]);

        return $response;

    }
}
