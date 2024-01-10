<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPupils;
CREATE TABLE TblPupils
(pupilID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pupilEmail VARCHAR(50) NOT NULL,
pupilPassword VARCHAR(5000) NOT NULL,
pupilForename VARCHAR(50) NOT NULL,
pupilSurname VARCHAR(50) NOT NULL)


");
//This creates the pupil table
$stmt->execute();


$stmt = $conn->prepare("DROP TABLE IF EXISTS TblTutors;
CREATE TABLE TblTutors
(tutorID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tutorForename VARCHAR(50) NOT NULL,
tutorSurname VARCHAR(50) NOT NULL,
tutorEmail VARCHAR(50) NOT NULL,
tutorPassword VARCHAR(5000) NOT NULL,
tutorLocation VARCHAR(20) NOT NULL,
tutorRating VARCHAR(5) NULL,
tutorSubject VARCHAR(20) NOT NULL,
tutorDescription VARCHAR(300) NOT NULL,
startTime TIME NOT NULL,
endTime TIME NOT NULL,
image BLOB)




");
//This creates the Tutor table
$stmt->execute();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblReview;
CREATE TABLE TblReview
(reviewID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tutorID INT(4) NOT NULL,
pupilID INT(4) NOT NULL,
stars INT(1) NOT NULL,
reviewContent VARCHAR(500))




");
//This creates the review table
$stmt->execute();


$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSessions;
CREATE TABLE TblSessions
(sessionID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pupilID INT(4) NOT NULL,
tutorID INT(4) NOT NULL,
addressLine1 VARCHAR(50) NOT NULL,
addressLine2 VARCHAR(50) NOT NULL,
addressLine3 VARCHAR(50) NOT NULL,
postcode VARCHAR(10) NOT NULL,
online VARCHAR(15) NOT NULL,
sessionDate DATE NOT NULL,
sessionTime TIME NOT NULL)




");
//This creates the sessions table
$stmt->execute();










?>