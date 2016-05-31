<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 23:45
 */

use Controllers\ListController;

class Routing
{
    protected $method;
    protected $uri;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        if($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)){
            $this->method = $_SERVER['HTTP_X_HTTP_METHOD'];
        }
        $this->uri = $_SERVER['REQUEST_URI'];

        $this->routeAndExecute();
    }

    public function routeAndExecute()
    {
        $listController = new ListController();
        $uriSplitted = explode('?', $this->uri);

        $route = $uriSplitted[0];
        $parameters = explode('&', $uriSplitted[1]);

        if($listController->isCompatible($this->method, $route, $parameters)){
            $arrayMovies = $listController->executeMethod($parameters);
            return json_encode($arrayMovies);
        }

    }
}