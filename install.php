<?php
include_once("connection.php");
$stmt = $conn_>prepare("DROP TABLE IS EXISTS TblPupils;
CREATE TABLE TblPupils
(pupilID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pupilEmail VARCHAR(50) NOT NULL,
pupilPassword VARCHAR(50) NOT NULL,
pupilForname VARCHAR(50) NOT NULL,
pupilSurname VARCHAR(50) NOT NULL,
pupilAvGrade INT(3) NOT NULL,
$stmt->execute();
$stmt->closeCursor();
")



$stmt = $conn_>prepare("DROP TABLE IS EXISTS TblPupils;
CREATE TABLE TblTutors
(tutorID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tutorForname VARCHAR(50) NOT NULL,
tutorSurname VARCHAR(50) NOT NULL,
tutorLocation VARCHAR(20) NOT NULL,
tutorRating INT(1) NOT NULL,
tutorSubject VARCHAR(20) NOT NULL,
tutorDescription VARCHAR(300) NOT NULL,


$stmt->execute();
$stmt->closeCursor();
")


$stmt = $conn_>prepare("DROP TABLE IS EXISTS TblPupils;
CREATE TABLE TblReview


$stmt->execute();
$stmt->closeCursor();
")



$stmt = $conn_>prepare("DROP TABLE IS EXISTS TblPupils;
CREATE TABLE TblBasket


$stmt->execute();
$stmt->closeCursor();
")


$stmt = $conn_>prepare("DROP TABLE IS EXISTS TblPupils;
CREATE TABLE TblReport


$stmt->execute();
$stmt->closeCursor();
")


?>