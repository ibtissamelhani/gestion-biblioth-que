-- Active: 1700211668325@@127.0.0.1@3306@gestion_biblio

CREATE TABLE books (
    id int PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    author VARCHAR(255),
    genre VARCHAR(255),
    description VARCHAR(255),
    publication_year DATE,
    total_copies int,
    available_copies int
);

CREATE TABLE Users (
    id int PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(255),
    password VARCHAR(255),
    phone VARCHAR(12),
    budget DOUBLE
);

CREATE TABLE roles (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);

CREATE TABLE reservation (
    id int PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(500),
    reservation_date DATE,
    return_date DATE,
    is_returned BOOLEAN,
    user_id int ,
    book_id int ,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(id) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE user_role (
    user_id int ,
    role_id int ,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE
    );
