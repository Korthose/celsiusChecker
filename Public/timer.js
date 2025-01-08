    var seconds_left = 60;
    var interval = setInterval(function () {
        document.querySelector('.timer').innerHTML = --seconds_left;

        if (seconds_left <= 0) {
            document.querySelector('.timer').innerHTML = "0:00";
            location.reload();
            clearInterval(interval);
        }
    }, 1000);