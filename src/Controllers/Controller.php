<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 22:48
 */

namespace Code\Controllers;


interface Controller
{
    public function isCompatible($method, array $parameters);

    public function executeMethod(array $parameters);
}