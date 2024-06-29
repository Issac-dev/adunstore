<?php
require("header.php");

?>

<div class="container-fluid py-4">
    <div class="row">
        <button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Add Products</button>


        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h5 class="">Add Blog Post</h5>
                                <p class="mb-0">Create a Post</p>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" method="post" action="/functions" enctype='multipart/form-data'>
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Body</label>
                                        <textarea type="text" name="body" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required></textarea>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"></label>
                                        <input type="file" name="img" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <p>Keywords (Seperate with Commas ",")</p>
                                        <input type="text" name="keywords" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="add_blog" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ttile</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `blogs` ORDER BY `id` DESC";
                $feed = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($feed)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $body = $row['body'];
                    $image = $row['image'];
                    $date = $row['date'];
                    $keywords = $row['keywords'];
                    $maxLength = 40; // set the maximum length

                    $shortenedText = (strlen($body) > $maxLength) ? substr($body, 0, $maxLength) . '...' : $body;
                ?>
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs"><?php echo $title; ?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-normal mb-0"><?php echo $shortenedText; ?></p>
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
                                <span class="text-dark text-xs"><button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalLong<?php echo $id; ?>">Preiew</button></span>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal fade" id="exampleModalLong<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title font-weight-normal" id="modal-title-default"><?php echo $title; ?></h6>
                                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body font-weight-light" style="text-align: left;">
                                                        <img src="adun/app/backend/media/<?php echo $image; ?>" style="height: 200pt; width: 200pt; object-fit: cover;"><br><br>
                                                        <textarea id="myTextarea" style="width: 100%; height: 100pt;" readonly><?php echo nl2br($body); ?><br>
                                                        Keywords: <?php echo $keywords; ?></textarea>
                                                        <p style="color: black;"><?php echo $date; ?></p>
                                                        <p style="color: black;"><a href="/update?addblog=<?php echo $id; ?>"><button style="width: 150pt;" type="button" class="btn btn-block bg-gradient-primary mb-3">Delete Post</button></a></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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