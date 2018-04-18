<div class="results growers">
<?php
foreach ($growers as $row) {
?>
    <p><?= $row['First_Name'] ?></p>
    <p><?= $row['Last_Name'] ?></p>
    <p><?= $row['Location'] ?></p>
    <p><?= $row['Farm_Name'] ?></p>
    <br>
<?php
}
?>
</div>