<?php if ($currentTemperature ?? false == true) { ?>

<div class="d-flex justify-content-center">
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
                    <div class="timer col-12" >

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } elseif ($temperatureSummary ?? false == true) {?>

    <div class="summary d-flex row justify-content-center">
        <div class="col-12  col-md-custom">
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
                            <div class="hot col-6">
                                <?= $temperature['celsius'] ?>°C/<?= $temperature['fahrenheit'] ?>°F
                            </div>
                            <div class="cold col-6">
                                <?= $temperature['celsius'] ?>°C/<?= $temperature['fahrenheit'] ?>°F
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-custom">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-custom">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-custom">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12  col-md-custom">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>