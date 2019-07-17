<!DOCTYPE html>
<html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('096d50d6815feaddf8a3', {
      cluster: 'eu',
      forceTLS: true
    });

    var counter = 0;
    var channel = pusher.subscribe('particle-channel');
    channel.bind('particle-data', function(data) {
        counter++;
        console.log(counter);
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>
</html>
