@extends('layouts.app')

@section('content')

{{-- <script>
    var path = "{{ route('autocompleteUser') }}";
$('input.typeahead').typeahead({
source: function (query, process) {
return $.get(path, { query: query }, function (data) {
return process(data);
});
}
});
</script> --}}

<h4>NameDateMap:</h4>

<div>
    <ul>
        @foreach ( $userCollectionsmap as $name => $date)
        <li>
            {{  $name }} | Joined at: {{  $date }}
        </li>

        @endforeach
    </ul>

</div>

<script>
    //doesn't work:
        // function check_pass() {
        //     if (document.getElementById('password').value ==
        //             document.getElementById('confirm_password').value) {
        //         document.getElementById('submit').disabled = false;
        //     } else {
        //         document.getElementById('submit').disabled = true;
        //     }
        // }


       /*  var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.style.backgroundColor="red";
            confirm_password.setCustomValidity("Passwords Don't Match");
        }

        } else {
            confirm_password.setCustomValidity('');

        }

        password.onchange = validatePassword();
        confirm_password.onkeyup = validatePassword(); */


        // var check = function() {
        // if (document.getElementById('password').value ==
        //     document.getElementById('confirm_password').value) {
        //     document.getElementById('message').style.color = 'green';
        //     document.getElementById('message').innerHTML = 'matching';
        // } else {
        //     document.getElementById('message').style.color = 'red';
        //     document.getElementById('message').innerHTML = 'not matching';
        // }
        // }


        function check() {
        if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        }
        }


        function check2() {
        var passwordvalue = document.getElementById("password_reg").value;
        var passwordconfirmvalue = document.getElementById("confirm_password").value;

        if (passwordvalue == passwordconfirmvalue){
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
            alertMe();
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
            alertMe();
        }}
        //document.getElementById("pasword").onkeyup = function() {check2()};
        //document.getElementById("confirm_pasword").onkeyup = function() {check2()};

        document.getElementById("password_reg").addEventListener("onchange", check2);
        document.getElementById("confirm_password").addEventListener("keyup", check2);
         //equivalent
        //document.onkeyup = check2;
        //document.addEventListener("keyup", check2);
        //document.getElementById("confirm_password").addEventListener("keyup", alertMe);

        function alertMe(){
        alert(passwordvalue);
        alert(passwordconfirmvalue);
        }

</script>

{{-- @foreach(Auth::user()->unreadNotifications as $not)
    <li>
        <a class="dropdown-item">new rent has been created: {{$not->created_at}}</a>
</li>
@endforeach --}}

{{--  @foreach(Auth::user()->unreadNotifications as $not)
    {{$not}}
<li>
    <a class="dropdown-item">new rent Expires: {{$not->data['expires']}}</a>
    <br>
    <a class="dropdown-item">new rent fakedata: {{$not->data['data2']}}</a>
</li>
@endforeach --}}




@endsection
