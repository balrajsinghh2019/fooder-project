<html>
    <head>
    <?php
        require '../scripts/head.php';
        require dirname(__FILE__, 2).'/const.php';
    ?>
    </head>
    <body>
    <?php
    // require '../scripts/head.php';
    // require dirname(__FILE__, 2).'/const.php';
    session_start();
    if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
        if (( $_SESSION["_user"] == $_COOKIE["_user"] ) && $_SESSION["_role_id"] == 2) {
    ?>
        <div class="min-h-screen bg-gradient-to-r from-[#383838] to-[#0a0a0a] px-4 py-4 text-white">
            <?php
                require './adminNav.php';
                include '../users/usersQuery.php';

                $query = new UsersQuery();

                if (!empty($_GET)) {
                    $query->lockUnclockUsers($_GET);
                    header('Location: ' .$_SERVER['PHP_SELF']);
                }
                

                $userDetails = $query->getAllUserDetails();
                // print_r($userDetails);die();

            ?>
            <div class="flex flex-col">
                <div class="sm:-mx-6 lg:-mx-">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-center">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-slate-300 px-6 py-4">
                                            Id
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-slate-300 px-6 py-4">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-slate-300 px-6 py-4">
                                            Bio
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-slate-300 px-6 py-4">
                                            Budget
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-slate-300 px-6 py-4">
                                            Email
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-slate-300 px-6 py-4">
                                            Locked
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($userDetails as $value) {
                                    ?>
                                    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                        <tr class="border-b">
                                            <td class="text-sm text-white font-medium px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    echo $value['id'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    echo $value['name'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    echo $value['favorite_food'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    echo $value['budget'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    echo $value['email'];
                                                ?>
                                            </td>
                                            <td class="text-sm text-white font-light px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    if ($value['locked'] == 1) {
                                                        $check = 'checked';
                                                        $v = 'yes';
                                                    }
                                                    else {
                                                        $check = '';
                                                        $v = 'no';
                                                    }
                                                ?>
                                                <input 
                                                    type="checkbox" 
                                                    name="<?php echo $value['id']; ?>" 
                                                    value="yes" 
                                                    <?php echo $check; ?> 
                                                />
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                        <button type="submit"
                                            class="flex items-center justify-center w-full px-6 py-4 space-x-2 rounded-lg bg-blue-600 filter hover:brightness-125">
                                            <span class="text-white"> BLOCK / UNBLOCK USER </span>
                                        </button>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        else {
            echo "Not valid id or password!";
        }
    }
    else {
    ?>
        <div class="min-h-screen bg-gradient-to-r from-[#383838] to-[#0a0a0a] px-4 py-4 text-white">
            <div class="mt-[200px]">
                <div class="flex justify-center">
                    <h1 class="text-3xl">Not Authorized</h1>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </body>
</html>