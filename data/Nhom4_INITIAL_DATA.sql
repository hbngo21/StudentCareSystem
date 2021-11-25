-- STAFF
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('6938', 'Đức Anh', 'Bùi', 'M', 'ducanh@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('9193', 'Ngọc Bảo', 'Nguyễn ', 'M', 'ngocbao@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('9866', 'Mạnh Dũng', 'Phan', 'M', 'manhdung@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('9579', 'Thị Thu Ngân', 'Lê', 'F', 'thungan@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('7383', 'Trọng Nhân', 'Lê', 'M', 'trongnhan@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('5968', 'Nhật Quang', 'Nguyễn ', 'M', 'nhatquang@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('5670', 'Anh Tú', 'Huỳnh', 'M', 'anhtu@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('8318', 'Huỳnh Hồng Thi', 'Phạm ', 'F', 'hongthi@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('3236', 'Minh Thái', 'Đào', 'M', 'minhthai@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('5371', 'Phúc Khang', 'Nguyễn ', 'M', 'phuckhang@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('7006', 'Nhật Huy', 'Thân', 'M', 'nhathuy@gmail.com');
INSERT INTO `studentcare`.`staff` (`ID`, `FIRSTNAME`, `LASTNAME`, `SEX`, `EMAIL`) VALUES ('2261', 'Thị Cẩm Vân', 'Đào', 'F', 'camvan@gmail.com');

-- MANAGER
INSERT INTO `studentcare`.`manager` (`ID`, `EXPERIENCE`) VALUES ('9579', '6');
INSERT INTO `studentcare`.`manager` (`ID`, `EXPERIENCE`) VALUES ('5968', '6');
INSERT INTO `studentcare`.`manager` (`ID`, `EXPERIENCE`) VALUES ('3236', '7');

-- studentcarestaff
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('6938', '9579');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('9193', '5968');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('9866', '5968');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('7383', '3236');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('5670', '5968');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('8318', '9579');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('5371', '3236');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('7006', '3236');
INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `MANAGERID`) VALUES ('2261', '9579');

-- trainingdepartmentstaff
INSERT INTO `studentcare`.`trainingdepartment_staff` (`ID`) VALUES ('7383');
INSERT INTO `studentcare`.`trainingdepartment_staff` (`ID`) VALUES ('5371');
INSERT INTO `studentcare`.`trainingdepartment_staff` (`ID`) VALUES ('7006');

-- medicallstaff
INSERT INTO `studentcare`.`medical_staff` (`ID`, `DEGREE`) VALUES ('6938', 'Y sĩ đa khoa');
INSERT INTO `studentcare`.`medical_staff` (`ID`, `DEGREE`) VALUES ('8318', 'Bác sĩ đa khoa');
INSERT INTO `studentcare`.`medical_staff` (`ID`, `DEGREE`) VALUES ('2261', 'Bác sĩ tâm lý');

-- politicalstaff
INSERT INTO `studentcare`.`political_staff` (`ID`) VALUES ('9193');
INSERT INTO `studentcare`.`political_staff` (`ID`) VALUES ('9866');
INSERT INTO `studentcare`.`political_staff` (`ID`) VALUES ('5670');

-- Semester
INSERT INTO `studentcare`.`semester` (`CODE`) VALUES ('201');
INSERT INTO `studentcare`.`semester` (`CODE`) VALUES ('202');
INSERT INTO `studentcare`.`semester` (`CODE`) VALUES ('203');

-- generalinformation
INSERT INTO `studentcare`.`general_information` (`TITLE`, `TYPE`, `CONTENT`, `TIMESTAMP`, `STUDENTCARE_STAFFID`) VALUES ('medical1', 'medical', 'content medical', '2021-03-26 20:04:24', '6938');
INSERT INTO `studentcare`.`general_information` (`TITLE`, `TYPE`, `CONTENT`, `TIMESTAMP`, `STUDENTCARE_STAFFID`) VALUES ('politic1', 'politic', 'content politic', '2021-04-29 08:53:47', '9193');
INSERT INTO `studentcare`.`general_information` (`TITLE`, `TYPE`, `CONTENT`, `TIMESTAMP`, `STUDENTCARE_STAFFID`) VALUES ('trainingdepartment1', 'trainingdepartment', 'content trainingdepartment', '2020-08-14 14:31:14', '7383');

-- event
INSERT INTO `studentcare`.`event` (`NAME`, `LIMITED`, `CONTENT`, `TRAININGPOINT`, `SEMESTERCODE`, `TIMESTAMP`, `POLITICAL_STAFFID`) VALUES ('event1', '50', 'content1', '5', '203', '2021-07-15 07:04:24', '9193');
INSERT INTO `studentcare`.`event` (`NAME`, `LIMITED`, `CONTENT`, `TRAININGPOINT`, `SEMESTERCODE`, `TIMESTAMP`, `POLITICAL_STAFFID`) VALUES ('event2', '100', 'content2', '10', '203', '2021-05-30 08:05:24', '9866');
INSERT INTO `studentcare`.`event` (`NAME`, `LIMITED`, `CONTENT`, `TRAININGPOINT`, `SEMESTERCODE`, `TIMESTAMP`, `POLITICAL_STAFFID`) VALUES ('event3', '150', 'content3', '10', '202', '2020-01-21 09:45:24', '5670');
INSERT INTO `studentcare`.`event` (`NAME`, `LIMITED`, `CONTENT`, `TRAININGPOINT`, `SEMESTERCODE`, `TIMESTAMP`, `POLITICAL_STAFFID`) VALUES ('event4', '75', 'content4', '5', '202', '2021-03-26 14:15:26', '9866');

-- JobScholarshipInfo

INSERT INTO `studentcare`.`jobscholarship_infor` (`ID`,`TITLE`,`CONTENT`,`ENTERPRISE`,`POLITICAL_STAFFID`) VALUES ('1','Sr NodeJS Developer – Signing Bonus 50M','At least 7 years of experience in software development, more than 1 year of experience in the position of CTO or Head of Engineer, Solution architect, Deep understanding of software development process, how to build a product from start to finish. ','FPT Software','5670');
INSERT INTO `studentcare`.`jobscholarship_infor` (`ID`,`TITLE`,`CONTENT`,`ENTERPRISE`,`POLITICAL_STAFFID`) VALUES ('2','20 Automation Tester (Java/Python/QA QC)','Have 2 - 8 years of working experience, Good programming experience in at least one of them (Perl/TCL/Python/Java/C/C++), Good application/product testing experience','HCL Vietnam Company Limited Jobs','9193');
INSERT INTO `studentcare`.`jobscholarship_infor` (`ID`,`TITLE`,`CONTENT`,`ENTERPRISE`,`POLITICAL_STAFFID`) VALUES ('3','Chief Technology Officer (TranData)','At least 7 years of experience in software development, more than 1 year of experience in the position of CTO or Head of Engineer, Solution architect, Deep understanding of software development process, how to build a product from start to finish. ','FPT Software','9866');
INSERT INTO `studentcare`.`jobscholarship_infor` (`ID`,`TITLE`,`CONTENT`,`ENTERPRISE`,`POLITICAL_STAFFID`) VALUES ('4','Technical Architect (Java or Nodejs)','Provide hands-on leadership to the design, development, and deployment of technical solutions; Experience architecting, developing and deploying modern architectural patterns/techniques (microservices, DDD, TDD ...)  ','NAB','5670');
INSERT INTO `studentcare`.`jobscholarship_infor` (`ID`,`TITLE`,`CONTENT`,`ENTERPRISE`,`POLITICAL_STAFFID`) VALUES ('5','Senior Technical Business Analyst','Work with business users to elicit and define user requirements through the use of the most appropriate method(s). Gather, organize and synthesize large amounts of information from various sources and translate them into functional requirements, and contribute to the management expectations','PROPZY Jobs','9193');
INSERT INTO `studentcare`.`jobscholarship_infor` (`ID`,`TITLE`,`CONTENT`,`ENTERPRISE`,`POLITICAL_STAFFID`) VALUES ('6','Java Developers (Backend, Linux)','We are looking for experienced and highly enthusiastic Java Developers to work on Java project. Implementing and configuring vitual or physical network devices, developing system and testing, this is common task.  By joining our team, you will be responsible for development, maintenance and troubleshooting in production systems. ','DEK','5670');

 -- IncentiveScholarshipResult
INSERT INTO `studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng hỗ trợ sinh viên trong dịch COVID-19','Học bổng hỗ trợ sinh viên có hoàn cảnh khó khăn, không đủ điều kiện tham gia học trực tuyến','203','5371');
INSERT INTO `studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng khuyến khích ( HK 201- Đợt 1)','Học bổng khuyến khích mỗi kì cho các sinh viên có điểm TB >8.0, tích cực tham gia các hoạt động ngoại khóa do Nhà trường tổ chức và có điểm rèn luyện >80','201','5371');
INSERT INTO `studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng khuyến khích ( HK 201- Đợt 2)','Học bổng khuyến khích mỗi kì cho các sinh viên có điểm TB >8.0, tích cực tham gia các hoạt động ngoại khóa do Nhà trường tổ chức và có điểm rèn luyện >80','201','7006');
INSERT INTO `studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng khuyến khích (HK 202 - Đợt 1)','Học bổng khuyến khích mỗi kì cho các sinh viên có điểm TB >8.0, tích cực tham gia các hoạt động ngoại khóa do Nhà trường tổ chức và có điểm rèn luyện >80','202','7383');
INSERT INTO`studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng khuyến khích (HK 202 - Đợt 2)','Học bổng khuyến khích mỗi kì cho các sinh viên có điểm TB >8.0, tích cực tham gia các hoạt động ngoại khóa do Nhà trường tổ chức và có điểm rèn luyện >80','202','7006');
INSERT INTO `studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng toàn phần (HK 203 - Đợt 1)','Học bổng toàn phần cho những sinh viên có hoàn cảnh khó khăn đạt loại xuất sắcHọc bổng toàn phần dành cho cho những sinh viên có hoàn cảnh khó khăn nhưng có cố gắng phấn đấu, vượt khó đạt danh hiệu học sinh giỏi,xuất sắc của Trường, tham tích cực các hoạt động ngoại khóa','203','7383');
INSERT INTO `studentcare`.`incentivescholarship_result` (`NAME`,`INFORMATION`,`SEMESTERCODE`,`TRAININGDEPARTMENT_STAFFID`) VALUES ('Học bổng toàn phần (HK 203 - Đợt 2)','Học bổng toàn phần cho những sinh viên có hoàn cảnh khó khăn đạt loại xuất sắcHọc bổng toàn phần dành cho cho những sinh viên có hoàn cảnh khó khăn nhưng có cố gắng phấn đấu, vượt khó đạt danh hiệu học sinh giỏi,xuất sắc của Trường, tham tích cực các hoạt động ngoại khóa','203','7006');

-- Student
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`,`FIRSTNAME`,  `DOB`, `SEX`, `EMAIL`) VALUES ('11111', 'Nguyễn Đức', 'Anh', '2000-11-08', 'M',  'an.nguyenduc1406@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('22222', 'Bùi Tuấn', 'Anh', '2003-02-04', 'M',  '1510035@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('33333', 'Nguyễn Tuấn', 'Anh', '1998-07-11', 'M',  'anh.nguyencuanam1234@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('44444', 'Trần Phúc', 'Anh', '2000-08-17', 'F',  'anh.tran0206@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('55555', 'Đặng Thiên', 'Bảo', '2003-09-27', 'M',  'bao.dang291002@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('66666', 'Nguyễn Thành', 'Công', '2000-11-04', 'M',  'cong.nguyen0602@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('77777', 'Trần Quốc', 'Dũng', '2001-02-06', 'M' , 'dung.trandan5@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('88888', 'Nguyễn Lê Bảo', 'Duy', '1999-11-30', 'M' , 'duy.nguyencse94@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`, `EMAIL`) VALUES ('99999', 'Phạm Lê Hoàn', 'Hảo', '2002-07-15', 'M' , 'hao.phamlehoan@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('12345', 'Phạm Công', 'Hậu', '1999-07-19', 'M',  'hau.pham1304@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('67890', 'Giang Tuấn', 'Hiền', '2002-03-18', 'M', 'hien.giang14112002@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('10000', 'Nguyễn Lê Gia', 'Hinh', '2001-03-15', 'M', 'hinh.nguyen2020@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('20000', 'Nguyễn Huy', 'Hoàng', '2003-04-14', 'F',  'hoang.nguyenk20@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('30000', 'Trần Huy', 'Hoàng', '2003-05-16', 'M',  'hoang.tranhoangluyen@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('40000', 'Vũ Trần', 'Hoàng', '2000-12-01', 'M', 'hoang.vu141102@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('50000', 'Lê Việt', 'Hưng', '2003-03-28', 'M',  'hung.le0101@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('60000', 'Nguyễn Duy', 'Hưng', '1998-11-16', 'M',  'hung.nguyen2102@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('70000', 'Trần Quang', 'Hưng', '2003-05-13', 'M', 'hung.tranquang@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('80000', 'Bùi Nguyễn Gia', 'Huy', '2001-02-21', 'M',  'huy.bui047@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('90000', 'Nguyễn Đoàn Phương', 'Nghi', '2003-01-09', 'M',  'nghi.nguyen1805vt@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('13759', 'Dương Nguyễn Nguyên', 'Nghĩa', '2000-09-29', 'M', 'nghia.duong272919136@hcmut.edu.vn');
INSERT INTO `studentcare`.`student` (`ID`, `LASTNAME`, `FIRSTNAME`, `DOB`, `SEX`,  `EMAIL`) VALUES ('24680', 'Lê Minh', 'Nghĩa', '1999-08-15', 'M',  'nghia.le010202khmt@hcmut.edu.vn');

-- question
INSERT INTO `studentcare`.`question` (`STUDENTID`, `TIMESTAMP`, `TYPE`, `TITLE`, `CONTENT`) VALUES ('11111', '2021-10-26 20:04:24', 'medical', 'title medical 1', 'content medical 1');
INSERT INTO `studentcare`.`question` (`STUDENTID`, `TIMESTAMP`, `TYPE`, `TITLE`, `CONTENT`) VALUES ('12345', '2021-04-29 08:53:47', 'trainingdepartment', 'title trainingdepartment 1', 'content trainingdepartment 1');
INSERT INTO `studentcare`.`question` (`STUDENTID`, `TIMESTAMP`, `TYPE`, `TITLE`, `CONTENT`) VALUES ('33333', '2021-04-22 08:53:47', 'political', 'title political 1', 'content political 1');
INSERT INTO `studentcare`.`question` (`STUDENTID`, `TIMESTAMP`, `TYPE`, `TITLE`, `CONTENT`) VALUES ('44444', '2021-09-22 21:04:24', 'medical', 'title medical 2', 'content medical 2');

-- answer
INSERT INTO `studentcare`.`answer` (`QUESTIONID`, `STUDENTCARESTAFFID`, `TIMESTAMP`, `CONTENT`) VALUES ('1', '6938', '2021-10-27 08:30:54', 'answer medical 1');
INSERT INTO `studentcare`.`answer` (`QUESTIONID`, `STUDENTCARESTAFFID`, `TIMESTAMP`, `CONTENT`) VALUES ('2', '7383', '2021-04-29 10:25:33', 'answer trainingdepartment 1');
INSERT INTO `studentcare`.`answer` (`QUESTIONID`, `STUDENTCARESTAFFID`, `TIMESTAMP`, `CONTENT`) VALUES ('3', '9866', '2021-04-22 09:25:32', 'answer political 1');
INSERT INTO `studentcare`.`answer` (`QUESTIONID`, `STUDENTCARESTAFFID`, `TIMESTAMP`, `CONTENT`) VALUES ('4', '2261', '2021-09-22 08:22:35', 'answer medical 2');

-- student_contactaddress
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('11111', '4942976981', '574 Vidon Road');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('22222', '3761046431', '72 Marcy Crossing');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('33333', '4099779211', '23 Carpenter Crossing');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('44444', '4378064820', '99 Anniversary Crossing');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('55555', '4871820704', '752 Shopko Road');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('66666', '8567865642', '96 Ramsey Lane');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('77777', '1307791726', '1491 Loeprich Hill');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('88888', '2897045665', '4934 Meadow Ridge Way');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('99999', '5819536385', '6 Bowman Parkway');
INSERT INTO `studentcare`.`student_contactaddress` (`ID`, `PHONENUM`, `ADDRESS`) VALUES ('12345', '6141654161', '14840 Drewry Park');

-- studentcare.guardian;
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('11111', 'Hảo', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('22222', 'Hiển', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('33333', 'Hoàn', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('44444', 'Khang', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('55555', 'Hoàng', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('66666', 'Hưng', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('77777', 'Loan', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('88888', 'Toàn', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('99999', 'Trí', 'Người thân');
INSERT INTO `studentcare`.`guardian` (`STUDENTID`, `NAME`, `RELATIONSHIP`) VALUES ('12345', 'Dũng', 'Người thân');

-- studentcare.guardian_contactaddress;

INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Hảo', '11111', '4942976981', '574 Vidon Road');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Hiển', '22222', '3761046431', '72 Marcy Crossing');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Hoàn', '33333', '4099779211', '23 Carpenter Crossing');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Khang', '44444', '4378064820', '99 Anniversary Crossing');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Hoàng', '55555', '4871820704', '752 Shopko Road');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Hưng', '66666', '8567865642', '96 Ramsey Lane');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Loan', '77777', '1307791726', '1491 Loeprich Hill');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Toàn', '88888', '2897045665', '4934 Meadow Ridge Way');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Trí', '99999', '5819536385', '6 Bowman Parkway');
INSERT INTO `studentcare`.`guardian_contactaddress` (`NAME`, `STUDENTID`, `PHONENUM`, `ADDRESS`) VALUES ('Dũng', '12345', '6141654161', '14840 Drewry Park');

-- studentcare.study;
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('11111', '201','9.6','90');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('22222', '201','4','60');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('33333', '201','8.9','80');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('44444', '201','7.4','90');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('55555', '201','8.6','85');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('66666', '201','9.0','80');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('77777', '201','4.0','70');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('88888', '202','2.0','50');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('99999', '202','8.0','85');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('12345', '202','3.7','60');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('67890', '202','1.9','70');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('10000', '202','7.8','80');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('20000', '202','3.5','90');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('30000', '202','9.5','95');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('40000', '202','8.7','100');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('50000', '202','4.7','55');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('60000', '203','3.7','60');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('70000', '203','8.9','80');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('80000', '203','8.5','70');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('90000', '203','8.0','85');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('13759', '203','3.0','70');
INSERT INTO `studentcare`.`study` (`STUDENTID`, `SEMESTERCODE`,`GPA`,`TrainingPoint`) VALUES ('24680', '203','9.6','85');

-- studentcare.feedback

INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('11111',  'Thời gian phản hồi', 'thời gian phản hồi chậm', '2021-09-26 3:10:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('22222',  'Thái độ của nhân viên', 'thái độ không thân thiện', '2020-12-10 10:58:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('33333',  'Chất lượng của câu trả lời', 'tốt', '2021-05-30 11:23:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('44444',  'Thái độ của nhân viên', 'thái độ thân thiện,nhiệt tình', '2020-05-12 5:44:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('55555',  'Chất lượng của câu trả lời', 'chưa tốt', '2020-11-12 9:51:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('66666',  'Chất lượng của câu trả lời', 'chưa tốt', '2021-07-14 22:42');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('77777',  'Thời gian phản hồi', 'thời gian phản hồi chậm', '2021-03-30 10:25:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('88888',  'Chất lượng của câu trả lời', 'tốt', '2021-05-23 23:44:00');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('99999', 'Chất lượng của câu trả lời', 'tốt', '2021-10-15 13:46');
INSERT INTO `studentcare`.`feedback` (`STUDENTID`,  `TITLE`, `CONTENT`, `TIMESTAMP`) VALUES ('12345',  'Thái độ của nhân viên', 'chưa tốt lắm', '2020-11-13 15:17');

-- Request_Services
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('11111', '2021-09-19 03:54:26', '1', 'In bảng điểm học tập', '7383', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`) VALUES ('22222', '2021-09-25 05:58:15', '2', 'Nhận bằng tốt nghiệp');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('33333', '2021-09-10 17:46:45', '3', 'Giấy xác nhận sinh viên', '5371', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('44444', '2021-09-27 17:28:29', '1', 'In bảng điểm học tập', '7006', 'In Progress');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('55555', '2021-09-05 05:54:53', '4', 'Làm lại thẻ sinh viên', '7383', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('66666', '2021-09-05 01:35:19', '1', 'In bảng điểm học tập', '5371', 'In Progress');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('77777', '2021-09-13 06:22:13', '6', 'In bảng điểm rèn luyện', '5371', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('88888', '2021-09-06 15:35:07', '6', 'In bảng điểm rèn luyện', '7383', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('99999', '2021-09-09 09:59:44', '5', 'Đăng kí rút môn học', '7006', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`) VALUES ('12345', '2021-09-16 11:07:52', '2', 'Nhận bằng tốt nghiệp');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('67890', '2021-09-16 00:54:17', '4', 'Làm lại thẻ sinh viên', '7006', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`) VALUES ('10000', '2021-09-25 12:57:17', '6', 'In bảng điểm rèn luyện');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('20000', '2021-09-29 16:19:10', '3', 'Giấy xác nhận sinh viên', '5371', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('30000', '2021-09-10 14:02:37', '6', 'In bảng điểm rèn luyện', '5371', 'In Progress');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('40000', '2021-10-01 16:41:42', '6', 'In bảng điểm rèn luyện', '7383', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('50000', '2021-10-01 03:53:09', '5', 'Đăng kí rút môn học', '7383', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`) VALUES ('60000', '2021-09-05 13:51:21', '4', 'Làm lại thẻ sinh viên');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('70000', '2021-09-05 19:12:39', '7', 'Đăng ký miễn học GDQP - GDTC', '5371', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('80000', '2021-09-02 18:42:06', '6', 'In bảng điểm rèn luyện', '7383', 'Completed');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`) VALUES ('90000', '2021-09-15 23:17:26', '3', 'Giấy xác nhận sinh viên');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('13759', '2021-09-05 19:52:05', '6', 'In bảng điểm rèn luyện', '5371', 'In Progress');
INSERT INTO `studentcare`.`request_services` (`STUDENTID`, `TIMESTAMP`, `ID`, `CONTENT`, `TRAININGDEPARTMENT_STAFFID`, `STATUS`) VALUES ('24680', '2021-09-03 06:27:41', '6', 'In bảng điểm rèn luyện', '7006', 'Completed');

-- Request_Counselling
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('11111', '2021-09-16 06:29:37', '2021-10-01', 'MORNING', 'Đau đầu quá', '6938', '2021-09-17 07:13:30', 'https://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('22222', '2021-09-04 08:32:56', '2021-10-01', 'MORNING', 'Quá mệt mỏi với cuộc sống', '8318', '2021-09-05 07:47:09', 'http://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('33333', '2021-09-26 13:19:44', '2021-10-01', 'MORNING', 'Môi trường học tập quá khó để thích nghi', '2261', '2021-09-27 08:25:20', 'https://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('44444', '2021-09-01 23:04:12', '2021-10-01', 'MORNING', 'Cô cho nhiều bài tập quá', '6938', '2021-09-02 09:26:57', 'https://www.example.com/beds.php');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('55555', '2021-09-29 13:36:56', '2021-10-01', 'MORNING', 'Đau cột sống', '8318', '2021-10-01 10:50:01', 'https://example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('66666', '2021-09-05 12:00:37', '2021-10-01', 'AFTERNOON', 'Đau lưng quá', '2261', '2021-09-06 13:07:48', 'http://www.example.com/bikes/book.html#board');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('77777', '2021-09-30 16:57:55', '2021-10-01', 'AFTERNOON', 'Đau bụng nữa', '8318', '2021-10-01 14:26:18', 'http://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('88888', '2021-09-07 19:31:59', '2021-10-01', 'AFTERNOON', 'Không chịu được áp lực', '2261', '2021-09-09 15:28:57', 'http://www.example.net/believe');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('99999', '2021-09-24 08:51:01', '2021-10-01', 'AFTERNOON', 'Quá chán nản', '6938', '2021-09-27 15:41:26', 'https://www.example.com/#brake');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('12345', '2021-09-01 07:53:47', '2021-10-01', 'AFTERNOON', 'Không có người yêu', '2261', '2021-09-01 16:24:17', 'http://www.example.com/believe#air');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('67890', '2021-09-22 08:02:32', '2021-10-01', 'AFTERNOON', 'Khóc huhu', '6938', '2021-09-25 17:13:45', 'https://breath.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('10000', '2021-09-29 23:29:25', '2021-10-01', 'AFTERNOON', 'Đau dạ dày', '2261', '2021-10-01 17:48:01', 'https://example.org/bath.htm');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('20000', '2021-09-21 17:49:12', '2021-10-02', 'MORNING', 'Mỏi cổ', '8318', '2021-09-23 07:05:18', 'http://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('30000', '2021-10-01 15:32:20', '2021-10-02', 'MORNING', 'Cảm thấy tiêu cực', '6938', '2021-10-02 08:59:30', 'http://www.example.edu/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('40000', '2021-09-29 17:05:52', '2021-10-02', 'MORNING', 'Đau nửa đầu', '8318', '2021-10-02 09:36:30', 'https://www.example.edu/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('50000', '2021-09-28 04:46:35', '2021-10-02', 'AFTERNOON', 'Cảm thấy không vui trong 52 ngày', '2261', '2021-10-02 13:27:09', 'http://example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('60000', '2021-09-29 07:08:33', '2021-10-02', 'AFTERNOON', 'MUN 0-5 LIV', '6938', '2021-10-02 14:13:29', 'http://ants.example.net/bottle/beef.html');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('70000', '2021-09-26 03:37:57', '2021-10-02', 'AFTERNOON', 'Lại đau đầu', '8318', '2021-09-28 15:45:41', 'https://example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('80000', '2021-09-26 04:26:35', '2021-10-02', 'AFTERNOON', 'Tâm lý bất ổn mùa thi', '2261', '2021-10-02 16:44:44', 'https://bird.example.net/bottle.html');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('90000', '2021-09-29 17:01:55', '2021-10-04', 'MORNING', 'Tài chính mùa covid-19 khó khăn, stress', '6938', '2021-10-04 07:53:13', 'https://www.example.com/bait/ball?brick=aunt');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('13759', '2021-10-01 03:46:37', '2021-10-04', 'MORNING', 'Khó tập trung trong học tập và công việc', '8318', '2021-10-04 08:29:22', 'https://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('24680', '2021-09-29 21:04:02', '2021-10-04', 'MORNING', 'Không có người yêu', '2261', '2021-10-04 08:49:51', 'https://example.com/?branch=bike');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('11111', '2021-09-30 08:23:58', '2021-10-04', 'MORNING', 'Khóc huhu', '6938', '2021-10-04 09:53:57', 'http://www.example.com/');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('22222', '2021-09-27 13:28:35', '2021-10-04', 'AFTERNOON', 'Đau dạ dày', '2261', '2021-10-04 14:09:46', 'http://beds.example.org/battle?bubble=air&amount=bells#brass');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('33333', '2021-10-03 09:27:06', '2021-10-04', 'AFTERNOON', 'Mỏi cổ', '6938', '2021-10-04 15:19:19', 'http://www.example.org/bit.php');
INSERT INTO `studentcare`.`request_counselling` (`STUDENTID`, `REQUEST_TIMESTAMP`, `DATE`, `TIME`, `REQUEST_CONTENT`, `MEDICAL_STAFFID`, `RESPONSE_TIMESTAMP`, `RESPONSE_CONTENT`) VALUES ('44444', '2021-10-02 20:26:08', '2021-10-04', 'AFTERNOON', 'Cảm thấy tiêu cực', '2261', '2021-10-04 15:53:11', 'http://www.example.com/brass');

-- RegisterEvent
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('12345', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('22222', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('10000', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('88888', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('33333', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('24680', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('13759', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('50000', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('77777', 'event1');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('50000', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('24680', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('99999', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('30000', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('40000', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('66666', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('12345', 'event2');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('11111', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('70000', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('24680', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('44444', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('67890', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('22222', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('80000', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('66666', 'event3');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('55555', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('22222', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('80000', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('99999', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('77777', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('10000', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('11111', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('13759', 'event4');
INSERT INTO `studentcare`.`registerevent` (`STUDENTID`, `EVENTNAME`) VALUES ('50000', 'event4');

-- Provide_IncentiveScholarship_Result
INSERT INTO `studentcare`.`provide_incentivescholarship_result` (`STUDENTID`, `NAME`) VALUES ('11111', 'scholarship201');
INSERT INTO `studentcare`.`provide_incentivescholarship_result` (`STUDENTID`, `NAME`) VALUES ('33333', 'scholarship201');
INSERT INTO `studentcare`.`provide_incentivescholarship_result` (`STUDENTID`, `NAME`) VALUES ('90000', 'scholarship201');
INSERT INTO `studentcare`.`provide_incentivescholarship_result` (`STUDENTID`, `NAME`) VALUES ('80000', 'scholarship201');
