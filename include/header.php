<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.1.0/dist/leaflet.css"
          integrity="sha512-wcw6ts8Anuw10Mzh9Ytw4pylW8+NAD4ch3lqm9lzAsTxg0GFeJgoAtxuCLREZSC5lUXdVyo/7yfsqFjQ4S+aKw=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.1.0/dist/leaflet.js"
            integrity="sha512-mNqn2Wg7tSToJhvHcqfzLMU6J4mkOImSPTxVZAdo+lcPlk+GhZmYgACEe0x35K7YzW1zJ7XyJV/TT1MrdXvMcA=="
            crossorigin=""></script>
    <link rel="stylesheet" href="<?php echo $MEDIA.'\css\style.css'?>">
    <script src="<?php echo $MEDIA.'\js\script.js';?>"></script>
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

