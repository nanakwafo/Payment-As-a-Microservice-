<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 15:07
 */
namespace App\Modules;


class Order
{
    private $intent;


    /**
     * Order constructor.
     * @param $purchaseUnit
     * @param $intent
     */
    public function __construct ( $intent)
    {
  
        $this->intent = $intent;

    }

    /**
     * @return mixed
     */
    public function getIntent ()
    {
        return $this->intent;
    }

    /**
     * @param mixed $intent
     */
    public function setIntent ($intent)
    {
        $this->intent = $intent;
    }

 

   
}