<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 21:14
 */

namespace Containers;


class PDOContainer
{
    private $configuration;

    private $pdo;

    /**
     * PDOContainer constructor.
     * @param $configuration
     */
    public function __construct($configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return \PDO
     */
    public function getPDO()
    {
        if($this->pdo === null){
            $this->pdo = new \PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }
}