<?php

namespace ITP\Music;

require_once __DIR__ . '/vendor/autoload.php';
use \ITP\Base\Database;
use \PDO;

class ArtistQuery extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll()
    {
        $sql = "
                SELECT *
                FROM artists
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->execute();
        $artists = $statement->fetchAll(PDO::FETCH_OBJ);
        return $artists;
    }
}
?>