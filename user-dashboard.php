<?php
session_start();
if($_SESSION['role'] != 'user'){
    header("Location: login.php");
}
/* ======== Read user ======== */
$fileName = './database/user_list.txt';
$fp = fopen($fileName, 'a+');
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

$data = file('./database/user_list.txt');

?>
<?php include 'includes/header.php'; ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white pb-4">Hello <span
                class="text-green-500"><?php echo $_SESSION['name']; ?></span>
        </h2>
        <!-- Card section start -->

        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white pt-4">User List</h2>
        </div>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Role
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($data); $i++){ ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center">
                            # <?php echo $i + 1; ?>
                        </td>
                        <th scope="row"
                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $names[$i]; ?>
                        </th>

                        <td class="px-6 py-4 text-center">
                            <?php echo $emails[$i]; ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php echo ucwords($roles[$i]); ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php include 'includes/footer.php'; ?>