CREATE TABLE teams 
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL, 
    conference ENUM('East', 'West'),
    logo VARCHAR(255)
);

CREATE TABLE players
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    team_id INT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    position CHAR(10) NOT NULL,
    photo VARCHAR(255),
    jersey_number INT NOT NULL,

    FOREIGN KEY (team_id) REFERENCES teams(id)
);

CREATE TABLE games 
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    player_id INT,
    date DATE NOT NULL,
    opponent VARCHAR(255), 
    score_team INT,
    score_opponent INT,
    points INT NOT NULL,
    rebounds INT NOT NULL,
    assists INT NOT NULL,
    minute_played INT NOT NULL,

    FOREIGN KEY (player_id) REFERENCES players(id)
);

CREATE TABLE users
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'Administrateur'
);