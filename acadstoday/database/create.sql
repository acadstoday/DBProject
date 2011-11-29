/*
DROP TABLE Department;
DROP TABLE Program;
DROP TABLE Course;
DROP TABLE Instructor;
DROP TABLE Teaches;
DROP TABLE User;
DROP TABLE Takes;
DROP TABLE Project;
DROP TABLE Project_Guide;
DROP TABLE Prereq;
DROP TABLE Uploader;
DROP TABLE Upload;
DROP TABLE News;
DROP TABLE User_Follow;
DROP TABLE Instr_Follow;
DROP TABLE Course_Follow;
DROP TABLE Instr_Comments;
DROP TABLE Course_Comments;
DROP TABLE Upload_Comments;
DROP TABLE Instr_Rating;
DROP TABLE Course_Rating;
DROP TABLE Upload_Rating;
*/


CREATE TABLE Department
(
	dept_name VARCHAR(50),
	dept_info VARCHAR(500),
	PRIMARY KEY (dept_name)
);

CREATE TABLE Program
(
	prog_name VARCHAR(15),
	prom_info VARCHAR(500),
	PRIMARY KEY (prog_name),
	CHECK (prog_name IN ('B.Tech', 'M.Tech', 'Dual Degree', 'PhD', 'M.Sc.', 'M.Phil'))
);

CREATE TABLE Course
(
	course_id VARCHAR(10), 
	course_name VARCHAR(25) NOT NULL,
	course_info VARCHAR(500),
	dept_name VARCHAR(50),
	PRIMARY KEY (course_id),
	FOREIGN KEY (dept_name) REFERENCES Department(dept_name)
		ON DELETE SET NULL
);

CREATE TABLE Instructor
(
	inst_id CHAR(5), 
	inst_name VARCHAR(25) NOT NULL,
	inst_info VARCHAR(500),
	dept_name VARCHAR(50), 
	PRIMARY KEY (inst_id),
	FOREIGN KEY (dept_name) REFERENCES Department(dept_name)
		ON DELETE SET NULL
);

CREATE TABLE Teaches
(
	inst_id CHAR(5),
	course_id VARCHAR(10),
	PRIMARY KEY (inst_id, course_id),
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
);

CREATE TABLE User
(
	user_id INT(10) UNSIGNED AUTO_INCREMENT UNIQUE, 
	user_name VARCHAR(20) NOT NULL, 
	password VARCHAR(15),
	dept_name VARCHAR(50),
	prog_name VARCHAR(20),
	gender VARCHAR(8),
	dob_date INT(2),
	dob_month INT(2),
	dob_year INT(4),
	user_info VARCHAR(500),
	profile_pic VARCHAR(500),
	PRIMARY KEY (user_id),
	FOREIGN KEY (dept_name) REFERENCES Department(dept_name)
		ON DELETE SET NULL,
	FOREIGN KEY (prog_name) REFERENCES Program(prog_name)
		ON DELETE SET NULL,
	CHECK (LENGTH(password) > 5),
	CHECK (dob_date > 0 AND dob_date < 32),
	CHECK (dob_month > 0 AND dob_month < 13),
	CHECK (gender IN ('Male', 'Female'))
);

CREATE TABLE Takes
(
	user_id INT(10), 
	course_id VARCHAR(10),
	PRIMARY KEY (user_id, course_id),
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE CASCADE
);

CREATE TABLE Project
(
	project_id INT(10) UNSIGNED AUTO_INCREMENT UNIQUE,
	user_id INT(10),
	inst_id CHAR(5),
	course_id VARCHAR(10),
	topic VARCHAR(100),
	project_info VARCHAR(500),
	start_date INT(2),
	start_month INT(2),
	start_year INT(4),
	end_date INT(2),
	end_month INT(2),
	end_year INT(4),
	PRIMARY KEY (project_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE SET NULL,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE SET NULL,
	CHECK (start_date > 0 AND start_date < 32),
	CHECK (start_month > 0 AND start_month < 13),
	CHECK (end_date > 0 AND end_date < 32),
	CHECK (end_month > 0 AND end_month < 13)
);

CREATE TABLE Prereq
(
	course_id VARCHAR(10), 
	prereq_id VARCHAR(10),
	PRIMARY KEY (course_id, prereq_id),
	FOREIGN KEY (course_id, prereq_id) REFERENCES Course(course_id, course_id)
		ON DELETE CASCADE
);

CREATE TABLE Upload
(
	upload_id INT(10) UNSIGNED AUTO_INCREMENT UNIQUE,
	user_id INT(10),
	course_id VARCHAR(10),
	upload_title VARCHAR(50) NOT NULL,
	upload_info VARCHAR(500),
	format VARCHAR(10),
	type VARCHAR(15),
	time_stamp TIMESTAMP(10),
	tot_downloads INT(10),
	link LONGTEXT NOT NULL,
	PRIMARY KEY (upload_id),
	CHECK (format IN ('ppt', 'pdf', 'doc', 'jpg')),
	CHECK (type IN ('notes', 'lectures', 'ebook', 'exam-paper', 'research-paper', 'assignment', 'other')),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);


CREATE TABLE News
(
	news_id INT(10) UNSIGNED AUTO_INCREMENT UNIQUE,
	user_id INT(10),
	news VARCHAR(500) NOT NULL,
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (news_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE SET NULL
);

CREATE TABLE Tags
(
	news_id INT(10),
	tag VARCHAR(50) NOT NULL,
	FOREIGN KEY (news_id) REFERENCES News(news_id)
		ON DELETE CASCADE
);

CREATE TABLE User_Follow
(
	user_id INT(10),
	followed_id INT(10),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (user_id, followed_id),
	FOREIGN KEY (user_id, followed_id) REFERENCES User(user_id, user_id)
		ON DELETE CASCADE
);

CREATE TABLE Instr_Follow
(
	user_id INT(10),
	inst_id CHAR(5),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (user_id, inst_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
);

CREATE TABLE Course_Follow
(
	user_id INT(10),
	course_id VARCHAR(10),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (user_id, course_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE Instr_Comments
(
	comment_id INT(15) UNSIGNED AUTO_INCREMENT UNIQUE,
	inst_id CHAR(5),
	user_id INT(10),
	comment LONGTEXT NOT NULL,
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (comment_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
);

CREATE TABLE Course_Comments
(
	comment_id INT(15) UNSIGNED AUTO_INCREMENT UNIQUE,
	course_id VARCHAR(10),
	user_id INT(10),
	comment LONGTEXT NOT NULL,
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (comment_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE Upload_Comments
(
	comment_id INT(15) UNSIGNED AUTO_INCREMENT UNIQUE,
	upload_id INT(10),
	user_id INT(10),
	comment LONGTEXT NOT NULL,
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (comment_id),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (upload_id) REFERENCES Upload(upload_id)
		ON DELETE CASCADE
);

CREATE TABLE Upload_Rating
(
	upload_id INT(10),
	user_id INT(10),
	rating INT(1),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (upload_id, user_id),
	CHECK (rating > 0 AND rating < 6),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (upload_id) REFERENCES Upload(upload_id)
		ON DELETE CASCADE
);

CREATE TABLE Course_Rating
(
	course_id VARCHAR(10),
	user_id INT(10),
	rating INT(1),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (course_id, user_id),
	CHECK (rating > 0 AND rating < 6),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE Instr_Rating
(
	inst_id CHAR(5),
	user_id INT(10),
	rating INT(1),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (inst_id, user_id),
	CHECK (rating > 0 AND rating < 6),
	FOREIGN KEY (user_id) REFERENCES User(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
)
