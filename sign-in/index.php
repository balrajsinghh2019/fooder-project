<html>

<head>
    <?php
        /**
         * SIGN IN PAGE – THIS PAGE WILL BE USED TO DISPLAY THE LOGIN FORM
         */
        require dirname(__FILE__, 2).'/const.php';

        // redirect user to dashboard if already logged in.
        session_start();
	    if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
            if ( $_SESSION["_user"] == $_COOKIE["_user"] ) {
                header("Location: {$baseURL}/dashboard");
            }
        }

        // Sign in form handler.
        if (!empty($_POST)) {
            include '../commons/Queries.php';
            //include __DIR__ . '\commons\Queries.php';
            $query = new Queries();

            $email = $_POST['email'];
            $password = $_POST['password'];

            // check if user is authenticated
            $authenticated = $query->validateUser($email, $password);

            // check if user is valid then redirect to dashboard else, redirect to same page.
            if (1 == $authenticated[1])
                header("Location: {$baseURL}/dashboard");
            elseif($authenticated[1] == 2)
                header("Location: {$baseURL}/admin");
            else
                header("Location: {$baseURL}/sign-in");
            // if ($authenticated)
            //     header("Location: {$baseURL}/dashboard");
            // else
            //     header("Location: {$baseURL}/sign-in");

        }

        // get the meta script
        require '../scripts/meta.php';
        // create an object of meta generator class
        $meta = new Metatags();
        // get the title
        $title = $meta->title('Sign In Page');
        // get the description
        $description = $meta->description('Sign In Page');
        // get the keywords
        $keywords = $meta->keywords('Login, Sign In, Fooder Login');
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

<body>
    <section class="min-h-screen bg-white">
        <div>
            <div>
                <!-- Require header.php -->
                <?php require '../views/header.php'; ?>
            </div>
            <div class="mx-6 md:min-h-screen md:mx-0 md:flex">
                <div class="hidden md:block md:w-1/3 bg-gradient-to-r from-pink-100 to-white">
                    <Sidebar />
                </div>
                <div class="my-12 md:my-0">
                    <div class="flex items-center justify-center h-full">
                        <div class="w-[574px] max-w-xl space-y-8">
                            <h1 class="font-medium text-4xl"> Sign In </h1>
                            <!-- <?php echo $baseURL; echo "  ---  "; echo $_SERVER['HTTP_HOST']; ?> -->
                            <form action="<?php echo $baseURL . 'sign-in/index.php' ?>" method="post">
                                <div class="flex flex-col space-y-2">
                                    <div class="flex flex-col justify-between">
                                        <div class="flex flex-col">
                                            <label class="text-sm font-medium text-gray-200"> Enter email </label>
                                            <br />
                                            <input class="p-3 border-2 rounded-lg w-full" type="Email" name="email"
                                                placeholder="hello@fooder.com" />
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <div class="flex justify-between">
                                        <label class="text-sm font-medium text-gray-200"> Enter password </label>
                                        <label class="text-base font-medium text-slate-body">
                                            <a href="" class="hover:text-slate-blue">
                                                Forget Password?
                                            </a>
                                        </label>
                                    </div>
                                    <input class="p-3 border-2 rounded-lg" name="password" type="password"
                                        placeholder="" />
                                </div>
                                <button type="submit"
                                    class="flex items-center justify-center w-full px-6 py-4 space-x-2 rounded-lg bg-blue-600 filter hover:brightness-125">
                                    <span class="text-white"> Sign In </span>
                                </button>
                            </form>
                            <div class="text-left">
                                <p class="text-slate-body">
                                    Don't have an account?
                                    <a href=<?php echo $baseURL.'sign-up'?>>
                                        <span class="underline text-slate-blue">
                                            Register
                                        </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div>
        <!-- Require footer.php -->
        <?php require '../views/footer.php'; ?>
    </div>
</body>

</html>