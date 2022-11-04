<?php
    // include "./includes/auth/session.php";
    // session_start();
    // $loginPage = false;
    // if($_SESSION["access"] == 'admin'){
    //     $admin = true;
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <!-- <link rel="stylesheet" href="./dist/output.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <title>Arvie Direct Sales</title>
    <script src="./js/tailwind-3.1.8.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/snap-scroll.js"></script>
</head>
<body class="h-screen w-screen overflow-hidden">
    <?php include_once "./header.php"; ?>

    <div id="site-wrapper" class="h-full w-full">


        <section class="h-full w-full bg-white flex justify-center align-middle">
            <video class="h-screen" autoplay muted loop>
                <source src="./images/Video/Facebook.mp4" type="video/mp4">
            </video>
        </section>


        <section class="h-full w-full">
            <div class="h-full w-full overflow-hidden relative">
                <div class="absolute top-20 left-10 bg-black text-white bg-opacity-0 w-1/2 h-64 z-50 rounded pr-24">
                    <h2 class="font-bold text-3xl mb-3 tracking-wide">Botanical Touch</h2>
                    <p class="font-normal text-xl tracking-wide">Yung pic na gagamitin dito is 16:9 na magkakasama lahat ng botanical products //////Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni animi</p>
                </div>
                <img src="./images/home/306004263_390554313269963_4873686886926008982_n.jpg" class="absolute w-full float-right" alt="">
            </div>
        </section>
        <section class="h-full w-full bg-white relative">
                <div style="transform: translateY(-50%); top: calc(50% + 80px); color: #839b2a;" class="absolute right-10 text-emerald-500 w-1/2 h-64 z-50 rounded pr-24">
                    <h2 class="font-bold text-3xl mb-3 tracking-wide">Product Name</h2>
                    <p class="font-normal text-xl tracking-wide">Yung pic na gagamitin dito is Yung Best seller ng botanical product. Walang Background. Yung text color nito iaadjust pa depende sa Pic na gagamitin //////Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni animi</p>
                </div>
            <img style="transform: translateY(-50%); top: calc(50% + 36px);" src="./images/home/306852854_390554893269905_8417874870045139639_n.jpg" class="h-3/5 absolute top-1/2 left-28" alt="">
        </section>
        <section class="h-full w-full bg-red-300 pt-20">
            <h1>Page Four</h1>
        </section>
        <section class="h-full w-full bg-green-300 pt-20">
            <h1>Page Five</h1>
        </section>
    </div>

    <script>
        var snapScroll = $("section").SnapScroll({
			hashes:true
		});

        var screenHeight = $(window).height();

        $('#site-wrapper').scroll(function () {
            
        });

        $('video').each(function(){
            if ($(this).is(":in-viewport")) {
                $(this)[0].play();
            } else {
                $(this)[0].pause();
            }
        })



        if(window.location.hash == '#home'){
            // $('#homeBtn').addClass('text-black');
            // $('#homeBtn').removeClass('text-white');
            // $('#productsBtn').addClass('text-neutral-400');
            // $('#productsBtn').addClass('hover:text-neutral-700');
            // $('#productsBtn').removeClass('text-neutral-200');
            // $('#productsBtn').removeClass('hover:text-white');
            // $('#aboutBtn').addClass('text-neutral-500');
            // $('#aboutBtn').addClass('hover:text-neutral-700');
            // $('#aboutBtn').removeClass('text-neutral-200');
            // $('#aboutBtn').removeClass('hover:text-white');
            // $('#contactBtn').addClass('text-neutral-500');
            // $('#contactBtn').addClass('hover:text-neutral-700');
            // $('#contactBtn').removeClass('text-neutral-200');
            // $('#contactBtn').removeClass('hover:text-white');
        }
    </script>


</body>
</html>