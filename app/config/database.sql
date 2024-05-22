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
INSERT INTO books (genre_id, title, author, pages, synopsis, img_path, rating)
VALUES (1, 'Atomic Habits', 'James Clear', 320, 'Buku ini mengajarkan cara mengubah kebiasaan buruk menjadi baik dengan langkah-langkah kecil yang konsisten. Dengan strategi yang mudah diikuti, Anda akan belajar bagaimana menciptakan sistem yang mendukung perubahan positif dalam hidup Anda.', '/Atomic-Habits', 9.0)
,(1, 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', 381, 'Buku klasik ini membahas tujuh kebiasaan yang dapat membantu Anda menjadi lebih efektif dalam kehidupan pribadi dan profesional. Covey mengajarkan prinsip-prinsip kepemimpinan, manajemen waktu, dan komunikasi yang efektif.', '/the-7-habits-of-highly-effective-people-16', 9.0)
,(1, 'Mindset: The New Psychology of Success', 'Carol S. Dweck', 320, 'Dweck menjelaskan dua jenis pola pikir: fixed mindset (pola pikir tetap) dan growth mindset (pola pikir berkembang). Buku ini akan membantu Anda memahami bagaimana pola pikir memengaruhi kesuksesan dan bagaimana mengembangkan growth mindset untuk mencapai potensi penuh Anda.', '/Mindset', 8.5)
,(1, 'The Power of Now: A Guide to Spiritual Enlightenment', 'Eckhart Tolle', 236, 'Eckhart Tolle, seorang guru spiritual ternama, mengajak pembaca untuk melepaskan diri dari belenggu pikiran dan emosi negatif yang terus-menerus berputar di kepala. Dengan gaya bahasa yang sederhana namun mendalam, ia menjelaskan bagaimana kita dapat menemukan kedamaian dan kebahagiaan sejati dengan hidup sepenuhnya di saat ini.', '/The-power-of-now', 8.2)
,(1, 'Man\'s Search for Meaning', 'Viktor E. Frankl', 165, 'Buku ini adalah memoir pengalaman Frankl sebagai tahanan di kamp konsentrasi Nazi. Meskipun mengalami penderitaan yang luar biasa, Frankl menemukan makna dalam hidup dan mengembangkan logoterapi, sebuah bentuk terapi yang berfokus pada pencarian makna.', '/MSFM', 7.0)
,(2, 'The Shining', 'Stephen King', 447, 'Jack Torrance, seorang penulis yang sedang berjuang, menerima pekerjaan sebagai penjaga musim dingin di Overlook Hotel yang terisolasi. Namun, kekuatan jahat hotel mulai mempengaruhi Jack dan keluarganya, membawa mereka ke dalam spiral teror yang mengerikan.', '/The-Shining', 8.0)
,(2, 'Ring', 'Koji Suzuki', 256, 'Sebuah kaset video misterius membawa kutukan kematian bagi siapa pun yang menontonnya. Seorang jurnalis bernama Reiko Asakawa berusaha mengungkap misteri di balik kaset tersebut sebelum terlambat.', '/Ring', 7.5)
,(2, 'The Haunting of Hill House', 'Shirley Jackson', 246, 'Empat orang asing berkumpul di Hill House, sebuah rumah tua yang terkenal angker, untuk menyelidiki fenomena paranormal. Namun, mereka segera menyadari bahwa rumah itu memiliki kekuatan jahat yang dapat menghancurkan mereka.', '/Hill-house', 7.3)
,(2, 'Bird Box', 'Josh Malerman', 368, 'Dalam dunia pasca-apokaliptik, seorang wanita bernama Malorie harus membimbing dua anak kecil melintasi sungai berbahaya dengan mata tertutup. Mereka harus menghindari makhluk misterius yang dapat membuat orang gila jika dilihat.', '/Bird-box', 7.0)
,(2, 'The Exorcist', 'William Peter Blatty', 448, 'Seorang gadis muda bernama Regan dirasuki oleh kekuatan jahat yang tidak diketahui. Dua imam Katolik dipanggil untuk melakukan eksorsisme, tetapi mereka harus menghadapi kekuatan yang jauh lebih kuat daripada yang pernah mereka bayangkan.', '/The-exorcist', 8.8)
,(3, 'Pride and Prejudice', 'Jane Austen', 279, 'Elizabeth Bennet, seorang wanita muda yang cerdas dan berpendirian kuat, bertemu dengan Mr. Darcy, seorang pria kaya dan sombong. Meskipun awalnya saling membenci, mereka akhirnya belajar untuk mengatasi prasangka mereka dan menemukan cinta sejati.', '/p&p', 7.0)
,(3, 'Me Before You', 'Jojo Moyes', 480, 'Louisa Clark, seorang wanita muda yang ceria, dipekerjakan untuk merawat Will Traynor, seorang pria muda yang lumpuh akibat kecelakaan. Meskipun awalnya enggan, Louisa mulai menemukan kebahagiaan dalam hidupnya bersama Will.', '/mby', 8.0)
,(3, 'The Love Hypothesis', 'Ali Hazelwood', 384, 'Olive Smith, seorang mahasiswa PhD, berpura-pura berkencan dengan Adam Carlsen, seorang profesor terkenal, untuk meyakinkan sahabatnya bahwa ia telah move on dari mantan pacarnya. Namun, Olive segera menyadari bahwa ia mungkin benar-benar jatuh cinta pada Adam.', '/Hypothesis', 9.0)
,(3, 'Red, White & Royal Blue', 'Casey McQuiston', 448, 'Alex Claremont-Diaz, putra pertama Amerika Serikat, dan Pangeran Henry dari Wales adalah musuh bebuyutan. Namun, ketika sebuah insiden memaksa mereka untuk berpura-pura berteman, mereka mulai mengembangkan perasaan satu sama lain.', '/RWB', 7.0)
,(3, 'The Hating Game', 'Sally Thorne', 384, 'Lucy Hutton dan Joshua Templeman adalah asisten eksekutif yang saling membenci. Mereka terlibat dalam permainan "benci" yang rumit, tetapi semakin mereka saling mengenal, semakin mereka menyadari bahwa kebencian mereka mungkin menyembunyikan perasaan yang lebih dalam.', '/Hating-game', 8.0);

-- Insert data into comments table
INSERT INTO comments (user_id, book_id, comment) VALUES
(1, 1, 'This book really helped me change my habits for the better.'),
(2, 2, 'Absolutely terrifying! Couldn\'t put it down.'),
(3, 3, 'A timeless classic with a beautiful love story.');

