<?php
session_start();

$fp = fopen("./database/user_list.txt", "r");
$roles = array();
$emails = array();
$passwords = array();
$names = array();

while (!feof($fp)) {
    $line = fgets($fp);
    $userData = explode(",", $line);
    $roles[] = trim($userData[0]);
    $emails[] = trim($userData[1]);
    $passwords[] = trim($userData[2]);
    $names[] = trim($userData[3]);
}
fclose($fp);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
$password = $_POST['password'];
$errorMessage = '';
for ($i = 0; $i < count($roles); $i++) {
    if($roles[$i] == 'admin'){
        if($emails[$i] == $email && $passwords[$i] == $password){
            $_SESSION['name'] = $names[$i];
            $_SESSION['role'] = $roles[$i];
            header("Location: admin-dashboard.php");
        }else{
            $errorMessage = "Incorrect email or password";
        }
    }elseif($roles[$i] == 'manager'){
        if($emails[$i] == $email && $passwords[$i] == $password){
            $_SESSION['name'] = $names[$i];
            $_SESSION['role'] = $roles[$i];
            header("Location: manager-dashboard.php");
        }else{
            $errorMessage = "Incorrect email or password";
        }
    }elseif($roles[$i] == 'user'){
        if($emails[$i] == $email && $passwords[$i] == $password){
            $_SESSION['name'] = $names[$i];
            $_SESSION['role'] = $roles[$i];
            header("Location: user-dashboard.php");
        }else{
            $errorMessage = "Incorrect email or password";
        }
    }
    
}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - User Authentication and Role Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 h-screen flex items-center justify-center dark:bg-gray-900">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="login.php" method="POST">
                <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@company.com" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <p class="text-red-600">
                    <?php if(strlen($errorMessage)>0){
                        echo $errorMessage;} ?>
                </p>
                <button type="submit" name="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="sign-up.php"
                        class="text-blue-700 hover:underline dark:text-blue-500">Create
                        account</a>
                </div>
            </form>
        </div>
    </section>


</body>

</html>