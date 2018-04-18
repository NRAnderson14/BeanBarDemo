<?php
foreach ($growers as $row) {
    ?>
    <h6><a href="data-admin-form.php?id=<?= $row['Grower_ID'] ?>&type=grower"><?= $row['Farm_Name'] ?></a></h6>
    <?php
}