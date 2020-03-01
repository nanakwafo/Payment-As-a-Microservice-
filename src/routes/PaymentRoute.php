<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 01/03/2020
 * Time: 15:01
 */
Route::get('create-payment',['uses'=>'PaymentController@createPayment']);
Route::get('execute-payment',['uses'=>'PaymentController@executePayment']);