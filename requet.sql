CREATE DATABASE brief6;
CREATE TABLE users (
    email VARCHAR(255) UNIQUE NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) UNIQUE NOT NULL
    );
CREATE TABLE products(reference INT UNSIGNED ZEROFILL PRIMARY KEY AUTO_INCREMENT, image_src VARCHAR(100), libelle varchar(100) NOT NULL, prix_unitaire DECIMAL(10, 2), quantite_min INT(11), quantite_min INT(11), quantite_stock INT(11), categorie VARCHAR(20));
USE electronacer;
INSERT INTO users(identifiant, pass)
    VALUES ('laksoumi99', 'laksoumiPass'),
    ('ahmed', 'ahmedPass'),
    ('hassan', 'hassanPass'),
    ('mohammed', 'mohammedPass'),
    ('youssef', 'youssefPass');

UPDATE products
    SET quantite_stock = 9
    WHERE reference = 1;

    CREATE TABLE products (
    reference INT(5) ZEROFILL NOT NULL AUTO_INCREMENT,
    etiquette VARCHAR(255) UNIQUE NOT NULL,
    descpt TEXT NOT NULL,
    codeBarres VARCHAR(255) NOT NULL,
    img VARCHAR(255) UNIQUE NOT NULL,
    prixAchat DECIMAL(5,2) NOT NULL,
    prixFinal DECIMAL(5,2) NOT NULL,
    prixOffre DECIMAL(5,2) NOT NULL,
    qntMin INT NOT NULL,
    qntStock INT NOT NULL,
    catg VARCHAR(255) NOT NULL,
    PRIMARY KEY(reference, codeBarres),
    FOREIGN KEY(catg) REFERENCES categories(name)
);


INSERT INTO 
	products (
        etiquette,
        descpt,
        codeBarres,
        img,
        prixAchat,
        prixFinal,
        prixOffre,
        qntMin,
        qntStock,
        catg)
VALUES
("USB Host Shield 2.0 Board pour Arduino"," Le 'USB Host Shield 2.0 board pour Arduino' est compatible avec plusieurs dispositifs, offrant une flexibilité d'utilisation étendue. Il est conçu pour fonctionner avec le Google Android ADK, permettant une intégration aisée avec des dispositifs Android.", "ard00001", "assets/images/Arduino_img1.png", 190, 259, 259, 15, 20, "Arduino"),
("Afficheur LCD 1602","Afficheur économique alphanumérique 2 x 16 caractères avec rétroéclairage bleu.", "aff00001", "assets/images/Afficheur_img1.png", 25, 35, 35, 20, 35, "Afficheur"),
("Afficheur 7 Segment cathode commun 3 bits","Afficheur 7 Segment cathode commun 3 bits", "aff00002", "assets/images/Afficheur_img2.png", 15, 25, 25, 20, 31, "Afficheur"),
("Afficheur Oled 0.96 i2c pour Arduino","Module afficheur monochrome OLED 0,96” 128 x 64 pixels basé sur un circuit SSD1306. Ce module communique avec un microcontrôleur de type Arduino ou compatible via le bus I2C.", "aff00003", "assets/images/Afficheur_img3.png", 70, 100, 100, 100, 120, "Afficheur"),
("Kit bras Robotique Arduino","Kit de bras robotique idéal pour les étudiants, les collégiens, les amateurs de bricolage, etc.", "robot00001", "assets/images/Robot_img3.png", 350, 489, 489, 5, 7, "Robot");


    

INSERT INTO `users` (`email`, `username`, `pass`, `state`, `role`) VALUES ('laksoumi.ot@gmail.com', 'laksoumi99', '123456', '1', '1');


