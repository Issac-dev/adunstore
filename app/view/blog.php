<?php
require("script.php");
?>
<?php
require("header.php");
?>

<div class="breadcrumb-area pt-35 pb-35 bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Blog page </li>
            </ul>
        </div>
    </div>
</div>


<div class="blog-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="row">

                    <?php
                    $sql = "SELECT * FROM `blogs` WHERE `keywords` LIKE '%" . $keyword . $keyword_search  . "%' ORDER BY `id` DESC";
                    $feed = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($feed)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image = $row['image'];
                        $date = $row['date'];
                        $body = $row['body'];
                        $maxLength = 40; // set the maximum length

                        $shortenedText = (strlen($body) > $maxLength) ? substr($body, 0, $maxLength) . '...' : $body;
                    ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-wrap mb-40 text-center scroll-zoom">
                                <div class="blog-img mb-25">
                                    <a href="http://localhost/blog?idblog=<?php echo $id; ?>"><img src="adun/app/backend/media/<?php echo $image; ?>" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <h3><a href="http://localhost/blog?idblog=<?php echo $id; ?>"><?php echo $title; ?></a></h3>
                                    <div class="blog-meta blog-mrg-border">
                                        <ul>
                                            <li><a href="http://localhost/blog?idblog=<?php echo $id; ?>"><?php echo $date; ?> </a></li>
                                        </ul>
                                    </div>
                                    <p><?php echo $shortenedText; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
            <div class="col-lg-3">
                <div class="sidebar-style">
                    <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Search </h4>
                        <div class="pro-sidebar-search mb-50 mt-25">
                            <form class="pro-sidebar-search-form" action="/script" method="get">
                                <input type="text" name="keyword_search" placeholder="Search here...">
                                <button>
                                    <i class="sli sli-magnifier"></i>
                                </button>

                        </div>
                    </div>
                    <div class="sidebar-widget mt-50">
                        <h4 class="pro-sidebar-title">Tags </h4>
                        <div class="sidebar-widget-tag mt-25">
                            <ul>
                                <li><a href="http://localhost/script?keyword=Men">Men</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Account</a></li>
                                <li><a href="#">Store</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                </form>
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
                                <img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s2.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s3.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="https://demo.hasthemes.com/parlo/parlo/https://demo.hasthemes.com/parlo/parlo/assets/img/product/quickview-s2.jpg" alt=""></a>
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