<?php
foreach ($coffees as $row) {
    $data = $dbc->getDataForCard($row['Coffee_ID']);
    $data = $data->fetch();
    ?>
    <h6><a href="coffee-card.php?c_name=<?= $data['Coffee_Name'] ?>&farm_name=<?= $data['Farm_Name'] ?>
    &caff=<?= $data['Caffeination'] ?>&desc=<?= $data['Short_Desc'] ?>"><?= $row['Coffee_Name'] ?></a></h6>
    <?php
}