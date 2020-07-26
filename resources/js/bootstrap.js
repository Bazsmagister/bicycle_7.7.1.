window._ = require("lodash");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    //key: process.env.MIX_PUSHER_APP_KEY,
    key: "692c7c2b819ec75a6d0d",
    //cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    cluster: "eu",
    encrypted: true
});

// var channel = window.Echo.channel("my-channel");
// channel.listen("aRentHasBeenMade", function(data) {
//     alert(data);
//     alert(JSON.stringify(data));
//     alert(JSON.stringify(data.rent.id));
// });

//laracasts
window.Echo.channel("my-channel").listen("aRentHasBeenMade", e => {
    alert("This rent will end at " + e.rent.rentEnds_at + "Enjoy!");
    console.log("a new rent Nr. " + e.rent.id + " has been made");
    alert("a new rent Nr. " + e.rent.id + " has been made");

    document.getElementById("event").innerHTML = e.rent.user_id;

    document.getElementById("event2").innerHTML = e.rent.id;

    //console.log(e);
    //alert(e);
});

window.Echo.channel("my-channel").listen("aRentHasBeenEnded", e => {
    console.log("a rent has been ended");
    alert("a  rent has been ended. really");

    // document.getElementById("event").innerHTML = e.rent.user_id;

    // document.getElementById("event2").innerHTML = e.rent.id;

    // document.getElementById("event").innerHTML = JSON.stringify(data);

    //console.log(e);
    //alert(e);
});

// window.Echo.channel("my-channel").listen("newUser", e => {
//     console.log("a new user added");
//     alert("a new user added");
// });

// window.Echo.channel("my-channel").listen("aRentHasBeenMade", e => {
//     console.log("pippo");
//     alert("pippo");
// });

// document.getElementById("event").innerHTML = JSON.stringify(data);
// document.getElementById("event2").innerHTML = data;
// document.getElementById("event2").innerHTML = e.rent.id;
