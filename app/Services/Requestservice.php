<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 19:45
 */
namespace App\Services;

use GuzzleHttp\Client;

class Requestservice
{

    protected $client;

    /**
     * CheckoutController constructor.
     * @param $client
     */
    public function __construct ()
    {
        $this->client = new Client();
    }

    public function endpointRequest ($url, $httpVerb, $body)
    {
        try {
            $response = $this->client->request ($httpVerb, $url, $body);
        } catch (\Exception $e) {
            return $e;
        }

        return $this->response_handler ($response->getBody ()->getContents ());
    }

    public function response_handler ($response)
    {
//        if ( $response ) {
//            return $response;
//        }

        return $response;
    }
}