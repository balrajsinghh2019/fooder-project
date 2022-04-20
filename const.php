<?php

if($_SERVER['HTTP_HOST'] == 'localhost') {
    // Getting Host Directory.
    $hostDir = explode("\\", dirname(__FILE__, 1));
    $hostDir = $hostDir[count($hostDir) - 1];

    //$baseURL = "http://".$_SERVER['HTTP_HOST']."/".$hostDir."/";
    $baseURL = "http://".$_SERVER['HTTP_HOST']."/fooder-project/";
}
