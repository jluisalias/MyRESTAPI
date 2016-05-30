<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 23:02
 */


namespace Code\Controllers;

use \Database;

class ListController implements Controller
{

    public function isCompatible($method, array $parameters)
    {
        // TODO: Implement isCompatible() method.
        return $method == 'GET' && !$parameters;
    }

    public function executeMethod(array $parameters)
    {
        // TODO: Implement executeMethod() method.
        $functions = new DatabaseFunctions();
        return $functions->listMovies();
    }
}