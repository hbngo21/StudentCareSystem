# Student Care System - Database System Assignment - HK211
## Nhóm 4 - L08 - Danh sách thành viên:
1. Ngô Thị Hà Bắc - 1912700
2. Nguyễn Tuấn Minh - 1813095
3. Phạm Trường Thạch - 1814065
4. Trần Quốc Việt - 1915919

## Hướng dẫn chạy ứng dụng: Yêu cầu cần có DBMS MySql và XAMPP Control Panel.
Bước 1: Chạy câu lệnh:
#### `git clone https://github.com/hbngo21/StudentCareSystem.git`
Bước 2: Chạy lần lượt các file .sql trong thư mục data của thư mục StudentCareSystem: 

Nhom4_DDL.sql -> Nhom4_INITIAL_DATA.sql -> Nhom4_PROC_FUNC_TRIG.sql -> my_func.sql

Bước 3: Kết nối ứng dụng với database StudentCare bằng cách thay đổi tên host, port, user, password tương ứng trong 4 file sau:
  1. /StudentCareSystem/connnect.php
  2. /StudentCareSystem/connnection.php
  3. /StudentCareSystem/pages/staff/schoolar/config/db.php
  4. /StudentCareSystem/pages/staff/job/config/db.php

Bước 4: Khởi động XAMPP Control Panel, tại module Apache, chọn Config -> Apache (httpd.conf).

Lúc này file httpd.conf được mở ra, tìm từ khóa "DocumentRoot", ta thấy 2 câu lệnh như sau: 

`DocumentRoot "C:/xampp/htdocs"`<br/>
`<Directory "C:/xampp/htdocs">`

Thay đổi "C:/xampp/htdocs" bằng đường dẫn tới thư mục StudentCareSystem và lưu file.




