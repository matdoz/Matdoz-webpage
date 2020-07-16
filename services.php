<?php require_once('inc/navbar.php'); ?>
<div class="container" id="service-row">
<div class="row">
    <div class="col-xl-6">
        <img src="images/projects/webpage.png" alt="">
    </div>
    <div class="col-xl-6">
<h3>Mobile friendly responsive webpage</h3>
        <p>Your business needs a <strong>new webpage</strong>, one to <strong>replace the old one</strong> or perhaps your first ever. <br> <br>The importance of having a mobile friendly webpage in our time of IOT will be critical for your business to reach all your customers. <br> <br>For a professional consultation <a href="<?php if (isset($_SESSION['username'])){echo 'inbox.php';} else {echo 'contact.php';} ?>">contact today</a></p>
    </div>
</div>
<div class="row" id="desktopapp">
    <div class="col-xl-6">
        <h3>Desktop application</h3>
        <p>An application that runs locally on your computer is more <strong>powerful</strong> and also works whether you are <strong>offline or online</strong>. <br> <br> A <strong>powerful desktop application</strong> is hard to match for a web application because of the local resources available for the desktop application to use, hence why they are needed. <br> <br> Your business has an idea on an application you need, or an existing application that needs rewamping.<br> <br> For a professional consultation <a href="<?php if (isset($_SESSION['username'])){echo 'inbox.php';} else {echo 'contact.php';} ?>">contact today</a></p>
    </div>
    <div class="col-xl-6">
        <img src="images/projects/MiniGebra.png" alt="">
    </div>
</div>
<div class="row" id="microcon">
    <div class="col-xl-6">
        <img src="images/projects/Arduino.jpg" alt="">
    </div>
    <div class="col-xl-6">
        <h3>Microcontroller</h3>
    <p>Microcontrollers are everywhere today, in nearly all <strong>smart and realtime systems</strong>. <br> <br> Your system utilizes a microcontroller or perhaps needs a microcontroller to make a demo version of your project for testing.<br> <br> For a professional consultation <a href="<?php if (isset($_SESSION['username'])){echo 'inbox.php';} else {echo 'contact.php';} ?>">contact today</a></p>
    </div>
</div>
</div>
<?php require_once('inc/footer.php'); ?>