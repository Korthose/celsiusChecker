<?php
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!--    <link href="../CSS/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../CSS/stylesheet.css" rel="stylesheet">
    <meta charset="UTF-8">
    <!--TODO $Titel einfügen-->
    <title> <?= $title ?? '' ?> </title>
</head>
<body>
<div class="container">
    <?php include __DIR__ . '/Partials/navbar.php'; ?>

    <?php include __DIR__ . '/Partials/temperatureCard.php' ?>
</div>
<script src="../../bin/timer.js"></script>
</body>
</html>

