<?php
require("header.php");
?>


<div class="slider-area section-padding-1">
    <div class="slider-active-2 owl-carousel nav-style-2 dot-style-1">
        <div class="single-slider slider-height-2 bg-aliceblue">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content pt-180 slider-animated-1">
                            <h1 class="animated">Fashion Craft</h1>
                            <p class="animated">Elevate your wardrobe with our timeless Signature Series, featuring classic pieces that exude elegance and style.</p>
                            <div class="slider-btn btn-hover">
                                <a class="animated" href="/script?brand=adun">Shop Now <i class="sli sli-basket-loaded"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-single-img-2 slider-animated-1">
                            <img class="animated" src="https://demo.hasthemes.com/parlo/parlo/assets/img/slider/slider-hm2-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height-2 bg-aliceblue">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content pt-180 slider-animated-1">
                            <h1 class="animated">Casual Chic</h1>
                            <p class="animated">Embrace comfort without compromising style with our Casual Chic collection, perfect for everyday wear with a touch of flair.</p>
                            <div class="slider-btn btn-hover">
                                <a class="animated" href="/script?brand=adun">Shop Now <i class="sli sli-basket-loaded"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-single-img-2 slider-animated-1">
                            <img class="animated" src="https://demo.hasthemes.com/parlo/parlo/assets/img/slider/slider-hm2-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area pt-100 pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30 scroll-zoom">
                    <a href="/script?brand=adun&filter=Women"><img class="animated" src="https://demo.hasthemes.com/parlo/parlo/assets/img/banner/banner-6.png" alt=""></a>
                    <div class="banner-content-2 banner-position-5">
                        <h4>Women</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30 scroll-zoom">
                    <a href="/script?brand=adun&filter=Men"><img class="animated" src="https://demo.hasthemes.com/parlo/parlo/assets/img/banner/banner-7.png" alt=""></a>
                    <div class="banner-content-2 banner-position-5">
                        <h4>Men</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single-banner mb-30 scroll-zoom">
                    <a href="/script?brand=adun&filter=Kids"><img class="animated" src="adun/app/view/images/picc.jpg" alt=""></a>
                    <div class="banner-content-2 banner-position-5">
                        <h4>Kids</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single-banner mb-30 scroll-zoom">
                    <a href="/script?brand=adun&filter=Accessories"><img class="animated" src="https://demo.hasthemes.com/parlo/parlo/assets/img/banner/banner-9.png" alt=""></a>
                    <div class="banner-content banner-position-6">
                        <h3>Everyday Style</h3>
                        <h2>Shine Your <br>Way.</h2>
                        <a href="/script?brand=adun&filter=Accessories">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single-banner mb-30 text-center scroll-zoom">
                    <a href="/script?brand=adun&filter="><img class="animated" src="https://demo.hasthemes.com/parlo/parlo/assets/img/banner/banner-10.png" alt=""></a>
                    <div class="banner-content-3 banner-position-7">
                        <h2>Confidence in Fashion</h2>
                        <a href="/script?brand=adun&filter=">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-70">
    <div class="container">
        <div class="section-title text-center pb-45">
            <h2>Shop the Look:</h2>
            <p> Explore our handpicked outfits and shop the entire look with just a click. Effortlessly elevate your style and make a lasting impression wherever you go.</p>
        </div>
        <div id="shop-1" class="tab-pane active">
            <div class="row ht-products">
                <?php
                require $_SERVER['DOCUMENT_ROOT'] . '/adun/app/admin/connection.php';
                $sql = "SELECT * FROM `products` WHERE `brand_id` = '4' ORDER BY `id` DESC LIMIT 6";
                $feed = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($feed)) {
                    $id = $row['id'];
                    $product = $row['product'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $date = $row['date'];
                    $tags = $row['tag'];
                ?>
                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                        <!--Product Start-->
                        <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                            <div class="ht-product-inner">
                                <div class="ht-product-image-wrap">
                                    <a href="#" class="ht-product-image"> <img src="adun/app/backend/media/<?php echo $image; ?>" alt="<?php echo $product; ?>"> </a>
                                    <div class="ht-product-action">
                                        <ul>
                                            <li><a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?>"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                            <!-- <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                    <li><a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li> -->
                                            <li onclick="addToCart('<?php echo $id; ?>','<?php echo $product; ?>','adun/app/backend/media/<?php echo $image; ?>',<?php echo (int)$price; ?>)"><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ht-product-content">
                                    <div class="ht-product-content-inner">
                                        <div class="ht-product-categories"><a href="#"><?php echo $product; ?></a></div>
                                        <h4 class="ht-product-title"><a href="#"><?php echo $product; ?></a></h4>
                                        <div class="ht-product-price">
                                            <span class="new" style="background-color: none; color: black; font-weight:lighter;">₦<?php echo number_format($price); ?></span>

                                        </div>
                                        <div class="ht-product-ratting-wrap">
                                            <span class="ht-product-ratting">
                                                <span class="ht-product-user-ratting" style="width: 100%;">
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                    <i class="sli sli-star"></i>
                                                </span>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                                <i class="sli sli-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ht-product-action">
                                        <ul>
                                            <li><a href="#"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip">Quick View</span></a></li>
                                            <!-- <li><a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip">Add to Wishlist</span></a></li>
                                    <li><a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip">Add to Compare</span></a></li> -->
                                            <li onclick="addToCart('<?php echo $id; ?>','<?php echo $product; ?>','adun/app/backend/media/<?php echo $image; ?>',<?php echo (int)$price; ?>)"><a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip">Add to Cart</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="ht-product-countdown-wrap">
                                        <div class="ht-product-countdown" data-countdown="<?php echo $date; ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Product End-->
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" role="dialog">
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
                                                    <img src="adun/app/backend/media/<?php echo $image; ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <div class="tab-content quickview-big-img">
                                                <h5><?php echo $product; ?></h5>
                                                <p><?php echo $tags; ?></p>
                                                <p>₦<?php echo number_format($price); ?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -->
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<div class="banner-area pt-80 pb-80 section-margin-1 bg-aliceblue">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7 col-sm-7">
                <div class="banner-img-2 pr-10 scroll-zoom">
                    <a href="product-details.html"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/banner/banner-11.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-5">
                <div class="banner-bg-content pl-100 scroll-zoom">
                    <h3>Grow Your Brand</h3>
                    <h2>Own Your <br> Store.</h2>
                    <button type="button" class="btn btn-primary"><a href="product-details.html">Signup</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-area pt-95 pb-65">
    <div class="container">
        <div class="section-title text-center pb-45">
            <h2>New Blog Posts</h2>
        </div>
        <div class="row">

            <?php
            $sql = "SELECT * FROM `blogs` ORDER BY `id` DESC LIMIT 3";
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


                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="http://localhost/blog?idblog=<?php echo $id; ?>"><img src="adun/app/backend/media/<?php echo $image; ?>" alt=""></a>
                        </div>
                        <div class="blog-content blog-content-mrg-2">
                            <div class="blog-meta blog-meta-mrg">
                                <ul>
                                    <li><a href="http://localhost/blog?idblog=<?php echo $id; ?>"><?php echo $date; ?> </a></li>
                                </ul>
                            </div>
                            <h3><a href="http://localhost/blog?idblog=<?php echo $id; ?>"><?php echo $title; ?></a></h3>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>


        </div>
    </div>
</div>
<div class="instagram-area section-margin-1">
    <div class="container">
        <div class="section-title text-center pb-45">
            <h2>Instagram Feed</h2>
            <p> Step into elegance with Adun. Elevate your style, showcase your uniqueness.</p>
        </div>
    </div>
    <div class="instagram-feed-thumb">
        <div class="instagram-carousel owl-carousel">
            <div class="single-instagram-item">
                <a href="#"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/instagram/instagram-1.jpg" alt=""></a>
            </div>
            <div class="single-instagram-item">
                <a href="#"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/instagram/instagram-2.jpg" alt=""></a>
            </div>
            <div class="single-instagram-item">
                <a href="#"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/instagram/instagram-3.jpg" alt=""></a>
            </div>
            <div class="single-instagram-item">
                <a href="#"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/instagram/instagram-4.jpg" alt=""></a>
            </div>
            <div class="single-instagram-item">
                <a href="#"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/instagram/instagram-5.jpg" alt=""></a>
            </div>
            <div class="single-instagram-item">
                <a href="#"><img src="https://demo.hasthemes.com/parlo/parlo/assets/img/instagram/instagram-6.jpg" alt=""></a>
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
<script>
    let cart = [];
    let totalPrice = 0;

    function addToCart(id, name, image, price) {
        cart.push({
            id,
            name,
            image,
            price
        });
        totalPrice += price
        displayArrayValues(cart, totalPrice)
        console.log(cart)
        console.log(totalPrice)

    }

    function displayArrayValues(myArray, totalPrice) {
        const arrayDiv = document.getElementById('array-values');
        const totalprice = document.getElementById('totalprice');
        const checkout = document.getElementById('checkout');
        totalprice.textContent = "₦" + totalPrice;

        const totallength = document.getElementById('totallength');
        totallength.textContent = myArray.length;

        // Clear previous content
        arrayDiv.innerHTML = "";
        var orderItems = ""
        // Loop through the array and display values
        myArray.forEach((item, index) => {


            const h4 = document.createElement('div');
            h4.innerHTML = "<li class='single-shopping-cart'> <div class='shopping-cart-img'><a href='#'><img alt='' src='" + `${item.image}` + "'></a></div><div class='shopping-cart-title'><h4><a href='#'>" + `${item.name}` + "</a></h4><span>₦" + `${item.price}` + "</span></div></li>";

            // const elementDiv = document.createElement('div');
            // elementDiv.appendChild(h4);
            arrayDiv.appendChild(h4);
            console.log(item.id)
            orderItems += item.id + "-"
        });
        checkout.href = "/checkout?items=" + orderItems + "&adname=4"


        const arrayDiv2 = document.getElementById('array-values2');
        const totalprice2 = document.getElementById('totalprice2');
        const checkout2 = document.getElementById('checkout2');
        totalprice2.textContent = "₦" + totalPrice;

        const totallength2 = document.getElementById('totallength2');
        totallength2.textContent = myArray.length;

        // Clear previous content
        arrayDiv2.innerHTML = "";

        // Loop through the array and display values
        myArray.forEach((item, index) => {


            const h4 = document.createElement('div');
            h4.innerHTML = "<li class='single-shopping-cart'> <div class='shopping-cart-img'><a href='#'><img alt='' src='" + `${item.image}` + "'></a></div><div class='shopping-cart-title'><h4><a href='#'>" + `${item.name}` + "</a></h4><span>₦" + `${item.price}` + "</span></div></li>";

            // const elementDiv = document.createElement('div');
            // elementDiv.appendChild(h4);
            arrayDiv2.appendChild(h4);

        });
        checkout2.href = "/checkout?items=" + orderItems + "&adname=4"
    }
</script>
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