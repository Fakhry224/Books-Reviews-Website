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

-- Dump Data

-- Insert data into users table
INSERT INTO users (name, email, password) VALUES
('John Doe', 'john.doe@example.com', 'password123'),
('Jane Smith', 'jane.smith@example.com', 'password456'),
('Alice Johnson', 'alice.johnson@example.com', 'password789');

-- Insert data into genres table
INSERT INTO genres (genre_name) VALUES
('Self Improvement'),
('Horror'),
('Romance');

-- Insert data into books table
INSERT INTO books (genre_id, title, author, pages, synopsis) VALUES
(1, 'The Power of Habit', 'Charles Duhigg', 371, 'An exploration of the science behind why habits exist and how they can be changed.'),
(2, 'It', 'Stephen King', 1138, 'A horror novel about seven children who are terrorized by a malevolent entity.'),
(3, 'Pride and Prejudice', 'Jane Austen', 432, 'A romantic novel that charts the emotional development of the protagonist Elizabeth Bennet.');

-- Insert data into comments table
INSERT INTO comments (user_id, book_id, comment) VALUES
(1, 1, 'This book really helped me change my habits for the better.'),
(2, 2, 'Absolutely terrifying! Couldn\'t put it down.'),
(3, 3, 'A timeless classic with a beautiful love story.');

