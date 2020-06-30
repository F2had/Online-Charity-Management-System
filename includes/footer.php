<!-- ////////////////////////////////////////////////////////footer//////////////////////////////////////////////////////////////////////// -->
<!-- This -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-6">
                <div class="widget">
                    <h4>Get in touch with us</h4>
                    <address>
                        <strong>TheProcrastinators company Inc</strong><br>
                        TheProcrastinators suite room V124, DB 91<br>
                        Someplace 457648 Earth </address>
                    <p>
                        <i class="icon-phone"></i> (123) 456-7890<br>
                        <i class="icon-envelope-alt"></i> email@domainname.com
                    </p>
                </div>
            </div>
            <div class="col-sm-3 col-lg-6">
                <div class="widget">
                    <h4>Information</h4>
                    <ul class="link-list">
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

            </div>

            <div class="col-sm-3 col-lg-3">
            </div>
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>&copy;All Right Reserved</p>
                        <div class="credits">

                            Designed by <a href="">TheProcrastinators</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>




<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>




<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/custom.js"></script>
<script src="js/javascript.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    var dateToday = new Date();
    dateToday.setDate(dateToday.getDate() - 1);
    // var startdate = new Date().setDate(d.getDate() - 5);
    var datestart = new Date();
    datestart.setDate(datestart.getDate() - 2);

    $(function() {
        $("#datepicker").datepicker({

            format: 'yyyy-mm-dd',
            // format: 'dd/mm/yyyy',
            numberOfMonths: 3,
            showButtonPanel: true,
            // defaultDate: -1
            minDate: datestart
        });
    });

    $(function() {
        $("#datepicker2").datepicker({

            format: 'yyyy-mm-dd',
            // format: 'dd/mm/yyyy',
            numberOfMonths: 3,
            showButtonPanel: true,
            minDate: dateToday
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</body>

</html>