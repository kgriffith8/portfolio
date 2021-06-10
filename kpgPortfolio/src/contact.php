<?php
    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != ''){
        
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
            // Submit the form

            // Declaring the keys
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            // Declaring where the email will go to
            $to = "griffnsh@gmail.com";
            $body = "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            mail($to, $messageSubject, $body);

            $message_sent = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    <!-- Webpage Icon -->
    <link rel="shortcut icon" type="image/svg" href="images/page-icon.svg">

    <title>Contact | KPG Web Services </title>
</head>
<body>
    <!-- Nav Start -->
    <div class="navigation">
        <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
        <label for="navi-toggle" class="navigation__button"><span class="navigation__icon">&nbsp;</span></label>
        <div class="navigation__background"></div>
        <nav class="navigation__nav">
            <ul class="navigation__list">
                <li class="navigation__item"><a href="index.html" class="navigation__link">Homepage  </a></li>
                <li class="navigation__item"><a href="skills.html" class="navigation__link">Skillset</a></li>
                <li class="navigation__item"><a href="portfolio.html" class="navigation__link">Portfolio</a></li>
                <li class="navigation__item"><a href="about.html" class="navigation__link">About Me</a></li>
                <li class="navigation__item"><a href="contact.php" class="navigation__link">Contact</a></li>
                <div class="navigation__socials">
                    <ul class="navigation__socials--list">
                        <a href="https://github.com/kgriffith8"><img src="images/github.svg" alt="" class="navigation__social--icon"></a>
                    </a>
                    </a>
                        <a href="https://www.linkedin.com/in/kyle-griffith-166342209/"><img src="images/linkedin.svg" alt="" class="navigation__social--icon"></a>
                        <a href="https://codepen.io/Kaiohl"><img src="images/codepen.svg" alt="" class="navigation__social--icon"></a>
                        <a href="https://twitter.com/KPGWebServices"><img src="images/twitter.svg" alt="" class="navigation__social--icon"></a>    
                    </ul>
                    <h3>COPYRIGHT 2021 &copy;</h3>
                </div>
            </ul>
        </nav>
    </div>
    <!-- Nav End -->
    <!-- Header Logo -->
    <header class="header">
        <div class="header__logo-box">
            <a href="./index.html">KPG Web Services <img src="images/rss.svg" alt="KPG Web Services" class="header__logo"></a>
        </div>
    </header>
    <!-- Contact Form Start -->
    <?php
        if($message_sent):
    ?>

            <h3 style="color: #f71735; text-align: center; margin: 75px;">Thank you for the message, I will respond as soon as I can</h3>

    <?php
    else: 
    ?>
    <div class="form-container">
        <h1>Contact</h1>
        <form action="contact.php" method="POST">
            <input type="text" placeholder="Your name" name="name" id="name">
            <input type="text" placeholder="Email address" name="email" id="email">
            <input type="text" placeholder="Subject" name="subject" id="subject">
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
            <button class="form-container__button" type="submit">Send</button>
        </form>
    </div>
    <?php
    endif;  
    ?>
</body>
</html>