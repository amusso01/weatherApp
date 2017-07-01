<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        #map {
            height: 400px;
            width: 550px;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo $MEDIA.'\js\script.js';?>"></script>
    <link rel="stylesheet" href="<?php echo $MEDIA.'\css\style.css'?>">
    <title>Weather 2.0</title>
</head>
<body>
<header>
    <div class="title">
        <h1>Weather 2.0</h1>
    </div>
    <div class="search">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" id="searchForm">
            <?php if(isset($_GET["location"])&&(trim($_GET['location'])!=='')) {
                $location=$_GET['location'];}else{$location='';}
            ?>
            <input id="location" type="text" name="location" value="<?php echo htmlspecialchars($location)?>">
            <input id="submit" type="submit" value="Search location">
        </form>
        <ul id="suggestion"></ul>
    </div>
</header>

