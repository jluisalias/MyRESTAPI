<?php

/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 23:20
 */

namespace Config;

class DatabaseFunctions
{
    private $pdoContainer;
    /**
     * Gets the PDO Object
     */
    private function getPdo()
    {
        if($this->pdoContainer === null){
            $this->pdoContainer = new PDOContainer();
        }
        return $this->pdoContainer->getPDO();
    }
    /**
     * List all the movies in the database
     */
    public function listMovies()
    {
        $pdo = $this->getPdo();
        $query = 'SELECT * FROM movies';

        $statement = $pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Show a movie, identified by its id
     */
    public function getMovieById($anId)
    {
        $pdo = $this->getPdo();
        $query = 'SELECT * FROM movies WHERE id = :idVal';

        $statement = $pdo->prepare($query);
        $statement->bindParam('idVal', $anId);
        $statement->execute();
        return $statement->fetch();
    }

    /**
     * Delete a movie, identified by its id
     * and returns a JSON with the rest of the movies
     * after the deletion.
     */
    public function deleteMovieById($anId)
    {
        $pdo = $this->getPdo();
        $query = 'DELETE FROM movies WHERE id = :idVal';

        $statement = $pdo->prepare($query);
        $statement->bindParam('idVal', $anId);

        try{
            $statement->execute();
            echo "Record with id = ".$anId." deleted successfully<br>";
        }catch (\PDOException $exc){
            echo "Error: ".$exc->getMessage();
        }
        //Now, we return the list of movies after delete the movie with id=$anId
        $query2 = 'SELECT * FROM movies';

        $statement2 = $pdo->prepare($query2);
        $statement2->execute();
        return $statement2->fetchAll();
    }

    /**
     * Create a new movie, the name and description will
     * be mandatory fields
     */
    public function createNewMovie($name, $shortDescription, $imdbRating = ''){
        $pdo = $this->getPdo();
        $query = "INSERT INTO movies (name, shortDescription, imdbRating) VALUES (:nameVal, :shortDescriptionVal, :imdbRatingVal)";
        $statement = $pdo->prepare($query);
        $statement->bindParam('nameVal', $name);
        $statement->bindParam('shortDescriptionVal', $shortDescription);
        $statement->bindParam('imdbRatingVal', $imdbRating);
        try{
            $statement->execute();
            echo "Record created successfully<br>";
        }catch (\PDOException $exc){
            echo "Error: ".$exc->getMessage();
        }

        //Now, we return the list of movies after create the new movie
        $query2 = 'SELECT * FROM movies';

        $statement2 = $pdo->prepare($query2);
        $statement2->execute();
        return $statement2->fetchAll();
    }
}