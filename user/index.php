
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <!-- <link rel="stylesheet" href="./dist/output.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <title>Arvie Direct Sales</title>
    <script src="../js/tailwind-3.1.8.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>

    <title>Arvie Cosmetic & Skincare  ProductsTrading</title>
</head>
<body>
    <?php include_once "./user-header.php"; ?>
    <div class="flex flex-row">
        <div class="basis-80 h-screen">
            <?php include_once "./user-nav.php"; ?>
        </div>
        <div style="width: calc(100vw - 320px);" class="pt-24 px-6 pb-6 bg-emerald-100 h-screen">
            <!-- Top Content -->
            <div class="h-60 bg-emerald-800 rounded-2xl">
                <div class="h-full pl-6 py-5 grid grid-rows-9 text-white items-center">
                    <div class="font-medium text-xl">Overall Income</div>
                    <div class="row-span-2 text-3xl font-black">₱ 169,000,069.00</div>
                    <div class="row-span-2 text-3xl font-medium">Available Balance as of Sept 22, 2022</div>
                    <div class="row-span-4 text-5xl font-black">₱ 6,900,069.00</div>
                </div>
            </div>
            <!-- Bottom Content -->
            <div style="height: calc(100% - 264px);" class="mt-6 p-6 bg-gray-200 rounded-2xl">
                <h1 class="text-2xl font-black">Income Details</h1>
                <h2 class="text-xl font-black text-neutral-500">Today</h2>
                <div style="height: calc(100% - 60px);" class="w-full overflow-auto">
                    <!-- i-while loop lang to -->

                        <!-- Pag from Direct Referral -->
                        <div class="w-full h-24 bg-emerald-400 mt-3 rounded-xl grid grid-cols-3 grid-rows-2">
                            <div class="self-end text-center text-2xl font-bold">Category</div>
                            <div class="self-end text-center text-2xl font-bold">New Member Name</div>
                            <div class="row-span-2 self-center text-end mr-5 text-4xl font-black">+ ₱ 500.00</div>
                            <div class="self-start text-center text-xl font-medium">Direct Referral</div>
                            <div class="self-start text-center text-xl font-medium">Joe Murphy</div>
                        </div>

                        <!-- Pag from Indirect Referral -->
                        <div class="w-full h-24 bg-emerald-400 mt-3 rounded-xl grid grid-cols-4 grid-rows-2">
                            <div class="self-end text-center text-2xl font-bold">Category</div>
                            <div class="self-end text-center text-2xl font-bold">Downline Name</div>
                            <div class="self-end text-center text-2xl font-bold">New Member Name</div>
                            <div class="row-span-2 self-center text-end mr-5 text-4xl font-black">+ ₱ 10.00</div>
                            <div class="self-start text-center text-xl font-medium">Indirect Referral</div>
                            <div class="self-start text-center text-xl font-medium">Joe Murphy</div>
                            <div class="self-start text-center text-xl font-medium">Billy Black</div>
                        </div>

                        <!-- Pag from rebate -->
                        <div class="w-full h-24 bg-emerald-400 mt-3 rounded-xl grid grid-cols-4 grid-rows-2">
                            <div class="self-end text-center text-2xl font-bold">Category</div>
                            <div class="self-end text-center text-2xl font-bold">Type</div>
                            <div class="self-end text-center text-2xl font-bold">Downline Name</div>
                            <div class="row-span-2 self-center text-end mr-5 text-4xl font-black">+ ₱ 30.00</div>
                            <div class="self-start text-center text-xl font-medium">Rebate</div>
                            <div class="self-start text-center text-xl font-medium">Botanical</div>
                            <div class="self-start text-center text-xl font-medium">Billy Black</div>
                        </div>

                        <!-- Pag out or withdraw -->
                        <div class="w-full h-24 bg-emerald-400 mt-3 rounded-xl grid grid-cols-3 grid-rows-2">
                            <div class="self-end text-center text-2xl font-bold">Category</div>
                            <div class="self-end text-center text-2xl font-bold"></div>
                            <div class="row-span-2 self-center text-end mr-5 text-4xl font-black">- ₱ 999,000.00</div>
                            <div class="self-start text-center text-xl font-medium">Withdrawal</div>
                            <div class="self-start text-center text-xl font-medium"></div>
                        </div>

                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
