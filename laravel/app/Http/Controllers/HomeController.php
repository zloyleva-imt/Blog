<?php

namespace App\Http\Controllers;

use App\Facades\GetRickAndMortyApiData;
use App\Services\GoogleApi\GoogleApi;
use Google_Service_Sheets;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//dd(storage_path('token.json'));
        $client = GoogleApi::getClient();
        $service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
//        $spreadsheetId = '1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms';
        $spreadsheetId = '1uhv5hqCNILoMa4O13oplVdGl7wptU-RL5YoPfu8AKcM';
        $range = 'Data!A1:14';
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
dd($values);
        if (empty($values)) {
            print "No data found.\n";
        } else {

            foreach ($values as $row) {
                // Print columns A and E, which correspond to indices 0 and 4.
                printf("%s, %s\n", $row[0], $row[4]);
            }
        }


//        return GetRickAndMortyApiData::getCharacter();
//        return view('home');
    }
}
