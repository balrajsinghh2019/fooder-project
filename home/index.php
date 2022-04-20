<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Require header.php -->
    <section class="pt-6 overflow-hidden h-screen bg-gray-50 md:pt-0 md:px-0">
        <?php 
            require 'views/header.php'; 
            require dirname(__FILE__, 2).'/const.php';    
        ?>
        <section class="px-6">
            <div class="mt-20 text-center max-w-[790px] m-auto">
                <h1 class="font-medium leading-snug text-4xl md:text-5xl text-slate-headline">
                    Recipes Simplified
                </h1>
                <p class="text-slate-body text-desktop-subheading mt-6 md:mt-[30px] ">
                    Explore the trending recipes created by Fooder users.
                </p>
                <div class="mt-12">
                    <a href=<?php echo $baseURL.'/sign-in' ?>
                        class="w-full px-8 py-4 text-white rounded-lg bg-blue-500 text-desktop-paragraph md:w-auto filter hover:brightness-125">
                        Access the portal
                    </a>
                </div>
                <div class="flex justify-center mt-12 md:mt-20 pb-12 md:pb-[90px] relative">
                    <div
                        class="absolute top-0 w-[1000px] mt-32 bg-gradient-to-r from-pink-100 to-yellow-100 rounded-full h-[1000px]">
                    </div>
                    <div
                        class="absolute top-0 w-[1000px] mt-32 bg-gradient-to-b from-transparent to-white rounded-full h-[1000px]">
                    </div>
                    <img class="relative rounded-full"
                        src="https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                        alt="Mockup" />
                </div>
            </div>
        </section>
    </section>
</body>

</html>