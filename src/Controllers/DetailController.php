<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 1/06/16
 * Time: 19:01
 */

namespace Controllers;

use \Config\DatabaseFunctions;

class DetailController implements Controller
{
    public function isCompatible($method, $route, array $parameters)
    {
        return $method == 'GET' && $route == '/movies' && array_key_exists('id', $parameters);
    }

    public function executeMethod(array $parameters)
    {
        $functions = new DatabaseFunctions();
        return $functions->getMovieById($parameters['id']);
    }
}