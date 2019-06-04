<?php
    include './comp/head.html';
?>
<!--<body>-->
<?php
include '../Components/menu.php';
?>
<div class="tabs-name">
    <a href="#slide1">Dashboard</a>
    <a href="#slide2">Notifications</a>
</div>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide " data-hash="slide1">


        </div>
        <div class="swiper-slide" data-hash="slide2">
            <span class="heading">Mes créations</span>
            <span class="heading">Mes inscriptions</span>
        </div>
    </div>
    <!-- Add Scrollbar -->
    <!--<div>-->
    <div class="swiper-scrollbar"></div>
    <!--</div>-->
</div>

<!--</body>-->
<?php
include './comp/head_end.html';
?>
