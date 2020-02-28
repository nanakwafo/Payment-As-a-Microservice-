<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 15:23
 */
namespace App\Modules;
class Purchaseunit
{
    private $refeenceId;

    /**
     * Purchaseunit constructor.
     * @param $refeenceId
     */
    public function __construct ($refeenceId)
    {
        $this->refeenceId = $refeenceId;
    }

    /**
     * @return mixed
     */
    public function getRefeenceId ()
    {
        return $this->refeenceId;
    }

    /**
     * @param mixed $refeenceId
     */
    public function setRefeenceId ($refeenceId)
    {
        $this->refeenceId = $refeenceId;
    }
   
}