<?php



?>

<?php if($user["level"]<=10) { ?>
<p class="text-center"><a href="?page=new&action=project" class="btn btn-primary"><?= glyph("plus-sign",$lang["projects"]["new"]) ?> <?= $lang["projects"]["new"] ?></a></p>
<?php } ?>
