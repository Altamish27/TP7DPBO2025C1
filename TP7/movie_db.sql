-- Tabel Movies
CREATE TABLE Movies (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255),
    Release_Year INT,
    Genre_ID INT,
    Rating FLOAT,
    Language VARCHAR(100),
    Description TEXT
);

-- Tabel Actors
CREATE TABLE Actors (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Birthdate DATE,
    Nationality VARCHAR(100),
    Biography TEXT,
    Image VARCHAR(255)
);

-- Tabel Movie_Actors (Relasi many-to-many)
CREATE TABLE Movie_Actors (
    Movie_ID INT,
    Actor_ID INT,
    Role VARCHAR(255),
    PRIMARY KEY(Movie_ID, Actor_ID),
    FOREIGN KEY (Movie_ID) REFERENCES Movies(ID),
    FOREIGN KEY (Actor_ID) REFERENCES Actors(ID)
);

-- Tabel Genres
CREATE TABLE Genres (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255)
);

-- Tabel Reviews
CREATE TABLE Reviews (
    Review_ID INT AUTO_INCREMENT PRIMARY KEY,
    Movie_ID INT,
    User_ID INT,
    Rating INT,
    Review TEXT,
    FOREIGN KEY (Movie_ID) REFERENCES Movies(ID)
);
