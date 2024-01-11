CREATE DATABASE IF NOT EXISTS chess_game;

USE chess_game;

CREATE TABLE T_Players(
ID int primary key auto_increment,
name varchar(30) UNIQUE,
email varchar(50) UNIQUE,
password varchar(255) not null,
premium varchar(2) not null
);

CREATE TABLE T_Matches(
ID int primary key auto_increment,
title varchar(50) not null,
white int not null,
black int not null,
startDate datetime not null,
endDate datetime,
winner varchar(10),
state varchar(20) not null default("En curso"),
FOREIGN KEY (white) REFERENCES T_Players(ID),
FOREIGN KEY (black) REFERENCES T_Players(ID)
);

CREATE TABLE T_Board_Status(
ID int auto_increment, 
IDGame int,
board varchar(200),
primary key(ID,IDGame),
FOREIGN KEY (IDGame) REFERENCES T_Matches(ID)
);

-- Inserts
INSERT INTO T_Players (name,email,password,premium)
VALUES ("Player 1","player1@gmail.com","12345678","no"),
       ("Player 2","player2@gmail.com","6326366","no");

INSERT INTO T_Matches (title,white,black,startDate,state)
VALUES ("Gambito de dama",1,2,NOW(),"En curso"),
       ("Apertura española",2,1,NOW(),"En curso"),
       ("Test filtro Jaque mate 1",2,1,NOW(),"Jaque mate"),
       ("Test filtro Jaque mate 2",1,2,NOW(),"Jaque mate");
       
INSERT INTO T_Board_Status (IDGame,board)
VALUES (1,"rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR"),
       (1, "rnbqkbnr/pppppppp/8/8/3P4/8/PPP1PPPP/RNBQKBNR"),
       (1,"rnbqkbnr/ppp1pppp/8/3p4/3P4/8/PPP1PPPP/RNBQKBNR"),
       (1, "rnbqkbnr/ppp1pppp/8/3p4/2PP4/8/PP11PPPP/RNBQKBNR"),
       (2, "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR"),
       (2, "rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR"),
       (2, "rnbqkbnr/pppp1ppp/8/4p3/4P3/8/PPPP1PPP/RNBQKBNR"),
       (2, "rnbqkbnr/pppp1ppp/8/4p3/4P3/5N2/PPPP1PPP/RNBQKB1R"),
       (2, "r1bqkbnr/pppp1ppp/2n5/4p3/4P3/5N2/PPPP1PPP/RNBQKB1R");