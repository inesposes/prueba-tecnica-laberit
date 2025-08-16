USE sports_database;

CREATE TABLE city (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    city_name VARCHAR(100) NOT NULL
);

CREATE TABLE sport (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    sport_name VARCHAR(100) NOT NULL
);

CREATE TABLE team (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL,
    points INT NOT NULL,
    city_id INT NOT NULL,
    sport_id INT NOT NULL,
    captain_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (city_id) REFERENCES city(id),
    FOREIGN KEY (sport_id) REFERENCES sport(id)
);

CREATE TABLE player (
    id INT AUTO_INCREMENT PRIMARY KEY,
    player_name VARCHAR(100) NOT NULL,
    playing_number INT NOT NULL,
    characteristics TEXT NOT NULL,
    team_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (team_id) REFERENCES team(id)
);

ALTER TABLE team
ADD CONSTRAINT fk_team_captain
FOREIGN KEY (captain_id) REFERENCES player(id);


