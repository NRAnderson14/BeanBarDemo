<!DOCTYPE html>
<html>
<title>BeanBar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="shortcut icon" href="web-images/favicon.ico" type="image/x-icon">
<link rel="icon" href="web-images/favicon.ico" type="image/x-icon">
<style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
    .w3-sidebar {
        z-index: 3;
        width: 250px;
        top: 43px;
        bottom: 0;
        height: inherit;
    }
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        <a href="index.html" class="w3-bar-item w3-button w3-theme-l1">BeanBar</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Values</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Clients</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Partners</a>
    </div>
</div>

<?php include '../sidebar.php'; ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

    <?php
    $new_coffee_count = $dbc->getSubmittedCoffees()->rowCount();
    $new_grower_count = $dbc->getSubmittedGrowers()->rowCount();

    if ($new_coffee_count > 1) {
        $coffee_alert = "w3-pale-red";
    } else {
        $coffee_alert = "";
    }

    if ($new_grower_count > 1) {
        $grower_alert = "w3-pale-red";
    } else {
        $grower_alert = "";
    }
    ?>

    <div class="w3-row">
        <div class="w3-quarter">&nbsp;</div>
        <div class="w3-padding-64 w3-container w3-margin-right w3-half w3-card">
            <h3 class="w3-center">Data Admin Dashboard</h3>
            <hr>
            <a href="coffee-list.php?app=false" class="w3-button w3-leftbar <?= $coffee_alert ?>">View Submitted Coffees</a><br><br>
            <a href="grower-list.php?app=false" class="w3-button w3-leftbar <?= $grower_alert ?>">View Submitted Growers</a><br><br>
            <a href="coffee-list.php?app=true" class="w3-button w3-leftbar">View Approved Coffees</a><br><br>
            <a href="grower-list.php?app=true" class="w3-button w3-leftbar">View Approved Growers</a>
        </div>
    </div>

    <footer id="myFooter" class="w3-row">
        <div class="w3-container w3-theme-l2 w3-padding-32">
            <h4>Footer</h4>
        </div>

        <div class="w3-container w3-theme-l1">
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </div>
    </footer>

    <!-- END MAIN -->
</div>

<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
</script>

</body>
</html>
