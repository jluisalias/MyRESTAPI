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
        return $method == 'GET' && $route == '/movies' && empty($parameters);
    }

    public function executeMethod(array $parameters)
    {
        $functions = new DatabaseFunctions();
        return $functions->listMovies();
    }
}