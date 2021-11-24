<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- user.css -->
    <link rel="stylesheet" href="../../css/main.css">
    <title>StudentCare</title>
</head>

<body style="background-color: #f3f4f6;">

    <div class="container d-flex justify-content-center align-items-center flex-wrap" style="height: 100vh;">
        <div style="
        background-color: white; 
        border-radius: .5rem; 
        padding: 5%;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <h3 style="width: 100%; margin: 10px;">Vị trí của bạn: </h3>
            <button class="btn" style="padding: 20px 35px; margin: 10px; font-size: 1.5rem;" onclick="enterStaff()">
                Nhân viên
            </button>
            <button class="btn" style="padding: 20px 35px; margin: 10px; font-size: 1.5rem;" onclick="enterStudent()">
                Sinh viên
            </button>
        </div>
    </div>
    <script>
        function enterStaff() {
            window.location.href = '/pages/staff/login.php';
        }

        function enterStudent() {
            window.location.href = '/pages/student/login.php';
        }
    </script>
</body>

</html>