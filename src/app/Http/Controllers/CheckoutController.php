<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 13:57
 */
namespace App\Http\Controllers;


use App\Modules\Amount;
use App\Modules\Order;
use App\Modules\Purchaseunit;
use App\Services\Checkoutservice;
use App\Services\Requestservice;


class CheckoutController extends Controller
{

    private $checkoutservice;
    private $requestservice;

    /**
     * CheckoutController constructor.
     * @param $checkoutservice
     */
    public function __construct ()
    {
        $this->checkoutservice = new Checkoutservice(new Order('CAPTURE'), new Amount('USD', '0.01'), new Purchaseunit('PUHF'));
        $this->requestservice =new Requestservice();
    }


    public function createOrder ()
    {
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v2/checkout/orders', 'POST',
            [
                'json'    => $this->checkoutservice->getOrder (),
                'headers' => [
//                    'Content-Type'  => env('APP_CONTENTTYPE',null),
                    'Authorization' => 'Bearer A21AAGEdfr_n2qltJZT3xnwBg-uCzjA6SsDG7AfC6uogUOsbLZxgE7Zr_W-NE0XiS5i6lL4RReYh8stjq_ZLBKyrgPZ32aemg'
                ]
            ]);

    }

    public function findOrderDetails ($id)
    {
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v2/checkout/orders/'.$id,'GET',[
            'json'    => '',
            'headers' => [
                'Content-Type'  => env('APP_CONTENT_TYPE',null),
                'Authorization' => 'Bearer ' . env('APP_TOKEN',null)
            ]
        ]);
    }

    public function authorizePayment ($id)
    {
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v2/checkout/orders/'.$id.'/capture','POST',
            [

                'headers' => [
                   'Content-Type'  => env('APP_CONTENT_TYPE',null),
                    'Authorization' => 'Bearer A21AAHkdRCbhLVf5jymC7JAV-XdFlD-LvjW6l582j8Aao63k76ZZ2VwR1lQGVX8AmLFUZtexaDOopgV4Mk21YA3FZnRECkMKw'
                ]
            ]);
    }



}