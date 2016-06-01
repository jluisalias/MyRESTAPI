<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 1/06/16
 * Time: 20:31
 */

namespace Controllers;

use \Config\DatabaseFunctions;

class DeleteController implements Controller
{

    public function isCompatible($method, $route, array $parameters)
    {
        header('Content-Type: application/json');

        echo json_encode('{"id":"3"}');
        return $method == 'DELETE' && $route == '/movies' && array_key_exists('id',$parameters);
    }

    public function executeMethod(array $parameters)
    {
        $functions = new DatabaseFunctions();
        return $functions->deleteMovieById($parameters['id']);
    }
}