<?php
$db = new PDO('mysql:host=localhost;dbname=bean_bar', 'root');

include 'database/model.php';

$dbc = new DatabaseConnection($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    throw new error("No ID given!");
}

if (isset($_GET['type'])) {
    $type = $_GET['type'];
} else {
    throw new error("No type specified!");
}

if ($type == "coffee") {
    $coffee = $dbc->getCoffeeByID($id);
} else if ($type = "grower") {
    $grower = $dbc->getGrowerByID($id);
}
?>

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
        <a href="index.php" class="w3-bar-item w3-button w3-theme-l1">BeanBar</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">About</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Values</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">News</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Clients</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hide-medium w3-hover-white">Partners</a>
    </div>
</div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
        <i class="fa fa-remove"></i>
    </a>
    <h4 class="w3-bar-item"><b>Our Locations</b></h4>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Winona</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Rochester</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">LaCrosse</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Red Wing</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Wabasha</a>
    <a class="w3-bar-item w3-button w3-hover-black" href="#">Minnesota City</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

    <div class="w3-row w3-padding-64">
        <form class="w3-container">

            <div class="w3-third w3-container w3-padding-16">
                <label><?= $type == "coffee" ? "Coffee" : "Grower" ?> ID:</label>
                <input class="w3-input" type="text" value="<?= $type == "coffee" ? $coffee['Coffee_ID'] : $grower['Grower_ID'] ?>" disabled>
            </div>

            <div class="w3-twothird w3-container w3-padding-16">
                <label><?= $type == "coffee" ? "Coffee Name" : "First Name" ?>:</label>
                <input class="w3-input" type="text" value="<?= $type == "coffee" ? $coffee['Coffee_Name'] : $grower['First_Name'] ?>">
            </div>

            <div class="w3-third w3-container w3-padding-16">
                <label><?= $type == "coffee" ? "Grower ID" : "Last Name" ?>:</label>
                <input class="w3-input" type="text" value="<?= $type == "coffee" ? $coffee['Grower_ID'] : $grower['Last_Name'] ?>">
            </div>

            <div class="w3-twothird w3-container w3-padding-16">
                <label><?= $type == "coffee" ? "Roast" : "Location" ?>:</label>
                <input class="w3-input" type="text" value="<?= $type == "coffee" ? $coffee['Roast'] : $grower['Location'] ?>">
            </div>

            <div class="w3-third w3-container w3-padding-16">
                <label><?= $type == "coffee" ? "Caffeination" : "Farm Name" ?>:</label>
                <input class="w3-input" type="text" value="<?= $type == "coffee" ? $coffee['Caffeination'] : $grower['Farm_Name'] ?>">
            </div>

            <div class="w3-twothird w3-container w3-padding-16">
                <label>Short Description:</label>
                <input class="w3-input" type="text" value="<?= $type == "coffee" ? $coffee['Short_Desc'] : $grower['Short_Desc'] ?>">
            </div>

            <div class="w3-threethird w3-container w3-padding-16">
                <label>Long Description:</label>
                <textarea class="w3-input"><?= $type == "coffee" ? $coffee['Long_Desc'] : $grower['Long_Desc'] ?></textarea>
            </div>

            <div class="w3-third w3-container w3-padding-16">
                <button class="w3-btn w3-blue" type="submit" disabled>Submit</button>
            </div>

        </form>
    </div>

    <footer id="myFooter">
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
