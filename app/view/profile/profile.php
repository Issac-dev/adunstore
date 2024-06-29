<?php
require("header.php");
?>


<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('adun/app/backend/media/<?php echo $image; ?>');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="adun/app/backend/media/<?php echo $image; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?php echo $username; ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        <?php echo $brand; ?>
                    </p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Platform Settings</h6>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0">
                                    <div class="row">
                                        <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Change Brand name</button>


                                        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card card-plain">
                                                            <div class="card-header pb-0 text-left">
                                                                <h5 class="">Change Brand Name</h5>
                                                                <p class="mb-0">Enter your new Brand Name</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <form role="form text-left" method="post" action="/functions" enctype='multipart/form-data'>
                                                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                                                    <div class="input-group input-group-outline my-3">
                                                                        <label class="form-label">Brand Name</label>
                                                                        <input type="text" name="new_brand" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit" name="change_brand" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Enter</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="row">
                                        <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form1">Change Profile image</button>


                                        <div class="modal fade" id="modal-form1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card card-plain">
                                                            <div class="card-header pb-0 text-left">
                                                                <h5 class="">Change Profile image</h5>
                                                                <p class="mb-0">Upload image</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <form role="form text-left" method="post" action="/functions" enctype='multipart/form-data'>
                                                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">

                                                                    <div class="input-group input-group-outline my-3">
                                                                        <label class="form-label"></label>
                                                                        <input type="file" name="img" class=" form-control" onfocus="focused(this)" onfocusout="defocused(this)" accept="image/*" required>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit" name="change_profilepic" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Enter</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="row">
                                        <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form2">Complete Account Setup</button>


                                        <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card card-plain">
                                                            <div class="card-header pb-0 text-left">
                                                                <h5 class="">Complete Account</h5>
                                                                <p class="mb-0">Enter Details</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <form role="form text-left" method="post" action="/functions" enctype='multipart/form-data'>
                                                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                                                    <div class="input-group input-group-outline my-3">
                                                                        <label class="form-label">Bio (Men's wear, Kid's, Women....)</label>
                                                                        <textarea type="text" name="bio" value="<?php echo $bio; ?>" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required></textarea>
                                                                    </div>
                                                                    <div class="input-group input-group-outline my-3">
                                                                        <p>Phone Number</p>
                                                                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                                    </div>
                                                                    <div class="input-group input-group-outline my-3">
                                                                        <p>Address</p>
                                                                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit" name="verify" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Enter</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="row">
                                        <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form3">Change Password</button>


                                        <div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card card-plain">
                                                            <div class="card-header pb-0 text-left">
                                                                <h5 class="">Change Password</h5>
                                                                <p class="mb-0">Enter Details</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <form role="form text-left" method="post" action="/functions" enctype='multipart/form-data'>
                                                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                                                    <div class="input-group input-group-outline my-3">
                                                                        <label class="form-label">New Passsword</label>
                                                                        <input type="password" name="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit" name="change_password" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Enter</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?php echo nl2br($bio); ?>
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">User Name:</strong> <?php echo $username; ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?php echo $phone; ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $email; ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; <?php echo $address; ?></li>

                            </ul>
                        </div>
                        <div class="card-body p-3">

                            <button id="copyButton" style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3">Copy store link</button>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Get the copy button
                                    var copyButton = document.getElementById("copyButton");

                                    // Add event listener to the copy button
                                    copyButton.addEventListener("click", function() {
                                        // Create a temporary input element
                                        var tempInput = document.createElement("input");

                                        // Set its value to the link you want to copy
                                        tempInput.value = "localhost/script?brand=<?php echo $brand; ?>"; // Replace with the actual URL

                                        // Append it to the document body
                                        document.body.appendChild(tempInput);

                                        // Select the text inside the input
                                        tempInput.select();

                                        // Copy the selected text to the clipboard
                                        document.execCommand("copy");

                                        // Remove the temporary input
                                        document.body.removeChild(tempInput);

                                        // Inform the user that the link has been copied
                                        alert("Link copied to clipboard!");
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">News</h6>
                        </div>
                        <div class="card-body p-3">
                            <ul class="list-group">

                                <?php
                                $uid = $_SESSION['uid'];
                                $sql = "SELECT * FROM `notifications` WHERE `brand_id` = '0' ORDER BY `id` DESC";
                                $feed = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($feed)) {
                                    $id = $row['id'];
                                    $message = $row['message'];
                                    $date = $row['date'];
                                ?>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $message; ?></h6>
                                            <p class="mb-0 text-xs"><?php echo $date; ?></p>
                                        </div>
                                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="/notifications">---</a>
                                    <?php
                                }
                                    ?>
                            </ul>
                        </div>
                    </div>
                </div>

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