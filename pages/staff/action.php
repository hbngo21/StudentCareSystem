<?php
require_once '../../connection.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
if ($action == 'create-event') { // Create event
    $name = $_GET['name'];
    $limited = $_GET['limited'];
    $content = $_GET['content'];
    $trainingpoint = $_GET['trainingpoint'];
    $semester = $_GET['semester'];
    $timestamp = date("Y-m-d H:i:s", time());
    $political_staffid = $_GET['staffid'];


    $sql = "INSERT INTO event(name, limited, content, trainingpoint, semestercode, timestamp, political_staffid) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sisssss", $param_name, $param_limited, $param_content, $param_trainingpoint, $param_semestercode, $param_timestamp, $param_political_staffid);

        $param_name = $name;
        $param_limited = $limited;
        $param_content = $content;
        $param_trainingpoint = $trainingpoint;
        $param_semestercode = $semester;
        $param_timestamp = $timestamp;
        $param_political_staffid = $political_staffid;
        if ($stmt->execute()) {
            echo "Tạo thành công!!!";
        } else {
            // echo "Something went wrong!!!";
            echo $stmt->error;
        }
    }
} else if ($action == 'remove-event') { // Remove event
    $name = $_GET['event_name'];

    $sql = "DELETE FROM event
            WHERE name = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $param_name);

        $param_name = $name;
        if ($stmt->execute()) {
            echo "Xóa thành công!!!";
        } else {
            // echo "Something went wrong!!!";
            echo $stmt->error;
        }
    }
}
