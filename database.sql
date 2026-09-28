CREATE TABLE felhasznalo (
    userID int(8) NOT NULL AUTO_INCREMENT,
    username int(16) NOT NULL,
    displayName varchar(32),
    password varchar(32) NOT NULL,
    email varchar(255) NOT NULL,
    keresztnev varchar(16),
    vezeteknev varchar(16),
    szuletesiDatum int(8),
    orszag varchar(32),
    PRIMARY KEY (username),
    UNIQUE KEY (userID),
    UNIQUE KEY (email)
);

CREATE TABLE uzenetek (
    uzenetID int(16),
    uzenetTitle varchar(255),
    imageName varchar(255),
    PRIMARY KEY (uzenetID)
);

CREATE TABLE kategoriak (
    katID int(8),
    katNev varchar(255),
    katLeiras varchar(255),
    PRIMARY KEY (katID)
);