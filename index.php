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

    <style>
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent; /* make scrollbar transparent */
        }

        @media only screen and (min-width: 600px) {

        }
    </style>


</head>
<body class="h-screen w-screen overflow-x-hidden lg:overflow-hidden">
    <?php include_once "./header.php"; ?>

    <div id="site-wrapper" class="h-full w-full">

        <!-- Section 1 - Vid -->
        <section class="h-full w-full bg-white flex justify-center align-middle">
            <video class="h-screen" autoplay muted loop>
                <source src="./images/Video/Facebook.mp4" type="video/mp4">
            </video>
        </section>

        <!-- Section 2 - All Kapenato Product -->
        <section class="lg:h-full w-full">
            <div class="h-full w-full overflow-hidden flex flex-col lg:flex-row pt-16 px-5 pb-5 text-center">
                <img src="./images/home/313494676_984470152947312_671734084199669322_n.png" class="shadow-xl h-1/2 w-2/3 lg:h-auto lg:w-1/2 m-auto" alt="">
                <div class="bg-black text-emerald-500 bg-opacity-0 lg:w-1/2 h-64 z-50 rounded pr-24 pl-10 self-center pt-10">
                    <h2 class="font-bold text-3xl mb-3 tracking-wide">Kapenato</h2>
                    <p class="font-normal text-xl tracking-wide">Yung pic na gagamitin dito is 16:9 na magkakasama lahat ng kapenato products //////Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni animi</p>
                </div>
            </div>
        </section>

        <!-- Section 3 - Best Seller of Kapenato -->
        <section class="lg:h-full w-full">
            <div class="h-full w-full overflow-hidden flex flex-col lg:flex-row pt-16 px-5 pb-5 text-center">
                <div class="bg-black text-emerald-500 bg-opacity-0 lg:w-1/2 h-64 z-50 rounded pr-24 pl-10 self-center pt-10 order-2 lg:order-2">
                    <h2 class="font-bold text-3xl mb-3 tracking-wide">Product Name</h2>
                    <p class="font-normal text-xl tracking-wide">Yung pic na gagamitin dito is Yung Best seller ng kapenato product. Walang Background. Yung text color nito iaadjust pa depende sa Pic na gagamitin //////Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni animi</p>
                </div>
                <img src="./images/home/306072115_381930417465686_3571361897092709235_n.jpg" class="shadow-xl h-1/2 w-2/3 lg:h-auto lg:w-1/2 m-auto order-1 lg:order-2" alt="">
            </div>
        </section>

        <!-- Section 4 - All Botanical Product -->
        <section class="lg:h-full w-full">
            <div class="h-full w-full overflow-hidden flex flex-col lg:flex-row pt-16 px-5 pb-5 text-center">
                <img src="./images/home/306004263_390554313269963_4873686886926008982_n.jpg" class="shadow-xl h-1/2 w-2/3 lg:h-auto lg:w-1/2 m-auto" alt="">
                <div class="bg-black text-emerald-500 bg-opacity-0 lg:w-1/2 h-64 z-50 rounded pr-24 pl-10 self-center pt-10">
                    <h2 class="font-bold text-3xl mb-3 tracking-wide">Botanical prod</h2>
                    <p class="font-normal text-xl tracking-wide">Yung pic na gagamitin dito is 16:9 na magkakasama lahat ng botanical products //////Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni animi</p>
                </div>
            </div>
        </section>

        <!-- Section 5 - Best Seller of Botanical -->
        <section class="lg:h-full w-full mb-10 lg-mb-0">
            <div class="h-full w-full overflow-hidden flex flex-col lg:flex-row pt-16 px-5 pb-5 text-center">
                <div class="bg-black text-emerald-500 bg-opacity-0 lg:w-1/2 h-64 z-50 rounded pr-24 pl-10 self-center pt-10 order-2 lg:order-2">
                    <h2 class="font-bold text-3xl mb-3 tracking-wide">Product Name</h2>
                    <p class="font-normal text-xl tracking-wide">Yung pic na gagamitin dito is Yung Best seller ng botanical product. Walang Background. Yung text color nito iaadjust pa depende sa Pic na gagamitin //////Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni animi</p>
                </div>
                <img src="./images/home/306852854_390554893269905_8417874870045139639_n.jpg" class="shadow-xl h-1/2 w-2/3 lg:h-auto lg:w-1/2 m-auto order-1 lg:order-2" alt="">
            </div>
        </section>

        <!-- Section 6 - All products -->
        <section class="lg:h-full w-full mb-10 lg-mb-0">
            <div class="h-full w-full overflow-hidden pt-16 px-5 pb-5 text-center text-blue-600 font-bold text-3xl">
                <h1 class="mb-10">Other Products</h1>
                <!-- List ng lahat ng product. Image nalang -->
                <img src="./images/home/215854234_178635767642998_3572427526744193900_n.jpg" class="m-auto h-5/6" alt="">
            </div>
        </section>

        <!-- Section 7 - Pricing -->
        <section class="lg:h-full w-full">
            <style>
            #pricing-block-5 {
                height: 300px;
                padding-top: 55px;
            }

            @media (min-width: 992px) {
                #pricing-block-5 {
                height: 400px;
                padding-top: 80px;
                }
            }
            .background-radial-gradient {
                /* background-color: hsl(161, 20%, 24%) 80%; */
                background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(161, 70%, 45%) 15%,
                    hsl(161, 76%, 36%) 35%,
                    hsl(161, 72%, 29%) 75%,
                    hsl(161, 64%, 24%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(161, 70%, 45%) 15%,
                    hsl(161, 76%, 36%) 35%,
                    hsl(161, 72%, 29%) 75%,
                    hsl(161, 64%, 24%) 80%,
                    transparent 100%);
            }
            </style>

            <div id="pricing-block-5" class="background-radial-gradient text-center text-white">
                <h2 class="text-3xl font-bold text-center mb-12">Pricing</h2>
            </div>

            <div class="grid lg:grid-cols-3 px-6 md:px-12 xl:px-32" style="margin-top: -200px">
                <div class="p-0 py-12 order-2 lg:order-1">
                    <div class="block rounded-lg shadow-lg bg-white h-full lg:rounded-tr-none lg:rounded-br-none">
                    <div class="p-6 border-b border-gray-300 text-center">
                        <p class="uppercase mb-4 text-sm">
                        <strong>Package A</strong>
                        </p>
                        <h3 class="text-2xl mb-3">
                            <strong>₱ 1,000.00</strong>
                        </h3>
                    </div>
                    <div class="p-6">
                        <ol class="list-inside">
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>4 Packs of Kapenato
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Benefits 1
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Benefits 2
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>

                <div class="p-0 order-1 lg:order-2">
                    <div class="block rounded-lg shadow-lg bg-white h-full z-10">
                    <div class="p-6 border-b border-gray-300 text-center">
                        <p class="uppercase mb-4 text-sm">
                        <strong>Become a Stockerist</strong>
                        </p>
                        <h3 class="text-2xl mb-3">
                            <strong>₱ 50,000.00</strong>
                        </h3>

                    </div>
                    <div class="p-6">
                        <ol class="list-inside">
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Lifetime
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Benefits 1
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Benefits 2
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Benefits 3
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>

                <div class="p-0 py-12 order-3 lg:order-3">
                    <div class="block rounded-lg shadow-lg bg-white h-full lg:rounded-tl-none lg:rounded-bl-none">
                    <div class="p-6 border-b border-gray-300 text-center">
                        <p class="uppercase mb-4 text-sm">
                        <strong>PACKAGE B</strong>
                        </p>
                        <h3 class="text-2xl mb-3">
                        <strong>₱ 1,125.00</strong>
                        </h3>

                    </div>
                    <div class="p-6">
                        <ol class="list-inside">
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>15 Bottles of botanical rugby
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Nakakaadik
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Amoy menthol
                            </li>
                            <li class="mb-4 flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                                class="text-green-600 w-4 h-4 mr-2" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                </path>
                                </svg>Pwede ipangmumog
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 8 - Contact Us -->
        <section class="h-full w-full relative">
            <div style="transform: translateY(-50%);" class="absolute top-1/2">
                <div class="flex justify-center">
                    <div class="text-center lg:max-w-3xl md:max-w-xl">
                        <h2 class="text-3xl font-bold mb-12 px-6">Contact us</h2>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="grow-0 shrink-0 basis-auto mb-12 lg:mb-0 w-full lg:w-5/12 px-3 lg:px-6">
                        <form>
                            <div class="form-group mb-6">
                                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7" placeholder="Name">
                            </div>
                            <div class="form-group mb-6">
                                <input type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8" placeholder="Email address">
                            </div>
                            <div class="form-group mb-6">
                                <textarea class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class=" w-full px-6 py-2.5 bg-blue-600
                            text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Send</button>
                        </form>
                    </div>
                    <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
                        <div class="flex flex-wrap">
                        <div class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6">
                            <div class="flex items-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#2563EB" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Via Cellphone</p>
                                <p class="text-gray-500">+1 234-567-89</p>
                            </div>
                            </div>
                        </div>
                        <div class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6">
                            <div class="flex items-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Via Telephone</p>
                                <p class="text-gray-500">+1 234-567-89</p>
                            </div>
                            </div>
                        </div>
                        <div class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6">
                            <div class="flex align-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none">
                                    <path d="M2345 4629 c-705 -73 -1333 -511 -1649 -1150 -348 -703 -268 -1547 206 -2172 78 -103 249 -280 348 -360 253 -204 579 -358 892 -421 42 -9 84 -16 93 -16 13 0 15 81 15 750 l0 750 -260 0 -260 0 2 272 3 273 258 3 257 2 0 238 c1 330 18 443 91 601 113 244 302 357 644 386 71 6 392 -9 453 -21 l32 -6 0 -239 0 -239 -200 0 c-214 0 -240 -5 -305 -54 -36 -28 -81 -107 -102 -180 -11 -35 -17 -118 -20 -268 l-5 -218 311 0 c277 0 311 -2 311 -16 0 -14 -61 -418 -75 -502 l-6 -32 -269 0 -270 0 0 -755 0 -755 33 6 c182 31 321 70 477 133 375 152 717 434 948 781 178 268 297 605 331 939 80 776 -304 1554 -972 1968 -387 239 -862 349 -1312 302z"/>
                                    </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Facebook</p>
                                <p class="text-gray-500">press@example.com</p>
                            </div>
                            </div>
                        </div>
                        <div class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6">
                            <div class="flex align-start">
                            <div class="shrink-0">
                                <div class="p-4 bg-blue-600 rounded-md shadow-md w-14 h-14 flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="grow ml-6">
                                <p class="font-bold mb-1">Location</p>
                                <p class="text-gray-500">bugs@example.com</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <script>
        var screenWidth = $(window).width();

        if(screenWidth > 1023){
            var snapScroll = $("section").SnapScroll({
                hashes:true
            });
        }

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