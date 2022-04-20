<?php 
    require dirname(__FILE__, 2).'/const.php';
    
    // File upload path
    $targetDir = $_SERVER['DOCUMENT_ROOT'].'/fooder-project/uploads/';

    if (!empty($_SESSION["_user"]) && !empty($_COOKIE["_user"])) {
        if ( $_SESSION["_user"] == $_COOKIE["_user"] ) {
            if (!empty($_POST)) {
                // print_r($_POST);
                // print_r($_FILES["image"]["name"]);
                // die();
                if($_POST['price_range_starts'] < $_POST['price_range_ends']) {
                    if(!empty($_FILES["image"]["name"])) {
                        $fileName = basename($_FILES["image"]["name"]);
                        $targetFilePath = $targetDir . $fileName;
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        // Allow certain file formats
                        $allowTypes = array('jpg','png','jpeg','jfif');
                        if(in_array($fileType, $allowTypes)){
                            // Upload file to server
                            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath) && $_SESSION["_user"]){
                                include '../commons/Queries.php';
                                $query = new Queries();
                                $data = [
                                    'title' => $_POST['title'],
                                    'description' => $_POST['description'],
                                    'image' => '/fooder-project/uploads/' . $fileName,
                                    'price_range_starts' => $_POST['price_range_starts'],
                                    'price_range_ends' => $_POST['price_range_ends'],
                                    'minutes_to_prepare' => $_POST['minutes'],
                                    'uid' => $_SESSION["_user"]
                                ];
                                
                                if ($query->addPost($data)) {
                                    header('Location: ' . $baseURL . '/dashboard');
                                }
                                else {
                                    ?>
                                    <script>alert('Not able to add in DB');</script>
                                    <?php
                                }
                            }
                            else {
 
                                    // <!-- <script>alert('Sorry, there was an error uploading your file.');</script> -->
                                echo "1";die();
                                header('Location: ' . $baseURL . '/post-recipe');
                            }
                        }
                        else {
                                // <script>alert('Sorry, only JPG, JPEG, PNG & jfif files are allowed to upload.');</script>
                            echo "2";die();
                            header('Location: ' . $baseURL . '/post-recipe');
                        }
                    }
                }
                else {

                    // <script>confirm("End Price should be greater than starting one.");</script>
 
                    header('Location: ' . $baseURL . '/post-recipe');
                }
            }
        }
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="relative z-0 mb-6 w-full group">
        <input type="text" name="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
        <label for="title" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
    </div>
    <div class="relative z-0 mb-6 w-full group">
        <textarea id="message" name="description" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required></textarea>
        <label for="description" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
    </div>
    <div class="relative z-0 mb-6 w-full group">
        <input type="file" name="image" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
        <label for="image" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload Image</label>
    </div>
    <div class="grid xl:grid-cols-2 xl:gap-6">
        <div class="relative z-0 mb-6 w-full group">
            <input type="number" name="price_range_starts" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required min="0"/>
            <label for="price_range_starts" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price Range Starts</label>
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input type="number" name="price_range_ends" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required min="0"/>
            <label for="price_range_ends" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price Range Ends</label>
        </div>
    </div>
    <div class="grid xl:grid-cols-2 xl:gap-6">
        <div class="relative z-0 mb-6 w-full group">
        <input type="number" name="minutes" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required min="0"/>
            <label for="minutes" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Minutes to prepare</label>
        </div>
    </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">POST</button>
</form>
