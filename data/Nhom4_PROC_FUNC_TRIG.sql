USE STUDENTCARE;

-- 4.1. Sinh viên xem phản hồi của nhân viên chăm sóc cho câu hỏi, yêu cầu của mình. 
-- Xem số câu hỏi của 1 sinh viên - dựa vào ID của sinh viên
DELIMITER $$
DROP FUNCTION IF EXISTS COUNT_QUESTION $$
CREATE FUNCTION COUNT_QUESTION(ID CHAR(5))
RETURNS INT
DETERMINISTIC
BEGIN
	IF NOT EXISTS (SELECT * FROM QUESTION WHERE STUDENTID = ID) THEN
		RETURN 0;
	ELSE 
	RETURN (
		SELECT COUNT(*)
		FROM QUESTION
        WHERE STUDENTID = ID
		GROUP BY STUDENTID
    );
    END IF;
END $$
DELIMITER ;

-- Xem bảng tổng quan tất cả câu hỏi của một sinh viên
DELIMITER $$
DROP PROCEDURE IF EXISTS ALLRESPONSES_ON_SID $$
CREATE PROCEDURE ALLRESPONSES_ON_SID(ID CHAR(5))
BEGIN
	SELECT A.ID AS ANSWERID, A.QUESTIONID, Q.TYPE, Q.TITLE, CONCAT(S.LASTNAME,' ',S.FIRSTNAME) AS STAFF_NAME,
    A.TIMESTAMP AS ANSWER_TIMESTAMP
    FROM ANSWER A JOIN QUESTION Q ON A.QUESTIONID = Q.ID JOIN STAFF S ON A.STUDENTCARESTAFFID = S.ID
    WHERE Q.STUDENTID = ID
    ORDER BY Q.TIMESTAMP DESC;
END $$
DELIMITER ;

-- Xem phản hồi của 1 câu hỏi
DELIMITER $$
DROP PROCEDURE IF EXISTS RESPONSE_ON_QID $$
CREATE PROCEDURE RESPONSE_ON_QID(QID INT UNSIGNED)
BEGIN
	SELECT A.ID AS ANSWERID, A.QUESTIONID, Q.TYPE, Q.TITLE, Q.CONTENT AS QUESTION_CONTENT, 
    Q.TIMESTAMP AS QUESTION_TIMESTAMP, STU.ID, CONCAT(STU.LASTNAME,' ',STU.FIRSTNAME) AS STUDENT_NAME, A.CONTENT AS ANSWER_CONTENT, CONCAT(S.LASTNAME,' ',S.FIRSTNAME) AS STAFF_NAME,
    A.TIMESTAMP AS ANSWER_TIMESTAMP
    FROM ANSWER A JOIN QUESTION Q ON A.QUESTIONID = Q.ID JOIN STAFF S ON A.STUDENTCARESTAFFID = S.ID JOIN STUDENT STU ON Q.STUDENTID = STU.ID
    WHERE QUESTIONID = QID;
END $$
DELIMITER ;

-- 4.2. Sinh viên xem kết quả yêu cầu đăng ký tư vấn tâm lý cá nhân.

DELIMITER $$
DROP PROCEDURE IF EXISTS COUNSELLING_RESULT $$
CREATE PROCEDURE COUNSELLING_RESULT(ID CHAR(5))
BEGIN
	SELECT REQUEST_TIMESTAMP, REQUEST_CONTENT, DATE, TIME, RESPONSE_CONTENT, CONCAT(S.LASTNAME,' ',S.FIRSTNAME) AS STAFF_NAME, RESPONSE_TIMESTAMP
    FROM REQUEST_COUNSELLING R JOIN STAFF S ON R.MEDICAL_STAFFID = S.ID
    WHERE R.STUDENTID = ID
    ORDER BY REQUEST_TIMESTAMP DESC;
END $$
DELIMITER ;

-- 4.3. Sinh viên xem tiến độ thực hiện dịch vụ mình đã yêu cầu

USE STUDENTCARE;
DELIMITER $$
DROP PROCEDURE IF EXISTS PROC_REQUEST_PROGRESS $$
CREATE PROCEDURE PROC_REQUEST_PROGRESS(IN STUID CHAR(5))
BEGIN
   SELECT  TIMESTAMP, CONTENT, STATUS
   FROM REQUEST_SERVICES
   WHERE STUDENTID = STUID
   ORDER BY TIMESTAMP DESC;
END; $$
DELIMITER ;

-- 4.4. Sinh viên xem kết quả học bổng khuyến khích

USE STUDENTCARE;
DELIMITER $$
DROP PROCEDURE IF EXISTS PROC_SCHOLARSHIP_RESULT $$
CREATE PROCEDURE PROC_SCHOLARSHIP_RESULT(IN STUID CHAR(5))
BEGIN
   SELECT A.NAME, B.information
   FROM provide_incentivescholarship_result A join incentivescholarship_result B on A.name=B.name
   WHERE STUDENTID = STUID
   ORDER BY SEMESTERCODE DESC;
END; $$
DELIMITER ;

-- 4.5. Tính số người tham gia sự kiện

USE STUDENTCARE;
DROP FUNCTION IF EXISTS FUNC_NUM_STUDENT_REGISTER_EVENT $$
DELIMITER //
CREATE FUNCTION FUNC_NUM_STUDENT_REGISTER_EVENT(ENAME VARCHAR(255)) RETURNS INT DETERMINISTIC
BEGIN
    DECLARE RESULT INT DEFAULT	0;
	SELECT COUNT(*) INTO RESULT
    FROM REGISTEREVENT
    WHERE EVENTNAME=ENAME;
	
    RETURN RESULT;
END //
DELIMITER ;

-- 4.6. Nhân viên phòng đào tạo xem yêu cầu của sinh viên
-- Số lượng yêu cầu chưa được xác nhận
 DELIMITER $$
 CREATE FUNCTION count_waiting_request()
 RETURNS INT
 DETERMINISTIC
 BEGIN
	IF NOT EXISTS (select * from request_services where STATUS='Waiting') THEN
		RETURN 0;
 	ELSE 
 	RETURN (
 		SELECT count(*) 
	    from request_services
        where STATUS='Waiting' 
     );
     END IF;
END $$
DELIMITER ;

-- Chi tiết các yêu cầu chưa được xác nhận
 DELIMITER $$
 CREATE PROCEDURE List_of_Request()
 BEGIN
	SELECT R.ID,StudentID,CONCAT(Lastname," ",Firstname) as Student_name,timestamp,Content,Status
	FROM request_services R JOIN student S ON R.studentID = S.ID
	WHERE status='Waiting'
	ORDER BY TIMESTAMP ASC;
 END $$
 DELIMITER ;
 
 -- 4.7. Nhân viên Quản lý xem được các đánh giá của sinh viên về hệ thống, độingũ nhân viên chăm sóc.
DELIMITER $$
 CREATE PROCEDURE List_of_Feedback()
 BEGIN
	SELECT StudentID,CONCAT(Lastname," ",Firstname) as Student_name,Timestamp,Title,Content
 	FROM feedback F join student S on F.studentID=S.ID
	ORDER BY TIMESTAMP ASC;
	END $$	
 DELIMITER ;
 
 -- 
 -- 4.8. Nhân viên Phòng đào tạo cập nhật trạng thái của các yêu cầu từ sinh viên.
delimiter //
drop procedure if exists update_status //
create procedure update_status(staffiD char (4), SID char(5),timestamp datetime)
BEGIN 
	if exists (select * from request_services where status ='In Progress' and studentID=SID and timestamp= timestamp)
    then
			Update request_services
            set trainingdepartment_staffid = staffID, status='Completed'
            where studentID=SID and timestamp= timestamp;
	elseif exists (select * from request_services where status ='Waiting'and studentID=SID and timestamp= timestamp)
    then
			Update request_services
            set trainingdepartment_staffid = staffID, status='In Progress'
            where studentID=SID and timestamp= timestamp;
	end if;
end //
delimiter ;

-- 4.9. Nhân viên y tế xem thông tin yêu cầu tư vấn.

-- Nhân viên y tế xem danh sách tất cả yêu cầu tư vấn
DELIMITER $$
CREATE PROCEDURE View_Request_Counselling_List()
BEGIN
	SELECT REQUEST_TIMESTAMP, REQUEST_CONTENT FROM request_counselling;
END $$
DELIMITER ;

-- Nhân viên y tế lọc danh sách yêu cầu tư vấn của từng nhân viên
DELIMITER $$
CREATE PROCEDURE Filter_Request_Counselling(MSID char(4))
BEGIN
	SELECT REQUEST_TIMESTAMP, REQUEST_CONTENT FROM request_counselling
    WHERE medical_staffid = MSID;
END $$
DELIMITER ;

-- Nhân viên y tế xem chi tiết yêu cầu tư vấn
DELIMITER $$
CREATE PROCEDURE View_Request_Counselling(stuid char(5), req_t datetime)
BEGIN
	SELECT * FROM request_counselling
    WHERE STUDENTID = stuid and REQUEST_TIMESTAMP = req_t;
END $$
DELIMITER ;

-- 4.10. Sinh viên xem thông tin chung

-- Sinh viên xem danh sách thông tin chung
DELIMITER $$
CREATE PROCEDURE View_General_Information_List()
BEGIN
	SELECT TITLE, TYPE FROM General_Information;
END $$
DELIMITER ;

-- Sinh viên dùng bộ lọc để tìm Type của thông tin chung mà mình tìm kiếm
DELIMITER $$
CREATE PROCEDURE Filter_General_Information(InfoType VARCHAR(100))
BEGIN
	SELECT TITLE, TYPE FROM General_Information
    WHERE TYPE = InfoType;
END $$
DELIMITER ;

-- Sinh viên chọn xem thông tin cụ thể trong các thông tin chung
DELIMITER $$
CREATE PROCEDURE View_General_Information(InfoTitle VARCHAR(100))
BEGIN
	SELECT * FROM General_Information
    WHERE TITLE = InfoTitle;
END $$
DELIMITER ;

-- 5.1 Kiểm tra điều kiện các sinh viên được cung cấp kết quả học bổng khuyến khích là những sinh viên đủ điều kiện nhân học bổng, 
-- có điểm GPA lớn hơn hoặc bằng 8.0 và điểm rèn luyện lớn hơn hoặc bằng 80.

-- Trước khi thêm STUDENTID vào bảng PROVIDE_INCENTIVESCHOLARSHIP_RESULT, kiểm tra GPA của sinh viên có lớn hơn hoặc bằng 8.0 và 
-- điểm rèn luyện có lớn hơn hoặc bằng 80.
DELIMITER $$
DROP TRIGGER IF EXISTS triggerScholarship_before_insert $$
CREATE TRIGGER triggerScholarship_before_insert 
BEFORE INSERT ON PROVIDE_INCENTIVESCHOLARSHIP_RESULT 
FOR EACH ROW
BEGIN
    DECLARE action CONDITION FOR SQLSTATE '45000';
    DECLARE GP DECIMAL(3,1);
    DECLARE TP INT;
	SELECT GPA, TRAININGPOINT INTO GP, TP FROM STUDY WHERE STUDENTID = NEW.STUDENTID
    AND SEMESTERCODE = (SELECT SEMESTERCODE FROM INCENTIVESCHOLARSHIP_RESULT WHERE NAME = NEW.NAME);
    IF (GP IS NULL OR TP IS NULL OR GP < 8.0 OR TP < 80) THEN 
		SIGNAL action
		SET MESSAGE_TEXT = 'THE STUDENT DOES NOT SASTIFY THE CONDITION TO RECEIVE INCENTIVE SCHOLARSHIP.';
	END IF;
END $$
DELIMITER ;

-- Trước khi cập nhật GPA hoặc điểm rèn luyện của một sinh viên, nếu sinh viên đó thuộc các sinh viên được cung cấp học bổng 
-- thì cần kiểm tra GPA của sinh viên có lớn hơn hoặc bằng 8.0 và điểm rèn luyện có lớn hơn hoặc bằng 80.
DELIMITER $$
DROP TRIGGER IF EXISTS triggerScholarship_after_update $$
CREATE TRIGGER triggerScholarship_after_update
AFTER UPDATE ON STUDY
FOR EACH ROW
BEGIN
    DECLARE action CONDITION FOR SQLSTATE '45000';
    IF ((NEW.STUDENTID, NEW.SEMESTERCODE) IN 
    (SELECT STUDENTID, SEMESTERCODE FROM PROVIDE_INCENTIVESCHOLARSHIP_RESULT P JOIN INCENTIVESCHOLARSHIP_RESULT I
    ON P.NAME = I.NAME)
    AND (NEW.GPA IS NULL OR NEW.TRAININGPOINT IS NULL OR NEW.GPA < 8.0 OR NEW.TRAININGPOINT < 80))
    THEN
		SIGNAL action
		SET MESSAGE_TEXT = 'THE STUDENT DOES NOT SASTIFY THE CONDITION TO RECEIVE INCENTIVE SCHOLARSHIP.';
	END IF;
END $$
DELIMITER ;

-- Check
-- INSERT INTO provide_incentivescholarship_result VALUES ('40000', 'scholarship202');
-- INSERT INTO provide_incentivescholarship_result VALUES ('24680', 'scholarship203');
-- UPDATE study
-- SET TrainingPoint = 75 WHERE STUDENTID = '24680' AND SEMESTERCODE = '203';

-- 5.2. Kiểm tra tối đa 100 suất cho mỗi học bổng khuyến khích

-- Trước khi thêm một bộ mới vào bảng PROVIDE_INCENTIVESCHOLARSHIP_RESULT, kiểm tra số lượng bộ của học bổng đó 
-- đã đạt mức 100 hay chưa.
DELIMITER $$
DROP TRIGGER IF EXISTS NUMBEROF_SCHOLARSHIPS_BEFORE  $$
CREATE TRIGGER NUMBEROF_SCHOLARSHIPS_BEFORE 
BEFORE INSERT ON PROVIDE_INCENTIVESCHOLARSHIP_RESULT 
FOR EACH ROW
BEGIN
    DECLARE action CONDITION FOR SQLSTATE '45000';
    IF ((SELECT COUNT(*) FROM PROVIDE_INCENTIVESCHOLARSHIP_RESULT WHERE NAME = NEW.NAME) = 100) THEN 
		SIGNAL action
		SET MESSAGE_TEXT = 'EACH INCENTIVE SCHOLARSHIP HAS AT MOST 100 SLOTS.';
	END IF;
END $$
DELIMITER ;

-- Sau khi cập nhật bảng PROVIDE_INCENTIVESCHOLARSHIP_RESULT, kiểm tra số lượng bộ của học bổng vừa được cập nhật 
-- đã vượt quá 100 hay chưa.
DELIMITER $$
DROP TRIGGER IF EXISTS NUMBEROF_SCHOLARSHIPS_AFTER  $$
CREATE TRIGGER NUMBEROF_SCHOLARSHIPS_AFTER
AFTER UPDATE ON PROVIDE_INCENTIVESCHOLARSHIP_RESULT 
FOR EACH ROW
BEGIN
    DECLARE action CONDITION FOR SQLSTATE '45000';
    IF ((SELECT COUNT(*) FROM PROVIDE_INCENTIVESCHOLARSHIP_RESULT WHERE NAME = NEW.NAME) > 100) THEN 
		SIGNAL action
		SET MESSAGE_TEXT = 'EACH INCENTIVE SCHOLARSHIP HAS AT MOST 100 SLOTS.';
	END IF;
END $$
DELIMITER ;

-- 5.3. Kiểm tra tất cả nhân viên chăm sóc sinh viên phải chia thành 3 loại (nhân viên y tế, nhân viên CTCT-SV, nhân viên phòng đào tạo)

-- Không được xóa nhân viên y tế khỏi bảng MEDICAL_STAFF.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_DLT_TOTAL_STUDENTCARESTAFF_ON_MEDICALSTAFF;
DELIMITER $$
CREATE TRIGGER TRG_DLT_TOTAL_STUDENTCARESTAFF_ON_MEDICALSTAFF 
AFTER DELETE 
ON MEDICAL_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
    SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT DELETE IN THIS TABLE';
END; $$
DELIMITER ;

-- Không được xóa nhân viên y tế khỏi bảng TRAININGDEPARTMENT_STAFF.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_DLT_TOTAL_STUDENTCARESTAFF_ON_TRAININGDEPARTMENTSTAFF;
DELIMITER $$
CREATE TRIGGER TRG_DLT_TOTAL_STUDENTCARESTAFF_ON_TRAININGDEPARTMENTSTAFF 
AFTER DELETE 
ON TRAININGDEPARTMENT_STAFF FOR EACH ROW
BEGIN
	DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT DELETE IN THIS TABLE';
END; $$
DELIMITER ;

-- Không được xóa nhân viên y tế khỏi bảng POLITICAL_STAFF.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_DLT_TOTAL_STUDENTCARESTAFF_ON_POLITICALSTAFF;
DELIMITER $$
CREATE TRIGGER TRG_DLT_TOTAL_STUDENTCARESTAFF_ON_POLITICALSTAFF 
AFTER DELETE 
ON POLITICAL_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
    SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT DELETE IN THIS TABLE';
END; $$
DELIMITER ;

-- Check
-- DELETE FROM `studentcare`.`trainingdepartment_staff` WHERE (`ID` = '7383');
-- DELETE FROM `studentcare`.`political_staff` WHERE (`ID` = '9866');
-- DELETE FROM `studentcare`.`medical_staff` WHERE (`ID` = '8318');

-- 5.4 Kiểm tra một nhân viên chăm sóc sinh viên chỉ có thể là một trong 3 loại(nhân viên y tế, nhân viên CTCT-SV, 
-- nhân viên phòng đào tạo)

-- Hàm kiểm tra nhân viên sắp thêm vào một bảng có ở các bảng khác không.
USE STUDENTCARE;
DROP FUNCTION IF EXISTS HAS_STAFFID;
DELIMITER //
CREATE FUNCTION HAS_STAFFID(TYPEOFSTAFF VARCHAR(20), SID CHAR(5)) RETURNS BOOLEAN DETERMINISTIC
BEGIN
    SET @RESULT = FALSE;
	IF TYPEOFSTAFF='MEDICAL' THEN 
		SET @RESULT = EXISTS (SELECT * FROM TRAININGDEPARTMENT_STAFF WHERE ID=SID)
						OR EXISTS (SELECT * FROM POLITICAL_STAFF WHERE ID=SID);
	END IF;
    IF TYPEOFSTAFF='POLITICAL' THEN 
		SET @RESULT = EXISTS (SELECT * FROM TRAININGDEPARTMENT_STAFF WHERE ID=SID)
						OR EXISTS (SELECT * FROM MEDICAL_STAFF WHERE ID=SID);
	END IF;
    IF TYPEOFSTAFF='TRAININGDEPARTMENT' THEN 
		SET @RESULT = EXISTS (SELECT * FROM MEDICAL_STAFF WHERE ID=SID)
						OR EXISTS (SELECT * FROM POLITICAL_STAFF WHERE ID=SID);
	END IF;
    RETURN @RESULT;
END //
DELIMITER ;

-- Không được thêm nhân viên vào bảng MEDICAL_STAFF khi đã có tồn tại một trong 2 bảng còn lại.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_DISJOIN_MEIDCAL_STAFF ;
DELIMITER $$
CREATE TRIGGER TRG_INS_DISJOIN_MEDICAL_STAFF 
AFTER INSERT 
ON MEDICAL_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
   IF HAS_STAFFID('MEDICAL', NEW.ID) THEN
		SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT INSERT THIS STAFF';
   END IF;
END; $$
DELIMITER ;

-- Không được cập nhật nhân viên vào bảng MEDICAL_STAFF khi đã có tồn tại một trong 2 bảng còn lại.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_UPD_DISJOIN_MEDICAL_STAFF ;
DELIMITER $$
CREATE TRIGGER TRG_UPD_DISJOIN_MEDICAL_STAFF 
AFTER UPDATE 
ON MEDICAL_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
   IF HAS_STAFFID('MEDICAL', NEW.ID) THEN
		SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT UPDATE THIS STAFF';
   END IF;
END; $$
DELIMITER ;

-- Không được thêm nhân viên vào bảng TRAININGDEPARTMENT_STAFF khi đã có tồn tại mộttrong 2 bảng còn lại.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_INS_DISJOIN_POLITICAL_STAFF ;
DELIMITER $$
CREATE TRIGGER TRG_INS_DISJOIN_POLITICAL_STAFF 
AFTER INSERT 
ON POLITICAL_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
   IF HAS_STAFFID('POLITICAL', NEW.ID) THEN
		SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT INSERT THIS STAFF';
   END IF;
END; $$
DELIMITER ;

-- Không được cập nhật nhân viên vào bảng TRAININGDEPARTMENT_STAFF khi đã có tồn tại một trong 2 bảng còn lại.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_UPD_DISJOIN_POLITICAL_STAFF ;
DELIMITER $$
CREATE TRIGGER TRG_UPD_DISJOIN_POLITICAL_STAFF 
AFTER UPDATE 
ON POLITICAL_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
   IF HAS_STAFFID('POLITICAL', NEW.ID) THEN
		SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT UPDATE THIS STAFF';
   END IF;
END; $$
DELIMITER ;

-- Không được thêm nhân viên vào bảng POLITICAL_STAFF khi đã có tồn tại một trong 2 bảng cònlại.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_INS_DISJOIN_TRAININGDEPARTMENT_STAFF ;
DELIMITER $$
CREATE TRIGGER TRG_INS_DISJOIN_TRAININGDEPARTMENT_STAFF 
AFTER INSERT 
ON TRAININGDEPARTMENT_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
	
   IF HAS_STAFFID('TRAININGDEPARTMENT', NEW.ID) THEN
		SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT INSERT THIS STAFF';
   END IF;
END; $$
DELIMITER ;

-- Không được cập nhật nhân viên vào bảng POLITICAL_STAFF khi đã có tồn tại một trong 2 bảng còn lại.
USE STUDENTCARE;
DROP TRIGGER IF EXISTS TRG_UPD_DISJOIN_TRAININGDEPARTMENT_STAFF ;
DELIMITER $$
CREATE TRIGGER TRG_UPD_DISJOIN_TRAININGDEPARTMENT_STAFF 
AFTER UPDATE 
ON TRAININGDEPARTMENT_STAFF FOR EACH ROW
BEGIN
   DECLARE NO_DISJOIN CONDITION FOR SQLSTATE'45000';
   IF HAS_STAFFID('TRAININGDEPARTMENT', NEW.ID) THEN
		SIGNAL NO_DISJOIN SET MESSAGE_TEXT='CAN NOT UPDATE THIS STAFF';
   END IF;
END; $$
DELIMITER ;

-- Check
-- INSERT INTO `studentcare`.`medical_staff` (`ID`, `DEGREE`) VALUES ('9193', 'A');
-- UPDATE `studentcare`.`medical_staff` SET `ID` = '9193' WHERE (`ID` = '8318');

-- INSERT INTO `studentcare`.`trainingdepartment_staff` (`ID`) VALUES ('6938');
-- UPDATE `studentcare`.`trainingdepartment_staff` SET `ID` = '6938' WHERE (`ID` = '7383');

-- INSERT INTO `studentcare`.`political_staff` (`ID`) VALUES ('5371');
-- UPDATE `studentcare`.`political_staff` SET `ID` = '5371' WHERE (`ID` = '9866');

-- 5.5. Kiểm tra một nhân viên phải được đảm nhận 1 chức vụ, hoặc là quản lýhoặc là nhân viên chăm sóc sinh viên

-- Kiểm tra trước khi insert thêm nhân viên quản lí
 delimiter $$
 create trigger trgmanager_before_insert 
 before insert 
 on manager
 for each row
 begin
		declare chkmanager condition for sqlstate '45000';
		IF EXISTS	(select * 
					from studentcarestaff x
					where x.id=New.id
					)
		then 
 			SIGNAL chkmanager
			set message_text='NewID already exist in studentcarestaff, can not add to manager';
		end IF;
end $$
delimiter ;

-- Kiểm tra trước khi update nhân viên quản lí
delimiter $$
create trigger trgmanager_before_update
before update 
on manager
for each row
begin
 		declare chkmanager condition for sqlstate '45000';
         IF EXISTS(select * 
 					  from studentcarestaff x
                       where x.id=New.id
                       )
         then 
 			SIGNAL chkmanager
             set message_text='NewID already exist in studentcarestaff, can not add to manager';
 	end IF;
end $$
delimiter ;

 -- Kiểm tra trước khi delete nhân viên quản lí
delimiter $$
create trigger trgmanager_before_delete
before delete 
on manager
for each row
begin
		declare chkmanager condition for sqlstate '45000';
		IF EXISTS(select * from manager m where m.id=OLD.id)
		then 
			SIGNAL chkmanager
			set message_text='can not delete in manager table !!';
		end IF;
end $$
delimiter ;
-- DELETE FROM manager where ID='3236';
-- INSERT INTO `studentcare`.`manager` (`ID`, `experience`) VALUES ('5371', '6');
		
-- Hàm kiểm tra trước khi insert thêm nhân viên chăm sóc sinh viên
delimiter $$
create trigger trgstudentcarestaff_before_insert 
before insert 
on studentcarestaff
for each row
begin
		declare chkstudentcarestaff condition for sqlstate '45000';
		IF EXISTS(select * from manager m where m.id=New.id)
		then 
			SIGNAL chkstudentcarestaff
			set message_text='NewID already exist in manager, can not add to studentcarestaff';
		end IF;
end $$
delimiter ;
-- INSERT INTO `studentcare`.`studentcarestaff` (`ID`, `managerid`) VALUES ('5968', '3236');
						
-- Hàm kiểm tra trước khi update thêm nhân viên chăm sóc sinh viên
delimiter $$
create trigger trgstudentcarestaff_before_update 
before update
on studentcarestaff
for each row
begin
		declare chkstudentcarestaff condition for sqlstate '45000';
					IF EXISTS(select * 
					  from manager m
					where m.id=New.id
					)
					then 
			SIGNAL chkstudentcarestaff
			set message_text='NewID already exist in manager, can not add to studentcarestaff';
	end IF;
end $$
delimiter ;
						
-- Hàm kiểm tra trước khi delete thêm nhân viên chăm sóc sinh viên
delimiter $$
create trigger trgstudentcarestaff_before_delete
before delete 
on studentcarestaff
for each row
begin
	declare chkstudentcarestaff condition for sqlstate '45000';
		IF EXISTS(select * 
			 from studentcarestaff s
			  where s.id=OLD.id
			)
		then 
		SIGNAL chkstudentcarestaff
		set message_text='can not delete in studentcarestaff table !!';
		end IF;
end $$
delimiter ;
-- DELETE FROM studentcarestaff where ID='9193'

-- 5.6 Kiểm tra mỗi học kì phải có ít nhất một sinh viên theo học

-- Thêm Semester => Transaction thêm Study
DELIMITER $$
DROP PROCEDURE IF EXISTS AddSemester $$
CREATE PROCEDURE AddSemester(SCode char(3))
BEGIN
    DECLARE StudentID CHAR(5);
    DECLARE F Integer default 1;    
    DECLARE My_Cursor CURSOR FOR SELECT ID FROM STUDENT;
    DECLARE CONTINUE HANDLER FOR NOT FOUND Set F = 0;
    INSERT INTO semester VALUES (SCode);
    OPEN My_Cursor;
    My_Loop : LOOP
		FETCH My_Cursor INTO StudentID ;
		    IF F = 0 THEN
			    LEAVE My_Loop;
		    END IF;
		    INSERT INTO study(`studentID`, `semestercode`) VALUES (StudentID, SCode);
	END LOOP My_Loop;
	CLOSE My_Cursor;
END $$
DELIMITER ;

call addsemester('212');

-- Xóa Study => Check total old.Semester => After Delete
DROP TRIGGER IF EXISTS trg_Total_Semester_After_Delete_Study; $$
DELIMITER $$
CREATE TRIGGER trg_Total_Semester_After_Delete_Study AFTER DELETE ON study
FOR EACH ROW
BEGIN
	declare total_participation condition for SQLSTATE '71203';
    IF NOT EXISTS (SELECT * FROM study WHERE SEMESTERCODE = old.SEMESTERCODE) THEN
		SIGNAL total_participation
			SET MESSAGE_TEXT = 'Mỗi học kỳ phải có ít nhất một sinh viên theo học!';
	END IF;
END; $$
DELIMITER ;

-- Check
-- DELETE FROM study WHERE SEMESTERCODE = '212' and studentid='10000';

-- Cập nhật Study => Check total old.Semester => After Update
DROP TRIGGER IF EXISTS trg_Total_Semester_After_Update_Study; $$
DELIMITER $$
CREATE TRIGGER trg_Total_Semester_After_Update_Study AFTER UPDATE ON study
FOR EACH ROW
BEGIN
	declare total_participation condition for SQLSTATE '71203';
    IF NOT EXISTS (SELECT * FROM study WHERE SEMESTERCODE = old.SEMESTERCODE) THEN
		SIGNAL total_participation
			SET MESSAGE_TEXT = 'Mỗi học kỳ phải có ít nhất một sinh viên theo học!';
	END IF;
END; $$
DELIMITER ;

-- Check
-- UPDATE `studentcare`.`study` SET `SEMESTERCODE` = '202' WHERE (`SEMESTERCODE` = '201');





