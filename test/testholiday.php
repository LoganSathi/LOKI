<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    // Initialize cURL.
    $ch = curl_init();

    // Set the URL that you want to GET by using the CURLOPT_URL option.
    curl_setopt($ch, CURLOPT_URL, 'https://calendarific.com/api/v2/holidays?&api_key=7ee5bef3c652b7e999856c14a222f4716a612015&country=MY&year=2021');

    // Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Execute the request.
    $data = curl_exec($ch);

    // Close the cURL handle.
    curl_close($ch);

    // Print the data out onto the page.
    echo $data;
    ?>
</body>


<script>
    /* $(document).ready(function() {
        $.getJSON("https://calendarific.com/api/v2/holidays?&api_key=7ee5bef3c652b7e999856c14a222f4716a612015&country=MY&year=2021", function(data) {
            console.log(data);
        })
    }); */
</script>

</html>