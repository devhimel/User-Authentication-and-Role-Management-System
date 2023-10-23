<?php include 'includes/header.php'; ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white pb-4">Hello <span
                class="text-green-500"><?php echo $_SESSION['name']; ?></span>
        </h2>
        <!-- Card section start -->
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="flex flex-col items-center justify-center h-24 rounded bg-teal-500 dark:bg-gray-800">
                <h4 class="text-xl font-bold text-white dark:text-white">Total People</h4>
                <p class="text-3xl font-bold text-white dark:text-white">
                    <?php
                                $data = file('./database/user_list.txt');
                                echo count($data);
                            ?>
                </p>
            </div>
            <div class="flex flex-col items-center justify-center h-24 rounded bg-amber-500 dark:bg-gray-800">
                <h4 class="text-xl font-bold text-white dark:text-white">Admin</h4>
                <p class="text-3xl font-bold text-white dark:text-white">
                    <?php
                                $data = file('./database/user_list.txt');
                                echo count(array_filter($data, function ($line) {
                                    return strpos($line, 'admin') !== false;
                                }))
                            ?>
                </p>
            </div>
            <div class="flex flex-col items-center justify-center h-24 rounded bg-indigo-500 dark:bg-gray-800">
                <h4 class="text-xl font-bold text-white dark:text-white">Manager</h4>
                <p class="text-3xl font-bold text-white dark:text-white">
                    <?php
                                $data = file('./database/user_list.txt');
                                echo count(array_filter($data, function ($line) {
                                    return strpos($line, 'manager') !== false;
                                }));
                            ?>
                </p>
            </div>
            <div class="flex flex-col items-center justify-center h-24 rounded bg-violet-500 dark:bg-gray-800">
                <h4 class="text-xl font-bold text-white dark:text-white">User</h4>
                <p class="text-3xl font-bold text-white dark:text-white">
                    <?php
                                $data = file('./database/user_list.txt');
                                echo count(array_filter($data, function ($line) {
                                    return strpos($line, 'user') !== false;
                                }));
                            ?>
                </p>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>