<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 23:02
 */


namespace Controllers;

use \Config\DatabaseFunctions;

class ListController implements Controller
{

    public function isCompatible($method, $route, array $parameters)
    {
        // TODO: Implement isCompatible() method.
        echo "Method: ".$method.", Route: ".$route.", Parameters: ".$parameters;
        return true;
    }

    public function executeMethod(array $parameters)
    {
        // TODO: Implement executeMethod() method.
        $functions = new DatabaseFunctions();
        return $functions->listMovies();
    }
}