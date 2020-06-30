<?php include_once 'includes/top.php' ?>
<link rel="stylesheet" type="text/css" href="css/report.css">

<?php
// Include config file
include_once "includes/report.inc.php";
?>

<section id="content">
    <!-- Page Content -->
    <div class="container">
        <h2 class="text-muted text-center" style="font-size:4vw ">Meeting report</h2>
        <hr>
        <br>
        <div class="inlinec">
            <h2 style="color: #646769;"> <?php echo $title ?> </h2>
        </div>
        <br>
        <!-- data-toggle="modal" data-target="#checkproject_user" -->
        <form action="includes/report.inc.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                Meeting title:<input type="text" name="Title" class="form-control" placeholder="Enter report title here" value="<?php echo $reportTitle ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br><br>
            </div>

            <div class="form-group">
                Meeting date:<input type="date" class="form-control" name="Date" placeholder="Enter meeting date " value="<?php echo $Date ?>">
                <span class="error">* <?php echo $dateErr; ?></span>
                <br><br>
            </div>

            <div class="form-group">
                Meeting start time:<input type="time" class="form-control" name="startime" placeholder="Enter meeting start time here:" value="<?php echo $StartTime ?>">
                <span class="error">* <?php echo $startErr; ?></span>
                <br><br>
            </div>
            <div class="form-group">
                Meeting end time:<input type="time" class="form-control" name="endtime" placeholder="Enter meeting end time here:" value="<?php echo $EndTime ?>">
                <span class="error">* <?php echo $endErr; ?></span>
                <br><br>
            </div>

            <div class="form-group">
                Meeting location:<input type="text" class="form-control" name="location" placeholder="Enter meeting location here:" value="<?php echo $Location ?>">
                <span class="error">* <?php echo $locationErr; ?></span>
                <br><br>
            </div>

            <div class="form-group">
                Meeting present:<input type="text" class="form-control" name="present" placeholder="Enter meeting present here:" value="<?php echo $Participants ?>">
                <span class="error">* <?php echo $presentErr; ?></span>
                <br><br>
            </div>

            <div class="form-group">
                Meeting Agenda items: <textarea class="form-control" name="agenda" rows="6" placeholder="Enter meeting agenda here"><?php echo $Agenda ?></textarea>
            </div>

            <div class="form-group">
                Filename: <input type="file" name="Image" <?php echo $Image ?>>
                <span class="error">* <?php echo $imageErr; ?></span>
                <br><br>
                <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
            </div>


            <div class="form-group">
                Meeting contact number:<input type="text" class="form-control" name="contact" value="<?php echo $Contact ?>">
                <span class="error">* <?php echo $numberErr; ?></span>
                <br><br>
            </div>


            <div class="form-group">
                Project id:<input type="number" class="form-control" name="idproject" value="<?php echo $idproject ?>">

            </div>


            <div class="form-group">
                Status: <input type="radio" name="status" <?php if (isset($Status) && $Status == "processing") echo "checked"; ?> value="processing"> Processing
                <input type="radio" name="status" <?php if (isset($Status) && $Status == "complete") echo "checked"; ?> value="complete"> Complete
                <span class="error">* <?php echo $statusErr; ?></span>
                <br><br>
            </div>
            <br>

            <?php
            if ($update == false) {
                echo '<button class="btn btn-outline-info" name="submit">SUBMIT</button>';
            } else {

                echo '<button class="btn btn-outline-primary" name="update">UPDATE</button>';
            }
            ?>
            <input type="reset" class="btn btn-outline-info" name="reset">
        </form>
</section>

<?php include_once 'includes/footer.php' ?>