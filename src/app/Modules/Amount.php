<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 15:35
 */
namespace App\Modules;
class Amount
{
    
    private $currencyCode;
    private $value;

    /**
     * Amount constructor.
     * @param $currencyCode
     * @param $value
     */
    public function __construct ($currencyCode, $value)
    {
        $this->currencyCode = $currencyCode;
        $this->value = $value;
    }
      
    /**
     * @return mixed
     */
    public function getCurrencyCode ()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode ($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getValue ()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue ($value)
    {
        $this->value = $value;
    }
    
    
    
    

}