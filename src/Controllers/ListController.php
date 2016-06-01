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
        $subroute = str_replace('/web/index.php', '', $route);
        return $method == 'GET' && $subroute == '/movies' && empty($parameters[0]);
    }

    public function executeMethod(array $parameters)
    {
        // TODO: Implement executeMethod() method.
        $functions = new DatabaseFunctions();
        return $functions->listMovies();
    }
}