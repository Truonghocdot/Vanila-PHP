CREATE TABLE categories 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL
)
CREATE TABLE clients 
(
    id NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(45) NOT null ,
    avatar text not null DEFAULT 'avatar.png' ,
    role int null DEFAULT 0,
    email VARCHAR(45) not null unique,
    password text not null 
)
CREATE TABLE products
(
    id not null AUTO_INCREMENT,
    thumbnail text null ,
    description text not null,
    quantity int not null,
    cat varchar(30) not null,
    price int not null,
    title varchar(80) not null,
    role int not null DEFAULT 0
)