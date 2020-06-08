<?php
include_once "connect_database.php";

$nameproject = '';
$desproject = '';
$amountvolunteer = '';
$imgproject = '';
$username = '';

$id = 0;

$title = "Create Charity Project";
$update = false;

if (isset($_POST['submit'])) {

    $nameproject = $_POST['nameproject'];
    $desproject = $_POST['desproject'];
    $amountvolunteer = $_POST['amountvolunteer'];
    $username = $_POST["username"];
    // echo $username;
    $file = $_FILES['imgproject'];

    $imgname = $file["name"];
    $imgtype = $file["type"];
    $imgtempname = $file["tmp_name"];
    // print_r($file);
    $imgerror = $file["error"];
    $imgsize = $file["size"];

    $fileext = explode(".", $imgname);
    $fileActualext = strtolower(end($fileext));

    $allow = array("jpg", "jpeg", "png");

    if (in_array($fileActualext, $allow)) {
        if ($imgerror === 0) {
            if ($imgsize < 2000000) {

                $imgnewname = $imgname . "." . uniqid('', true) . "." . $fileActualext;
                $imgdestination = "../uploaded_img/" . $imgnewname;

                if (empty($desproject) || empty($nameproject)) {
                    header("Location: ../add-manageCharity.php?upload=empty");
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
                        $set_img_order = $rowcount + 1;

                        $sql = "INSERT INTO project (nameproject, desproject, amountvolunteer, imgproject, imguniqname, orderproject, username)
                            VALUES(?,?,?,?,?,?,?);";

                        // echo "here entered";

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement error 2";
                        } else {
                            mysqli_stmt_bind_param(
                                $stmt,
                                "sssssss",
                                $nameproject,
                                $desproject,
                                $amountvolunteer,
                                $imgname,
                                $imgnewname,
                                $set_img_order,
                                $username
                            );
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($imgtempname, $imgdestination);
                            redirect(" ../add-manageCharity.php?upload=success");
                        }
                    }
                }
            } else {

                echo '<script> alert ("image size is too big")</script>';
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


if (isset($_GET['manage'])) {
    $update = true;
    $title = "Manage Charity Project";

    $idproject = $_GET['manage'];
    $id = $idproject;
    $sql2 = "SELECT * FROM project WHERE idproject=$idproject";
    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);

    if ($resultCheck2 > 0) {
        $row = mysqli_fetch_assoc($result2);
        $nameproject = $row['nameproject'];
        $desproject = $row['desproject'];
        $amountvolunteer = $row['amountvolunteer'];
        $imgproject = $row['imgproject'];
        $username = $row['username'];
        // echo '<script> alert("hi u success") </script>';
    }
}



if (isset($_GET['delete'])) {
    // session_start();
    $idproject = $_GET['delete'];
    $sql = "DELETE FROM project WHERE idproject=$idproject";
    $result = mysqli_query($conn, $sql);

    // $_SESSION['message'] = "Project has been deleted";
    // $_SESSION['msg_type'] = "danger";

    redirect("../add-manageCharity.php?delete=success");
}


if (isset($_POST['update'])) {
    $idproject = $_POST['id'];
    $nameproject = $_POST['nameproject'];
    $desproject = $_POST['desproject'];
    $amountvolunteer = $_POST['amountvolunteer'];
    $username = $_POST["username"];

    $file = $_FILES['imgproject'];
    // print_r($file);
    $imgname = $file["name"];
    $imgtype = $file["type"];
    $imgtempname = $file["tmp_name"];
    // print_r($file);
    $imgerror = $file["error"];
    $imgsize = $file["size"];

    $fileext = explode(".", $imgname);
    $fileActualext = strtolower(end($fileext));

    $allow = array("jpg", "jpeg", "png");

    if (in_array($fileActualext, $allow)) {
        if ($imgerror === 0) {
            if ($imgsize < 2000000) {

                $sql2 = "SELECT imguniqname FROM project WHERE idproject=$idproject";
                $result2 = mysqli_query($conn, $sql2);
                $resultCheck2 = mysqli_num_rows($result2);

                if ($resultCheck2 > 0) {
                    $row = mysqli_fetch_assoc($result2);
                    $imgpath = "../uploaded_img/" .
                        $row['imguniqname'];;
                    if (!unlink($imgpath)) {
                        echo "path not exist";
                    };
                }

                $imgnewname = $imgname . "." . uniqid('', true) . "." . $fileActualext;
                $imgdestination = "../uploaded_img/" . $imgnewname;

                if (empty($desproject) || empty($nameproject)) {
                    header("Location: ../add-manageCharity.php?upload=empty");
                    exit();
                } else {
                    move_uploaded_file($imgtempname, $imgdestination);

                    $sql = "UPDATE project SET 
                    nameproject='$nameproject', 
                    desproject = '$desproject', 
                    amountvolunteer = '$amountvolunteer', 
                    imgproject='$imgname', 
                    imguniqname='$imgnewname',
                    username = '$username'
                    WHERE idproject=$idproject";

                    // echo "enter if";

                    mysqli_query($conn, $sql);
                    // if (mysqli_query($conn, $sql)) {
                    //     echo "Record updated successfully";
                    // } else {
                    //     echo "Error updating record: " . mysqli_error($conn);
                    // }
                    redirect(" ../add-manageCharity.php?update=success");
                    // header("Location: ../add-manageCharity.php?update=success");
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
        $sql = "UPDATE project SET 
                    nameproject='$nameproject', 
                    desproject = '$desproject', 
                    amountvolunteer = '$amountvolunteer', 
                    username = '$username'
                    WHERE idproject=$idproject";
        // echo "enter else";

        mysqli_query($conn, $sql);
        redirect(" ../add-manageCharity.php?update=success");
    }
}

// header("Location: ../add-manageCharity.php");
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
