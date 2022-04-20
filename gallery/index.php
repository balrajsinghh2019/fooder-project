<html>

<head>
    <?php


/**
 * Gallery PAGE – THIS PAGE WILL BE USED TO DISPLAY THE Recipe Gallery
 */


// get the meta script
require '../scripts/meta.php';
// create an object of meta generator class
$meta = new Metatags();
// get the title
$title = $meta->title('Gallery Page');
// get the description
$description = $meta->description('Gallery Page');
// get the keywords
$keywords = $meta->keywords('Gallery, Photos, Images');
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
    <div>
        <!-- Require header.php -->
        <?php require '../views/header.php'; ?>
    </div>
    <section class="bg-gray-50 py-16 md:py-[90px] px-6 md:px-0">
        <div class="m-auto max-w-7xl">
            <div>
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <h5 class="text-base font-bold tracking-wider uppercase text-yellow-600">Fooder</h5>
                        <h2 class="my-4 font-medium text-slate-headline text-4xl">Recipe
                            Gallery</h2>
                    </div>
                    <div class="md:w-1/2">
                        <p class="max-w-[555px] text-[#2C3242] text-opacity-75 text-[21px]">
                            Explore hundreds of recipes created by Fooder users.
                        </p>
                    </div>
                </div>
                <div class="mt-12 md:mt-[120px]">
                    <div id={'gallery'}>
                        <div class="flex space-x-[30px]">
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80"
                                    alt="image1" />
                            </div>
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=781&q=80"
                                    alt="image2" />
                            </div>
                        </div>
                        <div class="flex mt-[30px] space-x-[30px]">
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80"
                                    alt="image1" />
                            </div>
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="image2" />
                            </div>
                        </div>
                        <div class="flex mt-[30px] space-x-[30px]">
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1484723091739-30a097e8f929?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=749&q=80"
                                    alt="image1" />
                            </div>
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1478145046317-39f10e56b5e9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="image2" />
                            </div>
                            <div>
                                <img class="transition-all duration-200 cursor-pointer hover:scale-105"
                                    src="https://images.unsplash.com/photo-1484980972926-edee96e0960d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                    alt="image2" />
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