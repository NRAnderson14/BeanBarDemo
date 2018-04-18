<div class="results growers">
<?php
foreach ($growers as $row) {
?>
    <h4>Name: <?= $row['First_Name'] ?>&nbsp;<?= $row['Last_Name'] ?></h4>
    <p>Location: <?= $row['Location'] ?></p>
    <p>Farm Name: <?= $row['Farm_Name'] ?></p>
    <br>
<?php
}
?>
</div>