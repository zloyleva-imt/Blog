<?php

namespace App\Services\GoogleApi;

use Google_Client;
use Google_Service_Sheets;
use Illuminate\Support\Facades\Storage;

class GoogleApi{

    static function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig('/www/laravel/app/Services/GoogleApi/credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.

        if (Storage::disk('local')->exists('token.json')) {
            $accessToken = json_decode(Storage::get('token.json'), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
//                dd($authUrl);
                $authCode = '4/pAHPyEN5z53vufdeNM7o-Cq8FEn7cgD73vhW4sN2BTcV99J9Cm3kRRs';

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            Storage::put('token.json',json_encode($client->getAccessToken()));
        }
        return $client;
    }
}