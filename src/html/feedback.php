<?php
    session_start();
    

    // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    //     // Redirect them to login page or show an error message
    //     header('Location: index3.php'); // Assuming your login page is named 'login.php'
    //     exit;
    // }

    $db = mysqli_connect('localhost','root','','pentacafe');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $foodItemsQuery = "SELECT item_id, item_name FROM menu ORDER BY item_name ASC";
    $foodItemsResult = mysqli_query($db, $foodItemsQuery);
    
    // Preparing the food items array
    $foodItems = [];
    if ($foodItemsResult) {
        while ($row = mysqli_fetch_assoc($foodItemsResult)) {
            $foodItems[] = $row;
        }
    }

    
?>


<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Penta Cafe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body>
    <?php
        include '../php/nav.php';
        include '../php/signin_modal.php';    
        include '../php/rating.php';
    ?>

    <div class="feedback-body">
        <h6>Food Item Feedback</h6>

        <form id="feedbackForm" method="post" action="">
            <label for="foodItem">Choose a food item:</label>
            <select name="foodItem" id="foodItem">
                <?php foreach($foodItems as $item): ?>
                    <option value="<?php echo htmlspecialchars($item['item_id']); ?>">
                        <?php echo htmlspecialchars($item['item_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>

            <input type="submit" value="Submit Feedback">
        </form>

    </div>
    <script src="../js/feedback.js"></script>

    <?php
    
        include '../php/footer.php';
    ?>
    </body>
</html>