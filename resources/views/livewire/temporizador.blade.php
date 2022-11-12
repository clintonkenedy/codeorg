<div>
    <strong>Tiempo:</strong> <span id="timer">fd</span>
</div>
<script>
    totalSecs = 7200;
    window.onload = function() {
        Livewire.on('postAdded', () => {
            // incTimer();
            console.log("fds");
        })
    }

    function secondsToString(seconds) {
        var hour = Math.floor(seconds / 3600);
        hour = (hour < 10) ? '0' + hour : hour;
        var minute = Math.floor((seconds / 60) % 60);
        minute = (minute < 10) ? '0' + minute : minute;
        var second = seconds % 60;
        second = (second < 10) ? '0' + second : second;
        return hour + ':' + minute + ':' + second;
    }

    function incTimer() {
        totalSecs--;
        $("#timer").text(secondsToString(totalSecs));
        setTimeout('incTimer()', 1000);
    }
</script>