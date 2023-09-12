<?php
session_start();
include "db_conn.php";
include_once "config.php";

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
  <title>My Profile</title>
  <link rel="stylesheet" href="./css/output.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="./js/main.js"></script>
  <script src="js/mobile-menu.js"></script>
  <link rel="stylesheet" href="./css/style.css" />
</head>

<header class="sticky top-0 z-[1] bg-teal-500 shadow p-5">
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

<body class="bg-teal-400">
  <svg class="fixed bottom-0 h-auto z-[-1] w-full" id="visual" viewBox="0 0 960 540" width="960" height="540" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
    <path d="M0 331L17.8 308.3C35.7 285.7 71.3 240.3 106.8 238.3C142.3 236.3 177.7 277.7 213.2 291.7C248.7 305.7 284.3 292.3 320 277.5C355.7 262.7 391.3 246.3 426.8 253C462.3 259.7 497.7 289.3 533.2 300.2C568.7 311 604.3 303 640 303.2C675.7 303.3 711.3 311.7 746.8 304.2C782.3 296.7 817.7 273.3 853.2 252.2C888.7 231 924.3 212 942.2 202.5L960 193L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#10bcb5"></path>
    <path d="M0 254L17.8 253C35.7 252 71.3 250 106.8 246.8C142.3 243.7 177.7 239.3 213.2 253C248.7 266.7 284.3 298.3 320 317.5C355.7 336.7 391.3 343.3 426.8 331.7C462.3 320 497.7 290 533.2 291.7C568.7 293.3 604.3 326.7 640 337.3C675.7 348 711.3 336 746.8 316.7C782.3 297.3 817.7 270.7 853.2 270C888.7 269.3 924.3 294.7 942.2 307.3L960 320L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#07a29e"></path>
    <path d="M0 380L17.8 380.3C35.7 380.7 71.3 381.3 106.8 383.2C142.3 385 177.7 388 213.2 382.3C248.7 376.7 284.3 362.3 320 361.3C355.7 360.3 391.3 372.7 426.8 363.2C462.3 353.7 497.7 322.3 533.2 312.7C568.7 303 604.3 315 640 314.5C675.7 314 711.3 301 746.8 307.5C782.3 314 817.7 340 853.2 345.7C888.7 351.3 924.3 336.7 942.2 329.3L960 322L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#038988"></path>
    <path d="M0 344L17.8 347.5C35.7 351 71.3 358 106.8 370.2C142.3 382.3 177.7 399.7 213.2 405.3C248.7 411 284.3 405 320 392.5C355.7 380 391.3 361 426.8 351.8C462.3 342.7 497.7 343.3 533.2 354.8C568.7 366.3 604.3 388.7 640 396.3C675.7 404 711.3 397 746.8 395.8C782.3 394.7 817.7 399.3 853.2 393.7C888.7 388 924.3 372 942.2 364L960 356L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#027171"></path>
    <path d="M0 431L17.8 430.5C35.7 430 71.3 429 106.8 418.5C142.3 408 177.7 388 213.2 384.8C248.7 381.7 284.3 395.3 320 395.8C355.7 396.3 391.3 383.7 426.8 388C462.3 392.3 497.7 413.7 533.2 425C568.7 436.3 604.3 437.7 640 438.3C675.7 439 711.3 439 746.8 438.3C782.3 437.7 817.7 436.3 853.2 432C888.7 427.7 924.3 420.3 942.2 416.7L960 413L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#025a5b"></path>
    <path d="M0 420L17.8 419.5C35.7 419 71.3 418 106.8 418.5C142.3 419 177.7 421 213.2 426.5C248.7 432 284.3 441 320 441.7C355.7 442.3 391.3 434.7 426.8 433.7C462.3 432.7 497.7 438.3 533.2 436C568.7 433.7 604.3 423.3 640 424.7C675.7 426 711.3 439 746.8 439.2C782.3 439.3 817.7 426.7 853.2 426.7C888.7 426.7 924.3 439.3 942.2 445.7L960 452L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#034345"></path>
    <path d="M0 461L17.8 462.2C35.7 463.3 71.3 465.7 106.8 469.2C142.3 472.7 177.7 477.3 213.2 478.3C248.7 479.3 284.3 476.7 320 471.7C355.7 466.7 391.3 459.3 426.8 460.7C462.3 462 497.7 472 533.2 477.2C568.7 482.3 604.3 482.7 640 482C675.7 481.3 711.3 479.7 746.8 480C782.3 480.3 817.7 482.7 853.2 481C888.7 479.3 924.3 473.7 942.2 470.8L960 468L960 541L942.2 541C924.3 541 888.7 541 853.2 541C817.7 541 782.3 541 746.8 541C711.3 541 675.7 541 640 541C604.3 541 568.7 541 533.2 541C497.7 541 462.3 541 426.8 541C391.3 541 355.7 541 320 541C284.3 541 248.7 541 213.2 541C177.7 541 142.3 541 106.8 541C71.3 541 35.7 541 17.8 541L0 541Z" fill="#032e30"></path>
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
  <div class="flex justify-center px-10 py-10 sm:px-32 md:px-40 lg:px-60 lg:py-10 grid grid-cols-1 row-span-2 sm:grid-cols-1 gap-5">
    <div class="bg-white rounded-lg shadow-lg p-6 col-span-1 sm:col-span-1  backdrop-blur-lg bg-white/20">
      <strong>Personal Details</strong><br>
      <?php if (is_user_logged_in()) {
        display_customer_details(); ?>
        <!-- Display user's profile information -->
        <h1 class="text-2xl font-semibold mb-4">
          <?php echo $first_name . ' ' . $last_name; ?>
        </h1>
        <p>
          <strong>Phone Number:</strong>
          <?php
          $string = $_SESSION['phone'];
          $int = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
          echo $int; ?>
        </p>
        <p>
          <strong>Email:</strong>
          <?php echo $email; ?>
        </p>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 backdrop-blur-lg bg-white/20" id="concession">
      <div class="flex justify-between items-center">
        <div>
          <strong>Concessions</strong>
          <p>Available:</p>
          <?php echo intval($concessions); ?>
        </div>

        <button id="useButton" class="w-20 h-20 bg-teal-600 text-white font-medium text-xl leading-tight rounded-full shadow-md hover:bg-lavender-700 hover:shadow-xl hover:scale-105 focus:bg-lavender-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-lavender-800 active:shadow-lg transition duration-150 ease-in-out">
          Use
        </button>
      </div>
    <?php
      }
    ?>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 backdrop-blur-lg bg-white/20" id="notice">
      <div class="items-center">
        <strong>Buying More Concessions</strong>
        <p>
          To purchase more Concessions to attend classes, please buy in cash
          from Davey directly, and he will input your purchases into the
          website for you
        </p>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 col-span-1 backdrop-blur-lg bg-white/20" id="notice">
      <div class="flex flex-col"> <!-- Use flex-col to stack elements vertically -->
        <div class="mb-2"><strong>Personal Stats</strong></div>
        <div class="mb-2"><strong>Number of days attended</strong></div>
        <div><strong>You have attended the class ## times in a row!</strong></div>
      </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-gray-800 bg-opacity-75 hidden ">
      <div class="bg-white rounded-lg shadow-lg p-6 w-96 ">
        <h2 class="text-2xl font-semibold mb-4">Confirm Concession Usage</h2>
        <p>Are you sure you want to use this concession?</p>
        <div class="mt-4 flex justify-end">
          <button id="cancelButton" class="px-4 py-2 bg-gray-400 text-white rounded-md mr-4 hover:bg-gray-600">
            Cancel
          </button>
          <button id="confirmButton" class="px-4 py-2 bg-teal-500 text-white rounded-md hover:bg-teal-600">
            Confirm
          </button>
        </div>
      </div>
    </div>

    <!-- JavaScript to control modal visibility -->
    <script>
      // Get modal elements and buttons by ID
      const confirmationModal = document.getElementById("confirmationModal");
      const confirmButton = document.getElementById("confirmButton");
      const cancelButton = document.getElementById("cancelButton");

      // Function to show the modal
      function showConfirmationModal() {
        confirmationModal.classList.remove("hidden");
      }

      // Function to hide the modal
      function hideConfirmationModal() {
        confirmationModal.classList.add("hidden");
      }

      // Event listener for the "Use" button
      const useButton = document.getElementById("useButton");
      useButton.addEventListener("click", showConfirmationModal);

      // Event listeners for the modal buttons
      confirmButton.addEventListener("click", function() {
        // Handle confirmation logic here (e.g., marking concession as used)
        // After handling, hide the modal
        hideConfirmationModal();
      });

      cancelButton.addEventListener("click", hideConfirmationModal);
    </script>
  </div>
  <!-- Footer -->
  <footer class="w-screen fixed bottom-0 mb-auto bg-teal-500 p-4 text-white text-center">
    &copy; 2023 Zumba With Davey
  </footer>
</body>

</html>