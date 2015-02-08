<?php

namespace ITP\Music;

require_once __DIR__ . '/vendor/autoload.php';
use \ITP\Base\Database;
use \PDO;
use \DateTime;

class Song extends Database
{
    private $title;
    private $artistId;
    private $genreId;
    private $price;
    private $songId;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setArtistId($artistId)
    {
        $this->artistId = $artistId;
    }
    
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getId()
    {
        return static::$pdo->lastInsertId();
    }
    
    public function save()
    {
        $sql = "
                INSERT INTO songs (title, artist_id, genre_id, price, play_count, added)
                VALUES (?, ?, ?, ?, 0, ?);
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->artistId);
        $statement->bindParam(3, $this->genreId);
        $statement->bindParam(4, $this->price);
        $date = new DateTime();
        $datestring = $date->format('Y-m-d H:i:s');
        $statement->bindParam(5, $datestring);
        $statement->execute();
    }
}
?>