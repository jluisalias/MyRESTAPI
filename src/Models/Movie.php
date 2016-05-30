<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 20:51
 */

namespace Data\Models;


class Movie
{
    private $id;
    private $name;
    private $shortDescription;
    private $imdbRating;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param mixed $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return mixed
     */
    public function getImdbRating()
    {
        return $this->imdbRating;
    }

    /**
     * @param mixed $imdbRating
     */
    public function setImdbRating($imdbRating)
    {
        $this->imdbRating = $imdbRating;
    }


}