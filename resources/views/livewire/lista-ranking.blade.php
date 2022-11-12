<div>
    <div class="container">
    </div>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f66ba4ef55acfb30f359', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('t-channel');
        channel.bind('t-event', function(data) {
            // alert(JSON.stringify(data));
            window.livewire.emit('emitir1');
        });
    </script>
</div>