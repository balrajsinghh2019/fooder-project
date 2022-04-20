<?php

$request = $_SERVER['REQUEST_URI'];

// Getting last part of URL alias.
if ($request[strlen($request) - 1] === '/')
    $request = substr($request, 0, -1);
$request = explode('/', $request);
$request = $request[count($request) - 1];

switch ($request) {
    case '/' :
        require __DIR__ . '/home/index.php';
        break;
    case 'fooder-project' :
        require __DIR__ . '/home/index.php';
        break;
    case '/gallery' :
        require __DIR__ . '/gallery/index.php';
        break;
    case '/search' :
        require __DIR__ . '/search/index.php';
        break;
    case '/sign-in' :
        require __DIR__ . '/sign-in/index.php';
        break;
    case '/sign-up' :
        require __DIR__ . '/sign-up/index.php';
        break;
    case '/trends' :
        require __DIR__ . '/trends/index.php';
        break;
    case '/dashboard' :
        require __DIR__ . '/dashboard/index.php';
        break;
    case '/logout' :
        require __DIR__ . '/logout/index.php';
        break;
    case '/delete-confirm' :
        require __DIR__ . '/dashboard/delete.php';
        break;
    case '/users' :
        require __DIR__ . '/users/index.php';
        break;
    case '/dashboard/admin' :
        require __DIR__ . '/admin/index.php';
        break;
    case '/post-recipe' :
        require __DIR__ . '/post-recipe/index.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/404/index.php';
        break;
}
?>