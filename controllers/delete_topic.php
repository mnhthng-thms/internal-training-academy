<?php

require_once("../utils/connect.php");

if (isset($_GET['id'])) {
    $topicId = $_GET['id'];
    $query = "DELETE FROM course_topic WHERE id = '$topicId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location: ../topics.php");
    } else {
        echo 'Something went wrong with the query!';
    }
} else {
    header("location: ../topics.php");
}
?>