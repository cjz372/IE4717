<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Redirect them to login page or show an error message
        header('Location: index.php'); // Assuming your login page is named 'login.php'
        exit;
    }
    
    $credit_card_info = [];

    if (isset($_SESSION['customer_email'])) {
        // Your database connection code
        $host = 'localhost';
        $db   = 'penta';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        // Convert YYYY-MM-DD to MM/YY
        function convertToExpiryFormat($databaseDate) {
            $date = new DateTime($databaseDate);
            return $date->format('m/y');
        }

        $customer_email = $_SESSION['customer_email'];

        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            $stmt = $pdo->prepare("SELECT customer_card_number, customer_card_expiry, customer_card_cvv FROM penta_account WHERE customer_email = ?");
            $stmt->execute([$customer_email]);
            $credit_card_info = $stmt->fetch();

            // Convert the date format
            if (isset($credit_card_info['customer_card_expiry'])) {
                $credit_card_info['customer_card_expiry'] = convertToExpiryFormat($credit_card_info['customer_card_expiry']);
            }
        } catch (\PDOException $e) {
            // Handle error if needed
        }
    }


    if(isset($_POST['proceed'])) { // Check if the proceed button was clicked
        $customer_email = $_SESSION['customer_email'];

        // Assuming you have another table or a way to fetch order details
        // $orderDetails = fetchOrderDetailsFunction($customer_email); // This is a placeholder

        $orderDetails = "Your order details..."; // Placeholder

        // Sending an email to the local server
        $subject = "Order Confirmation";
        $message = "Hello, \n\n" . $orderDetails . "\n\nThank you for shopping with us!";
        $headers = 'From: f31ee@localhost' . "\r\n" .
        'Reply-To: f31ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($customer_email, $subject, $message, $headers, '-ff31ee@localhost');
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
    <div class="navbar">
        <a href="index.php" class="logo">
            <img src="../../assets/penta_cafe_logo_new2.png" alt="Logo">
        </a>
        <div class="tabs">
            <a href="menu.php">Menu</a> 
            <a href="cart.php">Cart</a>  
            <a href="order.php">Order</a> 
            <a href="support.php">Support</a> 
            <a href="feedback.php">Feedback</a> 
            <div id="authLinks">
                    Welcome: <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                    <a href="../php/signout.php">Sign Out</a>
            </div>
        </div>
    </div>

    <div class=payment-body>
        <form action="" method="post">

            <div class="payment-information">
                <h5>Payment Information</h5>
                Total billable: $<span id="billableAmount">0</span> 
            </div>
            <div class="payment-choice">
                <h5>Select Payment Method</h5>
                
                <div class="btn-group">
                    <button type="button" id="creditCardBtn" class="payment-btn">
                        <img src="../../assets/credit_card_icon.png" alt="Credit Card Icon">
                        <span>Credit Card</span>
                    </button>

                    <button type="button" id="cashBtn" class="payment-btn">
                        <img src="../../assets/cash_icon.png" alt="Cash Icon">
                        <span>Cash</span>
                    </button>

                </div>
                <div id="creditCardDetails" class="card-details-container">
                    Card Number: <span id="cardNumber"><?= htmlspecialchars($credit_card_info['customer_card_number'] ?? '') ?></span><br>
                    Expiry Date: <span id="cardExpiry"><?= htmlspecialchars($credit_card_info['customer_card_expiry'] ?? '') ?></span><br>
                    CVV: <span id="cardCVV"><?= htmlspecialchars($credit_card_info['customer_card_cvv'] ?? '') ?></span><br>
                    <br>
                    <button id="proceedButton" name="proceed" type="submit">Proceed</button>

                </div>


                <div id="cashMessage" class="cash-message-container" style="display: none;">
                    ✓ Cash on delivery
                    <br>
                    <button id="proceedButton" name="proceed" type="submit">Proceed</button>

                </div>
            </div>
            
        </form>
    </div>

    <script src="../js/payment.js"></script>

    <footer>
        <div class="footer">
            <div class="copyright">
                <small><i>Copyright &copy; Penta Cafe 2023 
                </i></small>
            </div>
            <div class="home-detail">
                <small>
                    Address<br>
                    Nanyang Technological University <br>
                    Singapore 123456
                </small>
            </div>
        </div>
    </footer>
    </body>
</html>