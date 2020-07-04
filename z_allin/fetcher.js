<script>
    function fetcher()
    {fetch("OnlyDeletedUsers")
        .then(response => response.json())
        .then(data => {
            console.log(data); // Prints result from `response.json()` in getRequest
            console.log(data[0].email);
            alert(data[0].name);
        })
        .catch(error => console.error(error))}
</script>;

<button onclick="fetcher()">Fetch OnlyDeletedUsers</button>;
