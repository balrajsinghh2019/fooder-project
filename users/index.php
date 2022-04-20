<html>

<head>
    <?php

        /**
         * SIGN UP PAGE – THIS PAGE WILL BE USED TO DISPLAY THE SIGN UP FORM
         */
        require dirname(__FILE__, 2).'\const.php';

        // get the meta script
        require '../scripts/meta.php';
        // create an object of meta generator class
        $meta = new Metatags();
        // get the title
        $title = $meta->title('User List');
        // get the description
        $description = $meta->description('User List');
        // get the keywords
        $keywords = $meta->keywords('User List, Users');
        // echo the title
        echo $title;
        // echo the description
        echo $description;
        // echo the keywords
        echo $keywords;
    ?>

    <!-- Require basic header scripts -->
    <?php require '../scripts/head.php'; ?>
</head>

<body class="bg-gradient-to-r from-pink-100 to-yellow-200">
    <!-- Require header.php -->
    <?php 
        require '../views/header.php';
    ?>
    <section class="bg-gray-50 py-16 md:py-[90px] px-6 md:px-0">
        <div>
            <div>
                <div class="m-auto max-w-7xl">
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <h5 class="text-base font-bold tracking-wider uppercase text-yellow-600">Fooder</h5>
                            <h2 class="my-4 font-medium text-slate-headline text-4xl">Foodies list</h2>
                        </div>
                    </div>
                    <?php
                    if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
                        if ( $_SESSION["_user"] == $_COOKIE["_user"] ) {
                            require './users.php';
                        }
                    }
                    else {
                ?>
                </div>
                <section class="bg-white font-dm-sans">
                    <div class="py-12 mx-6 md:py-[90px] md:m-auto max-w-7xl">
                        <div
                            class="px-6 py-12 md:py-[90px] md:px-[100px] bg-gradient-to-r from-pink-100 to-yellow-200 rounded-3xl">
                            <div class="flex flex-col items-center justify-between md:flex-row">
                                <div classs="md:w-1/2">
                                    <h2
                                        class="font-medium leading-tight text-center md:text-left text-4xl max-w-[412px] text-slate-headline">
                                        Not Authorized.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <div>
        <!-- Require footer.php -->
        <?php require '../views/footer.php'; ?>
    </div>
</body>

</html>