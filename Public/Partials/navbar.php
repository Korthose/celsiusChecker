<?php
//    TODO
//    - Links festlegen mit klein
?>
<nav class="cc-navbar navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand">CelsiusChecker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?= $currentTemperature ?? false == true ? 'active' : ''; ?>">
                <a class="nav-link" href="../index.php">Current Temperature</a>
            </li>
            <li class="nav-item <?= $temperatureSummary ?? false == true ? 'active' : ''; ?>">
                <a class="nav-link" href="../summary.php">Last 5 Days</a>
            </li>
        </ul>
    </div>
</nav>
