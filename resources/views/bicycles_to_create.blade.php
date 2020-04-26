{{-- @extends('layouts.app') --}}
{{-- @section('bicycles_to_create') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: lightgreen;
        }

        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>

<body>

    @auth
    <div>
        Logged in user:
        {{Auth::user()->name}} <br>
        with email: {{auth()->user()->email}}

    </div>
    <div>
        <form action="/bicycle" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your biycle name.." required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" placeholder="Description" required>

            <label for="Price">Price</label>
            <input type="text" id="price" name="price" placeholder="Price" required numeric>


            {{-- <label for="sell_or_rent_or_service">Where to the bicycle</label>
            <select id="sell_or_rent_or_service" name="is_sellable">
                <option value="to_sell">to Sell</option>
                <option value="to_rent">to Rent</option>
                <option value="to_service">to Sevice</option>
            </select> --}}

            {{-- <label for="sell_or_rent_or_service">Where to the bicycle</label>
            <select id="sell_or_rent_or_service" name="is_sellable">
                <option value="1">to Sell</option>
                <option value="1">to Rent</option>
                <option value="1">to Sevice</option>
            </select> --}}

            {{-- <label for="sell_or_rent_or_service">For Sell?</label>
            <select id="sell_or_rent_or_service" name="is_sellable">
                <option value="1">to Sell</option>
            </select>

            <label for="sell_or_rent_or_service">For Rent?</label>
            <select id="sell_or_rent_or_service" name="is_sellable">
                <option value="1">to Rent</option>
            </select>

            <label for="sell_or_rent_or_service">For Service?</label>
            <select id="sell_or_rent_or_service" name="is_serviceable">
                <option value="1">to Service</option>
            </select>

            <input type="submit" value="Submit"> --}}

            <input type="checkbox" id="sellable" name="is_sellable" value="1">
            <label for="is_sellable"> For Sell</label><br>
            <input type="checkbox" id="rentable" name="is_rentable" value="1">
            <label for="is_rentable"> For Rent</label><br>
            <input type="checkbox" id="serviceable" name="is serviceable" value="1">
            <label for="is_serviceable"> For Service</label><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
    @endauth

</body>

</html>
