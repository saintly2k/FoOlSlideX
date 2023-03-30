<?php
/* Smarty version 4.3.0, created on 2023-01-26 01:04:29
  from '/var/www/html/FSX/library/themes/nucleus/pages/titles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d1c38d9920d2_74082449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24b3c549c459108f61be57cd4ff8cba03cc75ffd' => 
    array (
      0 => '/var/www/html/FSX/library/themes/nucleus/pages/titles.tpl',
      1 => 1674691448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../parts/menu.tpl' => 1,
  ),
),false)) {
function content_63d1c38d9920d2_74082449 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../parts/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Titles Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
    <h1 class="mb-4 font-bold text-2xl">
        Titles - Page <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

        <?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
            <a href="#/" class="btn btn-sm" onclick="toggleCheck('addTitleModal');">Add Title</a>
        <?php }?>
    </h1>
    <?php if (!empty($_smarty_tpl->tpl_vars['titles']->value)) {?>
		<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['titles']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
				<div>
					<div class="card card-compact w-full bg-base-200 shadow-lg">
						<figure>
							<a href="title.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
								<img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
" alt="Cover">
							</a>
						</figure>
						<div class="card-body">
							<h2 class="card-title">
								<a href="title.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="link">
									<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

								</a>
								<div class="badge badge-<?php if ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 1) {?>info<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 2) {?>success<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 3) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 4) {?>success-content<?php } else { ?>error<?php }?>">
									<?php if ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 1) {?>PLANNED<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 2) {?>Ongoing<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 3) {?>Hiatus<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['sstatus'] == 4) {?>Completed<?php } else { ?>Cancelled<?php }?>
								</div>
							</h2>
						</div>
					</div>
				</div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
    <?php } else { ?>
        <p>There are no Titles on this page!</p>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['pagis']->value)) {?>
        <div class="btn-group mx-auto pt-4">
            <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
                <a href="?page=1" class="btn btn-sm">«</a>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" class="btn btn-sm">‹</a>
            <?php }?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagis']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['page']->value != $_smarty_tpl->tpl_vars['item']->value) {?>
                    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" class="btn btn-sm"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
                <?php } else { ?>
                    <span class="btn btn-active btn-sm"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</span>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" class="btn btn-sm">›</a>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
" class="btn btn-sm">»</a>
            <?php }?>
        </div>
    <?php }?>
</div>
<!-- /Titles Div -->

<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
    <input type="checkbox" id="addTitleModal" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-center mb-4 underline">Add Title</h3>
            <form method="POST" name="addTitle" id="addTitleForm">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Cover Image -->
                    <input type="file" id="cover" class="border border-black file-input w-full">
                    <img src="" alt="Cover" id="imgpreview" class="rounded-xl hidden w-full border shadow-sm">
                    <!-- /Cover Image -->

                    <!-- Title Data-->
                    <input name="cover" hidden>
                    <input type="text" placeholder="Title" name="title" class="input w-full border border-black">
                    <input type="text" placeholder="Alternate Names" name="alts" class="input w-full border border-black">
					<label for="tagsModal" class="btn">Select Tags</label>
                    <input type="text" placeholder="Author/s (Seperate by comma)" name="authors" class="input w-full border border-black">
                    <input type="text" placeholder="Artist/s (Seperate by comma)" name="artists" class="input w-full border border-black">
                    <input type="text" placeholder="Original Language" name="olang" class="input w-full border border-black">
                    <select name="ostatus" class="select w-full border border-black">
						<option disabled selected>Select original work status...</option>
						<option value="1">Announced</option>
						<option value="2">Releasing</option>
						<option value="3">Hiatus</option>
						<option value="4">Completed</option>
						<option value="5">Cancelled</option>
					</select>
                    <select name="sstatus" class="select w-full border border-black">
						<option disabled selected>Select scanlation status...</option>
						<option value="1">Planned</option>
						<option value="2">Ongoing</option>
						<option value="3">Hiatus</option>
						<option value="4">Completed</option>
						<option value="5">Cancelled</option>
					</select>
                    <input type="number" placeholder="Year of Release" name="release" class="input w-full border border-black">
                    <input type="number" placeholder="Year of Completion" name="completion" class="input w-full border border-black">
                    <textarea name="summary" class="textarea w-full border border-black" placeholder="Summary"></textarea>
                    <!-- /Title Data -->
                    
                    <!-- Tags Modal -->
                    <input type="checkbox" id="tagsModal" class="modal-toggle">
                    <div class="modal">
						<div class="modal-box">
							<h3 class="font-bold text-2xl text-center mb-4 underline">Select Tags</h3>
							<div class="grid grid-cols-1 gap-4">
								<div>
									<h4 class="font-bold text-xl text-left">Format/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_format']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
										<label>
											<input type="checkbox" name="format[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

										</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Warning/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_warnings']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
										<label>
											<input type="checkbox" name="warning[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

										</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Theme/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_theme']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
										<label>
											<input type="checkbox" name="theme[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

										</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Genre/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_genre']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
										<label>
											<input type="checkbox" name="genre[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

										</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<label for="tagsModal" class="btn btn-success">Close</label>
							</div>
						</div>
					</div>
                    <!-- /Tags Modal -->

                    <!-- Submit, Error and Close -->
                    <button class="btn btn-primary btn-block btn-outline" type="submit">Add!</button>
                    <div class="text-center hidden text-error" id="addtitle-result"></div>
                    <label for="addTitleModal" class="btn btn-error btn-block">Cancel</label>
                    <!-- /Submit, Error and Close -->
                </div>
            </form>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        $(function() {
            $("#cover").change(function(e) {
                e.preventDefault();
                var fd = new FormData();
                var files = $("#cover")[0].files;
                if (files.length > 0) {
                    fd.append("cover", files[0]);
                    $.ajax({
                        type: "POST",
                        url: "ajax\\images\\tmp.php",
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(msg) {
                            let result = JSON.parse(msg);
                            if (result.s == true) {
                                let preview = document.getElementById("imgpreview");
                                preview.classList.remove("hidden");
                                preview.src = "data/tmp/" + result.msg;
                                document.querySelector("input[name='cover']").value =
                                    result.msg;
                            } else {
                                alert(result.msg);
                            }
                        }
                    });
                }
            });
        });

        $("#cover").change(function(e) {
            var allowedTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp"];
            var file = this.files[0];
            var fileType = file.type;
            if (!allowedTypes.includes(fileType)) {
                alert("Upload only supports JPG, JPEG, PNG and WEBP!");
                $("#cover").val("");
                return false;
            }
        });

        $("#addTitleForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "ajax\\titles\\add.php",
                data: $(this).serialize(),
                success: function(data) {
                    let result = JSON.parse(data);
                    if (result.s == true) {
                        //let text = document.getElementById("addtitle-result");
                        //text.classList.add("hidden");
                        window.location.replace("title.php?id=" + result.msg);
                        // Redirect to Title?
                    } else {
                        let text = document.getElementById("addtitle-result");
                        text.classList.remove("hidden");
                        text.innerHTML = "<b>Error:</b> " + result.msg;
                    }
                }
            });
            return false;
        });
    <?php echo '</script'; ?>
>
<?php }
}
}
