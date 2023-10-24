<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Authentication and Role Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 h-screen flex flex-col items-center justify-center dark:bg-gray-900">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-white">User Authentication and Role Management System</h1>
        <h3 class="py-4 text-2xl font-bold text-teal-500 dark:text-white">Hello
            <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?></h3>
        <div class="space-x-4">
            <button
                class="px-6 py-2 text-teal-500 border-2 border-teal-500 rounded hover:bg-teal-500 hover:text-white duration-150 ease-in-out">
                <a href="login.php">Login</a>
            </button>
            <button
                class="px-6 py-2 text-teal-500 border-2 border-teal-500 rounded hover:bg-teal-500 hover:text-white duration-150 ease-in-out">
                <a href="sign-up.php">Register</a>
            </button>
        </div>
    </section>
</body>

</html>