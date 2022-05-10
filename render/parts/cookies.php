<?php

?>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?= $lang["cookie_modal"]["title"] ?></h4>
            </div>
            <div class="modal-body">
                <?= $lang["cookie_modal"]["content"] ?>
            </div>
            <div class="modal-footer">
                <form method="post" name="refuse_cookies" action="">
                    <button type="submit" name="refuse_cookies" class="btn btn-default"><?= $lang["cookie_modal"]["refuse"] ?></button>
                    <button type="submit" name="accept_cookies" class="btn btn-primary"><?= $lang["cookie_modal"]["accept"] ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
