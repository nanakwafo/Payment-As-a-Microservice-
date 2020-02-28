<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 19:40
 */
namespace App\Http\Controllers;

class TokenController extends Controller{

    public  function getAccessToken(){
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v1/oauth2/token', 'POST', [
            'json'    => $this->checkoutservice->getOrder (),
            'headers' => [
                'grant_type'  => 'client_credentials',

            ],
            'auth' => ['username', 'password']
        ]);
    }
}