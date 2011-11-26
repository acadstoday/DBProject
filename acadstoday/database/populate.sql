/*
Saurabh Bhola's code from here
*/

DELETE FROM Department;
DELETE FROM Course;
DELETE FROM Instructor;
DELETE FROM Teaches;
DELETE FROM User1;
DELETE FROM Project;
DELETE FROM Prereq;

DELETE FROM Takes;
DELETE FROM Program;
DELETE FROM Project_Guide;


INSERT INTO Department VALUES ('Comp. Sci.', 'info');
INSERT INTO Department VALUES ('Electrical', 'info');
INSERT INTO Department VALUES ('Mechanical', 'info');
INSERT INTO Department VALUES ('Chemical', 'info');
INSERT INTO Department VALUES ('Finance', 'info');

INSERT INTO Program VALUES ('B.Tech', 'info');
INSERT INTO Program VALUES ('M.Tech', 'info');
INSERT INTO Program VALUES ('PhD', 'info');
INSERT INTO Program VALUES ('M.Phil', 'info');

INSERT INTO Course VALUES ('CS-101', 'Computer Programming', 'info', 'Comp. Sci.');
INSERT INTO Course VALUES ('CS-213', 'Data Structures', 'info', 'Comp. Sci.');
INSERT INTO Course VALUES ('CS-317', 'Database Management', 'info', 'Comp. Sci.');
INSERT INTO Course VALUES ('CS-347', 'Operating Systems', 'info', 'Comp. Sci.');
INSERT INTO Course VALUES ('EE-101', 'Intro.Electrical Circuits', 'info', 'Electrical');
INSERT INTO Course VALUES ('EE-152', 'Advanced Circuit Design', 'info', 'Electrical');
INSERT INTO Course VALUES ('EE-225', 'Signals and Systems', 'info', 'Electrical');
INSERT INTO Course VALUES ('ME-101', 'Engineering Drawing', 'info', 'Mechanical');
INSERT INTO Course VALUES ('ME-207', 'Solid Mechanics', 'info', 'Mechanical');
INSERT INTO Course VALUES ('ME-288', 'Fluid Mechanics', 'info', 'Mechanical');
INSERT INTO Course VALUES ('ME-344', 'Automobile Engineering', 'info', 'Mechanical');
INSERT INTO Course VALUES ('CH-101', 'Chemical Processes', 'info', 'Chemical');
INSERT INTO Course VALUES ('CH-241', 'Organic Processes', 'info', 'Chemical');
INSERT INTO Course VALUES ('CH-296', 'Biochemistry', 'info', 'Chemical');
INSERT INTO Course VALUES ('CH-357', 'Quantitative Chemistry', 'info', 'Chemical');
INSERT INTO Course VALUES ('FI-102', 'Probability Theory', 'info', 'Finance');
INSERT INTO Course VALUES ('FI-201', 'Statistical Inference', 'info', 'Finance');
INSERT INTO Course VALUES ('FI-282', 'Derivative Pricing', 'info', 'Finance');
INSERT INTO Course VALUES ('FI-307', 'Stochastic Processes', 'info', 'Finance');

INSERT INTO Instructor VALUES ('12121', 'Bhaskar', 'info', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('33456', 'Prabhu', 'info', 'Electrical');
INSERT INTO Instructor VALUES ('45565', 'Kishore', 'info', 'Mechanical');
INSERT INTO Instructor VALUES ('48583', 'Prabhu', 'info', 'Chemical');
INSERT INTO Instructor VALUES ('52343', 'Dhananjay', 'info', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('56543', 'Chatterjee', 'info', 'Finance');
INSERT INTO Instructor VALUES ('66766', 'Preeti', 'info', 'Electrical');
INSERT INTO Instructor VALUES ('73821', 'Kulkarni', 'info', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('78345', 'Haripriya', 'info', 'Electrical');
INSERT INTO Instructor VALUES ('78583', 'George', 'info', 'Chemical');
INSERT INTO Instructor VALUES ('86543', 'Ravinder', 'info', 'Finance');
INSERT INTO Instructor VALUES ('86651', 'Deepak', 'info', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('86766', 'Manoj', 'info', 'Mechanical');
INSERT INTO Instructor VALUES ('93821', 'Anand', 'info', 'Chemical');
INSERT INTO Instructor VALUES ('94222', 'Sudarshan', 'info', 'Comp. Sci.');
INSERT INTO Instructor VALUES ('98345', 'Deshpande', 'info', 'Finance');

INSERT INTO Teaches VALUES ('12121', 'CS-101', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('33456', 'EE-101', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('33456', 'EE-152', 'Spring', 2009);
INSERT INTO Teaches VALUES ('45565', 'ME-101', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('45565', 'ME-207', 'Spring', 2009);
INSERT INTO Teaches VALUES ('52343', 'CS-213', 'Spring', 2009);
INSERT INTO Teaches VALUES ('52343', 'CS-317', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('56543', 'FI-201', 'Spring', 2010);
INSERT INTO Teaches VALUES ('56543', 'FI-307', 'Autumn', 2010);
INSERT INTO Teaches VALUES ('66766', 'EE-225', 'Spring', 2010);
INSERT INTO Teaches VALUES ('66766', 'EE-152', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('73821', 'CS-213', 'Autumn', 2010);
INSERT INTO Teaches VALUES ('78583', 'CH-101', 'Spring', 2010);
INSERT INTO Teaches VALUES ('78583', 'CH-241', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('86543', 'FI-307', 'Spring', 2009);
INSERT INTO Teaches VALUES ('86766', 'ME-288', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('86766', 'ME-344', 'Spring', 2009);
INSERT INTO Teaches VALUES ('93821', 'CS-347', 'Autumn', 2009);
INSERT INTO Teaches VALUES ('94222', 'CS-347', 'Spring', 2010);
INSERT INTO Teaches VALUES ('94222', 'CS-101', 'Spring', 2010);
INSERT INTO Teaches VALUES ('98345', 'FI-282', 'Autumn', 2009);

INSERT INTO User1 VALUES ('00128', 'Ravi', '', 'Comp. Sci.', 'B.Tech', 'Male', '31101991', 'info', '');
INSERT INTO User1 VALUES ('12345', 'Suresh', '', 'Comp. Sci.', 'M.Tech', 'Male', '26111991', 'info', '');
INSERT INTO User1 VALUES ('19991', 'Gaurav', '',  'Electrical', 'M.Tech', 'Male', '11091989', 'info', '');
INSERT INTO User1 VALUES ('23121', 'Saurabh', '',  'Finance', 'M.Phil', 'Male', '26081991', 'info', '');
INSERT INTO User1 VALUES ('44553', 'Shikhar', '',  'Chemical', 'M.Phil', 'Male', '07061990', 'info', '');
INSERT INTO User1 VALUES ('45678', 'Ankita', '',  'Chemical', 'B.Tech', 'Female', '04011990', 'info', '');
INSERT INTO User1 VALUES ('54321', 'Ashish', '',  'Comp. Sci.', 'B.Tech', 'Male', '22061987', 'info', '');
INSERT INTO User1 VALUES ('55739', 'Sanjana', '', 'Mechanical', 'B.Tech', 'Female', '29081988', 'info', '');
INSERT INTO User1 VALUES ('70557', 'Sonia', '',  'Chemical', 'M.Tech', 'Female', '12041986', 'info', '');
INSERT INTO User1 VALUES ('76543', 'Garima', '',  'Comp. Sci.', 'M.Tech', 'Female', '19111991', 'info', '');
INSERT INTO User1 VALUES ('76653', 'Jai', '',  'Electrical', 'B.Tech', 'Male', '12031987', 'info', '');
INSERT INTO User1 VALUES ('98765', 'Kartik', '', 'Electrical', 'B.Tech', 'Male', '11011991', 'info', '');
INSERT INTO User1 VALUES ('98988', 'Tina', '',  'Mechanical', 'M.Phil', 'Female', '21051992', 'info', '');

INSERT INTO Takes VALUES ('98998', 'CS-213', 'Autumn', 2009);
INSERT INTO Takes VALUES ('98998', 'CS-347', 'Spring', 2009);
INSERT INTO Takes VALUES ('98998', 'EE-252', 'Spring', 2009);
INSERT INTO Takes VALUES ('70557', 'CS-213', 'Autumn', 2009);
INSERT INTO Takes VALUES ('70557', 'CS-347', 'Spring', 2010);
INSERT INTO Takes VALUES ('54321', 'CS-101', 'Spring', 2009);
INSERT INTO Takes VALUES ('54321', 'CS-213', 'Autumn', 2010);
INSERT INTO Takes VALUES ('54321', 'EE-252', 'Spring', 2010);
INSERT INTO Takes VALUES ('98765', 'CS-213', 'Autumn', 2010);
INSERT INTO Takes VALUES ('98765', 'EE-252', 'Spring', 2010);
INSERT INTO Takes VALUES ('98765', 'ME-288', 'Autumn', 2010);
INSERT INTO Takes VALUES ('76543', 'CS-213', 'Spring', 2010);
INSERT INTO Takes VALUES ('76543', 'CS-101', 'Autumn', 2009);

INSERT INTO Project VALUES ('00565', 'Encryption', 'info', '01082009', '01122009' );
INSERT INTO Project VALUES ('12101', 'Semiconductor Performance', 'info', '01112010', '15032010');
INSERT INTO Project VALUES ('23437', 'Statistical Modelling', 'info', '22072009', '22122009');
INSERT INTO Project VALUES ('43222', 'Characterstics of Solid Materials', 'info', '26082010', '26092010');
INSERT INTO Project VALUES ('45822', 'Organic Matter', 'info', '06012010', '05042010');
INSERT INTO Project VALUES ('76515', 'Robots', 'info', '03022009', '01042010');
INSERT INTO Project VALUES ('79345', 'Database of a University', 'info', '01042010', '01072010');
INSERT INTO Project VALUES ('92385', 'Automobile Performance', 'info', '11092009', '20122009');
INSERT INTO Project VALUES ('98966', 'Stochastic Processes in Everyday Life', 'info', '07032010', '01062010');

INSERT INTO Project_Guide VALUES ('00565', '54321', '52343', 'CS-347');
INSERT INTO Project_Guide VALUES ('98966', '76543', '12121', 'CS-101');
INSERT INTO Project_Guide VALUES ('79345', '54321', '73821', 'CS-213');
INSERT INTO Project_Guide VALUES ('43222', '98765', '86766', 'ME-288');
INSERT INTO Project_Guide VALUES ('92385', '98998', '66766', 'EE-252');

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



/*
Shikhar Paliwal's Code from here
*/

DELETE FROM Upload;
DELETE FROM Uploader;
DELETE FROM News;
DELETE FROM User_Follow;
DELETE FROM Instr_Follow;
DELETE FROM Course_Follow;
DELETE FROM Instr_Comments;
DELETE FROM Course_Comments;
DELETE FROM Upload_Comments;
DELETE FROM Instr_Rating;
DELETE FROM Course_Rating;
DELETE FROM Upload_Rating;



INSERT INTO Uploader VALUES ('aa101','00128','CS-101');
INSERT INTO Uploader VALUES ('aa121','12345','CS-317');
INSERT INTO Uploader VALUES ('aa255','00128','EE-101');
INSERT INTO Uploader VALUES ('ab115','44553','EE-225');
INSERT INTO Uploader VALUES ('bf556','44553','ME-101');
INSERT INTO Uploader VALUES ('bt559','00128','ME-207');
INSERT INTO Uploader VALUES ('de102','19991','ME-207');
INSERT INTO Uploader VALUES ('de159','45678','CH-101');
INSERT INTO Uploader VALUES ('dy123','54321','CS-101');
INSERT INTO Uploader VALUES ('gr555','55739','CS-317');
INSERT INTO Uploader VALUES ('gt131','12345','CS-213');
INSERT INTO Uploader VALUES ('sr777','70557','CS-213');
INSERT INTO Uploader VALUES ('st220','23121','CH-357');
INSERT INTO Uploader VALUES ('xy136','23121','FI-201');
INSERT INTO Uploader VALUES ('zz442','98765','FI-307');

INSERT INTO Upload VALUES ('aa101','ppt','lectures','10102011','23','www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload VALUES ('aa121','doc','notes','20112009','45','www.cse.iitb.ac.in/~lucky');
INSERT INTO Upload VALUES ('aa255','pdf','ebook','01122008','59','www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload VALUES ('ab115','pdf','research-paper','06052010','9','www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload VALUES ('bf556','doc','notes','12062009','75','www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload VALUES ('bt559','jpg','exam-paper','15122007','83','www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload VALUES ('de102','jpg','assignment','20072009','76','www.cse.iitb.ac.in/~lucky');
INSERT INTO Upload VALUES ('de159','doc','other','22122009','44','www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload VALUES ('dy123','doc','assignment','16052010','60','www.cse.iitb.ac.in/~shikhar');
INSERT INTO Upload VALUES ('gr555','pdf','ebook','30042011','33','www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload VALUES ('gt131','jpg','other','26032008','72','www.cse.iitb.ac.in/~lucky');
INSERT INTO Upload VALUES ('sr777','pdf','exam-paper','69','20102010','www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload VALUES ('st220','ppt','other','30092010','84','www.cse.iitb.ac.in/~ashishtajane');
INSERT INTO Upload VALUES ('xy136','pdf','assignment','19112011','103','www.cse.iitb.ac.in/~saurabhb');
INSERT INTO Upload VALUES ('zz442','doc','exam-paper','12122008','157','www.cse.iitb.ac.in/~lucky');

INSERT INTO News VALUES ('aa001','00128','Today,the lecture was interesting','CS-101,Bhaskar','01092010');
INSERT INTO News VALUES ('aa002','12345','Shikhar was caught sleeping','EE-101,Shikhar,kamchor','02112008');
INSERT INTO News VALUES ('aa003','19991','You are stud','Ashish,Gaurav,Saurabh','03122009');
INSERT INTO News VALUES ('aa004','23121','This sem is long','Autumn','05052008');
INSERT INTO News VALUES ('aa005','44553','Going to be awesome','Mood,Indigo','12032011');
INSERT INTO News VALUES ('aa006','44553','She is beautiful','Sonia,Tina','15062008');
INSERT INTO News VALUES ('aa007','54321','Course is great','Sudarshan,database','19022009');
INSERT INTO News VALUES ('aa008','76653','Is reading blog..','Ashish','23042010');
INSERT INTO News VALUES ('aa009','98765','Ghar pe shaadi hai','Saurabh','25012011');
INSERT INTO News VALUES ('aa010','98988','Machana hai','Gaurav','30112009');

INSERT INTO User_Follow VALUES ('00128','70557');
INSERT INTO User_Follow VALUES ('19991','44553');
INSERT INTO User_Follow VALUES ('00128','76543');
INSERT INTO User_Follow VALUES ('70557','19991');
INSERT INTO User_Follow VALUES ('98765','00128');
INSERT INTO User_Follow VALUES ('44553','98988');
INSERT INTO User_Follow VALUES ('44553','45678');
INSERT INTO User_Follow VALUES ('19991','98765');
INSERT INTO User_Follow VALUES ('76543','19991');

INSERT INTO Instr_Follow VALUES ('00128','12121');
INSERT INTO Instr_Follow VALUES ('12345','33456');
INSERT INTO Instr_Follow VALUES ('19991','78345');
INSERT INTO Instr_Follow VALUES ('54321','52343');
INSERT INTO Instr_Follow VALUES ('44553','12121');
INSERT INTO Instr_Follow VALUES ('76653','52343');
INSERT INTO Instr_Follow VALUES ('76543','33456');
INSERT INTO Instr_Follow VALUES ('55739','94222');
INSERT INTO Instr_Follow VALUES ('98765','94222');
INSERT INTO Instr_Follow VALUES ('98988','98345');

INSERT INTO Course_Follow VALUES ('19991','CS-101');
INSERT INTO Course_Follow VALUES ('23121','CS-213');
INSERT INTO Course_Follow VALUES ('44553','CS-101');
INSERT INTO Course_Follow VALUES ('44553','EE-225');
INSERT INTO Course_Follow VALUES ('54321','CS-213');
INSERT INTO Course_Follow VALUES ('54321','EE-225');
INSERT INTO Course_Follow VALUES ('70557','CH-241');
INSERT INTO Course_Follow VALUES ('98765','FI-102');
INSERT INTO Course_Follow VALUES ('98988','FI-282');
INSERT INTO Course_Follow VALUES ('98988','FI-307');

INSERT INTO Instr_Comments VALUES ('12121','00128','Nice','20102008');
INSERT INTO Instr_Comments VALUES ('12121','12345','Very helpful','19112009');
INSERT INTO Instr_Comments VALUES ('12121','19991','Awesome','13052008');
INSERT INTO Instr_Comments VALUES ('33456','23121','Fantastic !! Great ','23042011');
INSERT INTO Instr_Comments VALUES ('33456','00128','You get huge amount of knowledge','20042009');
INSERT INTO Instr_Comments VALUES ('45565','23121','Best in the world','16082007');
INSERT INTO Instr_Comments VALUES ('48583','19991','Too Bad','10062010');
INSERT INTO Instr_Comments VALUES ('48583','98765','Not at all helpful','23092011');
INSERT INTO Instr_Comments VALUES ('48583','54321','Not Bad','12122010');
INSERT INTO Instr_Comments VALUES ('52343','45678','Hmmmmm','13022011');
INSERT INTO Instr_Comments VALUES ('56543','12345','lol','15042008');
INSERT INTO Instr_Comments VALUES ('56543','00128','What?','05062009');
INSERT INTO Instr_Comments VALUES ('66766','23121','Really?','06112010');
INSERT INTO Instr_Comments VALUES ('73821','55739','Hi','13052010');
INSERT INTO Instr_Comments VALUES ('78345','70557','rofl','19072009');
INSERT INTO Instr_Comments VALUES ('78583','44553','I am starting to hate','30062010');
INSERT INTO Instr_Comments VALUES ('86543','76543','I am sleeping','28022008');
INSERT INTO Instr_Comments VALUES ('86543','00128','Hello','14032009');
INSERT INTO Instr_Comments VALUES ('86651','76653','Can make you sleep','20112010');
INSERT INTO Instr_Comments VALUES ('86651','45678','Great','23042009');
INSERT INTO Instr_Comments VALUES ('86766','44553','Really good','15062007');
INSERT INTO Instr_Comments VALUES ('93821','12345','Excellent','04012008');
INSERT INTO Instr_Comments VALUES ('98345','98988','Very Good','31012009');

INSERT INTO Course_Comments VALUES ('CS-101','00128','Nice','20102008');
INSERT INTO Course_Comments VALUES ('CS-101','12345','Very helpful','19112009');
INSERT INTO Course_Comments VALUES ('CS-101','19991','Awesome','13052008');
INSERT INTO Course_Comments VALUES ('CS-213','23121','Fantastic !! Great ','23042011');
INSERT INTO Course_Comments VALUES ('CS-213','00128','You get huge amount of knowledge','20042009');
INSERT INTO Course_Comments VALUES ('CS-317','23121','Best in the world','16082007');
INSERT INTO Course_Comments VALUES ('CS-347','19991','Too Bad','10062010');
INSERT INTO Course_Comments VALUES ('CS-347','98765','Not at all helpful','23092011');
INSERT INTO Course_Comments VALUES ('EE-101','54321','Not Bad','12122010');
INSERT INTO Course_Comments VALUES ('EE-152','45678','Hmmmmm','13022011');
INSERT INTO Course_Comments VALUES ('EE-225','12345','lol','15042008');
INSERT INTO Course_Comments VALUES ('ME-101','00128','What?','05062009');
INSERT INTO Course_Comments VALUES ('ME-207','23121','Really?','06112010');
INSERT INTO Course_Comments VALUES ('ME-288','55739','Hi','13052010');
INSERT INTO Course_Comments VALUES ('ME-344','70557','rofl','19072009');
INSERT INTO Course_Comments VALUES ('CH-101','44553','I am starting to hate','30062010');
INSERT INTO Course_Comments VALUES ('CH-241','76543','I am sleeping','28022008');
INSERT INTO Course_Comments VALUES ('CH-296','00128','Hello','14032009');
INSERT INTO Course_Comments VALUES ('CH-357','76653','Can make you sleep','20112010');
INSERT INTO Course_Comments VALUES ('FI-102','45678','Great','23042009');
INSERT INTO Course_Comments VALUES ('FI-201','44553','Really good','15062007');
INSERT INTO Course_Comments VALUES ('FI-282','12345','Excellent','04012008');
INSERT INTO Course_Comments VALUES ('FI-307','98988','Very Good','31012009');

INSERT INTO Upload_Comments VALUES ('aa101','00128','Nice','20102008');
INSERT INTO Upload_Comments VALUES ('aa121','12345','Very helpful','19112009');
INSERT INTO Upload_Comments VALUES ('aa121','19991','Awesome','13052008');
INSERT INTO Upload_Comments VALUES ('aa121','23121','Fantastic !! Great ','23042011');
INSERT INTO Upload_Comments VALUES ('ab115','00128','You get huge amount of knowledge','20042009');
INSERT INTO Upload_Comments VALUES ('bf556','23121','Best in the world','16082007');
INSERT INTO Upload_Comments VALUES ('bt559','19991','Too Bad','10062010');
INSERT INTO Upload_Comments VALUES ('gr555','98765','Not at all helpful','23092011');
INSERT INTO Upload_Comments VALUES ('gt131','54321','Not Bad','12122010');
INSERT INTO Upload_Comments VALUES ('sr777','45678','Hmmmmm','13022011');
INSERT INTO Upload_Comments VALUES ('sr777','12345','lol','15042008');
INSERT INTO Upload_Comments VALUES ('st220','00128','What?','05062009');
INSERT INTO Upload_Comments VALUES ('xy136','23121','Really?','06112010');
INSERT INTO Upload_Comments VALUES ('xy136','55739','Hi','13052010');
INSERT INTO Upload_Comments VALUES ('zz442','70557','rofl','19072009');

INSERT INTO Instr_Rating VALUES ('12121','00128','2');
INSERT INTO Instr_Rating VALUES ('12121','44553','4');
INSERT INTO Instr_Rating VALUES ('12121','23121','5');
INSERT INTO Instr_Rating VALUES ('33456','19991','2');
INSERT INTO Instr_Rating VALUES ('33456','44553','4');
INSERT INTO Instr_Rating VALUES ('48583','98765','3');
INSERT INTO Instr_Rating VALUES ('48583','98988','1');
INSERT INTO Instr_Rating VALUES ('48583','00128','3');
INSERT INTO Instr_Rating VALUES ('66766','23121','1');
INSERT INTO Instr_Rating VALUES ('66766','55739','2');
INSERT INTO Instr_Rating VALUES ('78583','23121','5');
INSERT INTO Instr_Rating VALUES ('78583','00128','4');
INSERT INTO Instr_Rating VALUES ('86543','98988','5');
INSERT INTO Instr_Rating VALUES ('86543','19991','3');
INSERT INTO Instr_Rating VALUES ('86766','98765','5');
INSERT INTO Instr_Rating VALUES ('86766','12345','3');
INSERT INTO Instr_Rating VALUES ('93821','44553','2');
INSERT INTO Instr_Rating VALUES ('94222','98988','5');
INSERT INTO Instr_Rating VALUES ('94222','98765','4');
INSERT INTO Instr_Rating VALUES ('98345','19991','3');

INSERT INTO Course_Rating VALUES ('CS-101','00128','2');
INSERT INTO Course_Rating VALUES ('CS-101','44553','4');
INSERT INTO Course_Rating VALUES ('CS-101','23121','5');
INSERT INTO Course_Rating VALUES ('CS-213','19991','2');
INSERT INTO Course_Rating VALUES ('CS-317','44553','4');
INSERT INTO Course_Rating VALUES ('CS-317','98765','3');
INSERT INTO Course_Rating VALUES ('CS-347','98988','1');
INSERT INTO Course_Rating VALUES ('CS-347','00128','3');
INSERT INTO Course_Rating VALUES ('EE-101','23121','1');
INSERT INTO Course_Rating VALUES ('EE-101','55739','2');
INSERT INTO Course_Rating VALUES ('EE-152','23121','5');
INSERT INTO Course_Rating VALUES ('EE-225','00128','4');
INSERT INTO Course_Rating VALUES ('ME-101','98988','5');
INSERT INTO Course_Rating VALUES ('ME-207','19991','3');
INSERT INTO Course_Rating VALUES ('ME-207','98765','5');
INSERT INTO Course_Rating VALUES ('ME-207','12345','3');
INSERT INTO Course_Rating VALUES ('CH-101','44553','2');
INSERT INTO Course_Rating VALUES ('CH-241','98988','1');
INSERT INTO Course_Rating VALUES ('CH-296','98765','4');
INSERT INTO Course_Rating VALUES ('FI-102','19991','3');

INSERT INTO Upload_Rating VALUES ('aa101','00128','2');
INSERT INTO Upload_Rating VALUES ('aa101','44553','4');
INSERT INTO Upload_Rating VALUES ('aa121','23121','5');
INSERT INTO Upload_Rating VALUES ('aa255','19991','2');
INSERT INTO Upload_Rating VALUES ('ab115','44553','4');
INSERT INTO Upload_Rating VALUES ('bf556','98765','3');
INSERT INTO Upload_Rating VALUES ('bf556','98988','1');
INSERT INTO Upload_Rating VALUES ('bt559','00128','3');
INSERT INTO Upload_Rating VALUES ('bt559','23121','1');
INSERT INTO Upload_Rating VALUES ('de159','55739','2');
INSERT INTO Upload_Rating VALUES ('de159','23121','5');
INSERT INTO Upload_Rating VALUES ('dy123','00128','4');
INSERT INTO Upload_Rating VALUES ('sr777','98988','5');
INSERT INTO Upload_Rating VALUES ('sr777','19991','3');
INSERT INTO Upload_Rating VALUES ('sr777','98765','5');
INSERT INTO Upload_Rating VALUES ('st220','12345','3');
INSERT INTO Upload_Rating VALUES ('xy136','44553','2');
INSERT INTO Upload_Rating VALUES ('xy136','98988','1');
INSERT INTO Upload_Rating VALUES ('zz442','98765','4');
INSERT INTO Upload_Rating VALUES ('zz442','19991','3');
