<?php

require_once("../utils/connect.php");

if (isset($_POST['update'])) {
    $TopicID = $_GET['ID'];
    $TopicName = $_POST['topicname'];
    $TopicExplain = $_POST['topicexplain'];
    $TopicDate = $_POST['topicdate'];
    $TopicExpired = $_POST['topicexpired'];

    $query = " update topic set Topic_Name = '" . $TopicName . "', Topic_Explain ='" . $TopicExplain . "',Topic_Datecreate ='" . $TopicDate . "',Topic_Expired ='" . $TopicExpired . "' where Topic_ID='" . $TopicID . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:topics.php");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:topics.php");
}


?>