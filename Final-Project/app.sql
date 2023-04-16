CREATE DATABASE IF NOT EXISTS comp_1006_200524586;
USE comp_1006_200524586;

-- YOU MUST USE THIS TABLE AS IS (or at least the 3 defined fields name, email, and password)
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(256) NOT NULL
);

CREATE TABLE brand_name (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId INT NOT NULL ,
    name VARCHAR(50) NOT NULL,
    UNIQUE(userId, name),
    FOREIGN KEY(userId) REFERENCES users(id) 
);
CREATE TABLE model_name (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    modelName VARCHAR(50) NOT NULL,
    userId INT NOT NULL ,
    FOREIGN KEY (modelName) REFERENCES brand_name(id) ON DELETE CASCADE,
      FOREIGN KEY(userId) REFERENCES users(id) 
);
