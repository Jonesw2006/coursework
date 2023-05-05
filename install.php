<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPupils;
CREATE TABLE TblPupils
(pupilID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pupilEmail VARCHAR(50) NOT NULL,
pupilPassword VARCHAR(50) NOT NULL,
pupilForename VARCHAR(50) NOT NULL,
pupilSurname VARCHAR(50) NOT NULL,
pupilAvGrade INT(3) NOT NULL)


");
//This creates the pupil table
$stmt->execute();


$stmt = $conn->prepare("DROP TABLE IF EXISTS TblTutors;
CREATE TABLE TblTutors
(tutorID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tutorForename VARCHAR(50) NOT NULL,
tutorSurname VARCHAR(50) NOT NULL,
tutorLocation VARCHAR(20) NOT NULL,
tutorRating INT(1) NOT NULL,
tutorSubject VARCHAR(20) NOT NULL,
tutorDescription VARCHAR(300) NOT NULL)




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


$stmt = $conn->prepare("DROP TABLE IF EXISTS TblBasket;
CREATE TABLE TblBasket
(orderID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pupilID INT(4) NOT NULL,
tutorID INT(4) NOT NULL,
addressLine1 VARCHAR(50) NOT NULL,
addressLine2 VARCHAR(50) NOT NULL,
addressLine3 VARCHAR(50) NOT NULL,
postcode VARCHAR(10) NOT NULL,
date DATETIME NOT NULL,
online BOOLEAN)




");
//This creates the basket table
$stmt->execute();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblReport;
CREATE TABLE TblReport
 (reportID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 tutorID INT(4) NOT NULL,
 pupilID INT(4) NOT NULL,
 grade INT(3) NOT NULL,
 reportContent VARCHAR(1000),
 date DATETIME NOT NULL)




");
//This creates the report table
$stmt->execute();



$stmt = $conn->prepare("INSERT INTO TblPupils (pupilID, pupilEmail, pupilPassword, pupilForename, pupilSurname, pupilAvGrade) VALUES ('0001', 'jones.wb@oundleschool.org.uk', 'Test123!', 'Will', 'Jones', '0' ) ");
$stmt->execute();

?>