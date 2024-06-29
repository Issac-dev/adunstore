<?php
require("header.php");
?>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<div class="breadcrumb-area pt-35 pb-35 bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">contact us </li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="contact-info-area">
                    <h2>Get In Touch</h2>
                    <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elituis. </p>
                    <div class="contact-info-wrap">
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="sli sli-location-pin"></i>
                            </div>
                            <div class="contact-info-content">
                                <p>Address goes here, street, Crossroad 123.</p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="sli sli-envelope"></i>
                            </div>
                            <div class="contact-info-content">
                                <p><a href="#">info@example.com</a> / <a href="#">info@example.com</a></p>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-info-icon">
                                <i class="sli sli-screen-smartphone"></i>
                            </div>
                            <div class="contact-info-content">
                                <p>+1 35 776 859 000 / +1 35 776 859 011</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="contact-from contact-shadow">
                    <form id="contact-form" action="http://whizthemes.com/mail-php/contact/mail.php" method="post">
                        <input name="name" type="text" placeholder="Name">
                        <input name="email" type="email" placeholder="Email">
                        <input name="subject" type="text" placeholder="Subject">
                        <textarea name="message" placeholder="Your Message"></textarea>
                        <button class="submit" type="submit">Send Message</button>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div><br><br>
        <div id="mapid" style="width: 100%; height: 400px;"></div>

        <!-- Leaflet JavaScript -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <script>
            // Initialize the map
            var mymap = L.map('mapid').setView([51.505, -0.09], 13);

            // Add a tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            // Add a marker
            L.marker([51.5, -0.09]).addTo(mymap)
                .bindPopup('A marker on the map.')
                .openPopup();
        </script>
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
<script>
    function init() {
        var mapOptions = {
            zoom: 11,
            scrollwheel: false,
            center: new google.maps.LatLng(40.709896, -73.995481),
            styles: [{
                    "featureType": "landscape",
                    "stylers": [{
                            "hue": "#FFBB00"
                        },
                        {
                            "saturation": 43.400000000000006
                        },
                        {
                            "lightness": 37.599999999999994
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "stylers": [{
                            "hue": "#FFC200"
                        },
                        {
                            "saturation": -61.8
                        },
                        {
                            "lightness": 45.599999999999994
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "stylers": [{
                            "hue": "#FF0300"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 51.19999999999999
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "stylers": [{
                            "hue": "#FF0300"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 52
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "stylers": [{
                            "hue": "#0078FF"
                        },
                        {
                            "saturation": -13.200000000000003
                        },
                        {
                            "lightness": 2.4000000000000057
                        },
                        {
                            "gamma": 1
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "stylers": [{
                            "hue": "#00FF6A"
                        },
                        {
                            "saturation": -1.0989010989011234
                        },
                        {
                            "lightness": 11.200000000000017
                        },
                        {
                            "gamma": 1
                        }
                    ]
                }
            ]
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.709896, -73.995481),
            map: map,
            icon: 'assets/img/icon-img/2.png',
            animation: google.maps.Animation.BOUNCE,
            title: 'Snazzy!'
        });
    }
    google.maps.event.addDomListener(window, 'load', init);
</script>
<!-- Main JS -->
<script src="https://demo.hasthemes.com/parlo/parlo/assets/js/main.js"></script>

</body>

</html>