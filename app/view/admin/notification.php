<?php
require("header.php");

?>



<div class="container-fluid py-4">
    <div class="row">
        <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Add Notifications</button>


        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h5 class="">Add Notification</h5>
                                <p class="mb-0">Enter your details</p>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="post" action="/functions" enctype='multipart/form-data'>
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Message</label>
                                        <textarea type="text" name="message" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="adminNotification" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Enter</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="card mt-4">
                <div class="card-header p-3">
                    <h5 class="mb-0">Notifications</h5>
                </div>
                <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM `notifications` WHERE `brand_id` = '0' ORDER BY `id` DESC";
                $feed = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($feed)) {
                    $id = $row['id'];
                    $message = $row['message'];
                    $date = $row['date'];
                ?>
                    <div class="card-body p-3 pb-0">
                        <div class="alert alert-secondary alert-dismissible text-white" role="alert">
                            <span class="text-sm text-uppercase">
                                <?php echo $message; ?><br>
                                <?php echo $date; ?>
                            </span>
                            <a href="/update?adnotification=<?php echo $id; ?>">
                                <button type="button" class="btn-close text-lg py-3 opacity-10">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.php");
?>
</div>


</main>

<script src="https://demos.creative-tim.com/material-dashboard/assets/js/core/popper.min.js"></script>
<script src="https://demos.creative-tim.com/material-dashboard/assets/js/core/bootstrap.min.js"></script>
<script src="https://demos.creative-tim.com/material-dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="https://demos.creative-tim.com/material-dashboard/assets/js/plugins/smooth-scrollbar.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://demos.creative-tim.com/material-dashboard/assets/js/material-dashboard.min.js?v=3.0.0"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"85d5ad127e413690","version":"2024.2.1","token":"1b7cbb72744b40c580f8633c6b62637e"}' crossorigin="anonymous"></script>
</body>

</html>