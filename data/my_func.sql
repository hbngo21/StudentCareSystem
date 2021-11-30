use studentcare;

DELIMITER $$
DROP PROCEDURE IF EXISTS get_events_info $$
CREATE PROCEDURE get_events_info(offset int, quantity int)
BEGIN
	select name, limited, trainingpoint, content, timestamp, concat(lastname,' ',firstname) as name_staff, FUNC_NUM_STUDENT_REGISTER_EVENT(name) as num_register
    from event join staff on political_staffid=id
    order by timestamp desc
    limit offset, quantity;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS get_events_info_by_search $$
CREATE PROCEDURE get_events_info_by_search(search varchar(255))
BEGIN
	select name, limited, trainingpoint, content, timestamp, concat(lastname,' ',firstname) as name_staff, FUNC_NUM_STUDENT_REGISTER_EVENT(name) as num_register
    from event join staff on political_staffid=id
    WHERE name LIKE search OR trainingpoint LIKE search
    order by timestamp desc;
END $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS get_detail_event $$
CREATE PROCEDURE get_detail_event(ename varchar(255))
BEGIN
	select name, limited, trainingpoint, content, timestamp, concat(lastname,' ',firstname) as name_staff, FUNC_NUM_STUDENT_REGISTER_EVENT(name) as num_register
    from event join staff on political_staffid=id
    where name=ename;
END $$
DELIMITER ;

DELIMITER $$
DROP FUNCTION IF EXISTS typeOfStaff $$
CREATE FUNCTION typeOfStaff(staffid CHAR(4))
RETURNS varchar(100)
DETERMINISTIC
BEGIN
	if exists (select * from manager where id=staffid) 
    then return 'manager';
    elseif exists (select * from medical_staff where id=staffid)
    then return 'medicalstaff'; 
    elseif exists (select * from political_staff where id=staffid) 
    then return 'politicalstaff';
    elseif exists (select * from trainingdepartment_staff where id=staffid)
    then return 'trainingdepartmentstaff';
    end if;
END $$
DELIMITER ;

-- select typeOfStaff('2261');
