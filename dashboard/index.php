<html>

<head>
    <?php require '../scripts/head.php'; ?>
</head>

<body class="bg-gradient-to-r from-pink-100 to-yellow-200">
    <?php
	require dirname(__FILE__, 2).'/const.php';
	require '../views/header.php';

	// session_start();
	if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
		if (( $_SESSION["_user"] == $_COOKIE["_user"] ) && $_SESSION["_role_id"] == 1) {
			$currentUserId = $_COOKIE["_user"];
			include '../commons/Queries.php';
            $query = new Queries();

            $userDetails = $query->getUserDetails($currentUserId);
            $userDetails = reset($userDetails);

            // make a variable called recipes that gets all the recipes from the queries
            $recipesUnderBudget = $query->getRecipes($currentUserId);

            // Handling update form requests.
            if (!empty($_POST)) {	
            	if (array_key_exists('name', $_POST)) {
            		$param = [
            			'id' => $currentUserId,
            			'name' => $_POST['name']
            		];
            		$updateStatus = $query->updateUserName($param);
            		if ($updateStatus) {
            			echo 'Name updated';
            		}
            	}
            	if (array_key_exists('email', $_POST)) {
            		$param = [
            			'id' => $currentUserId,
            			'email' => $_POST['email']
            		];
            		$updateStatus = $query->updateUserEmail($param);
            		if ($updateStatus) {
            			echo 'Email updated';
            		}
            	}
            	if (array_key_exists('password', $_POST)) {
            		$param = [
            			'id' => $currentUserId,
            			'password' => $_POST['password']
            		];
            		$updateStatus = $query->updateUserPassword($param);
            		if ($updateStatus) {
            			echo 'Password updated';
            		}
            	}
            	if (array_key_exists('budget', $_POST)) {
            		$param = [
            			'id' => $currentUserId,
            			'budget' => $_POST['budget']
            		];
            		$updateStatus = $query->updateUserBudget($param);
            		if ($updateStatus) {
            			echo 'Budget updated';
            		}
            	}
            	if (array_key_exists('description', $_POST)) {
            		$param = [
            			'id' => $currentUserId,
            			'favorite_food' => $_POST['description']
            		];
            		$updateStatus = $query->updateUserDescription($param);
            		if ($updateStatus) {
            			echo 'Description updated';
            		}
            	}

            	// redirect back to current page.
            	header('Location: ' . $baseURL . '/dashboard');
            }

			// On success dashboard htmls shows here.
?>

    <div class="flex flex-row  rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4 max-w-sm bg-gradient-to-r to-pink-100 from-yellow-200 ">
            <h4><i>Update Information</i></h4>
            <form id="form-user-name-update" action="<?php echo $baseURL . 'dashboard/index.php' ?>" method="post">
                <div class="mb-6">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input name="name" type="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php $userNameParam = (!empty($_GET['name'])) ? $_GET['name'] : '' ; echo $userNameParam ?>"
                        required>
                    <button type="submit"
                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                        Name</button>
                </div>
            </form>
            <form id="form-user-email-update" action="<?php echo $baseURL . 'dashboard/index.php' ?>" method="post">
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input name="email" type="email" id="email"
                        value="<?php $emailParam = (!empty($_GET['email'])) ? htmlspecialchars($_GET['email']) : '' ; echo $emailParam ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    <button type="submit"
                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                        Email</button>
                </div>
            </form>
            <form id="form-user-password-update" action="<?php echo $baseURL . 'dashboard/index.php' ?>" method="post">
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                    <input name="password" type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    <button type="submit"
                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                        Password</button>
                </div>
            </form>
            <form id="form-user-budget-update" action="<?php echo $baseURL . 'dashboard/index.php' ?>" method="post">
                <div class="mb-6">
                    <label for="budget"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Budget</label>
                    <input name="budget" type="number" id="budget"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php $budgetParam = (!empty($_GET['budget'])) ? htmlspecialchars($_GET['budget']) : '' ; echo $budgetParam ?>"
                        required>
                    <button type="submit"
                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                        Budget</button>
                </div>
            </form>
            <form id="form-user-description-update" action="<?php echo $baseURL . 'dashboard/index.php' ?>"
                method="post">
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?php $descParam = (!empty($_GET['desc'])) ? trim($_GET['desc']) : '' ; echo $descParam ?>"
                        placeholder="Leave a description..."></textarea>
                    <button type="submit"
                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                        Description</button>
                </div>
            </form>
            <a class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" href=<?php echo $baseURL.'post-recipe'?>>Post Recipe</a>
        </div>
        <div class="grid grid-cols-2 divide-x divide-orange-500">
            <div></div>
            <div></div>
        </div>
        <div class="px-6 py-4">
            <div classs="md:w-1/2">
                <h1 class="font-medium leading-tight text-center md:text-left text-4xl text-slate-headline">
                    Welcome <?php $name = (!empty($userDetails['name'])) ? $userDetails['name'] : 'N-A'; echo $name; ?>
                </h1>
                <p>
                    eMail :
                    <?php $email = (!empty($userDetails['email'])) ? $userDetails['email'] : 'N-A'; echo $email; ?>
                </p>
            </div>
            <div classs="md:w-1/2">
                <h3 class="font-small leading-tight text-center md:text-left text-4xl text-slate-headline">
                    <?php 

                	$bio = (!empty($userDetails['favorite_food'])) ? $userDetails['favorite_food'] : ''; 
                	echo $bio; 
                	if (!empty($bio)) {
                ?>
                    <a href="<?php echo $baseURL . 'dashboard/delete.php?del=favorite_food' ?>"><svg
                            class="h-4 w-4 text-orange-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg></a>
                    <?php
                	}
                ?>
                </h3>
            </div>
            <div classs="md:w-1/2">
                <h3 class="font-small leading-tight text-center md:text-left text-4xl text-slate-headline">
                    Budget : upto $
                    <?php 

                $budget = (!empty($userDetails['budget'])) ? $userDetails['budget'] : 'N-A';
                echo $budget;
                if ($budget != 'N-A') {
                ?>
                    <a href="<?php echo $baseURL . 'dashboard/delete.php?del=budget' ?>"><svg
                            class="h-4 w-4 text-orange-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg></a>
                    <?php
                }
                ?>
                </h3>
            </div>

            <?php 

            // run a for each for recipesUnderBudget and print the recipe list div
            if (!empty($recipesUnderBudget)) {
                foreach ($recipesUnderBudget as $recipe) {
                    $recipeId = $recipe['id'];
                    $recipeTitle = $recipe['title'];
                    $recipeImage = $recipe['image_link'];
                    $recipeTimeToCook = $recipe['time_to_cook'];
                    $recipeBody = $recipe['body'];
                    $recipeBody = substr($recipeBody, 0, 100);
                    $recipeBody = $recipeBody . '...';
                    $recipeLink = $baseURL . 'recipe/' . $recipeId;

                    echo '<div class="flex flex-wrap space-x-6 p-12">';
                    echo '<div>';
                    echo '<img class="w-[200px]" src="' . $recipeImage . '" alt="' . $recipeTitle . '" class="w-full h-full object-cover rounded-lg">';
                    echo '<h4 class="text-xl mt-4 max-w-[200px]">' . $recipeTitle . '</h4>';
                    echo '<p class="text-sm">' . $recipeTimeToCook . ' mins</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>


        <?php

		}
		else {
			echo "Not valid id or password.";
		}
	}
	else {
?>
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
</body>

</html>