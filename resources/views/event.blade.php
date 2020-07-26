@extends('layouts.app')

@section('content')

<h3>
    Event try:

</h3>


{{-- <p>Rent user: id</p>
<p id="event"></p>

<p>Rent id:</p>
<p id="event2"></p> --}}


<script>
    // document.getElementById("event").innerHTML = e.rent.user_id;

    // document.getElementById("event2").innerHTML = e.rent.id;

</script>

<script>
    // If you would like to listen for events on a private channel, use the private method instead. You may continue to chain
   // calls to the listen method to listen for multiple events on a single channel:

    // Echo.private(`my-channel`)
    // .listen('aRentHasBeenEnded', (e) => {
    // console.log(e.update);
    // alert(e.update);
    // });



    // var channel = Echo.channel("my-channel");
    // channel.listen("aRentHasBeenEnded", function(data) {
    // alert(JSON.stringify(data));
    // document.getElementById('event').innerHTML = JSON.stringify(data);
    // document.getElementById('event2').innerHTML = (data);
    // });


    // Echo.private(`App.User.${userId}`)
    // .notification((notification) => {
    // alert(notification.type);
    // console.log(notification.type);
    // });

</script>


@endsection
