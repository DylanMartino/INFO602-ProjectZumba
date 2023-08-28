<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Zumba With Davey</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/mobile-menu.js"></script>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body class="bg-gray-100">
<!-- Header -->
<header class="bg-teal-500 p-5">
    <nav class="container mx-auto flex justify-between items-center">
        <div class="text-white text-2xl font-bold">Zumba With Davey</div>
        <div class="md:hidden">
            <!-- Mobile menu button (navbar-burger) -->
            <button id="mobile-menu-button" class="text-teal-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                     class="bi bi-list" viewBox="0 0 16 16">
                    <path
                        d="M2.5 4.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM2.5 9a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 0-1H3a.5.5 0 0 0-.5.5zM2.5 13.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu" class="hidden">
                <ul class="text-white text-xl font-semibold">
                    <li class="py-2">Home</li>
                    <li class="py-2">About</li>
                    <li class="py-2">Classes</li>
                    <li class="py-2">Contact</li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block">
            <!-- Desktop menu -->
            <ul class="flex space-x-4 text-white text-xl font-semibold">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Classes</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `customer` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
      <div class="min-h-screen flex items-center justify-center">
        <div class="bg-teal-100 p-10 rounded shadow-md">
            <!---------------- CLIENT LOGIN -------------->
            <h2 class="text-2xl text-center font-bold mb-4 text-teal-900">User Login</h2>
            <form action="#" method="POST">
                <div class="mb-2">
                    <input type="email" id="email" name="loginEmail" class="w-full border border-gray-300 rounded-full px-3 py-2" placeholder="Email" required>
                </div>
                <div class="mb-2">
                    <input type="password" id="password" name="loginPassword" class="w-full border border-gray-300 rounded-full px-3 py-2" placeholder="Password" required>
                    <i id="eye-icon" class="fas fa-eye float-right"></i>
                </div>
                <div class="mb-2">
                    <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-full hover:bg-teal-400">Login</button>
                </div>
              </form>
            <hr class="my-6">
        </div>
    </div>
<?php
    }
?>
</body>
</html>