<html>
	<head>
		<script src="https://cdn.tailwindcss.com"></script>
	</head>
	<body class="bg-gradient-to-r from-pink-100 to-yellow-200">
<?php
	require dirname(__FILE__, 2).'\const.php';
	require '../views/header.php';
	//session_start();
	if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
		if ( $_SESSION["_user"] == $_COOKIE["_user"] ) {
			$currentUserId = $_COOKIE["_user"];
			include '../commons/Queries.php';
            $query = new Queries();
            
            if (!empty($_GET) && !empty($_POST)) {
            	$deleteField = $_GET['del'];
            	$confirmation = $_POST['confirmation'];
            	if ($confirmation == 'y') {
            		// die();
            		$deleteStatus = $query->deleteAUserField($deleteField, $currentUserId);
            		if ($deleteStatus) {
            			echo 'Name updated';
            			header('Location: ' . $baseURL . '/dashboard');
            		}
             	}
            		else {
					header('Location: ' . $baseURL . '/dashboard');
            	}
            	
            }

?>
		<form action="<?php echo $baseURL . 'dashboard/delete.php?'.http_build_query(['del' => $_GET['del']]) ?>" method="post">
		    <fieldset>
	            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Gender</label>

	            <div class="flex items-center mb-4">
	             	<input id="country-option-1" type="radio" name="confirmation" value="y" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
	             	<label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
	            </div>

	            <div class="flex items-center mb-4">
	             	<input id="country-option-1" type="radio" name="confirmation" value="n" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="country-option-1" aria-describedby="country-option-1" checked>
	             	<label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
	            </div>
          	</fieldset>
		    <button type="submit"
		        class="flex items-center justify-center w-full px-6 py-4 space-x-2 rounded-lg bg-blue-600 filter hover:brightness-125">
		        <span class="text-white"> Submit </span>
		    </button>
		</form>

<?php
        }
    }
	else {
?>
		<section class="bg-white font-dm-sans">
	        <div class="py-12 mx-6 md:py-[90px] md:m-auto max-w-7xl">
	            <div class="px-6 py-12 md:py-[90px] md:px-[100px] bg-gradient-to-r from-pink-100 to-yellow-200 rounded-3xl">
	                <div class="flex flex-col items-center justify-between md:flex-row">
	                    <div classs="md:w-1/2">
	                        <h2 class="font-medium leading-tight text-center md:text-left text-4xl max-w-[412px] text-slate-headline">
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
