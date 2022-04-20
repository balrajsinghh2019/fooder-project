<html>
    <head>
    <?php
        require '../scripts/head.php';
        require dirname(__FILE__, 2).'/const.php';
    ?>
    </head>
    <body>
    <?php
    require '../scripts/head.php';
    require dirname(__FILE__, 2).'/const.php';
    session_start();
    if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
        if (( $_SESSION["_user"] == $_COOKIE["_user"] ) && $_SESSION["_role_id"] == 2) {
    ?>
        <div class="min-h-screen bg-gradient-to-r from-[#383838] to-[#0a0a0a] px-4 py-4 text-white">
            <div>
                <div class="flex justify-between">
                    <div>
                        <h1>Fooder | Admin Panel</h1>
                    </div>
                    <div class="text-decoration-none flex list-none space-x-10">
                        <li><a href=<?php echo $baseURL.'admin/users.php'?>>Users</a></li>
                        <li><a href=<?php echo $baseURL.'admin/recipes.php'?>>Recipes</a></li>
                        <li><a href=<?php echo $baseURL.'logout'?>>Logout</a></li>
                    </div>
                </div>
            </div>
            <div class="mt-[200px]">
                <div class="flex justify-center">
                        <h1 class="text-3xl">Admin Panel</h1>
                        <h3>Team Fooder</h3>
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