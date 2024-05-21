CREATE DATABASE IF NOT EXISTS books_review;

USE books_review;

CREATE TABLE users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id)
);

CREATE TABLE genres (
    genre_id INT(6) UNSIGNED AUTO_INCREMENT,
    genre_name ENUM('Self Improvement', 'Horror', 'Romance') NOT NULL,
    PRIMARY KEY (genre_id)
);

CREATE TABLE books (
    book_id INT(6) UNSIGNED AUTO_INCREMENT,
    genre_id INT(6) UNSIGNED,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    pages INT(4) NOT NULL,
    synopsis TEXT NOT NULL,
    img_path VARCHAR(255) NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    PRIMARY KEY (book_id),
    FOREIGN KEY (genre_id) REFERENCES genres(genre_id)
);

CREATE TABLE comments (
    comment_id INT(6) UNSIGNED AUTO_INCREMENT,
    user_id INT(6) UNSIGNED,
    book_id INT(6) UNSIGNED,
    comment TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (book_id) REFERENCES books(book_id)
);



