<?php
/* ======== Permission Check ======== */
session_start();
if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $fp = fopen("./database/user_list.txt", "a");
    fwrite($fp, "$role, $email, $password, $name\n");
    fclose($fp);
    header("Location: admin-dashboard.php");
}
?>
<?php include 'includes/header.php'; ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg flex items-center justify-center h-screen dark:border-gray-700">

        <section
            class="bg-gray-50 max-w-2xl flex items-center justify-center dark:bg-gray-900 py-12 px-8 sm:px-6 lg:px-8">
            <form action="add-user.php" method="POST">
                <div class="grid gap-8 mb-6 md:grid-cols-2">
                    <div class="col-span-8">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="col-span-8">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input name="password" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>


                    <div class="col-span-8">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            address</label>
                        <input name="email" type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="john.doe@company.com" required>
                    </div>
                    <div class="col-span-8">
                        <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            an option</label>
                        <select name="role" id="roles"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select a Role</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <button type="submit" name="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </form>

        </section>



    </div>
</div>
<?php include 'includes/footer.php'; ?>