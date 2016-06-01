<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 1/06/16
 * Time: 22:41
 */

namespace Controllers;

use \Config\DatabaseFunctions;

class EditController implements Controller
{

    public function isCompatible($method, $route, array $parameters)
    {
        return $method == 'PUT' && $route == '/movies' && array_key_exists('id', $parameters);
    }

    public function executeMethod(array $parameters)
    {
        $parametersCopy = $parameters;
        $functions = new DatabaseFunctions();
        if(!array_key_exists('name', $parameters)){
            $parametersCopy['name'] = '';
        }elseif(!array_key_exists('shortDescription', $parameters)){
            $parametersCopy['shortDescription'] = '';
        }elseif(!array_key_exists('imdbRating', $parameters)){
            $parametersCopy['imdbRating'] = '';
        }

        return $functions->editAMovie($parametersCopy['id'], $parametersCopy['name'], $parametersCopy['shortDescription'], $parametersCopy['imdbRating']);
    }
}