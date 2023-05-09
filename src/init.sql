CREATE DATABASE IF NOT EXISTS bank;
Use bank;
CREATE TABLE IF NOT EXISTS USERS (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     name CHAR(30) NOT NULL,
     lastName CHAR(40) NOT NULL,
     email CHAR(40) NOT NULL,
     username text NOT NULL,
     password text NOT NULL,   
     PRIMARY KEY (id)
);
CREATE TABLE IF NOT EXISTS TRANSACTIONS (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     username text NOT NULL,
     name CHAR(30) NOT NULL,
     amount BIGINT NOT NULL,
     account text NOT NULL,
     PRIMARY KEY (id)

);

CREATE TABLE PASSWORD_RESET (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
)