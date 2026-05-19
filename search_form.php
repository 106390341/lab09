<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Inventory</title>
</head>
<body>

    <div class="search-container">
        <h1>Search Car </h1>
        <form action="search_result.php" method="get">
            <label for="model">Enter Car Model Name:</label><br>
            <input type="text" id="model" name="model" required placeholder="model name"><br>
            <input type="submit" value="Search Inventory">
        </form>
    </div>

</body>
</html>