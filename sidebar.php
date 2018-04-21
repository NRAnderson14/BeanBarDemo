<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
        <i class="fa fa-remove"></i>
    </a>
    <h4 class="w3-bar-item"><b>Our Locations</b></h4>
    <?php
    include 'database/model.php';

    $db = new PDO('mysql:host=localhost;dbname=bean_bar', 'root');

    $dbc = new DatabaseConnection($db);

    $stores = $dbc->getStores();
    foreach ($stores as $store) {
        ?>
        <a class="w3-bar-item w3-button w3-hover-black" href="/BeanBarDemo/stores.php?storeid=<?=$store['Store_ID']?>"><?=$store['Location']?></a>
    <?php } ?>
</nav>
