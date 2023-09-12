<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['customer_id'])) {
  // User is logged in
  $navbarLinks = array(
    'Home' => './index.php',
    'Prices' => './prices.php',
    'My Account' => './myaccount.php',
    'Logout' => './logout.php' // Add a logout link
  );
} else {
  // User is not logged in
  $navbarLinks = array(
    'Home' => './index.php',
    'Prices' => './prices.php',
    'Register' => './register.php',
    'Login' => './login.php'
  );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link rel="stylesheet" href="output.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- Header -->
<header class="bg-teal-500 shadow p-5">
  <nav id="nav" role="navigation">
    <div class="container mx-auto p-4 flex flex-wrap items-center md:flex-no-wrap">
      <div class="mr-4 md:mr-8">
        <a href="#" rel="home">
          <span class="text-xl text-white">Zumba with Davey</span>
        </a>
      </div>
      <div class="ml-auto md:hidden">
        <button onclick="menuToggle()" class="flex items-center px-3 py-2" type="button">
          <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path fill="currentColor" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div id="menu" class="overflow-hidden md:overflow-visible lg:overflow-visible w-full h-0 transition-all ease-out duration-500 md:transition-none md:w-auto md:flex-grow md:flex md:items-center">
        <ul id="ulMenu" class="flex flex-col duration-300 ease-out sm:transition-none mt-5 mx-4 md:flex-row md:items-center md:mx-0 md:ml-auto md:mt-0 md:pt-0 md:border-0">
          <?php
          // Loop through the $navbarLinks array to generate navbar links
          foreach ($navbarLinks as $text => $link) {
            echo '<li><a class="md:p-2 lg:px-4 font-semibold block text-teal-100 px-4 py-1 hover:text-teal-400 transition duration-100" href="' . $link . '">' . $text . '</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body class="bg-teal-400 max-h-screen">
  <svg id="visual" class="fixed bottom-0 h-auto z-[-1] w-full" viewBox="0 0 900 600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
    <path d="M0 342L21.5 349.8C43 357.7 86 373.3 128.8 370.5C171.7 367.7 214.3 346.3 257.2 331.8C300 317.3 343 309.7 385.8 309.2C428.7 308.7 471.3 315.3 514.2 320.5C557 325.7 600 329.3 642.8 327.8C685.7 326.3 728.3 319.7 771.2 330C814 340.3 857 367.7 878.5 381.3L900 395L900 601L878.5 601C857 601 814 601 771.2 601C728.3 601 685.7 601 642.8 601C600 601 557 601 514.2 601C471.3 601 428.7 601 385.8 601C343 601 300 601 257.2 601C214.3 601 171.7 601 128.8 601C86 601 43 601 21.5 601L0 601Z" fill="#10bcb5"></path>
    <path d="M0 372L21.5 380.3C43 388.7 86 405.3 128.8 414.8C171.7 424.3 214.3 426.7 257.2 428.7C300 430.7 343 432.3 385.8 435.8C428.7 439.3 471.3 444.7 514.2 438.3C557 432 600 414 642.8 409.2C685.7 404.3 728.3 412.7 771.2 405.3C814 398 857 375 878.5 363.5L900 352L900 601L878.5 601C857 601 814 601 771.2 601C728.3 601 685.7 601 642.8 601C600 601 557 601 514.2 601C471.3 601 428.7 601 385.8 601C343 601 300 601 257.2 601C214.3 601 171.7 601 128.8 601C86 601 43 601 21.5 601L0 601Z" fill="#059693"></path>
    <path d="M0 463L21.5 459C43 455 86 447 128.8 441.7C171.7 436.3 214.3 433.7 257.2 436.3C300 439 343 447 385.8 453.8C428.7 460.7 471.3 466.3 514.2 467.8C557 469.3 600 466.7 642.8 461.2C685.7 455.7 728.3 447.3 771.2 447.5C814 447.7 857 456.3 878.5 460.7L900 465L900 601L878.5 601C857 601 814 601 771.2 601C728.3 601 685.7 601 642.8 601C600 601 557 601 514.2 601C471.3 601 428.7 601 385.8 601C343 601 300 601 257.2 601C214.3 601 171.7 601 128.8 601C86 601 43 601 21.5 601L0 601Z" fill="#027171"></path>
    <path d="M0 530L21.5 527C43 524 86 518 128.8 516.2C171.7 514.3 214.3 516.7 257.2 511.8C300 507 343 495 385.8 486.2C428.7 477.3 471.3 471.7 514.2 468.5C557 465.3 600 464.7 642.8 474.5C685.7 484.3 728.3 504.7 771.2 504.2C814 503.7 857 482.3 878.5 471.7L900 461L900 601L878.5 601C857 601 814 601 771.2 601C728.3 601 685.7 601 642.8 601C600 601 557 601 514.2 601C471.3 601 428.7 601 385.8 601C343 601 300 601 257.2 601C214.3 601 171.7 601 128.8 601C86 601 43 601 21.5 601L0 601Z" fill="#034e50"></path>
    <path d="M0 563L21.5 561.5C43 560 86 557 128.8 554.5C171.7 552 214.3 550 257.2 544C300 538 343 528 385.8 522.3C428.7 516.7 471.3 515.3 514.2 517.5C557 519.7 600 525.3 642.8 534.5C685.7 543.7 728.3 556.3 771.2 558.2C814 560 857 551 878.5 546.5L900 542L900 601L878.5 601C857 601 814 601 771.2 601C728.3 601 685.7 601 642.8 601C600 601 557 601 514.2 601C471.3 601 428.7 601 385.8 601C343 601 300 601 257.2 601C214.3 601 171.7 601 128.8 601C86 601 43 601 21.5 601L0 601Z" fill="#032e30"></path>
  </svg>

  <script>
    // Getting hamburguer menu in small screens
    const menu = document.getElementById("menu");
    const ulMenu = document.getElementById("ulMenu");

    function menuToggle() {
      menu.classList.toggle("h-auto"); // Toggle the height property
      menu.classList.toggle("max-h-screen"); //

    }

    // Browser resize listener
    window.addEventListener("resize", menuResize);

    // Resize menu if user changing the width with responsive menu opened
    function menuResize() {
      // First get the size from the window
      const window_size = window.innerWidth || document.body.clientWidth;
      if (window_size > 640) {
        menu.classList.remove("h-32");
      }
    }
  </script>
<div class="flex justify-center p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div class="bg-white rounded-lg shadow-lg p-6 col-span-1 sm:col-span-1 md:col-span-1 lg:col-span-3 backdrop-blur-lg bg-white/20" id="notice">
      <div class="flex flex-col justify-center items-center"> <!-- Use flex-col to stack elements vertically -->
        <strong>Concession Deals</strong>
        <p class="text-center">We have a range of deals to get the best prices!</p>
        <p class="text-center">Please remember that to buy more concessions, see Davey in person and he will happily top you up</p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 col-span-1 relative overflow-hidden backdrop-blur-lg bg-white/20" id="notice">
      <div class=" flex flex-col justify-center items-center">
        <strong class="p-5 text-2xl">One Concession</strong>
        <strong class="text-4xl p-16">$10</strong>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 col-span-1 relative overflow-hidden backdrop-blur-lg bg-white/20" id="notice">
      <div class=" flex flex-col justify-center items-center">
        <strong class="p-5 text-2xl">5 Concession</strong>
        <strong class="text-4xl p-16">$40</strong>
      </div>
      <div class="absolute -bottom-4 -right-20 bg-teal-100 px-20 pb-16 pt-2 -rotate-45">
        <strong class="text-black">Save $10!</strong>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 col-span-1 relative overflow-hidden backdrop-blur-lg bg-white/20" id="notice">
      <div class=" flex flex-col justify-center items-center">
        <strong class="p-5 text-2xl text-center">Ten Concession Bundle</strong>
        <strong class="text-4xl p-16">$75</strong>
      </div>
      <div class="absolute -bottom-4 -right-20 bg-teal-100 px-20 pb-16 pt-2 -rotate-45">
        <strong class="text-black">Save $25!</strong>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class="w-screen fixed bottom-0 mb-auto bg-teal-500 p-4 text-white text-center">
    &copy; 2023 Zumba With Davey
  </footer>
</body>
</html>