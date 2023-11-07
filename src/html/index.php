<?php
    session_start();

    $message = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ? 
               "Hello, " . $_SESSION["customer_name"] . "!" : "You are not logged in.";

    // Check if the signup response exists
    $shouldShowSuccessModal = isset($_SESSION['signup_response']) && $_SESSION['signup_response'] === "User registered successfully!";
?>


<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Penta Cafe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
        <script src="../js/homepage.js"></script>
    </head>

    <body>
    <?php
        include '../php/nav.php';
        include '../php/signin_modal.php';    
    ?>
   
        <div class="body-image"></div>


        <div class="about-us">
            <div class="about-us-text">
                <h2>Savor the Moment</h2>
               <p>At Penta Café, we believe in the power of five - five senses to enjoy our meticulously crafted coffee. Our café is more than just a place to grab a quick cup of coffee. It’s a haven where you can pause, savor the moment, and indulge in the rich symphony of aroma, taste, and warmth that our coffee offers. Come, let’s celebrate the joy of coffee together at Penta Café.</p>
            </div>
            <div class="about-us-image">
                <img src="../../assets/coffee_about_us.jpg" alt="about-image">
            </div>
        </div>
        <div class="chef-header">
            <h2>Meet our Chefs</h2>
        </div>
        <div class="chef-container">
            
            <div class="chef-one">
                <h3>Lucy Smith</h3><br><h4>Executive Chef</h4><br>
                <img src="../../assets/chef1-removebg-preview.png" alt="chef1-image">
            </div>
            <div class="chef-two">
                <h3>John Thomas</h3><br><h4>Sous Chef</h4><br>
                <img src="../../assets/chef2-removebg-preview.png" alt="chef2-image">
            </div>
        </div>

        <div class="orderGuide">

        </div>
        <?php
            include '../php/footer.php';
        ?>
        <!-- <footer>
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
        </footer> -->
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                if (<?php echo json_encode($shouldShowSuccessModal); ?>) {
                    toggleModal("successModal");
                }
            });
        </script>


    </body>
</html>