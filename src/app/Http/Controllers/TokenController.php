<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 19:40
 */
namespace App\Http\Controllers;
use App\Services\Requestservice;

class TokenController extends Controller{


    private $requestservice;

    public function __construct ()
    {

        $this->requestservice =new Requestservice();
    }

    public  function getAccessToken(){
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v1/oauth2/token', 'POST', [
            'form_params' => [
                'grant_type' => 'client_credentials',

            ],
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'auth' => ['AYDBQSG7PIhvRfhjPveTlJZS7jqilbbDRZn5SzT2LuePcnBO32Rz8EZj8EAaAOJBRCXY-jRD5X828i9h', 'EMAoXqyJqQ-tjkBQlHJrqcBpd-Iuvzm2s0J67vv412LrtqyTCV1zgUq9G_NeQ5vyimQNz97z4GF014cA']
        ]);
    }
}