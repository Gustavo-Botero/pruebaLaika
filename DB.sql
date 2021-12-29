CREATE DATABASE prueba_laika CHARACTER SET = 'UTF16' COLLATE = 'utf16_spanish_ci';

USE prueba_laika;

CREATE TABLE IF NOT EXISTS pet_type (
    id int AUTO_INCREMENT,
    name varchar(15) NOT NULL,

    CONSTRAINT cons_PK_pet_type PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS pets (
    id int AUTO_INCREMENT,
    name varchar(15) NOT NULL,
    age int NOT NULL COMMENT 'la edad debe ser en meses',
    race varchar(15) NOT NULL,
    description text NOT NULL,
    pet_type_id int NOT NULL,

    CONSTRAINT cons_PK_pets PRIMARY KEY (id),
    FOREIGN KEY (pet_type_id) REFERENCES pet_type(id)
);