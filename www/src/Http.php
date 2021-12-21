<?php

namespace Higherror\RelokiaTestProject;

use GuzzleHttp\Client;

class Http
{
    public static function get_data(string $uri)
    {
        $client = new Client([
            'base_uri' => 'https://eviloma.freshdesk.com/api/v2/',
            'timeout'  => 2.0,
        ]);

        $response = $client->request(
            'GET', $uri,[
                'auth' => ['pU4iUOprCW7TIIkT01S', '']
            ]
        );
        $json = $response->getBody();
        return json_decode($json, true);
    }
}