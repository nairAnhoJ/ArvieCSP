<nav class="navbar px-2 sm:px-4 py-2.5 sm:pt-2.5 bg-emerald-800 fixed w-full z-20 top-0 left-0 border-b border-gray-600">
  <div class="container flex flex-wrap justify-between items-center mx-auto">

    <div class="w-2/6 md:hidden flex">
        <button data-collapse-toggle="navbar-sticky" type="button" class="burger-button inline-flex items-center p-2 text-sm text-white rounded-lg focus:outline-none" aria-controls="navbar-sticky" aria-expanded="false">
                <!-- <span class="sr-only">Open main menu</span> -->
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <div class="w-2/6 h-full text-center md:text-left">
        <a href="./index.php" class="inline-block align-middle">
            <img src="./images/logo2.jpg" class="h-9 md:h-11" alt="Logo">
            <span class="self-center text-l font-semibold whitespace-nowrap text-white"></span>
        </a>
    </div>

    <div class="w-2/6 md:order-2">
        <div class="grid justify-items-end <?php if($loginPage == true){ echo 'hidden';} ?>">
            <a href="./login.php" class="text-neutral-300 hover:text-white border border-neutral-300 hover:border-white font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-3 md:mr-0">Sign In</a>
        </div>
    </div>

    <div class="w-full md:w-2/6 md:order-1 md:flex md:items-center">
        <div class="nav-items hidden justify-between items-center md:flex md:m-auto" id="navbar-sticky">
            <ul class="flex flex-col md:py-4 pt-6 pb-3 mt-3 bg-emerald-800 border-t border-gray-800 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-white bg-emerald-700 rounded md:bg-transparent md:text-white md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-neutral-400 hover:text-white rounded hover:bg-emerald-700 md:hover:bg-transparent md:p-0">Products</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-neutral-400 hover:text-white rounded hover:bg-emerald-700 md:hover:bg-transparent md:p-0">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-neutral-400 hover:text-white rounded hover:bg-emerald-700 md:hover:bg-transparent md:p-0">Contact</a>
                </li>
            </ul>
        </div>
    </div>

  </div>
</nav>
