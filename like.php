<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('API code samples');
$client->setScopes([
    'https://www.googleapis.com/auth/youtube.force-ssl',
]);
$client->setAuthConfig('./client_secret.json');
$client->setAccessType('offline');
// Request authorization from the user.
$authUrl = $client->createAuthUrl();
printf("Open this link in your browser:\n%s\n", $authUrl);
print('Enter verification code: ');
$authCode = trim(fgets(STDIN));
// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
$client->setAccessToken($accessToken);
// Define service object for making API requests.
$service = new Google_Service_YouTube($client);
$responces =  $service->videos->rate('tGP5tKws9to', 'like');
