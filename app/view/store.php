<?php
require("script.php");
?>

<?php
require("header.php");
?>



<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/adun/app/view/images/picc.jpg">
    <link rel="icon" type="image/png" href="/adun/app/view/images/picc.jpg">
    <title>
        Adun store - <?php echo $brand; ?>
    </title>

    <link rel="canonical" href="https://adun.store/brand=<?php echo $brand; ?>" />

    <meta name="keywords" content="<?php echo $brand; ?>">
    <meta name="description" content="<?php echo $bio; ?>">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@adun">
    <meta name="twitter:title" content="<?php echo $brand; ?>">
    <meta name="twitter:description" content="<?php echo $bio; ?>">
    <meta name="twitter:creator" content="@adun">
    <meta name="twitter:image" content="/adun/app/backend/media/<?php echo $img; ?>">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="<?php echo $brand; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://adun.store/brand=<?php echo $brand; ?>" />
    <meta property="og:image" content="/adun/app/backend/media/<?php echo $img; ?>" />
    <meta property="og:description" content="<?php echo $bio; ?>" />
    <meta property="og:site_name" content="<?php echo $brand; ?>" />

</head>



<div class="breadcrumb-area pt-35 pb-35 bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Adun</a>
                </li>
                <li class="active"><?php echo $brand; ?> </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-top-bar">
                    <!-- <div class="select-shoing-wrap">
                                <div class="shop-select">
                                    <select>
                                        <option value="">Sort by newness</option>
                                        <option value="">A to Z</option>
                                        <option value=""> Z to A</option>
                                        <option value="">In stock</option>
                                    </select>
                                </div>
                                <p>Showing 1–12 of 20 result</p>
                            </div> -->
                    <div class="shop-tab nav">
                        <a class="active" href="#shop-1" data-toggle="tab">
                            <i class="sli sli-grid"></i>
                        </a>
                        <a href="#shop-2" data-toggle="tab">
                            <i class="sli sli-menu"></i>
                        </a>
                    </div>
                </div>
                <div class="shop-bottom-area mt-35">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row ht-products">





                                <?php

                                $sql = "SELECT * FROM `products` WHERE `brand_id` = '$brand_id' AND `tag` LIKE '%" . $size . $filter_search . $filter . "%' ORDER BY `id` DESC";
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
                                                            <span class="new" style="background-color: none; color: black; font-weight:lighter;">$<?php echo number_format($price); ?></span>

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
                                                                <p>$<?php echo number_format($price); ?></p>
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



                        <div id="shop-2" class="tab-pane">
                            <?php
                            $sql = "SELECT * FROM `products` WHERE `brand_id` = '$brand_id' AND `tag` LIKE '%" . $size . $filter_search . $filter . "%' ORDER BY `id` DESC";
                            $feed = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($feed)) {
                                $id = $row['id'];
                                $product = $row['product'];
                                $image = $row['image'];
                                $price = $row['price'];
                                $date = $row['date'];
                                $tag = $row['tag'];
                            ?>
                                <div class="shop-list-wrap shop-list-mrg2 shop-list-mrg-none mb-30">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="product-list-img">
                                                <a href="#">
                                                    <img src="adun/app/backend/media/<?php echo $image; ?>" alt="<?php echo $product; ?>">
                                                </a>
                                                <div class="product-quickview">
                                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#exampleModals<?php echo $id; ?>"><i class="sli sli-magnifier-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 align-self-center">
                                            <div class="shop-list-content">
                                                <h3><a href="#"><?php echo $product; ?></a></h3>
                                                <p><?php echo $tag; ?></p>
                                                <div class="shop-list-price-action-wrap">
                                                    <div class="shop-list-price-ratting">
                                                        <div class="ht-product-list-price">
                                                            <span class="new" style="background-color: none; color: black; font-weight:lighter;">$<?php echo number_format($price); ?></span>

                                                        </div>
                                                        <div class="ht-product-list-ratting">
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                            <i class="sli sli-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ht-product-list-action">
                                                        <a class="list-wishlist" title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                                        <a onclick="addToCart('<?php echo $id; ?>','<?php echo $product; ?>','adun/app/backend/media/<?php echo $image; ?>',<?php echo (int)$price; ?>)" class="list-cart" title="Add To Cart" href="#"><i class="sli sli-basket-loaded"></i> Add to Cart</a>
                                                        <a class="list-refresh" title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModals<?php echo $id; ?>" tabindex="-1" role="dialog">
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
                                                            <p>$<?php echo number_format($price); ?></p>
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
            <div class="col-lg-3">
                <div class="sidebar-style mr-30">
                    <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Search </h4>
                        <div class="pro-sidebar-search mb-50 mt-25">
                            <form class="pro-sidebar-search-form" action="/script" method="get">
                                <input type="hidden" name="brand" value="<?php echo $brand; ?>">
                                <input type="text" name="filter_search" placeholder="Search here...">
                                <button>
                                    <i class="sli sli-magnifier"></i>
                                </button>

                        </div>
                    </div>
                    <div class="sidebar-widget mt-40">
                        <h4 class="pro-sidebar-title">Size </h4>
                        <div class="sidebar-widget-list mt-20">
                            <ul>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value="XXL" name="size"> <a href="#">XXL </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value="XL" name="size"> <a href="#">XL </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value="L" name="size"> <a href="#">L </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value="SM" name="size"> <a href="#">SM </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-50">
                        <h4 class="pro-sidebar-title">Tag </h4>
                        <div class="sidebar-widget-tag mt-25">
                            <ul>
                                <li><a href="http://adun.store/script?brand=<?php echo $brand; ?>&filter=Clothing">Clothing</a></li>
                                <li><a href="http://adun.store/script?brand=<?php echo $brand; ?>&filter=Accessories">Accessories</a></li>
                                <li><a href="http://adun.store/script?brand=<?php echo $brand; ?>&filter=Men">For Men</a></li>
                                <li><a href="http://adun.store/script?brand=<?php echo $brand; ?>&filter=Women">Women</a></li>
                                <li><a href="http://adun.store/script?brand=<?php echo $brand; ?>&filter=Fashion">Fashion</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget-list-left">
                        <button type="submit" name="filter" class="btn btn-primary"> Submit</button>
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
        totalprice.textContent = "$" + totalPrice;

        const totallength = document.getElementById('totallength');
        totallength.textContent = myArray.length;

        // Clear previous content
        arrayDiv.innerHTML = "";
        var orderItems = ""
        // Loop through the array and display values
        myArray.forEach((item, index) => {


            const h4 = document.createElement('div');
            h4.innerHTML = "<li class='single-shopping-cart'> <div class='shopping-cart-img'><a href='#'><img alt='' src='" + `${item.image}` + "'></a></div><div class='shopping-cart-title'><h4><a href='#'>" + `${item.name}` + "</a></h4><span>$" + `${item.price}` + "</span></div></li>";

            // const elementDiv = document.createElement('div');
            // elementDiv.appendChild(h4);
            arrayDiv.appendChild(h4);
            console.log(item.id)
            orderItems += item.id + "-"
        });
        checkout.href = "/checkout?items=" + orderItems + "&adname=" + <?php echo $brand_id; ?>


        const arrayDiv2 = document.getElementById('array-values2');
        const totalprice2 = document.getElementById('totalprice2');
        const checkout2 = document.getElementById('checkout2');
        totalprice2.textContent = "$" + totalPrice;

        const totallength2 = document.getElementById('totallength2');
        totallength2.textContent = myArray.length;

        // Clear previous content
        arrayDiv2.innerHTML = "";

        // Loop through the array and display values
        myArray.forEach((item, index) => {


            const h4 = document.createElement('div');
            h4.innerHTML = "<li class='single-shopping-cart'> <div class='shopping-cart-img'><a href='#'><img alt='' src='" + `${item.image}` + "'></a></div><div class='shopping-cart-title'><h4><a href='#'>" + `${item.name}` + "</a></h4><span>$" + `${item.price}` + "</span></div></li>";

            // const elementDiv = document.createElement('div');
            // elementDiv.appendChild(h4);
            arrayDiv2.appendChild(h4);

        });
        checkout2.href = "/checkout?items=" + orderItems + "&adname=" + <?php echo $brand_id; ?>
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