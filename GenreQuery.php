<?php

namespace ITP\Music;

require_once __DIR__ . '/vendor/autoload.php';
use \ITP\Base\Database;
use \PDO;

class GenreQuery extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll()
    {
        $sql = "
                SELECT *
                FROM genres
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->execute();
        $genres = $statement->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }
}
?>