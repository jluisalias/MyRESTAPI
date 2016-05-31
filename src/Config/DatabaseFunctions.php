<?php

/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 23:20
 */

namespace Config;
use Containers;

class DatabaseFunctions
{
    /**
     * List all the movies in the database
     */
    public function listMovies(){
        $pdoContainer = new PDOContainer();
        $pdo = $pdoContainer->getPDO();
        $query = 'SELECT * FROM movies';

        $statement = $pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

}