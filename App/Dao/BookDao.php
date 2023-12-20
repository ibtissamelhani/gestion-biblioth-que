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
                $book = new Book($row['id'],$row['title'],$row['author'],$row['genre'],$row['description'],$row['publication_year'],$row['total_copies'],$row['available_copies']);
                $books[] = $book;
            }
            return $books;
        }
    }

    public function getBookById($id){
        $query = "SELECT * from books where id =?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateBook(Book $book){
        $query = "UPDATE books 
        set title= :title, author = :author, genre= :genre, description= :description, publication_year= :publication_year, total_copies= :total_copies, available_copies= :available_copies
        where id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $book->getId());
        $stmt->bindValue(':title', $book->getTitle());
        $stmt->bindValue(':author', $book->getAuthor());
        $stmt->bindValue(':genre', $book->getGenre());
        $stmt->bindValue(':description', $book->getDescription());
        $stmt->bindValue(':publication_year', $book->getPublicationYear());
        $stmt->bindValue(':total_copies', $book->getTotalCopies());
        $stmt->bindValue(':available_copies', $book->getAvailableCopies());
        $stmt->execute();
    }

}

?>