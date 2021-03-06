<?php if(!defined('ROOT_APP_PATH')) die('can not access');?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?c=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=product">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=login&m=logout">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=color">Color</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input id="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="<?= $keywordSearch; ?>">
            <button id="btnSearch" class="btn btn-outline-success my-2 my-sm-0" type="button">Search</button>
        </form>
    </div>
</nav>