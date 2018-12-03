<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LineController extends Controller
{
	public function sendMessage($message)
	{
		$httpClient = new CurlHTTPClient(env('accesstoken'));
		$bot = new LINEBot($httpClient, ['channelSecret' => env('chennelSecret')]);
		$textMessageBuilder = new TextMessageBuilder($message);
		$response = $bot->pushMessage('U642d802ed071f80ac02e00b92263c2ad', $textMessageBuilder);
		if ($response->isSucceeded()) {
			echo 'Succeeded!';
			return;
		}

// Failed
		echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
	}

	public function line()
	{
		$data = array ();
		$data = ['name' => 'worakorn'];
		$this->sendMessage('hi');
	}

	public function fill(Request $request)
	{
		$this->sendMessage($request->message);
	}
}
