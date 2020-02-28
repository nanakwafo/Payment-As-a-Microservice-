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
use Illuminate\Http\Request;

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
        $this->checkoutservice = new Checkoutservice(new Order('CAPTURE'), new Amount('USD', '1.0'), new Purchaseunit('PUHF'));
        $this->requestservice =new Requestservice();
    }


    public function createOrder ()
    {
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v2/checkout/orders', 'POST', [
                'json'    => $this->checkoutservice->getOrder (),
                'headers' => [
                    'Content-Type'  => env('APP_CONTENTTYPE'),
                    'Authorization' => 'Bearer' . env('APP_TOKEN')
                ]
            ]);

    }

    public function findOrderDetails ($id)
    {
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v2/checkout/orders/'.$id,'GET',[
            'json'    => '',
            'headers' => [
                'Content-Type'  => env('APP_CONTENTTYPE'),
                'Authorization' => 'Bearer' . env('APP_TOKEN')
            ]
        ]);
    }

    public function authorizePayment (Request $request)
    {
        return $this->requestservice->endpointRequest ('https://api.sandbox.paypal.com/v2/checkout/orders/91W44595WJ189735G/capture','POST',[
            'json'    => '',
            'headers' => [
                'Content-Type'  => env('APP_CONTENTTYPE'),
                'Authorization' => 'Bearer' . env('APP_TOKEN')
            ]
        ]);
    }



}