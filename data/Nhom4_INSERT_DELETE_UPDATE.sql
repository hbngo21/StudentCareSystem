USE STUDENTCARE;

-- 6.1. Thêm câu hỏi của sinh viên có ID 13759 tại thời điểm 11:07 ngày 9/11/2021 thuộc loại phòng đào tạo với tiêu đề là 
-- "Chuyển điểm Anh văn" và nội dung là "Em chưa hiểu lắm về quy trình chuyển điểm anh văn. Em mong muốn được giải thích rõ hơn."

INSERT INTO `studentcare`.`question` (`STUDENTID`, `TIMESTAMP`, `TYPE`, `TITLE`, `CONTENT`) 
VALUES ('13759', '2021-11-09 11:07:00', 'trainingdepartment', 'Chuyen diem anh van', 'Em chua hieu lam ve quy trinh chuyen diem anh van. Em mong muon duoc giai thich ro hon.');


-- 6.2. Cập nhật trạng thái các yêu cầu nhận từ sinh viên
-- Nhân viên phòng đào tạo ID là 5371 tiếp nhận câu hỏi từ sinh viên có ID 30000 vào ngày ’2021-09-1014:02:37’
CALL update_status('5371','30000','2021-09-10 14:02:37');

-- Khi hoàn thành yêu cầu của sinh viên nhân viên phòng đào tạo sẽ cập nhật lại trạng thái của yêu cầu một lần nữa .
CALL update_status('5371','30000','2021-09-10 14:02:37');

-- 6.3. Xóa thông tin các yêu cầu dịch vụ đã được hoàn thành trước tháng 10/2021.
DELETE FROM REQUEST_SERVICES
WHERE STATUS = "Completed" AND (YEAR(TIMESTAMP) < 2021 OR (MONTH(TIMESTAMP) < 10));