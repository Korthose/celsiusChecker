<?php if ($currentTemperature ?? false == true) { ?>

    <div class="d-flex justify-content-center current-temperature">
        <div class="card">
            <div class="card-body">
                <!--Celsius-->
                <div class="celsius">
                    <?= $temperature['celsius'] ?>°C
                </div>
                <div class="miscellaneous">
                    <div class="row">
                        <div class="fahrenheit col-6">
                            <?= $temperature['fahrenheit'] ?>°F
                        </div>
                        <div class="humidity col-6">
                            <?= $temperature['humidity'] ?>%
                        </div>
                        <div class="timer col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php  } else if ($temperatureSummary ?? false == true) { ?>
    <div class="summary d-flex row justify-content-center">
        <?php foreach ($temperature as $date => $values): ?>
            <div class="col-12 col-md-6 col-lg-3 col-md-custom">
                <div class="card">
                    <div class="card-body">
                        <div class="celsius">
                            <?= $values['avg_celsius'] ?>°C
                        </div>
                        <div class="date">
                            <?= date("d.m.y", strtotime($date)); ?>
                        </div>
                        <div class="miscellaneous">
                            <div class="fahrenheit">
                                AVG: <?= $values['avg_fahrenheit'] ?>°F
                            </div>
                            <div class="humidity">
                                AVG: <?= $values['avg_humidity'] ?>%
                            </div>
                            <div class="hot">
                                <?= $values['max_celsius'] ?>°C/<?= $values['max_fahrenheit'] ?>°F
                            </div>
                            <div class="cold">
                                <?= $values['min_celsius'] ?>°C/<?= $values['min_fahrenheit'] ?>°F
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } ?>
</div>
