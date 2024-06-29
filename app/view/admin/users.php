<?php
require("header.php");

?>

<div class="container-fluid py-4">

</div>
</div>


<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preview</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
                $feed = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($feed)) {
                    $id = $row['id'];
                    $brand = $row['brand_name'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $image = $row['profilepic'];
                    $number = $row['number'];
                    $address = $row['address'];
                    $bio = $row['bio'];
                    $balance = $row['balance'];
                ?>
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div>
                                    <img src="adun/app/backend/media/<?php echo $image; ?>" class="avatar avatar-sm rounded-circle me-2" style="object-fit: cover;">
                                </div>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs"><?php echo $brand; ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-normal mb-0"><?php echo $username; ?></p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-normal mb-0"><?php echo $email; ?></p>
                        </td>
                        <td>
                            <div class="row">
                                <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-default<?php echo $id; ?>">Preview</button>


                                <div class="col-md-4">
                                    <div class="modal fade" id="modal-default<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title font-weight-normal" id="modal-title-default"> <?php echo $username; ?> </h6>
                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: left;">
                                                    <img src="adun/app/backend/media/<?php echo $image; ?>" style="height: 200pt; width: 200pt; object-fit: cover;">
                                                    <p style="color: black;">Brand: <?php echo $brand; ?></p>
                                                    <p style="color: black;">Email: <?php echo $email; ?></p>
                                                    <p style="color: black;">Username: <?php echo $username; ?></p>
                                                    <p style="color: black;">Number: <?php echo $number; ?></p>
                                                    <p style="color: black;">Address: <?php echo $address; ?></p>
                                                    <p style="color: black;">Bio: <?php echo $bio; ?></p>
                                                    <p style="color: black;">Balance: <?php echo $balance; ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs"><a href="/update?adusers=<?php echo $id; ?>">delete</a></span>
                            </span>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
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