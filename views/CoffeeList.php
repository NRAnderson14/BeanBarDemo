<?php
foreach ($coffees as $row) {
?>
    <h6><a href="data-admin-form.php?id=<?= $row['Coffee_ID'] ?>&type=coffee"><?= $row['Coffee_Name'] ?></a></h6>
<?php
}