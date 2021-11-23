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
DROP PROCEDURE IF EXISTS get_detail_event $$
CREATE PROCEDURE get_detail_event(ename varchar(255))
BEGIN
	select name, limited, trainingpoint, content, timestamp, concat(lastname,' ',firstname) as name_staff, FUNC_NUM_STUDENT_REGISTER_EVENT(name) as num_register
    from event join staff on political_staffid=id
    where name=ename;
END $$
DELIMITER ;
