<?php
session_start();
include "db_conn.php";

// Check if the user is logged in
if (isset($_SESSION['customer_id'])) {
    // User is logged in
    $navbarLinks = array(
        'Home' => './index.php',
        'About' => '#',
        'Classes' => '#',
        'Contact' => '#',
        '' => '#',
        ' ' => '#',
        '  ' => '#',
        'My Account' => './myaccount.php',
        'Logout' => './logout.php' // Add a logout link
    );
} else {
    // User is not logged in
    $navbarLinks = array(
        'Home' => './index.php',
        'About' => '#',
        'Classes' => '#',
        'Contact' => '#',
        '' => '#',
        ' ' => '#',
        '  ' => '#',
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
    <title>Zumba With Davey - Home</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/output.css">
    <script scr="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script scr="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/mobile-menu.js"></script>
    <link rel="stylesheet" href="./css/output.css">
    <link rel="stylesheet" href="./css/style.css"/>

    <body class="bg-gray-100">
      <!-- Header -->
      <header class="bg-teal-500 p-5">
        <nav class="container mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold">Zumba With Davey</div>
            <div class="md:hidden">
                  <!-- Mobile menu button (navbar-burger) -->
                  <button id="mobile-menu-button" class="text-teal-100">
                      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                          <path d="M2.5 4.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM2.5 9a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 0-1H3a.5.5 0 0 0-.5.5zM2.5 13.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                  </button>
                  <!-- Mobile menu (hidden by default) -->
                  <div id="mobile-menu" class="hidden">
                      <ul class="text-white text-xl font-semibold">
                            <?php
                            // Loop through the $navbarLinks array to generate navbar links
                            foreach ($navbarLinks as $text => $link) {
                                echo '<li><a href="' . $link . '">' . $text . '</a></li>';
                            }
                            ?>
                      </ul>
                  </div>
              </div>
            <div class="hidden md:block">
                <!-- Desktop menu -->
                <ul class="flex space-x-4 text-white text-xl font-semibold">
                    <?php
                    // Loop through the $navbarLinks array to generate navbar links
                    foreach ($navbarLinks as $text => $link) {
                        echo '<li><a href="' . $link . '">' . $text . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>
</head>

<body>
    <div class="bg-teal-100 p-10 rounded shadow-md">
            <h2 class="text-2xl text-center font-bold mb-4 text-teal-900">Landing Page</h2>
            <hr class="my-6">
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-teal-500 p-4 text-white text-center">
          &copy; 2023 Zumba With Davey
    </footer>
  </body>
</html>