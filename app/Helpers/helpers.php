<?php

if (! function_exists('myCustomHelper')) {
    function myCustomHelper()
    {
        //dd('hello');
        dump('hello there');
        echo(date('Y-m-d'));

        return "Hey, it\'s working!";
    }
}

//doesn't work
// function myCustomHelper()
// {
//     return "Hey, it\'s working!";
// }
