Create database books;


CREATE TABLE user_form (
    `id` int(10) AUTO_INCREMENT,
    `name` varchar(255),
    `email` varchar(255),
    `password` varchar(255),
    `image` varchar(255),
    `hobbies` TEXT ,
    PRIMARY KEY (`id`)
);


CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    available TINYINT(1) 
);


CREATE TABLE borrowed_books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    book_id INT,
    borrow_date DATE ,
    FOREIGN KEY (member_id) REFERENCES user_form(id),
    FOREIGN KEY (book_id) REFERENCES books(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO books (title, author, available) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 1),
('To Kill a Mockingbird', 'Harper Lee', 1),
('1984', 'George Orwell', 1),
('Naruto', 'Masashi Kishimoto', 1),
('Attack on Titan', 'Hajime Isayama', 1),
('One Piece', 'Eiichiro Oda', 1),
('Death Note', 'Tsugumi Ohba', 1),
('Sword Art Online', 'Reki Kawahara', 1),
('Fullmetal Alchemist', 'Hiromu Arakawa', 1),
('My Hero Academia', 'Kohei Horikoshi', 1),
('Bleach', 'Tite Kubo', 1),
('Dragon Ball', 'Akira Toriyama', 1),
('Fairy Tail', 'Hiro Mashima', 1),
('Tokyo Ghoul', 'Sui Ishida', 1),
('Black Clover', 'Yuki Tabata', 1),
('Demon Slayer: Kimetsu no Yaiba', 'Koyoharu Gotouge', 1),
('The Promised Neverland', 'Kaiu Shirai', 1),
('Hunter x Hunter', 'Yoshihiro Togashi', 1),
('One Punch Man', 'ONE', 1),
('Attack on Titan: Before the Fall', 'Ryo Suzukaze', 1);


INSERT INTO books (title, author, available) VALUES
('Steins;Gate', 'Chiyomaru Shikura', 1),
('Neon Genesis Evangelion', 'Hideaki Anno', 1),
('Cowboy Bebop', 'Shinichirō Watanabe', 1),
('Code Geass: Lelouch of the Rebellion', 'Gorō Taniguchi', 1),
('Ghost in the Shell', 'Masamune Shirow', 1),
('Princess Mononoke', 'Hayao Miyazaki', 1),
('Spirited Away', 'Hayao Miyazaki', 1),
('Akira', 'Katsuhiro Otomo', 1),
('Your Name', 'Makoto Shinkai', 1),
('Attack on Titan: No Regrets', 'Gan Sunaaku', 1),
('Nausicaä of the Valley of the Wind', 'Hayao Miyazaki', 1),
('My Neighbor Totoro', 'Hayao Miyazaki', 1),
('Dragon Ball Z', 'Akira Toriyama', 1),
('JoJo''s Bizarre Adventure', 'Hirohiko Araki', 1),
('Yu Yu Hakusho', 'Yoshihiro Togashi', 1),
('Violet Evergarden', 'Kana Akatsuki', 1),
('Berserk', 'Kentaro Miura', 1),
('Gurren Lagann', 'Hiroyuki Imaishi', 1),
('Psycho-Pass', 'Gen Urobuchi', 1),
('One Piece: Strong World', 'Eiichiro Oda', 1);
