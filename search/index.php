<html>

<head>
    <?php

        /**
         * Search Page – THIS PAGE WILL BE USED TO DISPLAY THE SEARCH FORM
         */
        // require dirname(__FILE__, 2).'/const.php';
	    require '../views/header.php';

        include '../commons/Queries.php';
        $query = new Queries();

        // if param is undefined, put param as ""
        $param = isset($_GET['param']) ? $_GET['param'] : "";
                
        $recipes = $query->getSearchResults($param);
        
        
        require '../scripts/meta.php';
        // create an object of meta generator class
        $meta = new Metatags();
        // get the title
        $title = $meta->title('Search Page');
        // get the description
        $description = $meta->description('Search Page');
        // get the keywords
        $keywords = $meta->keywords('Find, Locate, Search Fooder');
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
    </div>
    <section class="bg-white font-dm-sans">
        <div class="py-12 mx-6 md:py-[90px] md:m-auto max-w-7xl">
            <div class="px-6 py-12 md:py-[90px] md:px-[100px] bg-gradient-to-r from-pink-100 to-yellow-200 rounded-3xl">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <div classs="md:w-1/2">
                        <h2
                            class="font-medium leading-tight text-center md:text-left text-4xl max-w-[412px] text-slate-headline">
                            Search our database of recipes
                        </h2>
                    </div>
                    <div class="mt-5 md:w-1/2">
                        <div class="flex items-center rounded-full">
                            <form method="GET" class="flex items-center w-full"
                                action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="text" name="param" class="w-2/3 py-4 p-4 rounded-full outline-none"
                                    placeholder="Search" />
                                <button type="submit"
                                    class="flex items-center justify-center w-1/3 px-12 py-4 space-x-3 rounded-full bg-blue-200 hover:brightness-125">
                                    <span class="text-white"> Search </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            echo '<div class="flex flex-wrap space-x-6 p-12">';
            // run a for each for recipesUnderBudget and print the recipe list div
            if (!empty($recipes)) {
                foreach ($recipes as $recipe) {
                    $recipeId = $recipe['id'];
                    $recipeTitle = $recipe['title'];
                    $recipeImage = $recipe['image_link'];
                    $recipeTimeToCook = $recipe['time_to_cook'];
                    $recipeBody = $recipe['body'];
                    $recipeBody = substr($recipeBody, 0, 100);
                    $recipeBody = $recipeBody . '...';
                    $recipeLink = $baseURL . 'recipe/' . $recipeId;

                   
                    echo '<div>';
                    echo '<img class="w-[200px]" src="' . $recipeImage . '" alt="' . $recipeTitle . '" class="w-full h-full object-cover rounded-lg">';
                    echo '<h4 class="text-xl mt-4 max-w-[200px]">' . $recipeTitle . '</h4>';
                    echo '<p class="text-sm">' . $recipeTimeToCook . ' mins</p>';
                    echo '</div>';
                   
                }
            }
             echo '</div>';
            ?>
    </section>
    <div>
        <!-- Require footer.php -->
        <?php require '../views/footer.php'; ?>
    </div>
</body>

</html>