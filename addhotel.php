<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
    <link rel="stylesheet" href="./css/addhotel.css"> <!-- You can link your CSS file here if needed -->
</head>

<?php include "./partials/header.php" ?>

<body>
    <div class="main">
        <h1>Add Hotel</h1>
        <form action="addHotelHandler.php" method="POST" enctype="multipart/form-data">
            <label for="hotelName">Hotel Name:</label>
            <input type="text" id="hotelName" name="hotelName" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Hotel Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="submit" name="submit" value="Add Hotel"> <!-- Added the 'name' attribute to the submit button -->
        </form>
    </div>
</body>

<?php include "./partials/footer.php" ?>

</html>