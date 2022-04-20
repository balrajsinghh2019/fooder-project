<?php
    require dirname(__FILE__, 2).'/const.php';
?>

<header>
    <div class="text-sm bg-black text-white text-center bg-gradient-to-r from-yellow-500 to-orange-500">
        <div class="py-5 px-12 max-w-7xl m-auto">
            <div class="flex justify-between">
                <div>
                    <a href="<?php echo $baseURL?>" class="font-bold"> Fooder </a>
                    <?php
                        // redirect user to dashboard if already logged in.
                        $status = session_status();
                        if($status == PHP_SESSION_NONE){
                            //There is no active session
                            session_start();
                        }else
                         if($status == PHP_SESSION_DISABLED){
                            //Sessions are not available
                        }else
                         if($status == PHP_SESSION_ACTIVE){
                            //Destroy current and start new one
                            // session_destroy();
                            if (empty($_SESSION["_user"])) {
                                session_destroy();
                            }
                            session_start();
                        }
                        if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"]) ) {
                            if ( $_SESSION["_user"] == $_COOKIE["_user"] ) {
                                //print_r($_SESSION["_user"]);print_r($_COOKIE["_user"]);
                    ?>
                    <form action="<?php echo $baseURL . 'logout' ?>" method="post">
                        <button type="submit"
                            class="flex items-center justify-center px-6 py-4 space-x-2 rounded-lg bg-orange-600 filter hover:brightness-125">
                            <span class="text-white"> Logout </span>
                        </button>
                    </form>
                    <?php
                            }
                        }
                    ?>
                </div>
                <div>
                    <div class="space-x-12">
                        <a class="hover:font-bold animation duration-200 hover:underline"
                            href="<?php echo $baseURL.'search'?>"> 🔎 &nbsp;
                            Search </a>
                        <a class="hover:font-bold animation duration-200 hover:underline"
                            href=<?php echo $baseURL.'trends'?>> Trending
                            Recipes </a>
                            <?php 
                        if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"]) ) {
                            if ( $_SESSION["_user"] == $_COOKIE["_user"] ) {
                        ?>
                        <a class="hover:font-bold animation duration-200 hover:underline px-2 py-1 bg-yellow-600 rounded-full" href=<?php echo $baseURL.'dashboard'?>> Dashboard </a>
                        <a class="hover:font-bold animation duration-200 hover:underline px-2 py-1 bg-yellow-600 rounded-full" href=<?php echo $baseURL.'users'?>> Foodies </a>
                        <?php
                            }
                        }
                        else {
                        ?>
                        <a class="hover:font-bold animation duration-200 hover:underline" href=<?php echo $baseURL.'sign-in'?>> Sign In </a>
                        <a class="hover:font-bold animation duration-200 hover:underline" href=<?php echo $baseURL.'sign-up'?>> Sign Up </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>