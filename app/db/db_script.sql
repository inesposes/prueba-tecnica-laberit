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
    team_name VARCHAR(100) NOT NULL UNIQUE,
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
    playing_number INT NOT NULL UNIQUE,
    characteristics TEXT NOT NULL,
    team_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (team_id) REFERENCES team(id)
);

ALTER TABLE team
ADD CONSTRAINT fk_team_captain
FOREIGN KEY (captain_id) REFERENCES player(id);


INSERT INTO city (city_name) VALUES ('Santiago de Compostela'), ('Lugo'), ('Ourense'), ('Pontevedra');
INSERT INTO sport (sport_name) VALUES ('Balonmano'), ('Rugby'), ('Patinaje'), ('Waterpolo');

INSERT INTO team (team_name, points, city_id, sport_id) VALUES
    ('BM_Sa',50,1,1), 
    ('RG_Sa',60,1,2), 
    ('PT_Lu',70,2,3), 
    ('WAT_Lu',80,2,4), 
    ('BM_Ou',70,3,1), 
    ('RG_Ou',60,3,2), 
    ('PT_Po',50,4,3), 
    ('WAT_Po',40,4,4);

INSERT INTO player (player_name, playing_number, characteristics, team_id) VALUES
    ('Lucia',1,'Buen lanzamiento',1), 
    ('Rubén',2,'Muy ágil',1), 
    ('Ariadna',3,'Mucha resistencia',1), 
    ('David',4,'Gran fuerza',1), 
    ('Rosalia',5,'Capacidad táctica',1), 
    ('Carlos',6,'Buen compañero',1), 
    ('Carmen',7,'Velocidad en el ataque',1), 
    ('Sonia',8,'Capacidad de gestión de situaciones de estrés',1), 
    ('Manuel',9,'Destaca por ser un buen defensor',1);

UPDATE team SET captain_id = 9 WHERE id = 1;
