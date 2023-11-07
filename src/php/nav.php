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
            <?php if (isset($_SESSION['customer_name'])): ?>
                Welcome: <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                <a href="../php/signout.php">Sign Out</a>
            <?php else: ?>
                <a href="#" onclick="toggleModal('signInModal')">Sign In</a>
                <a>/</a>
                <a href="#" onclick="toggleModal('signUpModal')">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</div>
