-- 
-- STORY 1
-- 

CREATE DATABASE IF NOT EXISTS PowerOfMemory CHARACTER SET 'utf8'


CREATE TABLE IF NOT EXISTS Utilisateur (
  Id int UNSIGNED NOT NULL AUTO_INCREMENT,
  Email varchar(100) NOT NULL,
  PasswordUser varchar(200) NOT NULL,
  Pseudo varchar(100) NOT NULL,
  InscriptionDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  LastConnexionDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS Score (
  Id int UNSIGNED NOT NULL AUTO_INCREMENT,
  IdUser int UNSIGNED,
  IdGame int UNSIGNED,
  GameDifficult enum('1','2','3'),
  GameScore int,
  DateGame datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS `Message` (
  Id int UNSIGNED NOT NULL AUTO_INCREMENT,
  IdGame int UNSIGNED DEFAULT NULL,
  IdUser int UNSIGNED DEFAULT NULL,
  Chat TEXT,
  MessageDate datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS Game (
  Id int UNSIGNED NOT NULL AUTO_INCREMENT,
  GameName varchar(100) NOT NULL,
  PRIMARY KEY (Id)
);

ALTER TABLE `Message` 
  ADD CONSTRAINT FkMessageGame FOREIGN KEY (IdGame) REFERENCES Game(Id) ON UPDATE CASCADE ON DELETE SET NULL,
  ADD CONSTRAINT FkMessageUtilisateur FOREIGN KEY (IdUser) REFERENCES Utilisateur(Id) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE Score
  ADD CONSTRAINT FkScoreGame FOREIGN KEY (IdGame) REFERENCES Game(Id) ON UPDATE CASCADE ON DELETE SET NULL,
  ADD CONSTRAINT FkScoreUtilisateur FOREIGN KEY (IdUser) REFERENCES Utilisateur(Id) ON UPDATE CASCADE ON DELETE SET NULL;

--
-- STORY 2
--

INSERT INTO Game (GameName)
VALUES ('Memory');

INSERT INTO Utilisateur (Email, PasswordUser, Pseudo)
VALUES
    ('alexis.godet@esiee-it.fr', '1234', 'Alexlastique'),
    ('alexis.godet05@gmail.com', '2345', 'Alexlastique 2'),
    ('alexis.godet050@gmail.com', '3456', 'Alexlastique 3'),
    ('papatate2@gmail.com', '4567', 'Alexlastique 4'),
    ('alexlastique@gmail.com', '5678', 'Alexlastique 5');

INSERT INTO `Message` (IdGame, IdUser, Chat, MessageDate)
VALUES
    (1, 1, 'Pour Demacia','2023-10-26 10:01:00'),
    (1, 1, 'Pour Noxus','2023-10-26 10:02:00'),
    (1, 1, 'Pour Shurima','2023-10-26 10:03:00'),
    (1, 1, 'Pour Freljord','2023-10-26 10:04:00'),
    (1, 1, 'Pour Le néant','2023-10-26 10:05:00'),
    (1, 2, 'Pour les iles obscurs','2023-10-26 10:06:00'),
    (1, 2, 'Pour Ionia','2023-10-26 10:07:00'),
    (1, 2, 'Pour Bundle','2023-10-26 10:08:00'),
    (1, 2, 'Pour le mont targon','2023-10-26 10:09:00'),
    (1, 2, 'Pour xtal','2023-10-26 10:10:00'),
    (1, 3, 'Pour bilgewater','2023-10-26 10:11:00'),
    (1, 3, 'Pour les darkins','2023-10-26 10:12:00'),
    (1, 3, 'Pour Piltover','2023-10-26 10:13:00'),
    (1, 3, 'Pour Zaun','2023-10-26 10:14:00'),
    (1, 3, 'Pour Demacia','2023-10-26 10:15:00'),
    (1, 4, 'Pour Noxus','2023-10-26 10:16:00'),
    (1, 4, 'Pour Shurima','2023-10-26 10:17:00'),
    (1, 4, 'Pour Freljord','2023-10-26 10:18:00'),
    (1, 4, 'Pour Le néant','2023-10-26 10:19:00'),
    (1, 4, 'Pour les iles obscurs','2023-10-26 10:20:00'),
    (1, 5, 'Pour Ionia','2023-10-26 10:21:00'),
    (1, 5, 'Pour Bundle','2023-10-26 10:22:00'),
    (1, 5, 'Pour le mont targon','2023-10-26 10:23:00'),
    (1, 5, 'Pour xtal','2023-10-26 10:24:00'),
    (1, 5, 'Pour bilgewater','2023-10-26 10:25:00');

INSERT INTO Score (IdUser, IdGame, GameDifficult, GameScore, DateGame)
VALUES
    (1, 1, '2', 500, '2023-10-05 10:00:00'),
    (2, 1, '2', 700, '2023-10-05 10:00:00'),
    (3, 1, '2', 300, '2023-10-05 10:00:00'),
    (4, 1, '2', 400, '2023-10-05 10:00:00'),
    (5, 1, '2', 950, '2023-10-05 10:00:00'),
    (1, 1, '2', 700, '2023-10-05 11:00:00'),
    (2, 1, '2', 200, '2023-10-05 11:00:00'),
    (3, 1, '2', 900, '2023-10-05 11:00:00'),
    (4, 1, '2', 400, '2023-10-05 11:00:00'),
    (5, 1, '2', 500, '2023-10-05 11:00:00'),
    (1, 1, '3', 550, '2023-10-05 12:00:00'),
    (2, 1, '3', 200, '2023-10-05 12:00:00'),
    (3, 1, '3', 1300, '2023-10-05 12:00:00'),
    (4, 1, '3', 420, '2023-10-05 12:00:00'),
    (5, 1, '3', 960, '2023-10-05 12:00:00'),
    (1, 1, '2', 100, '2023-10-05 13:00:00'),
    (2, 1, '2', 600, '2023-10-05 13:00:00'),
    (3, 1, '2', 200, '2023-10-05 13:00:00'),
    (4, 1, '2', 800, '2023-10-05 13:00:00'),
    (5, 1, '2', 115, '2023-10-05 13:00:00'),
    (1, 1, '2', 100, '2023-10-05 14:00:00'),
    (2, 1, '2', 900, '2023-10-05 14:00:00'),
    (3, 1, '2', 300, '2023-10-05 14:00:00'),
    (4, 1, '2', 600, '2023-10-05 14:00:00'),
    (5, 1, '2', 450, '2023-10-05 14:00:00');

--
-- Story 3
--

ALTER TABLE Utilisateur
  ADD UNIQUE (Pseudo),
  ADD UNIQUE (Email);

--
-- STORY 4
--

UPDATE Utilisateur
SET PasswordUser='modifier'
WHERE Id=1;

UPDATE Utilisateur
SET Email='modifier@gmail.com'
WHERE Id=1;

--
--STORY 5
--

SELECT * FROM Utilisateur
WHERE Email = 'papatate2@gmail.com'
AND PasswordUser=4567;

--
--STORY 7
--

SELECT Game.GameName, Utilisateur.Pseudo, GameDifficult, GameScore FROM Score
LEFT JOIN Game ON Score.IdGame = Game.Id
LEFT JOIN Utilisateur On Score.IdUser = Utilisateur.Id
ORDER BY IdGame, GameDifficult, GameScore ASC;

--
--STORY 8
--

SELECT Game.GameName, Utilisateur.Pseudo, GameDifficult, GameScore FROM Score
LEFT JOIN Game ON Score.IdGame = Game.Id
LEFT JOIN Utilisateur On Score.IdUser = Utilisateur.Id
WHERE (Game.GameName = 'Memory'
  OR Utilisateur.Pseudo = 'Alexlastique'
  OR GameDifficult = 2)
ORDER BY IdGame, GameDifficult, GameScore ASC;

--
--STORY 9
--

UPDATE Score
SET GameScore = 9000
WHERE IdUser = 1
AND IdGame = 1
AND GameDifficult = 1
AND GameScore < 9000;

--
--STORY 10
--

INSERT INTO `Message` (IdGame, IdUser, Chat)
VALUES (1,4,'STORY 8');

--
--STORY 11
--

SELECT Chat, Utilisateur.Pseudo, MessageDate,
  CASE WHEN IdUser = 1 THEN TRUE ELSE FALSE END AS IsSender
FROM Message
LEFT JOIN Utilisateur ON Message.IdUser = Utilisateur.Id
WHERE MessageDate + INTERVAL 24 HOUR >= CURRENT_TIMESTAMP;


--
--STORY 12
--

SELECT Score.* FROM Score
LEFT JOIN Utilisateur ON Score.IdUser = Utilisateur.Id
WHERE Utilisateur.Pseudo LIKE '% %';


--
--BACKLOG 2
--

--
--STORY 13
--

CREATE TABLE IF NOT EXISTS PrivedMessage (
  Id int UNSIGNED NOT NULL AUTO_INCREMENT,
  IdUser1 INT UNSIGNED,
  IdUser2 INT UNSIGNED,
  MessageContente TEXT,
  Readed BOOLEAN DEFAULT FALSE,
  PublichDate datetime DEFAULT CURRENT_TIMESTAMP,
  ReadDate datetime DEFAULT CURRENT_TIMESTAMP,
  ADD PRIMARY KEY (Id)
);

--
--STORY 14
--

ALTER TABLE PrivedMessage
  ADD CONSTRAINT FkPrivedMessageUtilisateur1 FOREIGN KEY (IdUser1) REFERENCES Utilisateur(Id) ON UPDATE CASCADE ON DELETE SET NULL,
  ADD CONSTRAINT FkPrivedMessageUtilisateur2 FOREIGN KEY (IdUser2) REFERENCES Utilisateur(Id) ON UPDATE CASCADE ON DELETE SET NULL;

INSERT INTO PrivedMessage(IdUser1, IdUser2, MessageContente, PublichDate, ReadDate, Readed)VALUES
(1,2,'Salut!','2023-10-24 10:00:00.000','2023-10-24 10:05:00.000',TRUE),
(2,1,'Salut, ça va?','2023-10-24 10:10:00.000','2023-10-24 10:15:00.000',TRUE),
(1,2,'Ca va et toi?','2023-10-24 10:20:00.000','2023-10-24 10:25:00.000',TRUE),
(2,1,'Ca va!','2023-10-24 10:30:00.000','2023-10-24 10:35:00.000',TRUE),
(1,2,'Bon bah tant mieux.','2023-10-24 10:40:00.000','2023-10-24 10:45:00.000',TRUE),
(3,1,'Salut!','2023-10-24 10:11:00.000','2023-10-24 10:16:00.000',TRUE),
(1,3,'Salut, ça va?','2023-10-24 10:01:00.000','2023-10-24 10:06:00.000',TRUE),
(3,1,'Ca va et toi?','2023-10-24 10:21:00.000','2023-10-24 10:26:00.000',TRUE),
(1,3,'Ca va!','2023-10-24 10:31:00.000','2023-10-24 10:36:00.000',TRUE),
(3,1,'Bon bah tant mieux.','2023-10-24 10:41:00.000','2023-10-24 10:46:00.000',TRUE),
(2,4,'Salut!','2023-10-24 10:01:00.000','2023-10-24 10:06:00.000',TRUE),
(4,2,'Salut, ça va?','2023-10-24 10:11:00.000','2023-10-24 10:16:00.000',TRUE),
(2,4,'Ca va et toi?','2023-10-24 10:21:00.000','2023-10-24 10:26:00.000',TRUE),
(4,2,'Ca va!','2023-10-24 10:31:00.000','2023-10-24 10:36:00.000',TRUE),
(2,4,'Bon bah tant mieux.','2023-10-24 10:41:00.000','2023-10-24 10:46:00.000',TRUE),
(1,4,'Salut!','2023-10-24 10:02:00.000','2023-10-24 10:07:00.000',TRUE),
(4,1,'Salut, ça va?','2023-10-24 10:12:00.000','2023-10-24 10:17:00.000',TRUE),
(1,4,'Ca va et toi?','2023-10-24 10:22:00.000','2023-10-24 10:27:00.000',TRUE),
(4,1,'Ca va!','2023-10-24 10:32:00.000','2023-10-24 10:37:00.000',TRUE),
(1,4,'Bon bah tant mieux.','2023-10-24 10:42:00.000','2023-10-24 10:47:00.000',TRUE);

DELETE FROM PrivedMessage
WHERE Id = 2

UPDATE PrivedMessage
SET MessageContente = "J'ai modifier ce message"
WHERE Id = 1

--
--STORY 15
--


SET @@sql_mode=REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', '');

SELECT 
  PM.MessageContente,
  U1.Pseudo AS "Pseudo de l'expéditeur",
  U2.Pseudo AS "Pseudo du receveur",
  PM.PublichDate,
  PM.ReadDate,
  PM.Readed
FROM PrivedMessage AS PM
LEFT JOIN Utilisateur AS U1 ON PM.IdUser1=U1.Id
LEFT JOIN Utilisateur AS U2 ON PM.IdUser2=U2.Id
WHERE (U1.Id = 1 OR U2.Id = 1)
GROUP BY (PM.IdUser1 + PM.IdUser2)
ORDER BY (PM.IdUser1 + PM.IdUser2), PublichDate DESC


--
--STORY 16
--

SELECT 
  PM.MessageContente,
  U1.Pseudo,
  U2.Pseudo,
  PM.PublichDate,
  PM.ReadDate,
  PM.Readed,
  (SELECT COUNT(DISTINCT S1.GameDifficult)
    FROM PrivedMessage AS PM
	  LEFT JOIN Score AS S1 ON PM.IdUser1=S1.IdUser
    WHERE S1.IdUser = PM.IdUser1
  ) AS NbPartieJouer1,
  (SELECT COUNT(DISTINCT S2.GameDifficult)
    FROM PrivedMessage AS PM
	  LEFT JOIN Score AS S2 ON PM.IdUser2=S2.IdUser
    WHERE S2.IdUser = PM.IdUser2
  ) AS NbPartieJouer2,
  (SELECT G.GameName FROM Score AS S
LEFT JOIN Game AS G ON S.IdGame = G.Id
ORDER BY 
 (SELECT COUNT(DISTINCT S.DateGame) AS NbParties FROM Score AS S) DESC
LIMIT 1) AS JeuLePlusJoué1,
  (SELECT G.GameName FROM Score AS S
LEFT JOIN Game AS G ON S.IdGame = G.Id
ORDER BY 
 (SELECT COUNT(DISTINCT S.DateGame) AS NbParties FROM Score AS S) DESC
LIMIT 1) AS JeuLePlusJoué2
FROM PrivedMessage AS PM
LEFT JOIN Utilisateur AS U1 ON PM.IdUser1=U1.Id
LEFT JOIN Utilisateur AS U2 ON PM.IdUser2=U2.Id
WHERE (PM.IdUser1 = 1
       AND PM.IdUser2 = 2)
       OR(PM.IdUser1 = 2
       AND PM.IdUser2 = 1)
ORDER BY -PublichDate;

--
--STORY 17
--

SELECT '2021'

-- (SELECT YEAR(S.DateGame) FROM Score AS S
-- WHERE S.DateGame IS NOT NULL
-- LIMIT 1)

AS Année,
m.mois AS Mois,
(SELECT U.Pseudo FROM Score AS S
LEFT JOIN Utilisateur AS U ON S.IdUser = U.Id
WHERE (YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL
ORDER BY S.GameScore DESC
LIMIT 1)
AS 'Top 1',
(SELECT U.Pseudo FROM Score AS S
LEFT JOIN Utilisateur AS U ON S.IdUser = U.Id
WHERE ((YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL)
 AND U.Pseudo != `TOP 1`
ORDER BY S.GameScore DESC
LIMIT 1 OFFSET 1)
AS 'Top 2',
(SELECT U.Pseudo FROM Score AS S
LEFT JOIN Utilisateur AS U ON S.IdUser = U.Id
WHERE ((YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL)
 AND U.Pseudo != `TOP 1`
 AND U.Pseudo != `TOP 2`
ORDER BY S.GameScore DESC
LIMIT 1 OFFSET 2)
AS 'Top 3',
(SELECT COUNT(DISTINCT S.DateGame) AS Total_parties FROM Score AS S
WHERE (YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL) AS 'Total parties',
(SELECT G.GameName FROM Score AS S
LEFT JOIN Game AS G ON S.IdGame = G.Id
WHERE (YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL
ORDER BY 
 (SELECT COUNT(DISTINCT S.DateGame) AS NbParties FROM Score AS S) DESC
LIMIT 1) AS 'Jeu le plus joué'
FROM (
   SELECT '01' AS mois
   UNION SELECT '02'
   UNION SELECT '03'
   UNION SELECT '04'
   UNION SELECT '05'
   UNION SELECT '06'
   UNION SELECT '07'
   UNION SELECT '08'
   UNION SELECT '09'
   UNION SELECT '10'
   UNION SELECT '11'
   UNION SELECT '12'
) AS m
LEFT JOIN Score AS S ON MONTH(S.DateGame) = m.mois
GROUP BY Mois
ORDER BY Mois;

--
--STORY 18
--

SELECT '2021' AS Année,
m.mois AS Mois,
(SELECT COUNT(DISTINCT S.DateGame) AS Total_parties FROM Score AS S
WHERE (YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL) AS 'Total parties',
(SELECT G.GameName FROM Score AS S
LEFT JOIN Game AS G ON S.IdGame = G.Id
WHERE (YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL
ORDER BY 
 (SELECT COUNT(DISTINCT S.DateGame) AS NbParties FROM Score AS S) DESC
LIMIT 1) AS 'Jeu le plus joué',
(SELECT AVG(S.GameScore) FROM Score AS S
WHERE (YEAR(S.DateGame) = Année
 AND MONTH(S.DateGame) = mois)
OR YEAR(S.DateGame) IS NULL) AS 'Score moyen'
FROM (
   SELECT '01' AS mois
   UNION SELECT '02'
   UNION SELECT '03'
   UNION SELECT '04'
   UNION SELECT '05'
   UNION SELECT '06'
   UNION SELECT '07'
   UNION SELECT '08'
   UNION SELECT '09'
   UNION SELECT '10'
   UNION SELECT '11'
   UNION SELECT '12'
) AS m
LEFT JOIN Score AS S ON MONTH(S.DateGame) = m.mois
GROUP BY Mois
ORDER BY Mois;