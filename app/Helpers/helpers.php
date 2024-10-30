<?php

use GuzzleHttp\Client;


  function sendMessageFromUser($userToken, $recipientUserId, $message) {
	  
	   //print_R(array($userToken, $recipientUserId, $message));die();
	  $msg = preg_replace('/<\/?p>/', '', $message);
    $client = new Client();

    $response = $client->post('https://slack.com/api/conversations.open', [
        'headers' => [
            'Authorization' => "Bearer $userToken",
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'users' => $recipientUserId,
        ],
    ]);

    $data = json_decode($response->getBody(), true);

    if (isset($data['ok']) && $data['ok']) {
        $channelId = $data['channel']['id'];

        $client->post('https://slack.com/api/chat.postMessage', [
            'headers' => [
                'Authorization' => "Bearer $userToken",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'channel' => $channelId,
                'text' =>  str_replace("<br>", "\n", $msg)
            ],
        ]);
    } else {
        // Handle errors
        dd($data);
    }
}

