DELETE FROM Department;
DELETE FROM Course;
DELETE FROM Instructor;
DELETE FROM Teaches;
DELETE FROM User;
DELETE FROM Project;
DELETE FROM Prereq;
DELETE FROM Takes;
DELETE FROM Program;
DELETE FROM Upload;
DELETE FROM News;
DELETE FROM Tags;
DELETE FROM User_Follow;
DELETE FROM Instr_Follow;
DELETE FROM Course_Follow;
DELETE FROM Instr_Comments;
DELETE FROM Course_Comments;
DELETE FROM Upload_Comments;
DELETE FROM Instr_Rating;
DELETE FROM Course_Rating;
DELETE FROM Upload_Rating;




INSERT INTO Department VALUES ('Comp. Sci.', 'info');
INSERT INTO Department VALUES ('Electrical', 'info');
INSERT INTO Department VALUES ('Mechanical', 'info');
INSERT INTO Department VALUES ('Chemical', 'info');
INSERT INTO Department VALUES ('Finance', 'info');

INSERT INTO Program VALUES ('B.Tech', 'info');
INSERT INTO Program VALUES ('M.Tech', 'info');
INSERT INTO Program VALUES ('PhD', 'info');
INSERT INTO Program VALUES ('M.Phil', 'info');

INSERT INTO Course VALUES ('CS-101', 'Computer Programming', 'This is a course on basic programming in C++.', 'Comp. Sci.');
INSERT INTO Course VALUES ('CS-213', 'Data Structures', 'Come and explore how to use different data structures for optimising a given task', 'Comp. Sci.');
INSERT INTO Course VALUES ('CS-317', 'Database Management', 'This is a heavy course dealing with MySQL, JavaScript, Query Processing and Transactions.', 'Comp. Sci.');
INSERT INTO Course VALUES ('CS-347', 'Operating Systems', 'How does your computer performs several tasks at one time? In case of conflict what process to perform first?', 'Comp. Sci.');
INSERT INTO Course VALUES ('EE-101', 'Intro.Electrical Circuits', 'This is basic course in Electrical Engineering dealing with Logic Gates and Simple Electrical Circuits.', 'Electrical');
INSERT INTO Course VALUES ('EE-152', 'Advanced Circuit Design', 'This is an advanced course in circuit designing for students of Electrical Engineering Majors.', 'Electrical');
INSERT INTO Course VALUES ('EE-225', 'Signals and Systems', 'The toughest course of all the elctrical course but also the foundation which makes future courses easy.', 'Electrical');
INSERT INTO Course VALUES ('ME-101', 'Engineering Drawing', 'It is unnecessarily put as a load on first year students. talks are going on to remove it from the curriculum.', 'Mechanical');
INSERT INTO Course VALUES ('ME-207', 'Solid Mechanics', 'This is a basic course for students of Mechanical and Civil Engineering Department both.', 'Mechanical');
INSERT INTO Course VALUES ('ME-288', 'Fluid Mechanics', 'Civil Engineering students can take this course for extra knowledge as a part of thir honors.', 'Mechanical');
INSERT INTO Course VALUES ('ME-344', 'Automobile Engineering', 'Come and explore the various facets of Automobile Designing? Ever dreamt of designing an Audi or a Mercedez?', 'Mechanical');
INSERT INTO Course VALUES ('CH-101', 'Chemical Processes', 'This is equivalent to a senior secondary course in Chemistry, just for the revision in first year.', 'Chemical');
INSERT INTO Course VALUES ('CH-241', 'Organic Processes', 'A specialization course for Chemical Engineering M.Tech. Students.', 'Chemical');
INSERT INTO Course VALUES ('CH-296', 'Biochemistry', 'Again a specialization course for dual degree studnets of Chemical Engineering Department.', 'Chemical');
INSERT INTO Course VALUES ('CH-357', 'Quantitative Chemistry', 'An advanced course on Chemical reactions and the Physics behind it.', 'Chemical');
INSERT INTO Course VALUES ('FI-102', 'Probability Theory', 'This is the foundation course for people interested in finacnce sector.', 'Finance');
INSERT INTO Course VALUES ('FI-201', 'Statistical Inference', 'An advanced course that requires high quantitative skills and is the base for future courses in Statistics and Finance.', 'Finance');
INSERT INTO Course VALUES ('FI-282', 'Derivative Pricing', 'A course with a lab along with it. It deals with the Stock Market analysis.', 'Finance');
INSERT INTO Course VALUES ('FI-307', 'Stochastic Processes', 'Again A highly rated course that teaches all the statistical tools required in modern day economics.', 'Finance');

INSERT INTO Instructor VALUES ('12121', 'Bhaskar', 'B.Tech. IIT Kanpur 1984, Ph.D. UCB 1989', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('33456', 'Prabhu', 'B.Tech. IIT Bombay 1987, M.Tech. IIT Kanpur 1992', 'Electrical');
INSERT INTO Instructor VALUES ('45565', 'Kishore', 'B.Tech. MNIT Jaipur 1981, M.Tech. IIT Bombay 1984', 'Mechanical');
INSERT INTO Instructor VALUES ('48583', 'Prabhu', 'B.E. PEC 1986, M.Tech. IIT Delhi 1989', 'Chemical');
INSERT INTO Instructor VALUES ('52343', 'Dhananjay', 'B.S. USC 1982, Ph.D. Stanford University 1988', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('56543', 'Chatterjee', 'B.Tech. IIT Delhi 1996, M.Tech. Kolkata University 1999', 'Finance');
INSERT INTO Instructor VALUES ('66766', 'Preeti', 'B.Tech. IIT Bombay 1998, Ph.D. UCLA 2004', 'Electrical');
INSERT INTO Instructor VALUES ('73821', 'Kulkarni', 'B.E. SVM Karnataka 1987, M.Tech. IIT Bombay 1989', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('78345', 'Haripriya', 'B.Tech. IIT Kharagpur 1984, Ph.D. University of Cambridge 1991', 'Electrical');
INSERT INTO Instructor VALUES ('78583', 'George', 'B.S. UCB 1977, Ph.D. MIT 1985', 'Chemical');
INSERT INTO Instructor VALUES ('86543', 'Ravinder', 'B.Tech. IIT Bombay 1991, Ph.D. Harvard Business School 1993', 'Finance');
INSERT INTO Instructor VALUES ('86651', 'Deepak', 'B.Tech. IIT Madras 1985, Ph.D. IIT Madras 1989', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('86766', 'Manoj', 'B.E. NIT Warangal 1988, M.Tech. IIT Madras 1994', 'Mechanical');
INSERT INTO Instructor VALUES ('93821', 'Anand', 'B.E. NIT Surathkal 1989, M.Tech. IIT Bombay 1991', 'Chemical');
INSERT INTO Instructor VALUES ('94222', 'Sudarshan', 'B.Tech. IIT Bombay 1997, Ph.D. IIT Bombay 2003', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('98345', 'Deshpande', 'B.Sc. Chennai Statistical Institute 1984, M.Sc. ISI 1986', 'Finance');

INSERT INTO Teaches VALUES ('12121', 'CS-101');
INSERT INTO Teaches VALUES ('33456', 'EE-101');
INSERT INTO Teaches VALUES ('33456', 'EE-152');
INSERT INTO Teaches VALUES ('45565', 'ME-101');
INSERT INTO Teaches VALUES ('45565', 'ME-207');
INSERT INTO Teaches VALUES ('52343', 'CS-213');
INSERT INTO Teaches VALUES ('52343', 'CS-317');
INSERT INTO Teaches VALUES ('56543', 'FI-201');
INSERT INTO Teaches VALUES ('56543', 'FI-307');
INSERT INTO Teaches VALUES ('66766', 'EE-225');
INSERT INTO Teaches VALUES ('66766', 'EE-152');
INSERT INTO Teaches VALUES ('73821', 'CS-213');
INSERT INTO Teaches VALUES ('78583', 'CH-101');
INSERT INTO Teaches VALUES ('78583', 'CH-241');
INSERT INTO Teaches VALUES ('86543', 'FI-307');
INSERT INTO Teaches VALUES ('86766', 'ME-288');
INSERT INTO Teaches VALUES ('86766', 'ME-344');
INSERT INTO Teaches VALUES ('93821', 'CS-347');
INSERT INTO Teaches VALUES ('94222', 'CS-347');
INSERT INTO Teaches VALUES ('94222', 'CS-101');
INSERT INTO Teaches VALUES ('98345', 'FI-282');

INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Ravi', 'abc12345', 'Comp. Sci.', 'B.Tech', 'Male', 31, 10, 1991, 'Interested in Music', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Suresh', 'abc12345', 'Comp. Sci.', 'M.Tech', 'Male', 26, 11, 1991, 'National Level Tennis Player', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Gaurav', 'abc12345',  'Electrical', 'M.Tech', 'Male', 11, 09, 1989, 'Interst in Micro-processors', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Saurabh', 'abc12345',  'Finance', 'M.Phil', 'Male', 26, 08, 1991, 'I am an idiot from Kota', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Shikhar', 'abc12345',  'Chemical', 'M.Phil', 'Male', 07, 06, 1990, 'I am Gujju', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Ankita', 'abc12345',  'Chemical', 'B.Tech', 'Female', 04, 01, 1990, 'Hard-working and Intelligent', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Ashish', 'abc12345',  'Comp. Sci.', 'B.Tech', 'Male', 22, 06, 1987, 'Don , Naam hi kafi hai', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Sanjana', 'abc12345', 'Mechanical', 'B.Tech', 'Female', 29, 08, 1988, 'Beauty Queen', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Sonia', 'abc12345',  'Chemical', 'M.Tech', 'Female', 12, 04, 1986, 'I will make my parents proud', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Garima', 'abc12345',  'Comp. Sci.', 'M.Tech', 'Female', 19, 11, 1991, 'I want Audi', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Jai', 'abc12345',  'Electrical', 'B.Tech', 'Male', 12, 03, 1987, 'Jai ho!!!', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Kartik', 'abc12345', 'Electrical', 'B.Tech', 'Male', 11, 01, 1991, 'I am just another guy', 'image.gif');
INSERT INTO User(user_name, password, dept_name, prog_name, gender, dob_date, dob_month, dob_year, user_info, profile_pic) VALUES ('Tina', 'abc12345',  'Mechanical', 'M.Phil', 'Female', 21, 05, 1992, 'I am just another girl', 'image.gif');

INSERT INTO Takes VALUES (2, 'CS-213');
INSERT INTO Takes VALUES (2, 'CS-347');
INSERT INTO Takes VALUES (2, 'EE-252');
INSERT INTO Takes VALUES (9, 'CS-213');
INSERT INTO Takes VALUES (9, 'CS-347');
INSERT INTO Takes VALUES (7, 'CS-101');
INSERT INTO Takes VALUES (7, 'CS-213');
INSERT INTO Takes VALUES (7, 'EE-252');
INSERT INTO Takes VALUES (12, 'CS-213');
INSERT INTO Takes VALUES (12, 'EE-252');
INSERT INTO Takes VALUES (12, 'ME-288');
INSERT INTO Takes VALUES (10, 'CS-213');
INSERT INTO Takes VALUES (10, 'CS-101');


INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (7, '52343', 'CS-347', 'Encryption', 'deals with encryption and security of files on server', 01, 08, 2009, 01, 12, 2009 );
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (5, '66766', 'EE-152', 'Semiconductor Performance', 'being conducted with sposorship of central government', 01, 11, 2010, 15, 03, 2010);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (3, '56543', 'FI-307', 'Statistical Modelling', 'It models todays market structure and its rise and fall', 22, 07, 2009, 22, 12, 2009);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (12, '86766', 'ME-288', 'Characterstics of Solid Materials', 'Start from the basics', 26, 08, 2010, 26, 09, 2010);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (1, '78583', 'CH-241', 'Organic Matter', 'Deals with the organic matter around us and find their utility', 06, 01, 2010, 05, 04, 2010);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (2, '86766', 'ME-344', 'Robots', 'You will not understand unless you join, not sure if you will even after joining', 03, 02, 2009, 01, 04, 2010);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (7, '73821', 'CS-213', 'Database of a University', 'the most stud among all the projects in the institute', 01, 04, 2010, 01, 07, 2010);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (4, '66766', 'EE-225', 'Automobile Performance', 'Deals with the enhancing the performance of automobiles', 11, 09, 2009, 20, 12, 2009);
INSERT INTO Project(user_id, inst_id, course_id, topic, project_info, start_date, start_month, start_year, end_date, end_month, end_year) VALUES (10, '12121', 'CS-101', 'Stochastic Processes in Everyday Life', 'Title explains everything', 07, 03, 2010, 01, 06, 2010);


INSERT INTO Prereq VALUES ('CS-213', 'CS-101');
INSERT INTO Prereq VALUES ('CS-347', 'CS-213');
INSERT INTO Prereq VALUES ('EE-225', 'EE-101');
INSERT INTO Prereq VALUES ('EE-252', 'EE-101');
INSERT INTO Prereq VALUES ('CH-357', 'CH-241');
INSERT INTO Prereq VALUES ('CH-296', 'CH-101');
INSERT INTO Prereq VALUES ('ME-288', 'ME-101');
INSERT INTO Prereq VALUES ('ME-288', 'ME-207');
INSERT INTO Prereq VALUES ('FI-282', 'FI-102');
INSERT INTO Prereq VALUES ('FI-307', 'FI-201');



INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (1, 'CS-347', 'File Systems', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'ppt', 'lectures', 23, 'www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (3, 'CH-101', 'Rahul Varshney Notes', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'doc', 'notes', 45, 'www.cse.iitb.ac.in/~lucky');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (5, 'FI-201', 'Statistical inference by Casella Berger', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'pdf', 'ebook', 59, 'www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (12, 'CS-213', 'Encryption Text Retrieval System', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'pdf', 'research-paper', 9, 'www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (11, 'FI-307', 'Saurabh Bhola Notes', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'doc', 'notes', 75, 'www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (10, 'CS-347', 'CS-347 End-Sem 2009', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'jpg', 'exam-paper', 83, 'www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (1, 'CS-101', 'CS-101 Home Assignment 3', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'jpg', 'assignment', 76, 'www.cse.iitb.ac.in/~lucky');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (1, 'EE-152', 'Proof of Fermats Theorem', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'doc', 'other', 44, 'www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (8, 'EE-101', 'EE-101 Tutorial 9', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'doc', 'assignment', 60, 'www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (5, 'FI-282', 'Economics by Samuelson', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'pdf', 'ebook', 33, 'www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (6, '', 'My US Pics', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'jpg', 'other', 72, 'www.cse.iitb.ac.in/~lucky');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (9, 'FI-201', 'FI-201 Mid-Sem Exam 2003-09', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'pdf', 'exam-paper', 69, 'www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (7, 'CS-317', 'A Tutorial on PHP', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'ppt', 'other', 84, 'www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (4, 'CH-101', 'Solution to HW-4 of CH-101', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'pdf', 'assignment', 103, 'www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload(user_id, course_id, upload_title, upload_info, format, type, tot_downloads, link) VALUES (2, 'EE_225', 'Quiz 1-4 of EE-225', 'This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...This is upload_info...', 'doc', 'exam-paper', 157, 'www.cse.iitb.ac.in/~lucky');

INSERT INTO News(user_id, news ) VALUES (1, 'Today,the lecture was interesting');
INSERT INTO News(user_id, news ) VALUES (2, 'Shikhar was caught sleeping in class today. The professor was very angry with him and the class for being unattentive and has warned giving XX to the people caught sleeping in the class for more than 5 times. He says sleeping in class is as bad as not attemding lectures, even worse, because it takes an extra effort to come to class and then sleep.');
INSERT INTO News(user_id, news ) VALUES (3, 'You are Stud. You are the best. You will make your parents proud. You are the hope of the nation. You are not merely COmputer Science Engineers but the builders of tomorrow.');
INSERT INTO News(user_id, news ) VALUES (4, 'This sem is long. It Started on 22nd July and is going to end on 26th November with no holidays in between.');
INSERT INTO News(user_id, news ) VALUES (5, 'Going to be awesome. It is the largest college festival in Asia, though only people of IITB know how good it is :P. It comes in December and runs for 4 days, but the extravaganza remains all oer the Autumn Semester.');
INSERT INTO News(user_id, news ) VALUES (8, 'Surprise Quiz on next Thursday. Sir said that he will neither write a formal mail regarding this nor he will re-announce in the upcoming classes or lab. The portion for the Quiz is Chapter 6 and Chapter 12. There would surely be a question on Critical Thinking');
INSERT INTO News(user_id, news ) VALUES (5, 'She is beautiful. I think she has the prettiest face in the campus. She is first year student and from CSE Department.');
INSERT INTO News(user_id, news ) VALUES (7, 'Course is great. Prof is Great. We just hope he does peaceful grading, and grants AA to our team for our toil.');
INSERT INTO News(user_id, news ) VALUES (1, 'Is reading blog..Is reading blog..Is reading blog..Is reading blog..Is reading blog..Is reading blog..Is reading blog..Is reading blog..Is reading blog..');
INSERT INTO News(user_id, news ) VALUES (2, 'Ghar pe shaadi hai!! balle balle!! Shaava Shaava!! balle balle!! Shaava Shaava!! balle balle!! Shaava Shaava!! balle balle!! Shaava Shaava!! balle balle!! Shaava Shaava!! balle balle!! Shaava Shaava!! balle balle!! Shaava Shaava!! ');
INSERT INTO News(user_id, news ) VALUES (1, 'Machana hai. Kuch PAna hai, Kuch Kar Dikhana hai. Apne Iraadon ko Manzil Tak Pahunchana hai, Infi Machana Hai!!!');
INSERT INTO News(user_id, news ) VALUES (1, 'Yippie!! long weekend is ahead. I am going to Goa, just hope tha DMD does not have a surprise quiz on the day I am back');
INSERT INTO News(user_id, news ) VALUES (13, 'An Assignment due next Wednesday. An Assignment submission on Monday. Intern Test on Sunday. Another interview on Saturday. A surprise Quiz today and tomorrow. A lab on Friday and Tuesday. Yes, I breathe too whenever I get a chance!!!');
INSERT INTO News(user_id, news ) VALUES (7, 'M.O.D has one free donut on purchase of two tonite. Hurry!!!!!');
INSERT INTO News(user_id, news ) VALUES (5, 'Ban on couples wandering in the campus during unearthly hours. Define unearthly hours. Define couples.');
INSERT INTO News(user_id, news ) VALUES (6, 'Dance Workshop this Sunday. Come in Pair or Single. This is going to be an Awesome Night.');
INSERT INTO News(user_id, news ) VALUES (7, 'Course evaluation forms should be filled by 20th, else you would be fined and called in Dean Office.');
INSERT INTO News(user_id, news ) VALUES (10, 'DND....In Books these days');
INSERT INTO News(user_id, news ) VALUES (12, 'Midsems approaching....');
INSERT INTO News(user_id, news ) VALUES (13, 'Intern at MSIDC. Bangalore!!!! I am Coming!!!! Awesome feeling :)');
INSERT INTO News(user_id, news ) VALUES (11, 'Today,the lecture was YawwwwwwwN');
INSERT INTO News(user_id, news ) VALUES (12, 'H-2 Mess Sucks. Pizza Hut has awesome Offers on weekdays :)');
INSERT INTO News(user_id, news ) VALUES (3, 'The Prestige is a must watch. If you dont see this, better dont see any film.');



INSERT INTO Tags VALUES (1, 'CS-101');
INSERT INTO Tags VALUES (1, 'Bhaskar');
INSERT INTO Tags VALUES (2, 'EE-101');
INSERT INTO Tags VALUES (2, 'Shikhar');
INSERT INTO Tags VALUES (3, 'Ashish');
INSERT INTO Tags VALUES (3, 'Gaurav');
INSERT INTO Tags VALUES (3, 'Saurabh');
INSERT INTO Tags VALUES (3, 'Awesome');
INSERT INTO Tags VALUES (4, 'Autumn');
INSERT INTO Tags VALUES (4, 'Saurabh');
INSERT INTO Tags VALUES (5, 'MI');
INSERT INTO Tags VALUES (5, 'Awesome');
INSERT INTO Tags VALUES (6, 'CS-347');
INSERT INTO Tags VALUES (6, 'DMD');
INSERT INTO Tags VALUES (6, 'Critical_Thinking');
INSERT INTO Tags VALUES (7, 'Sanjana' );
INSERT INTO Tags VALUES (7, 'CSE');
INSERT INTO Tags VALUES (7, 'Awesome');
INSERT INTO Tags VALUES (8, 'Sudarshan');
INSERT INTO Tags VALUES (8, 'Database');
INSERT INTO Tags VALUES (8, 'Saurabh');
INSERT INTO Tags VALUES (8, 'Shikhar');
INSERT INTO Tags VALUES (8, 'Gaurav');
INSERT INTO Tags VALUES (8, 'Ashish');
INSERT INTO Tags VALUES (9, 'Ashish');
INSERT INTO Tags VALUES (10, 'Saurabh');
INSERT INTO Tags VALUES (10, 'Awesome');
INSERT INTO Tags VALUES (11, 'Gaurav');
INSERT INTO Tags VALUES (12, 'Oye!!!Friday!!!');
INSERT INTO Tags VALUES (12, 'Saurabh');
INSERT INTO Tags VALUES (12, 'DMD');
INSERT INTO Tags VALUES (13, 'Ashish');
INSERT INTO Tags VALUES (13, 'Gaurav');
INSERT INTO Tags VALUES (13, 'Saurabh');
INSERT INTO Tags VALUES (13, 'Shikhar');
INSERT INTO Tags VALUES (13, 'Sudarshan');
INSERT INTO Tags VALUES (13, 'CS-317');
INSERT INTO Tags VALUES (14, 'Shikhar');
INSERT INTO Tags VALUES (14, 'Food');
INSERT INTO Tags VALUES (14, 'Alankar');
INSERT INTO Tags VALUES (14, 'Awesome');
INSERT INTO Tags VALUES (15, 'DOSA');
INSERT INTO Tags VALUES (15, 'are_you_serious?');
INSERT INTO Tags VALUES (15, 'Alankar');
INSERT INTO Tags VALUES (16, 'InSync');
INSERT INTO Tags VALUES (16, 'Ankita');
INSERT INTO Tags VALUES (16, 'Awesome');
INSERT INTO Tags VALUES (17, 'CS-101');
INSERT INTO Tags VALUES (17, 'CS-347');
INSERT INTO Tags VALUES (17, 'CS-317');
INSERT INTO Tags VALUES (18, 'Ashish');
INSERT INTO Tags VALUES (18, 'Mid-Sems');
INSERT INTO Tags VALUES (19, 'Saurabh');
INSERT INTO Tags VALUES (19, 'Shikhar');
INSERT INTO Tags VALUES (19, 'Tina');
INSERT INTO Tags VALUES (19, 'Sonia');
INSERT INTO Tags VALUES (19, 'Mid-Sems');
INSERT INTO Tags VALUES (20, 'Gaurav');
INSERT INTO Tags VALUES (20, 'Ravi');
INSERT INTO Tags VALUES (20, 'Ankita');
INSERT INTO Tags VALUES (20, 'Awesome');
INSERT INTO Tags VALUES (21, 'EE-101');
INSERT INTO Tags VALUES (21, 'Suresh');
INSERT INTO Tags VALUES (21, 'Garima');
INSERT INTO Tags VALUES (21, 'Prabhu');
INSERT INTO Tags VALUES (22, 'Saurabh');
INSERT INTO Tags VALUES (22, 'Food');
INSERT INTO Tags VALUES (22, 'Alankar');
INSERT INTO Tags VALUES (22, 'Awesome');
INSERT INTO Tags VALUES (23, 'Ashish');
INSERT INTO Tags VALUES (23, 'Gaurav');
INSERT INTO Tags VALUES (23, 'Saurabh');
INSERT INTO Tags VALUES (23, 'Shikhar');
INSERT INTO Tags VALUES (23, 'Sudarshan');
INSERT INTO Tags VALUES (23, 'Ankita');
INSERT INTO Tags VALUES (23, 'Tina');
INSERT INTO Tags VALUES (23, 'Awesome');

INSERT INTO User_Follow(user_id, followed_id) VALUES (1, 9);
INSERT INTO User_Follow(user_id, followed_id) VALUES (3, 5);
INSERT INTO User_Follow(user_id, followed_id) VALUES (1, 10);
INSERT INTO User_Follow(user_id, followed_id) VALUES (9, 3);
INSERT INTO User_Follow(user_id, followed_id) VALUES (12, 1);
INSERT INTO User_Follow(user_id, followed_id) VALUES (5, 13);
INSERT INTO User_Follow(user_id, followed_id) VALUES (5, 6);
INSERT INTO User_Follow(user_id, followed_id) VALUES (3, 12);
INSERT INTO User_Follow(user_id, followed_id) VALUES (10, 3);

INSERT INTO Instr_Follow(user_id, inst_id) VALUES (1, '12121');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (2, '33456');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (3, '78345');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (7, '52343');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (5, '12121');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (11, '52343');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (10, '33456');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (8, '94222');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (12, '94222');
INSERT INTO Instr_Follow(user_id, inst_id) VALUES (13, '98345');

INSERT INTO Course_Follow(user_id, course_id) VALUES (3, 'CS-101');
INSERT INTO Course_Follow(user_id, course_id) VALUES (4, 'CS-213');
INSERT INTO Course_Follow(user_id, course_id) VALUES (5, 'CS-101');
INSERT INTO Course_Follow(user_id, course_id) VALUES (5, 'EE-225');
INSERT INTO Course_Follow(user_id, course_id) VALUES (7, 'CS-213');
INSERT INTO Course_Follow(user_id, course_id) VALUES (7, 'EE-225');
INSERT INTO Course_Follow(user_id, course_id) VALUES (9, 'CH-241');
INSERT INTO Course_Follow(user_id, course_id) VALUES (12, 'FI-102');
INSERT INTO Course_Follow(user_id, course_id) VALUES (13, 'FI-282');
INSERT INTO Course_Follow(user_id, course_id) VALUES (13, 'FI-307');

INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('12121', 1, 'Nice');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('12121', 2, 'Very helpful');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('12121', 3, 'Awesome');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('33456', 4, 'Fantastic !! Great ');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('33456', 1, 'You get huge amount of knowledge');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('45565', 4, 'Best in the world');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('48583', 3, 'Too Bad');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('48583', 12, 'Not at all helpful');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('48583', 7, 'Not Bad');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('52343', 6, 'Hmmmmm');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('56543', 2, 'lol');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('56543', 1, 'What?');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('66766', 4, 'Really?');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('73821', 8, 'Hi');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('78345', 9, 'rofl');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('78583', 5, 'I am starting to hate');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('86543', 10, 'I am sleeping');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('86543', 1, 'Hello');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('86651', 11, 'Can make you sleep');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('86651', 6, 'Great');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('86766', 5, 'Really good');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('93821', 2, 'Excellent');
INSERT INTO Instr_Comments(inst_id, user_id, comment) VALUES ('98345', 13, 'Very Good');

INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-101', 1, 'Nice');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-101', 2, 'Very helpful');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-101', 3, 'Awesome');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-213', 4, 'Fantastic !! Great');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-213', 1, 'You get huge amount of knowledge');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-317', 4, 'Best in the world');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-347', 3, 'Too Bad');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CS-347', 12, 'Not at all helpful');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('EE-101', 7, 'Not Bad');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('EE-152', 6, 'Hmmmmm');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('EE-225', 2, 'lol');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('ME-101', 1, 'What?');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('ME-207', 4, 'Really?');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('ME-288', 8, 'Hi');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('ME-344', 9, 'rofl');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CH-101', 5, 'I am starting to hate');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CH-241', 10, 'I am sleeping');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CH-296', 1, 'Hello');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('CH-357', 11, 'Can make you sleep');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('FI-102', 6, 'Great');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('FI-201', 5, 'Really good');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('FI-282', 2, 'Excellent');
INSERT INTO Course_Comments(course_id, user_id, comment) VALUES ('FI-307', 13, 'Very Good');

INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (1, 1, 'Nice');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (2, 2, 'Very helpful');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (2, 3, 'Awesome');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (2, 4, 'Fantastic !! Great ');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (4, 1, 'You get huge amount of knowledge');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (5, 4, 'Best in the world');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (6, 3, 'Too Bad');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (10, 12, 'Not at all helpful');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (11, 7, 'Not Bad');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (12, 6, 'Hmmmmm');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (12, 2, 'lol');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (13, 1, 'What?');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (14, 4, 'Really?');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (14, 8, 'Hi');
INSERT INTO Upload_Comments(upload_id, user_id, comment) VALUES (15, 9, 'rofl');

INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-101', 1, 2);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-101', 5, 4);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-101', 4, 5);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-213', 3, 2);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-317', 5, 4);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-317', 12, 3);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-347', 13, 1);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CS-347', 1, 3);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('EE-101', 4, 1);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('EE-101', 8, 2);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('EE-152', 4, 5);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('EE-225', 1, 4);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('ME-101', 13, 5);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('ME-207', 3, 3);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('ME-207', 12, 5);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('ME-207', 2, 3);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CH-101', 5, 2);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CH-241', 13, 1);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('CH-296', 12, 4);
INSERT INTO Course_Rating(course_id, user_id, rating) VALUES ('FI-102', 3, 3);

INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (1, 1, 2);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (1, 5, 4);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (2, 4, 5);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (3, 3, 2);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (4, 5, 4);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (5, 12, 3);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (5, 13, 1);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (6, 1, 3);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (6, 4, 1);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (8, 8, 2);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (8, 4, 5);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (9, 1, 4);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (12, 13, 5);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (12, 3, 3);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (12, 12, 5);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (13, 2, 3);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (14, 5, 2);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (14, 13, 1);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (15, 12, 4);
INSERT INTO Upload_Rating(upload_id, user_id, rating) VALUES (15, 3, 3);

INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('12121', 1, 2);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('12121', 5, 4);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('12121', 4, 5);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('33456', 3, 2);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('33456', 5, 4);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('48583', 12, 3);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('48583', 13, 1);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('48583', 1, 3);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('66766', 4, 1);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('66766', 8, 2);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('78583', 4, 5);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('78583', 1, 4);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('86543', 13, 5);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('86543', 3, 3);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('86766', 12, 5);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('86766', 2, 3);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('93821', 5, 2);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('94222', 12, 4);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('98345', 3, 3);
INSERT INTO Instr_Rating(inst_id, user_id, rating) VALUES ('94222', 13, 5);
