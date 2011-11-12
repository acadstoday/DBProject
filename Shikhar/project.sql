delete from Department;
delete from Course;
delete from Instructor;
delete from Teaches;
delete from User1;
delete from Project;
delete from Prereq;




insert into Department values ('Comp. Sci.');
insert into Department values ('Electrical');
insert into Department values ('Mechanical');
insert into Department values ('Chemical');
insert into Department values ('Finance');




insert into Course values ('CS-101', 'Computer Programming', 'Comp. Sci.');
insert into Course values ('CS-213', 'Data Structures','Comp. Sci.');
insert into Course values ('CS-317', 'Database Management','Comp. Sci.');
insert into Course values ('CS-347', 'Operating Systems','Comp. Sci.');
insert into Course values ('EE-101', 'Intro.Electrical Circuits', 'Electrical');
insert into Course values ('EE-152', 'Advanced Circuit Design','Electrical');
insert into Course values ('EE-225', 'Signals and Systems','Electrical');
insert into Course values ('ME-101', 'Engineering Drawing','Mechanical');
insert into Course values ('ME-207', 'Solid Mechanics','Mechanical');
insert into Course values ('ME-288', 'Fluid Mechanics','Mechanical');
insert into Course values ('ME-344', 'Automobile Engineering', 'Mechanical');
insert into Course values ('CH-101', 'Chemical Processes', 'Chemical');
insert into Course values ('CH-241', 'Organic Processes', 'Chemical');
insert into Course values ('CH-296', 'Biochemistry', 'Chemical');
insert into Course values ('CH-357', 'Quantitative Chemistry', 'Chemical');
insert into Course values ('FI-102', 'Probability Theory', 'Finance');
insert into Course values ('FI-201', 'Statistical Inference', 'Finance');
insert into Course values ('FI-282', 'Derivative Pricing', 'Finance');
insert into Course values ('FI-307', 'Stochastic Processes', 'Finance');




insert into Instructor values ('12121', 'Bhaskar', 'Comp. Sci.');
insert into Instructor values ('33456', 'Prabhu', 'Electrical');
insert into Instructor values ('45565', 'Kishore', 'Mechanical');
insert into Instructor values ('48583', 'Prabhu', 'Chemical');
insert into Instructor values ('52343', 'Dhananjay', 'Comp. Sci.');
insert into Instructor values ('56543', 'Chatterjee', 'Finance');
insert into Instructor values ('66766', 'Preeti', 'Electrical');
insert into Instructor values ('73821', 'Kulkarni', 'Comp. Sci.');
insert into Instructor values ('78345', 'Haripriya', 'Electrical');
insert into Instructor values ('78583', 'George', 'Chemical');
insert into Instructor values ('86543', 'Ravinder', 'Finance');
insert into Instructor values ('86651', 'Deepak', 'Comp. Sci.');
insert into Instructor values ('86766', 'Manoj', 'Mechanical');
insert into Instructor values ('93821', 'Anand', 'Chemical');
insert into Instructor values ('94222', 'Sudarshan', 'Comp. Sci.');
insert into Instructor values ('98345', 'Deshpande', 'Finance');


insert into Teaches values ('12121', 'CS-101', 'Autumn', 2009);
insert into Teaches values ('33456', 'EE-101', 'Autumn', 2009);
insert into Teaches values ('33456', 'EE-152', 'Spring', 2009);
insert into Teaches values ('45565', 'ME-101', 'Autumn', 2009);
insert into Teaches values ('45565', 'ME-207', 'Spring', 2009);
insert into Teaches values ('52343', 'CS-213', 'Spring', 2009);
insert into Teaches values ('52343', 'CS-317', 'Autumn', 2009);
insert into Teaches values ('56543', 'FI-201', 'Spring', 2010);
insert into Teaches values ('56543', 'FI-307', 'Autumn', 2010);
insert into Teaches values ('66766', 'EE-225', 'Spring', 2010);
insert into Teaches values ('66766', 'EE-152', 'Autumn', 2009);
insert into Teaches values ('73821', 'CS-213', 'Autumn', 2010);
insert into Teaches values ('78583', 'CH-101', 'Spring', 2010);
insert into Teaches values ('78583', 'CH-241', 'Autumn', 2009);
insert into Teaches values ('86543', 'FI-307', 'Spring', 2009);
insert into Teaches values ('86766', 'ME-288', 'Autumn', 2009);
insert into Teaches values ('86766', 'ME-344', 'Spring', 2009);
insert into Teaches values ('93821', 'CS-347', 'Autumn', 2009);
insert into Teaches values ('94222', 'CS-347', 'Spring', 2010);
insert into Teaches values ('94222', 'CS-101', 'Spring', 2010);
insert into Teaches values ('98345', 'FI-282', 'Autumn', 2009);





insert into User1 values ('00128', 'Ravi', '', 'Comp. Sci.', 'Male','31101991');
insert into User1 values ('12345', 'Suresh', '', 'Comp. Sci.', 'Male','26111991');
insert into User1 values ('19991', 'Gaurav', '',  'Electrical', 'Male','11091989');
insert into User1 values ('23121', 'Saurabh', '',  'Finance', 'Male','26081991');
insert into User1 values ('44553', 'Shikhar', '',  'Chemical', 'Male','07061990');
insert into User1 values ('45678', 'Ankita', '',  'Chemical', 'Female','04011990');
insert into User1 values ('54321', 'Ashish', '',  'Comp. Sci.', 'Male','22061987');
insert into User1 values ('55739', 'Sanjana', '', 'Mechanical', 'Female','29081988');
insert into User1 values ('70557', 'Sonia', '',  'Chemical', 'Female','12041986');
insert into User1 values ('76543', 'Garima', '',  'Comp. Sci.', 'Female','19111991');
insert into User1 values ('76653', 'Jai', '',  'Electrical', 'Male','12031987');
insert into User1 values ('98765', 'Kartik', '', 'Electrical', 'Male','11011991');
insert into User1 values ('98988', 'Tina', '',  'Mechanical', 'Female','21051992');




insert into Project values ('00565', 'Encryption', '01082009', '01122009' );
insert into Project values ('12101', 'Semiconductor Performance', '01112010', '15032010');
insert into Project values ('23437', 'Statistical Modelling', '22072009', '22122009');
insert into Project values ('43222', 'Characterstics of Solid Materials', '26082010', '26092010');
insert into Project values ('45822', 'Organic Matter', '06012010', '05042010');
insert into Project values ('76515' 'Robots', '03022009', '01042010');
insert into Project values ('79345', 'Database pf a University', '01042010', '01072010');
insert into Project values ('92385', 'Automobile Performance', '11092009', '20122009');
insert into Project values ('98966', 'Stochastic Processes in Everyday Life', '07032010', '01062010');




insert into Prereq values ('CS-213', 'CS-101');
insert into Prereq values ('CS-347', 'CS-213');
insert into Prereq values ('EE-225', 'EE-101');
insert into Prereq values ('EE-252', 'EE-101');
insert into Prereq values ('CH-357', 'CH-241');
insert into Prereq values ('CH-296', 'CH-101');
insert into Prereq values ('ME-288', 'ME-101');
insert into Prereq values ('ME-288', 'ME-207');
insert into Prereq values ('FI-282', 'FI-102');
insert into Prereq values ('FI-307', 'FI-201');
