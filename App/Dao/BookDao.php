<?php
namespace App\Dao;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\DataBase\connection;
use App\Models\Book;
use PDO;


class BookDao 
{
    private $conn;
    public function __construct(){
        $this->conn = connection::connect();
    }

    public function addBook(Book $book){
        $query = "INSERT into books (title,author,genre,description,publication_year,total_copies,available_copies)
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$book->getTitle(),$book->getAuthor(),$book->getGenre(),$book->getDescription(),$book->getPublicationYear(),$book->getTotalCopies(),$book->getAvailableCopies()]);
    }

    public function getALLBooks(){
        $query = $this->conn->query("SELECT * from books");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $books = [];
        if(empty($rows)){
            return [];
        }else{
            foreach($rows as $row){
                $book = new Book($row['title'],$row['author'],$row['genre'],$row['description'],$row['publication_year'],$row['total_copies'],$row['available_copies']);
                $books[] = $book;
            }
            return $books;
        }
    }

}

?>