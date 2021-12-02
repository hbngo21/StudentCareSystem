<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
session_start();
if (isset($_SESSION["student"])) {
    header("location: /pages/student/mainpage/mainpage.php");
    exit;
}

// Include config file
require_once "../../connection.php";

// Define variables and initialize with empty values
$username = $password = "";
$isUsername = false;
$isPassword = false;
$isChecked = false;
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (!empty(trim($_POST["username"]))) {
        $username = trim($_POST["username"]);
        $isUsername = true;
    }

    // Check if password is empty
    if (!empty(trim($_POST["password"]))) {
        $password = trim($_POST["password"]);
        $isPassword = true;
    }
    $isChecked = true;
    // Validate credentials
    if ($isPassword && $isUsername) {
        // Prepare a select statement
        $sql = "SELECT id FROM student WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id);
                    if ($stmt->fetch()) {
                        if ($id == $password) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["student"] = $username;

                            // Redirect user to welcome page
                            header("location: /pages/student/mainpage/mainpage.php");
                        } else {
                            // Display an error message if password is not valid
                            $isPassword = false;
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $isUsername = false;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>

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
    <link rel="stylesheet" href="/css/main.css">
    <title>Đăng nhập</title>
</head>

<body data-new-gr-c-s-check-loaded="8.867.0">
    <?php
    // require_once 'navbar.php' 
    ?>
    <!---------Login form-->
    <div class="main d-flex justify-content-center align-items-center flex-column flex-wrap px-5" style="padding-top: 100px; padding-bottom: 100px; margin-left: 30px; margin-right: 30px;">
        <div style="
        background-color: white; 
        border-radius: .5rem; 
        padding: 5% 10%;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h3 class="font-weight-bold">Sinh viên đăng nhập</h3>
                    <div class="py-2">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required value="<?php echo $username; ?>"> <!-- fix -->
                    </div>
                    <div class="py-2">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" data-rule="minlen:4" required data-msg="Please enter at least 4 chars">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="login" class="btn btn-rounded px-4 mt-3">Đăng nhập</button>
                    </div>
                </form>
            </div>
            <?php if (!($isUsername && $isPassword) && $isChecked) echo "<div style='color: red;'>Username hoặc Password sai!!!</div>" ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="/js/main.js"></script>
</body>

</html>