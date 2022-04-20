<?php
    require '../scripts/head.php';
    require dirname(__FILE__, 2).'/const.php';
?>
<div>
    <div class="flex justify-between">
        <div>
            <h1><a href=<?php echo $baseURL.'admin'?>>Fooder | Admin Panel</a></h1>
        </div>
        <div class="text-decoration-none flex list-none space-x-10">
            <li><a href=<?php echo $baseURL.'admin/users.php'?>>Users</a></li>
            <li><a href=<?php echo $baseURL.'admin/recipes.php'?>>Recipes</a></li>
            <li><a href=<?php echo $baseURL.'logout'?>>Logout</a></li>
        </div>
    </div>
</div>