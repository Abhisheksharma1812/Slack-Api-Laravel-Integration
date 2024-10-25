<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MessageController extends Controller
{
    
	public function userAuthenticate(){

 	$clientId = '6xxxxxxxx4.7xxxxxxxxx8'; //your slack client id
	$redirectUri = 'https://yourdomain.com/slack-callback'; //Add your callback url here  
	$url = "https://slack.com/oauth/v2/authorize?client_id=$clientId&scope=chat:write,users:read&redirect_uri=$redirectUri";

	return redirect($url); 

	}
	
	
	public function handleSlackCallback(Request $request) {
		
    $code = $request->query('code');
    $client = new Client();

    $response = $client->post('https://slack.com/api/oauth.v2.access', [
        'form_params' => [
            'client_id' => '6xxxxxxxx4.7xxxxxxxxx8', //your slack client id
            'client_secret' => 'cxxxxxxxxxxxxxxxxx91',//your slack client secret
            'code' => $code,
            'redirect_uri' => 'https://yourdomain.com/slack-callback', 
        ]
    ]);

    $data = json_decode($response->getBody(), true);
  	$message='add your test message';
	
    if (isset($data['ok']) && $data['ok']) {
        $userToken = $data['access_token'];
        // Save this token securely, associated with the user who authorized it.
		// return response()->json(['success' => true, 'access_token' => $userToken]);

      // here i call helper function for sending notification 

		 sendMessageFromUser($userToken,  $data['authed_user']['id'], $message);

    }
}

}
