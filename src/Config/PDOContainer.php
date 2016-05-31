<?php
/**
 * Created by PhpStorm.
 * User: jlalias
 * Date: 30/05/16
 * Time: 21:14
 */

namespace Config;


class PDOContainer
{
    private $configuration;

    private $pdo;

    /**
     * PDOContainer constructor.
     * @param $configuration
     */
    public function __construct()
    {
        $this->configuration = [
            'database_dsn' => 'mysql:host=localhost;dbname=movies',
            'database_user' => 'root',
            'database_pass' => 'primo_01'
        ];
    }

    /**
     * @return \PDO
     */
    public function getPDO()
    {
        if($this->pdo === null){
            $this->pdo = new \PDO(
                $this->configuration['database_dsn'],
                $this->configuration['database_user'],
                $this->configuration['database_pass']
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }
}