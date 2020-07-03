function datetime() {
    var now = Date.now();

    var date = new Date();

    //alert(now);
    var time = date.toLocaleTimeString();
    // document.getElementById("demo").innerHTML = now;

    var date = date.toLocaleDateString();

    var dateAndTime = date.toLocaleString("hu-HU"); //doesn't work...

    document.getElementById("demo1").innerHTML = date;
    document.getElementById("demo2").innerHTML = time;
    document.getElementById("demo3").innerHTML = dateAndTime;
}
