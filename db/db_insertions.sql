INSERT INTO city (city_name) VALUES ('Santiago de Compostela'), ('Lugo'), ('Ourense'), ('Pontevedra');
INSERT INTO sport (sport_name) VALUES ('Balonmano'), ('Rugby'), ('Patinaje'), ('Natación');

INSERT INTO team (team_name, points, city_id, sport_id) VALUES
    ('BM_Sa',50,1,1), 
    ('RG_Sa',60,1,2), 
    ('PT_Lu',70,2,3), 
    ('NAT_Lu',80,2,4), 
    ('BM_Ou',70,3,1), 
    ('RG_Ou',60,3,2), 
    ('PT_Po',50,4,3), 
    ('NAT_Po',40,4,4);