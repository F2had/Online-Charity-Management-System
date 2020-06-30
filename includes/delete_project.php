<?php
include_once "connect_database.php";

if (isset($_GET['delete'])) {
    // session_start();
    $idproject = $_GET['delete'];
    $sql = "DELETE FROM project WHERE idproject=$idproject";
    $result = mysqli_query($conn, $sql);

    // $_SESSION['message'] = "Project has been deleted";
    // $_SESSION['msg_type'] = "danger";

    redirect("../manageCharity.php?delete=success");
}

function redirect($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}
