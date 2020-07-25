import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "692c7c2b819ec75a6d0d",
    cluster: "eu",
    forceTLS: true
});

// var channel = Echo.channel("my-channel");
// channel.listen(".my-event", function(data) {
//     alert(JSON.stringify(data));
// });

var channel = Echo.channel("my-channel");
channel.listen("aRentHasBeenEnded", function(data) {
    alert(JSON.stringify(data));
});
