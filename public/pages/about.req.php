<?= title($group["slogan"]) ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $group["name"] ?> - <?= $group["slogan"] ?></h3>
    </div>
    <div class="panel-body">
        <b><u><?= $lang["about"]["title"] ?></u></b><br>
        <?= $group["about"] ?><br><br>
        <b><u><?= $lang["about"]["team"] ?></u></b>
        <ul>
            <?php foreach($team["members"] as $member) { ?>
            <li><?= $member["name"] ?> - <?= $member["position"] ?></li>
            <?php } ?>
        </ul>
    </div>
</div>
