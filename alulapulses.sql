CREATE DATABASE alula_pulses;
USE alula_pulses;

-- USER
CREATE TABLE User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    UserType VARCHAR(20) NOT NULL
);

-- MAP
CREATE TABLE Map (
    MapID INT AUTO_INCREMENT PRIMARY KEY
);

-- ZONE
CREATE TABLE Zone (
    ZoneID INT AUTO_INCREMENT PRIMARY KEY,
    MapID INT,
    ZoneName VARCHAR(100) NOT NULL,
    ZoneDescription TEXT,
    ZoneImg VARCHAR(255),
    FOREIGN KEY (MapID) REFERENCES Map(MapID)
);

-- TAG
CREATE TABLE Tag (
    TagID INT AUTO_INCREMENT PRIMARY KEY,
    ZoneID INT,
    TagStatus VARCHAR(50) NOT NULL,
    TagColor VARCHAR(30) NOT NULL,
    FOREIGN KEY (ZoneID) REFERENCES Zone(ZoneID)
);

-- INSERT MAP
INSERT INTO Map () VALUES ();

-- INSERT ZONES
INSERT INTO Zone (MapID, ZoneName, ZoneDescription, ZoneImg) VALUES
(1,'Hegra Historical City District','Hegra, also known as Madā͐in Ṣāliḥ, is a premier UNESCO World Heritage Site in Saudi Arabia located in AlUla, 
renowned for its remarkably preserved Nabataean tombs and over 100 monumental graves from the 1st century AD. As the second city of the Nabataean 
civilization after Petra, it features intricate stone-cut architecture, ancient agricultural systems, and inscriptions within a dramatic desert landscape.','images/hegraPic1.png'),

(1,'Nabataean Horizon District','Situated between the ancient sites of Jabal Ikmah and the Hegra Historical City, this district highlights the artistic and 
architectural legacy of the Nabataean civilization, acting as a curtain-raiser to the main UNESCO site of Hegra. The district focuses on creating an immersive 
experience showcasing the lifestyle, art, and architecture of the Nabataeans, who settled the area over 2,000 years ago.','images/NabataeanPic1.jpg'),

(1,'Jabal Ikmah District','Jabal Ikmah is one of the most prominent historical sites in AlUla and is designated as one of the largest open-air libraries in the 
Arabian Peninsula. It includes hundreds of carved inscriptions and stone carvings along the mountain made in different eras and civilizations thousands of years ago.','images/JabalPic1.jpg'),

(1,'Dadan District','Dadan is a premier archaeological site in AlUla. One of the citys most striking features is its rock-cut tombs, carved high into the red sandstone 
cliffs at about 50 meters above the desert floor an enduring testament to the craftsmanship and ingenuity of the ancient builders. Numerous inscriptions, statues, and 
reliefs found in the area further illustrate the cultural, religious, and political life of the period.','images/DadanPic1.jpg'),

(1,'AlUla Old Town District','The Old Town of AlUla is more than a historic site — it is a living experience that takes visitors back to the feeling of past centuries.
It opens a window into a time-honored way of life, inviting exploration through its alleys that have preserved their spirit despite the passage of time. A destination 
that inspires, enchants, and connects every visitor to the essence of AlUla.','images/AlulaOldTownPic1.jpg');



INSERT INTO user (Name, Email, Password, UserType)
VALUES ('admin', 'admin@alulapulses.com', '$2y$10$59eoQjJHYKk1I710FWhqtOIIk5Et/bUhKUNY09Cy4vSOtzDqSLHJO', 'Manager');