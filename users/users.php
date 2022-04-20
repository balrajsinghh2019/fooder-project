<?php

include './usersQuery.php';

$query = new UsersQuery();

$userDetails = $query->getAllUserDetails();
// print_r($userDetails);die();
?>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-center">
                    <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Id
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Bio
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Budget
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Email
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            foreach($userDetails as $value) {
          ?>
                        <tr class="border-b">
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                <?php
                echo $value['id'];
              ?>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <?php
                echo $value['name'];
              ?>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <?php
                echo $value['favorite_food'];
              ?>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <?php
                echo $value['budget'];
              ?>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <?php
                echo $value['email'];
              ?>
                            </td>
                        </tr>
                        <?php
            }
          ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>