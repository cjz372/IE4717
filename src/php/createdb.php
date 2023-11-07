<?php
    $db = mysqli_connect('localhost','root','','penta');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE IF NOT EXISTS penta_account (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_name VARCHAR(255) NOT NULL,
        customer_email VARCHAR(255) NOT NULL UNIQUE, 
        customer_password VARCHAR(255) NOT NULL,
        customer_card_number VARCHAR(19) NOT NULL, 
        customer_card_expiry DATE NOT NULL, 
        customer_card_cvv VARCHAR(4) NOT NULL
    )";
    

    if (!mysqli_query($db, $sql)) {
        echo "Error creating Products table: " . mysqli_error($db);
    }

    
    // SQL to create a table for food items
    $sql = "CREATE TABLE IF NOT EXISTS food_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        item_name VARCHAR(255) NOT NULL
    )";

    if (!mysqli_query($db, $sql)) {
        echo "Error creating Food Items table: " . mysqli_error($db);
    } else {
        echo "Food Items table created successfully.";
    }

     // SQL to create a simplified feedback table
     $sql = "CREATE TABLE IF NOT EXISTS feedback (
        id INT AUTO_INCREMENT PRIMARY KEY,
        food_item_id INT NOT NULL,
        rating INT NOT NULL,
        feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;";

    if (mysqli_query($db, $sql)) {
        echo "Feedback table created successfully";
    } else {
        echo "Error creating Feedback table: " . mysqli_error($db);
    }

    mysqli_close($db);
?>
