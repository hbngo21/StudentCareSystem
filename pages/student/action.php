<?php
require_once '../../connection.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
if ($action == 'register-event') { // Register event
    $event_name = $_POST['event_name'];
    $student_id = $_POST['student_id'];

    $sql = "INSERT INTO registerevent(studentid, eventname) VALUES (?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("is", $param_studentid, $param_eventname);

        $param_studentid = $student_id;
        $param_eventname = $event_name;
        if ($stmt->execute()) {
            echo "Đăng ký thành công!!!";
        } else {
            echo "Something went wrong!!!";
        }
    }
}
