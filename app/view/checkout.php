<?php
require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
if (isset($_GET['items'])) {
    $itemsList = $_GET['items'];
    $brandID = $_GET['adname'];
    $List = explode("-", $itemsList);
    $List = array_slice($List, 0, -1);
}

?>

<?php
require("header.php");
?>

<div class="breadcrumb-area pt-35 pb-35 bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Item </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> Checkout </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <?php
                            $total = 0;
                            foreach ($List as $value) {
                                $sql = "SELECT * FROM `products` WHERE `id` = '$value'";
                                $feed = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($feed)) {
                                    $id = $row['id'];
                                    $product = $row['product'];
                                    $image = $row['image'];
                                    $tag = $row['tag'];
                                    $price = (int)$row['price'];
                                    $total += $price;
                            ?>
                                    <div class="login-form-container">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <img style="height: 100pt; width: 100pt; object-fit: cover;" src="adun/app/backend/media/<?php echo $image; ?>" alt="<?php echo $product; ?>">
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <h5><?php echo $product; ?></h5>
                                                <p><?php echo $tag; ?></p>
                                                <p>₦<?php echo $price; ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="login-form-container">
                                <h5>Total: ₦<?php echo $total; ?></h5>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="/functions" method="post">
                                        <input type="hidden" name="items" value="<?php echo $itemsList ?>">
                                        <input type="hidden" name="brandID" value="<?php echo $brandID ?>">
                                        <input type="text" name="firstName" placeholder="First Name" required>
                                        <input type="text" name="lastName" placeholder="Last Name" required>
                                        <input name="email" placeholder="Email or Phone NUmmber" type="text" required>
                                        <input type="text" name="street" placeholder="Street Address" required>
                                        <input type="text" name="city" placeholder="City" required>
                                        <input type="text" name="province" placeholder="Province" required>
                                        <input type="text" name="postal" placeholder="Postal Code" required>
                                        <div class="button-box">
                                            <button type="submit" name="checkout">Proceed Payment</button>
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
</div>
<?php
require("footer.php");
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s2.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content">
                                    <h2>Products Name Here</h2>
                                    <div class="product-details-price">
                                        <span>$18.00 </span>
                                        <span class="old">$20.00 </span>
                                    </div>
                                    <div class="pro-details-rating-wrap">
                                        <div class="pro-details-rating">
                                            <i class="sli sli-star yellow"></i>
                                            <i class="sli sli-star yellow"></i>
                                            <i class="sli sli-star yellow"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </div>
                                        <span>3 Reviews</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                                    <div class="pro-details-list">
                                        <ul>
                                            <li>- 0.5 mm Dail</li>
                                            <li>- Inspired vector icons</li>
                                            <li>- Very modern style </li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-size-color">
                                        <div class="pro-details-color-wrap">
                                            <span>Color</span>
                                            <div class="pro-details-color-content">
                                                <ul>
                                                    <li class="blue"></li>
                                                    <li class="maroon active"></li>
                                                    <li class="gray"></li>
                                                    <li class="green"></li>
                                                    <li class="yellow"></li>
                                                    <li class="white"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pro-details-size">
                                            <span>Size</span>
                                            <div class="pro-details-size-content">
                                                <ul>
                                                    <li><a href="#">s</a></li>
                                                    <li><a href="#">m</a></li>
                                                    <li><a href="#">l</a></li>
                                                    <li><a href="#">xl</a></li>
                                                    <li><a href="#">xxl</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                        </div>
                                        <div class="pro-details-cart">
                                            <a href="#">Add To Cart</a>
                                        </div>
                                        <div class="pro-details-wishlist">
                                            <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                        </div>
                                        <div class="pro-details-compare">
                                            <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="pro-details-meta">
                                        <span>Categories :</span>
                                        <ul>
                                            <li><a href="#">Minimal,</a></li>
                                            <li><a href="#">Furniture,</a></li>
                                            <li><a href="#">Fashion</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-meta">
                                        <span>Tag :</span>
                                        <ul>
                                            <li><a href="#">Fashion, </a></li>
                                            <li><a href="#">Furniture,</a></li>
                                            <li><a href="#">Electronic</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
</div>










<!-- All JS is here
============================================ -->

<!-- jQuery JS -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Local JS -->
<script src="adun/app/view/media/script.js"></script>
<!-- Popper JS -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/main.js"></script>

</body>

</html>