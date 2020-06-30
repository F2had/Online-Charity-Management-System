<?php
include_once "connect_database.php";
$reportTitle= '';
$Date= '';
$StartTime= '';
$EndTime= '';
$Location= '';
$Participants= '';
$Agenda= '';
$Image = '';
$Contact='';
$Status= '';
$id=0;

if(isset($_SESSION['idproject'])){
    $idproject=$_SESSION['idproject'];
    }else{
        $idproject='';
}

$title = "Add new meeting report";
$update = false;

$nameErr= $dateErr=$imageErr= $startErr= $endErr = $locationErr= $statusErr= $presentErr= $numberErr='';



if (isset($_POST['submit'])||isset($_POST['update'])) {

    if (empty($_POST['Title'])) {
        $nameErr = "Ttile is required";
      } {
        $reportTitle = $_POST['Title'];
        }

    if (empty($_POST["Date"])) {
        $dateErr = "Date is required";
      } else {
        $Date= $_POST['Date'];
      }
    
    if (empty($_POST["startime"])) {
        $startErr = "startDate is required";
      } else {
        $StartTime= $_POST['startime'];
    }

    if (empty($_POST["endtime"])) {
        $endErr = "EndTime is required";
      } else {
        $EndTime= $_POST['endtime'];
      }
    
      if (empty($_POST['location'])) {
        $locationErr = "EndTime is required";
      } else {
        $Location= $_POST['location'];

      }

      if (empty($_POST["agenda"])) {
        $Agenda = "";
      } else {
        $Agenda =$_POST["agenda"];
      }

      if (empty($_POST["status"])) {
        $statusErr = "status is required";
      } else {
        $Status= $_POST['status'];
    }
    
    if(isset($_SESSION['idproject'])){
    $idproject=$_SESSION['idproject'];
    }else{
        $idproject=$_POST['idproject'];
    }

    if (empty($_POST["present"])) {
        $presentErr = "present is required";
      } else {
        $Participants= $_POST['present'];
    }

    if (empty($_POST['contact'])) {
        $numberErr = "contact is required";
    }else{
        $Contact= $_POST['contact'];

    }
        

    $imgtempname =addslashes( $_FILES['Image']["tmp_name"]);
    $Image = addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));  
    
    $target_dir = "../uploaded_img/";
    $target_file = $target_dir . basename($_FILES["Image"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["Image"]["tmp_name"]);
    $allow = array("jpg", "jpeg", "png");


    if (in_array($imageFileType, $allow)) {
        if ( $check!==false) {
            if ($_FILES['Image']['size'] < 2000000) {

                $sql = "SELECT * FROM `reports`;";
                    $stmt = mysqli_stmt_init($conn);

                    mysqli_stmt_prepare($stmt, $sql) ;
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $rowcount = mysqli_num_rows($result);
                    $id =1000+ $rowcount + 1;

                    if(isset($_POST['submit'])){

                    $query = "INSERT INTO reports (ID,Title, Date, StartTime, EndTime, Location, Participants,Contact,Agenda,Imag,Status,idproject)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";

                    mysqli_stmt_prepare($stmt, $query);
                    mysqli_stmt_bind_param(
                                    $stmt,
                                    "issssssssbsi",
                                    $id,
                                    $reportTitle,
                                    $Date,
                                    $StartTime,
                                    $EndTime,
                                    $Location,
                                    $Participants,
                                    $Contact,
                                    $Agenda,
                                    $Image,
                                    $Status,
                                    $idproject,
                                    );
                    mysqli_stmt_execute($stmt);


                    }elseif(isset($_POST['update'])){

                            $sql = "UPDATE reports SET
                            Title='$reportTitle', Date='$Date',
                            StartTime='$StartTime', EndTime='$EndTime', 
                            Location='$Location', Participants='$Participants',
                            Contact='$Contact',Agenda='$Agenda',
                            Imag='$Image',Status='$Status',
                            idproject='$idproject' WHERE reports.ID='$id'";

                            if (mysqli_query($conn, $sql)) {
                            echo "Record updated successfully".$id.$reportTitle;
                            } else {
                            echo "Error updating record: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                    }

                    move_uploaded_file($imgtempname,  $target_file );
                    redirect(" ../meeting-report.php");
       
                                          
            } else {
                $imageErr="image size is too big";
            }
        } else {
            $imageErr="image error";
        }
    } else {
        $imageErr= "Please upload a proper file type";
    }
}



if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM reports WHERE reports.id=$id";
        $result = mysqli_query($conn, $sql);
        if(!empty($idproject)){
        redirect(" ../meeting-report.php?project=$idproject");
        }else{
            redirect(" ../meeting-report.php");

        }
}


if (isset($_GET['update'])) {
    $update = true;
    $title = "Update Meeting report";
    $id=$_GET['update'];

    $sql2 = "SELECT * FROM reports INNER JOIN project ON reports.idproject = project.idproject WHERE reports.ID=$id";
    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);

    if ($resultCheck2 > 0) {
        $row = mysqli_fetch_assoc($result2);
        $reportTitle = $row['Title'];
        $Date= $row['Date'];
        $StartTime= $row['StartTime'];
        $EndTime= $row['EndTime'];
        $Location= $row['Location'];
        $Participants= $row['Participants'];
        $Agenda= $row['Agenda'];
        $Status= $row['Status'];
        $Image= $row['Imag'];
        $Contact= $row['Contact'];
        $idproject=$row['idproject'];
    }
}


// header("Location: ../add_report.php");
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
