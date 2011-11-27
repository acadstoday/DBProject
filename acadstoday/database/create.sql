/*
Saurabh Bhola's Code from Here
*/

/*
DROP TABLE Department;
DROP TABLE Program;
DROP TABLE Course;
DROP TABLE Instructor;
DROP TABLE Teaches;
DROP TABLE User1;
DROP TABLE Takes;
DROP TABLE Project;
DROP TABLE Project_Guide;
DROP TABLE Prereq;

*/


CREATE TABLE Department
(
	dept_name VARCHAR(50),
	dept_info LONGTEXT,
	PRIMARY KEY (dept_name)
);

CREATE TABLE Program
(
	prog_name VARCHAR(15),
	prom_info LONGTEXT,
	PRIMARY KEY (prog_name),
	CHECK (prog_name IN ('B.Tech', 'M.Tech', 'Dual Degree', 'PhD', 'M.Sc.', 'M.Phil', 'Other'))
);

CREATE TABLE Course
(
	course_id VARCHAR(10), 
	course_name VARCHAR(25) NOT NULL,
	course_info LONGTEXT,
	dept_name VARCHAR(50),
	PRIMARY KEY (course_id),
	FOREIGN KEY (dept_name) REFERENCES Department(dept_name)
		ON DELETE SET NULL
);

CREATE TABLE Instructor
(
	inst_id CHAR(5), 
	inst_name VARCHAR(25) NOT NULL,
	inst_info LONGTEXT,
	dept_name VARCHAR(50), 
	PRIMARY KEY (inst_id),
	FOREIGN KEY (dept_name) REFERENCES Department(dept_name)
		ON DELETE SET NULL
);

CREATE TABLE Teaches
(
	inst_id CHAR(5),
	course_id VARCHAR(10),
	semester VARCHAR(10),
	year INT(4) NOT NULL,
	PRIMARY KEY (inst_id, course_id),
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE,
	CHECK (semester IN ('Autumn', 'Spring'))
);

CREATE TABLE User
(
	user_id VARCHAR(15), 
	user_name VARCHAR(20) NOT NULL, 
	password VARCHAR(15),
	dept_name VARCHAR(50),
	prog_name VARCHAR(20),
	gender VARCHAR(8),
	dob_date INT(2),
	dob_month INT(2),
	dob_year INT(4),
	user_info LONGTEXT,
	profile_pic LONGTEXT,
	PRIMARY KEY (user_id),
	FOREIGN KEY (dept_name) REFERENCES Department(dept_name)
		ON DELETE SET NULL,
	FOREIGN KEY (prog_name) REFERENCES Program(prog_name)
		ON DELETE SET NULL,
	CHECK (LENGTH(password) > 5),
	CHECK (dob_date > 0 AND dob_date < 32),
	CHECK (dob_month > 0 AND dob_month < 13),
	CHECK (gender IN ('Male', 'Female', 'Other'))
);

CREATE TABLE Takes
(
	user_id VARCHAR(15), 
	course_id VARCHAR(10),
	semester VARCHAR(10),
	year INT(4) NOT NULL ,
	PRIMARY KEY (user_id, course_id),
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE CASCADE,
	CHECK (semester IN ('Spring', 'Autumn'))
);

CREATE TABLE Project
(
	project_id CHAR(5),
	topic VARCHAR(100),
	project_info LONGTEXT,
	start_date INT(2),
	start_month INT(2),
	start_year INT(4),
	end_date INT(2),
	end_month INT(2),
	end_year INT(4),
	PRIMARY KEY (project_id),
	CHECK (start_date > 0 AND start_date < 32),
	CHECK (start_month > 0 AND start_month < 13),
	CHECK (end_date > 0 AND end_date < 32),
	CHECK (end_month > 0 AND end_month < 13)
);

CREATE TABLE Project_Guide
(
	project_id CHAR(5),
	user_id VARCHAR(15),
	inst_id CHAR(5),
	course_id VARCHAR(10),
	PRIMARY KEY (project_id, user_id, inst_id),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE SET NULL,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE SET NULL,
	FOREIGN KEY (project_id) REFERENCES Project(project_id)
		ON DELETE CASCADE
);

CREATE TABLE Prereq
(
	course_id VARCHAR(10), 
	prereq_id VARCHAR(10),
	PRIMARY KEY (course_id, prereq_id),
	FOREIGN KEY (course_id, prereq_id) REFERENCES Course(course_id, course_id)
		ON DELETE CASCADE
);



/*
Shikhar Paliwal Code from here
*/

/*
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

CREATE TABLE Upload
(
	upload_id VARCHAR(15),
	format VARCHAR(10),
	type VARCHAR(15),
	time_stamp TIMESTAMP(10),
	tot_downloads INT(10),
	link LONGTEXT NOT NULL,
	PRIMARY KEY (upload_id),
	CHECK (format IN ('ppt', 'pdf', 'doc', 'jpg', 'other')),
	CHECK (type IN ('notes', 'lectures', 'ebook', 'exam-paper', 'research-paper', 'assignment', 'other'))
);

CREATE TABLE Uploader
(
	upload_id VARCHAR(15),
	user_id VARCHAR(15),
	course_id VARCHAR(10),
	FOREIGN KEY (upload_id) REFERENCES Upload(upload_id)
		ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE News
(
	news_id CHAR(5),
	user_id VARCHAR(15),
	news LONGTEXT NOT NULL,
	tags LONGTEXT,
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (news_id),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE SET NULL
);

CREATE TABLE User_Follow
(
	user_id VARCHAR(15),
	followed_id VARCHAR(15),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (user_id, followed_id),
	FOREIGN KEY (user_id, followed_id) REFERENCES User1(user_id, user_id)
		ON DELETE CASCADE
);

CREATE TABLE Instr_Follow
(
	user_id VARCHAR(15),
	inst_id CHAR(5),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (user_id, inst_id),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
);

CREATE TABLE Course_Follow
(
	user_id VARCHAR(15),
	course_id VARCHAR(10),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (user_id, course_id),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE Instr_Comments
(
	inst_id CHAR(5),
	user_id VARCHAR(15),
	comment LONGTEXT NOT NULL,
	time_stamp TIMESTAMP(10),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
);

CREATE TABLE Course_Comments
(
	course_id VARCHAR(10),
	user_id VARCHAR(15),
	comment LONGTEXT NOT NULL,
	time_stamp TIMESTAMP(10),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE Upload_Comments
(
	upload_id VARCHAR(15),
	user_id VARCHAR(15),
	comment LONGTEXT NOT NULL,
	time_stamp TIMESTAMP(10),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE CASCADE,
	FOREIGN KEY (upload_id) REFERENCES Upload(upload_id)
		ON DELETE CASCADE
);

CREATE TABLE Upload_Rating
(
	upload_id VARCHAR(15),
	user_id VARCHAR(15),
	rating INT(1),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (upload_id, user_id),
	CHECK (rating > 0 AND rating < 6),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (upload_id) REFERENCES Upload(upload_id)
		ON DELETE CASCADE
);

CREATE TABLE Course_Rating
(
	course_id VARCHAR(10),
	user_id VARCHAR(15),
	rating INT(1),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (course_id, user_id),
	CHECK (rating > 0 AND rating < 6),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (course_id) REFERENCES Course(course_id)
		ON DELETE CASCADE
);

CREATE TABLE Instr_Rating
(
	inst_id CHAR(5),
	user_id VARCHAR(15),
	rating INT(1),
	time_stamp TIMESTAMP(10),
	PRIMARY KEY (inst_id, user_id),
	CHECK (rating > 0 AND rating < 6),
	FOREIGN KEY (user_id) REFERENCES User1(user_id)
		ON DELETE SET NULL,
	FOREIGN KEY (inst_id) REFERENCES Instructor(inst_id)
		ON DELETE CASCADE
)
