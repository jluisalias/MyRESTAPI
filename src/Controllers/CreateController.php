<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 1/06/16
 * Time: 21:40
 */

namespace Controllers;

use \Config\DatabaseFunctions;

class CreateController implements Controller
{
    public function isCompatible($method, $route, array $parameters)
    {
        return $method == 'POST' && $route == '/newMovie' && array_key_exists('name', $parameters) &&
            array_key_exists('shortDescription', $parameters);
    }

    public function executeMethod(array $parameters)
    {
        $functions = new DatabaseFunctions();
        if(array_key_exists('imdbRating', $parameters)){
            return $functions->createNewMovie($parameters['name'], $parameters['shortDescription'], $parameters['imdbRating']);
        }else{
            return $functions->createNewMovie($parameters['name'], $parameters['shortDescription']);
        }
    }
}