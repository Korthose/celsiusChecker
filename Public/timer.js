document.querySelector('.timer').innerHTML = '1:00';
var seconds_left = 600;
var interval = setInterval(function () {
    seconds_left--;
    document.querySelector('.timer').innerHTML = '0:' + seconds_left.toString().padStart(2, '0');
    if (seconds_left == 0) {
        document.querySelector('.timer').innerHTML = '';
        location.reload();
    }
}, 1000);
