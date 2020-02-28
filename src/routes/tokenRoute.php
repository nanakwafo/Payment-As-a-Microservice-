<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 20:57
 */

$router->group (['prefix' => '/api/payment/v1/token'], function () use ($router) {

    $router->get ('getAccessToken', ['uses' => 'TokenController@getAccessToken']);

});