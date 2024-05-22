<?php

class BookModel {

    private $db;

    public function __construct() {
        $this->db = new Database;

    }

    public function getAllComment($book_id) {
        $sql = "
            SELECT u.name, c.comment FROM comments c
            JOIN users u ON c.user_id = u.user_id
            WHERE c.book_id = ?
        ";

        $this->db->query($sql);
        $this->db->bind([
            ['value' => $book_id]
        ]);
        
        return $this->db->resultSet();
    }

    public function getBookDetail($book_id) {
        $sql = "
            SELECT b.title, b.pages, b.author, g.genre_name, b.synopsis, b.img_path FROM books b
            JOIN genres g ON b.genre_id = g.genre_id WHERE b.book_id = ?
        ";

        $this->db->query($sql);
        $this->db->bind([
            ['value' => $book_id]
        ]);
        
        return $this->db->single(); 
    }

    public function insertComment($data) {
        $sql = "
            INSERT INTO comments (user_id, book_id, comment)
            VALUES (?, ?, ?)
        ";

        $this->db->query($sql);
        $this->db->bind([
            ['value' => $data['user_id']],
            ['value' => $data['book_id']],
            ['value' => $data['comment']]
        ]);

        return $this->db->affectedRows();
    }

    public function showBook($genre_id) {
        $sql = "
            SELECT b.book_id, b.title, b.author, b.rating, b.img_path FROM books b
            JOIN genres g ON b.genre_id = g.genre_id
            WHERE b.genre_id = ?
        ";

        $this->db->query($sql);
        $this->db->bind([
            ['value' => $genre_id]
        ]);

        return $this->db->resultSet();
    }
}
