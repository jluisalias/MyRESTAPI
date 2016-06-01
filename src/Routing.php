<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 23:45
 */

use Controllers\ListController;
use Controllers\DetailController;
use Controllers\DeleteController;

class Routing
{
    private $method;
    private $uri;
    private $returnData;

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
        $detailController = new DetailController();
        $deleteController = new DeleteController();
        $uriSplitted = explode('?', $this->uri);

        $route = str_replace('/web/index.php', '', $uriSplitted[0]);
        $preParameters = explode('&', $uriSplitted[1]);
        $parameters = $this->fillParameters($preParameters);

        if($listController->isCompatible($this->method, $route, $parameters)){
            $this->returnData = $listController->executeMethod($parameters);
            $this->printResponse($this->returnData);
        }elseif($detailController->isCompatible($this->method, $route, $parameters)){
            $this->returnData = $detailController->executeMethod($parameters);
            $this->printResponse($this->returnData);
        }elseif($deleteController->isCompatible($this->method, $route, $parameters)){
            $this->returnData = $deleteController->executeMethod($parameters);
            $this->printResponse($this->returnData);
        }
    }

    private function printResponse($data)
    {
        header('Content-Type: application/json');
        if(!$data){
            header("Location: web/index.php",TRUE,204);
            $data = array();
        }
        echo json_encode($data);
    }

    private function fillParameters($preProcessedParameters)
    {
        $parametersArray = array();
        foreach ($preProcessedParameters as $preParameter){
            $preParameterSplitted = explode('=', $preParameter);
            if($preParameterSplitted[0] != ""){
                $parametersArray[$preParameterSplitted[0]] = $preParameterSplitted[1];
            }
        }
        return $parametersArray;
    }
}