<?php

$projects = $conn->query("SELECT * FROM `project` ORDER BY `title` ASC");

echo title($lang["projects"]["title"]);

?>

<?php if($user["level"]<=10) { ?>
<p class="text-center"><a href="?page=new&action=project" class="btn btn-primary"><?= glyph("plus-sign",$lang["projects"]["new"]) ?> <?= $lang["projects"]["new"] ?></a></p>
<?php } ?>

<?php

if(mysqli_num_rows($projects)!=0) { ?>

<table class="table table-striped table-hover">
    <thead>
        <th style="width:7%"><?= glyph("camera",$lang["projects"]["cover"]) ?></th>
        <th style="width:40%"><?= glyph("font",$lang["projects"]["manga"]) ?></th>
        <th style="width:1%"><?= glyph("bookmark",$lang["projects"]["bookmarks"]) ?></th>
        <th style="width:1%"><?= glyph("comment",$lang["projects"]["comments"]) ?></th>
        <th style="width:10%" class="text-right"><?= glyph("time",$lang["projects"]["updated"]) ?></th>
    </thead>
    <tbody>
        <?php foreach($projects as $project) {
    $bookmarks = $conn->query("SELECT COUNT(*) AS total FROM `project_bookmarks` WHERE `manga`='".$project["id"]."'");
    $bookmarks = mysqli_fetch_assoc($bookmarks);
    $comments = $conn->query("SELECT COUNT(*) AS total FROM `project_comments` WHERE `manga`='".$project["id"]."'");
    $comments = mysqli_fetch_assoc($comments);
    $latestchapter = $conn->query("SELECT * FROM `chapter` WHERE `manga`='".$project["id"]."' ORDER BY `uploaded` DESC");
    $latestchapter = mysqli_fetch_assoc($latestchapter);
    if(!empty($latestchapter)) {
        $latestchapter = $latestchapter["uploaded"];
    }
        ?>
        <tr>
            <td><a href="?page=manga&id=<?= $project["id"] ?>"><img src="uploads/covers/<?= $project["id"] ?>.jpg" width="100%"></a></td>
            <td><a href="?page=manga&id=<?= $project["id"] ?>"><h3 class="panel-title"><b><?= $project["title"] ?></b></h3></a><?= $project["description"] ?></td>
            <td><?= $bookmarks["total"] ?></td>
            <td><?= $comments["total"] ?></td>
            <td class="text-right"><?php if(!empty($latestchapter)) { echo ago($latestchapter); } else { echo $lang["ago"]["never"]; } ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php } else { ?>

There are no projects...

<?php } ?>
