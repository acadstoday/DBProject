#drop table Department;
create table Department
	(dept_name		varchar(50), 
	 primary key (dept_name)
	);
#drop table Course;
create table Course
	(course_id		varchar(10), 
	 course_name		varchar(25) not null, 
	 dept_name		varchar(50),
	 primary key (course_id),
	 foreign key (dept_name) references Department
		on delete set null
	);
#drop table Instructor;
create table Instructor
	(inst_id	        char(5), 
	 inst_name		varchar(25) not null, 
	 dept_name		varchar(50), 
	 primary key (inst_id),
	 foreign key (dept_name) references Department
		on delete set null
	);

#drop table Teaches;
create table Teaches
	(inst_id		char(5), 
	 course_id		varchar(10),
	 semester		varchar(10),
	 year			numeric(4) not null,
	 primary key (inst_id, course_id),
	 foreign key (course_id) references Course,
	 foreign key (inst_id) references Instructor
	);
#drop table User1;
create table User1
	(user_id		varchar(15), 
	 user_name		varchar(20) not null, 
         password               varchar(15) check (length(password) > 5),
	 dept_name		varchar(50),
         gender                 varchar(8),
         dob                    char(10),
	 primary key (user_id),
	 foreign key (dept_name) references Department
		on delete set null
	);
#drop table Takes;
create table Takes
	(user_id		varchar(15), 
	 course_id		varchar(10),
	 semester		varchar(10),
	 year			numeric(4) not null ,
	 primary key (user_id, course_id),
	 foreign key (course_id) references Course,
	 foreign key (user_id) references User1
		on delete cascade
	);
#drop table Project;
create table Project
	(project_id             char(5),
         topic                 varchar(100),
         start_date            char(10),
         end_date              char(10) ,
	 primary key (project_id)
	);
#drop table Project_Guide;
create table Project_Guide
	(project_id             char(5),
         user_id                varchar(15),
         inst_id                char(5),
         course_id              varchar(10),
	 primary key (project_id),
	 foreign key (user_id) references User1,
		on delete set null,
	 foreign key (inst_id) references Instructor
		on delete set null,
         foreign key (course_id) references Course
                on delete set null
	);


#drop table Prereq;
create table Prereq
	(course_id		varchar(10), 
	 prereq_id		varchar(10),
	 primary key (course_id, prereq_id),
	 foreign key (course_id) references Course,
	 foreign key (prereq_id) references Course
	);



