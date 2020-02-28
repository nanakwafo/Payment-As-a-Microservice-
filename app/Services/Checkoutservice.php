<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 16:35
 */
namespace App\Services;

use App\Modules\Order;
use App\Modules\Purchaseunit;
use App\Modules\Amount;

class Checkoutservice
{


    private $order;
    private $amount;
    private $purchseunit;

    /**
     * Checkoutservice constructor.
     * @param $order
     * @param $amount
     * @param $purchseunit
     */
    public function __construct (Order $order, Amount $amount, Purchaseunit $purchseunit)
    {
        $this->order = $order;
        $this->amount = $amount;
        $this->purchseunit = $purchseunit;
    }


    public function getOrder ()
    {
        return [
            "intent"         => $this->order->getIntent(),
            "purchase_units" => [
                [
                    "reference_id" => $this->purchseunit->getRefeenceId (),
                    "amount"       => [
                        "currency_code" => $this->amount->getCurrencyCode (),
                        "value"         => $this->amount->getValue ()
                    ]
                ]
            ]
        ];
    }

}