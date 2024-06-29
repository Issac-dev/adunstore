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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preview</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid = $_SESSION['uid'];
                $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
                $feed = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($feed)) {
                    $id = $row['id'];
                    $brand = $row['brand_id'];
                    $tags = $row['tag'];
                    $product = $row['product'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $date = $row['date'];
                ?>
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div>
                                    <img src="adun/app/backend/media/<?php echo $image; ?>" class="avatar avatar-sm rounded-circle me-2" style="object-fit: cover;">
                                </div>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs"><?php echo $product; ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-normal mb-0">₦<?php echo number_format($price); ?></p>
                        </td>
                        <td>
                            <div class="row">
                                <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-default<?php echo $id; ?>">Preview</button>


                                <div class="col-md-4">
                                    <div class="modal fade" id="modal-default<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Product Summarry</h6>
                                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="text-align: left;">
                                                    <img src="adun/app/backend/media/<?php echo $image; ?>" style="height: 200pt; width: 200pt; object-fit: cover;">
                                                    <?php
                                                    $sqlBrand = "SELECT `brand_name` FROM `users` WHERE `id` = '$brand'";
                                                    $feedBrand = mysqli_query($con, $sqlBrand);
                                                    while ($row = mysqli_fetch_array($feedBrand)) {
                                                        $brandName = $row['brand_name'];


                                                    ?>
                                                        <p style="color: black;">Store: <?php echo $brandName; ?></p>
                                                    <?php } ?>
                                                    <p style="color: black;">Product: <?php echo $product; ?></p>
                                                    <p style="color: black;">Price: ₦<?php echo number_format($price); ?></p>
                                                    <p style="color: black;">Tag: <?php echo $tags; ?></p>
                                                    <p style="color: black;">Date: <?php echo $date; ?></p>
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
                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs"><?php echo $date; ?></span>
                            </span>
                        </td>

                        <td class="align-middle">
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs"><a href="/update?adproducts=<?php echo $id; ?>">delete</a></span>
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