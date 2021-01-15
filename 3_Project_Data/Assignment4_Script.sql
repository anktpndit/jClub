CREATE DATABASE if not exists group14;
USE group14;

DROP TABLE IF EXISTS COACHED_BY,COACH,HASA,SPORTS,STUDENT,PERMISSION,CLUB,REGISTER,HAS,ACTIVITY,ORGANIZES,MODERATOR,SUPERVISES,HOLDS,ACCOUNTS,MANAGES;

CREATE TABLE STUDENT (
	student_id INT AUTO_INCREMENT,
	student_name VARCHAR(255) NOT NULL,
	student_DOB DATE NOT NULL,
	student_major VARCHAR(50) NOT NULL,
	student_contact VARCHAR(30),
	PRIMARY KEY (student_id)
);

ALTER TABLE STUDENT AUTO_INCREMENT=1;

CREATE TABLE CLUB (
	club_id INT AUTO_INCREMENT,
	club_name VARCHAR(100) NOT NULL,
	club_description TEXT NOT NULL,
	club_contact VARCHAR(50) NOT NULL,
	club_begin DATE NOT NULL,
	club_rating decimal(2,1),
	sports TINYINT,
	other_clubs TINYINT,
	arts TINYINT,
	dance TINYINT,
	outreach_and_fellowship TINYINT,
	PRIMARY KEY (club_id),
	CONSTRAINT check_club_rating CHECK (club_rating >=0 AND club_rating<=5)
);

ALTER TABLE CLUB AUTO_INCREMENT=401;

CREATE TABLE SPORTS (
	team_name VARCHAR(100) NOT NULL UNIQUE,
    club_id INT NOT NULL,
    PRIMARY KEY (team_name,club_id),
    FOREIGN KEY (club_id) REFERENCES CLUB(club_id)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE COACH (
	coach_name VARCHAR(50) NOT NULL,	
    coach_id INT AUTO_INCREMENT,
    coach_contact VARCHAR(100) NOT NULL,
    PRIMARY KEY (coach_id)
);
ALTER TABLE COACH AUTO_INCREMENT=10501;

CREATE TABLE COACHED_BY (
	coach_id INT NOT NULL,
    club_id INT NOT NULL UNIQUE,
    FOREIGN KEY (coach_id) REFERENCES COACH(coach_id)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
	FOREIGN KEY (club_id) REFERENCES CLUB(club_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

CREATE TABLE REGISTER (
	date_joined DATE,
	student_id INT NOT NULL,
	club_id INT,
	PRIMARY KEY (student_id,club_id),
	FOREIGN KEY (student_id) REFERENCES STUDENT(student_id)
		ON DELETE NO ACTION
		ON UPDATE CASCADE,
	FOREIGN KEY (club_id) REFERENCES CLUB(club_id)
		ON DELETE NO ACTION
		ON UPDATE CASCADE
);

CREATE TABLE HAS (
	member_id INT AUTO_INCREMENT,
	student_id INT NOT NULL,
	club_id INT NOT NULL,
	PRIMARY KEY (member_id),
	FOREIGN KEY (student_id,club_id) REFERENCES REGISTER(student_id,club_id)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);

ALTER TABLE HAS AUTO_INCREMENT=601;

DELIMITER //
CREATE TRIGGER IF NOT EXISTS update_members_ofclub
	AFTER INSERT ON REGISTER
	FOR EACH ROW
	BEGIN
		INSERT INTO HAS(student_id,club_id) VALUES(new.student_id,new.club_id);
	END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER IF NOT EXISTS update_HAS
	AFTER UPDATE ON REGISTER
	FOR EACH ROW
	BEGIN
		UPDATE HAS SET student_id=new.student_id,club_id=new.club_id;
	END//
DELIMITER ;


CREATE TABLE ACTIVITY (
	activity_id INT AUTO_INCREMENT,
	activity_name VARCHAR(50) NOT NULL,
	activity_location VARCHAR(50),
	activity_desc VARCHAR (300),
	activity_type VARCHAR(50),
	activity_day VARCHAR(50),
	activity_time TIME(0),
	optional_activity TINYINT,
	mandatory_activity TINYINT,
	PRIMARY KEY (activity_id),
	CONSTRAINT only_one_value 
		CHECK ((optional_activity=0 || mandatory_activity=0) AND NOT (optional_activity=1 AND mandatory_activity=1)) 
);

ALTER TABLE ACTIVITY AUTO_INCREMENT=701;

CREATE TABLE ORGANIZES (
	club_id INT NOT NULL,
	activity_id INT UNIQUE,
	PRIMARY KEY (club_id, activity_id),
	FOREIGN KEY (club_id) REFERENCES CLUB(club_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (activity_id) REFERENCES ACTIVITY(activity_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

CREATE TABLE MODERATOR (
	moderator_id INT NOT NULL,
	student_id INT NOT NULL,
	moderator_name VARCHAR(45) NOT NULL,
	moderator_position VARCHAR(45) NOT NULL,
	PRIMARY KEY (moderator_id),
	FOREIGN KEY (student_id) REFERENCES STUDENT(student_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

ALTER TABLE MODERATOR AUTO_INCREMENT=100001;

CREATE TABLE SUPERVISES (
	moderator_id INT NOT NULL UNIQUE,
	club_id INT NOT NULL,
	PRIMARY KEY (moderator_id, club_id),
	FOREIGN KEY (moderator_id) REFERENCES MODERATOR(moderator_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (club_id) REFERENCES CLUB(club_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

CREATE TABLE ACCOUNTS (
	account_id INT AUTO_INCREMENT,
	account_Username VARCHAR(80) NOT NULL,
	account_Password TEXT NOT NULL,
	account_Type VARCHAR(45) NOT NULL,
	account_des VARCHAR(500) NOT NULL,
	account_email VARCHAR(100) NOT NULL,
	PRIMARY KEY (account_id)
);
ALTER TABLE ACCOUNTS AUTO_INCREMENT=1101;

CREATE TABLE PERMISSION (
	permission_id INT AUTO_INCREMENT,
	permission_name VARCHAR(45) NOT NULL,
	PRIMARY KEY (permission_id)
);
ALTER TABLE PERMISSION AUTO_INCREMENT=10001;


CREATE TABLE HOLDS (
	account_id INT NOT NULL,
	permission_id INT NOT NULL,
	PRIMARY KEY(account_id, permission_id),
	FOREIGN KEY (account_id) REFERENCES ACCOUNTS(account_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (permission_id) REFERENCES PERMISSION(permission_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

CREATE TABLE ADMINN (
	admin_id INT AUTO_INCREMENT,
	admin_name VARCHAR(20),
	admin_contact VARCHAR(100),
	PRIMARY KEY(admin_id)
);
ALTER TABLE ADMINN AUTO_INCREMENT=5001;

CREATE TABLE MANAGES (
	account_id INT NOT NULL,
	admin_id INT,
	student_id INT,
	club_id INT,
	PRIMARY KEY (account_id),
	FOREIGN KEY (student_id) REFERENCES STUDENT(student_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (student_id) REFERENCES STUDENT(student_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (admin_id) REFERENCES ADMINN(admin_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (account_id) REFERENCES ACCOUNTS(account_id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	CONSTRAINT either_one_value 
		CHECK ((student_id is NULL OR club_id is NULL OR admin_id is NULL) AND NOT (student_id is NULL AND club_id is NULL AND admin_id is NULL)) 
);

INSERT INTO ADMINN(admin_name, admin_contact) VALUES('Admin','admin@gmail.com');
INSERT INTO ACCOUNTS(account_Username, account_Password, account_Type, account_des, account_email) VALUES('admin','Itsnotahashedpa$$','admin','Hi, I am the admin of this website!','admin@gmail.com');
INSERT INTO MANAGES(account_id, admin_id) VALUES(1101,5001);
INSERT INTO PERMISSION(permission_name) VALUES('admin');
INSERT INTO HOLDS(account_id, permission_id) VALUES(1101,10001);

