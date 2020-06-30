<?php

if (isset($_POST['submit'])) {

    $nameproject = $_POST['nameproject'];
    $desproject = $_POST['desproject'];
    $amountproject = $_POST['amountproject'];
    $username = $_POST["username"];

    $file = $_FILES['imgproject'];
    // print_r($file);

    $imgname = $file["name"];
    $imgtype = $file["type"];
    $imgtempname = $file["tmp_name"];
    $imgerror = $file["error"];
    $imgsize = $file["size"];

    $fileext = explode(".", $imgname);
    $fileActualext = strtolower(end($fileext));

    $allow = array("jpg", "jpeg", "png");

    if (in_array($fileActualext, $allow)) {
        if ($imgerror === 0) {
            if ($imgsize < 2000000) {

                $imgdestination = "../uploaded_img/" . $imgname;

                include_once 'connect_database.php';

                if (empty($desproject) || empty($nameproject)) {
                    header("Location: ../manageCharity.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM `project`;";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement error 1";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowcount = mysqli_num_rows($result);
                        $set_img_order = $rowcoun + 1;

                        $sql = "INSERT INTO project (nameproject, desproject, amountproject, imgproject, orderproject, username)
                            VALUES(?,?,?,?,?,?);";

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement error 2";
                        } else {
                            mysqli_stmt_bind_param(
                                $stmt,
                                "ssssss",
                                $nameproject,
                                $desproject,
                                $amountproject,
                                $imgname,
                                $set_img_order,
                                $username
                            );
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($imgtempname, $imgdestination);
                            echo 'hiuiuuiuu';
                            redirect(" ../manageCharity.php?upload=success");
                        }
                    }
                }
            } else {
                echo "image size is too big";
                exit();
            }
        } else {
            echo "image error";
            exit();
        }
    } else {
        echo "Please upload a proper file type";
        exit();
    }
}

// header("Location: ../manageCharity.php");
function redirect($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo 'alert("func2");';
        echo '</script>';
        exit;
    }
}
