<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Redirect them to login page or show an error message
        header('Location: index3.php'); // Assuming your login page is named 'login.php'
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = $_POST["email"];
        $subject = "Support Request from " . $_POST["name"];
        $message = $_POST["problem"];
        # Change sender email
        # Implement it on tuesdau
        $headers = "From: sender@example.com"; 

        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
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

        <div class="supportbody">
            <div class="supportWrapper">

                <div class="supportForm">
                    <form action="../php/support.php" method="post" id="supportForm"> 
                        <h1 style="text-align: center;">Support</h1>
                        <table>
                            <tr>
                                <td class="formLabel">*Name:</td>
                                <td class="supportTable">
                                    <input type="text" id="jobName" name="name" required placeholder="Enter your name here" style="width: 50%;"> 
                                    <div id="nameError" style="color: red;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formLabel">*Email:</td>
                                <td class="supportTable">
                                    <input type="email" id="jobEmail" name="email" required placeholder="Enter your Email-ID here " style="width: 50%;">
                                    <div id="emailError" style="color: red;"></div>
                                </td>

                            </tr>
                            <tr>
                                <td class="formLabel">Phone Number:</td>
                                <td class="supportTable">
                                    <input type="phone" id="jobPhone" name="phone" required placeholder="Enter your phone number here " style="width: 50%;">
                                <div id="phoneError" style="color: red;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formLabel">*Description of Problem:</td>
                                <td class="supportTable">
                                    <textarea name="problem" id="jobProblem" cols="50" rows="10" required placeholder="Describe your problem here" style="resize: none;"></textarea>
                                    <div id="problemError" style="color: red;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    
                                </td>
                                <td style="padding-left: 300px;">
                                    <input type="reset" value="Clear">
                                    <input type="submit" value="Send">  
                                </td>
                            </tr>
                        
                        </table>
                    </form>
                </div>
                <div class="contact-us">
                    <table>
                        <tr>
                            <td class="contact-us-table">
                                <div> 
                                    <img src="../../assets/phone_icon_no_bg.png" alt="phone-icon" class="phone-icon">
                                    <!--https://www.pinterest.com/pin/252272016613840132/-->
                                </div>
                                <div class="contact-us-words"> +65 8888 8888</div>
                            </td>
                            <!--email-->
                            <td class="contact-us-table">
                                <div> 
                                    <img src="../../assets/mail_icon_no_bg.png" alt="email-icon" class="email-icon">
                                    <!--https://www.pngwing.com/en/free-png-zgobv/-->
                                </div>
                                <div class="contact-us-words"> support@pentacafe.com</div>
                            </td>
                            <!--address-->
                            <td class="contact-us-table"> 
                                <div> 
                                    <img src="../../assets/address_icon_no_bg.png" alt="address-icon" class="address-icon">
                                    <!--https://www.hiclipart.com/free-transparent-background-png-clipart-czcub/-->
                                </div>
                                <div class="contact-us-words"> Nanyang Technological University <br> Singapore 123456</div>
                            </td>
                        </tr>
                    </table>
                
                </div>
            </div>
        </div>
        <script src="../js/support.js"></script>

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