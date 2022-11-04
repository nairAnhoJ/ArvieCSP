<nav style="background-color: hsla(0,0%,96%,.3);" class="navbar px-2 sm:px-4 py-2.5 sm:pt-2.5 bg-black bg-opacity-20 shadow fixed w-full z-50 top-0 left-0">
  <div class="container flex flex-wrap justify-between items-center mx-auto">

    <div class="w-2/6 md:hidden flex">
        <button data-collapse-toggle="navbar-sticky" type="button" class="burger-button inline-flex items-center p-2 text-sm text-white rounded-lg focus:outline-none" aria-controls="navbar-sticky" aria-expanded="false">
                <!-- <span class="sr-only">Open main menu</span> -->
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <div class="w-2/6 h-full text-center md:text-left">
        <a href="./index.php" class="inline-block align-middle">
            <img src="./images/logo.jpg" class="h-9 md:h-11" alt="Logo">
            <span class="self-center text-l font-semibold whitespace-nowrap text-white"></span>
        </a>
    </div>

    <div class="w-2/6 md:order-2">
        <div class="grid justify-items-end <?php if($loginPage == true || isset($_SESSION["id"])){ echo 'hidden';} ?>">
            <a href="./login.php" class="text-neutral-500 hover:text-neutral-700 border border-neutral-500 hover:border-neutral-700 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-3 md:mr-0">Sign In</a>
        </div>

        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="<?php if(!isset($_SESSION["id"])){ echo 'hidden';} ?> float-right flex items-center text-sm font-medium text-neutral-400 rounded-full hover:text-white md:mr-0" type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-11 h-11 rounded-full" src="./images/user/profile-pic/default-pic.png" alt="user photo">
            <!-- John Arian -->
            <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownAvatarName" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-300 drop-shadow-xl" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 352px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
            <div class="py-3 px-4 text-sm text-gray-900">
            <div class="font-medium "><?php echo $_SESSION["first_name"],' ', $_SESSION["last_name"]; ?></div>
            <div class="truncate"><?php echo $_SESSION["email_address"];?></div>
            </div>
            <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                <li>
                    <a href="<?php if($admin==true){echo './admin/index.php';}else{echo './user/index.php';} ?>" class="block py-2 px-4 hover:bg-gray-200 bg-gray-300">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-200">Edit Profile</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-200">Earnings</a>
                </li>
            </ul>
            <div class="py-1">
            <a href="./includes/auth/signout.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-200">Sign out</a>
            </div>
        </div>
    </div>

    <div class="w-full md:w-2/6 md:order-1 md:flex md:items-center">
        <div class="nav-items hidden justify-between items-center md:flex md:m-auto" id="navbar-sticky">
            <!-- <ul class="flex flex-col md:py-4 pt-6 pb-3 mt-3 bg-transparent border-t border-gray-800 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <a href="#" id="homeBtn" class="block py-2 pr-4 pl-3 text-neutral-700 hover:text-neutral-600 rounded md:bg-transparent md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" id="productsBtn" class="block py-2 pr-4 pl-3 text-neutral-400 hover:text-neutral-600 rounded md:hover:bg-transparent md:p-0">Products</a>
                </li>
                <li>
                    <a href="#" id="aboutBtn" class="block py-2 pr-4 pl-3 text-neutral-400 hover:text-neutral-600 rounded md:hover:bg-transparent md:p-0">About</a>
                </li>
                <li>
                    <a href="#" id="contactBtn" class="block py-2 pr-4 pl-3 text-neutral-400 hover:text-neutral-600 rounded md:hover:bg-transparent md:p-0">Contact</a>
                </li>
            </ul> -->
        </div>
    </div>

  </div>
</nav>
