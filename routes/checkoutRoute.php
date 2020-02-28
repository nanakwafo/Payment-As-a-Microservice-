<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 13:53
 */




$router->group (['prefix' => '/api/payment/v1/checkout'], function () use ($router) {

    $router->get('createOrder', ['uses' => 'CheckoutController@createOrder']);
    $router->get('findOrderDetails', ['uses' => 'CheckoutController@findOrderDetails']);
    $router->get('authorizePayment', ['uses' => 'CheckoutController@authorizePayment']);
});