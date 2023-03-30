<?php
/* Smarty version 4.3.0, created on 2023-01-26 16:44:27
  from '/var/www/html/FSX/library/themes/nucleus/pages/title.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d29fdb319692_11407771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7334a6ac79af4e0572a216440aa2034d691eb2ba' => 
    array (
      0 => '/var/www/html/FSX/library/themes/nucleus/pages/title.tpl',
      1 => 1674747827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../parts/menu.tpl' => 1,
  ),
),false)) {
function content_63d29fdb319692_11407771 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../parts/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Title Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<div class="mb-4 md:mb-0 md:hidden">
		<h1 class="font-bold text-2xl">
			<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>

			<div class="badge badge-<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>info<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>success<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>success-content<?php } else { ?>error<?php }?>">
				<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>Planned<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>Ongoing<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>Hiatus<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>Completed<?php } else { ?>Cancelled<?php }?>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
				<a href="#/" class="btn btn-sm" onclick="toggleCheck('editTitleModal');">Edit Title</a>
			<?php }?>
		</h1>
		<p><?php echo $_smarty_tpl->tpl_vars['title']->value['alts'];?>
</p>
	</div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
		<div>
			<a href="data/covers/<?php echo $_smarty_tpl->tpl_vars['title']->value['cover'];?>
" target="_blank">
				<img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['title']->value['cover'];?>
" alt="Cover" class="w-full rounded-xl shadow-md">
			</a>
		</div>
		<div class="col-span-1 md:col-span-3">
			<div class="hidden md:block md:mb-4">
				<h1 class="font-bold text-2xl">
					<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>

					<div class="badge badge-<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>info<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>success<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>success-content<?php } else { ?>error<?php }?>">
						<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>Planned<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>Ongoing<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>Hiatus<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>Completed<?php } else { ?>Cancelled<?php }?>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
						<a href="#/" class="btn btn-sm" onclick="toggleCheck('editTitleModal');">Edit Title</a>
					<?php }?>
				</h1>
				<p><?php echo $_smarty_tpl->tpl_vars['title']->value['alts'];?>
</p>
			</div>
			<div>
				<h2 class="underline font-bold text-xl mb-2">Details</h2>
					<p class="mb-1">
					<span class="font-bold">Author/s:</span>
					<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['authors'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['title']->value['authors'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
							<a href="titles.php?search=<?php echo trim($_smarty_tpl->tpl_vars['item']->value);?>
">
								<span class="badge hover:badge-info p-3">
									<?php echo trim($_smarty_tpl->tpl_vars['item']->value);?>

								</span>
							</a>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php } else { ?>
						Unknown
					<?php }?>
				</p>
				<p class="mb-1">
					<span class="font-bold">Artist/s:</span>
					<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['artists'])) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['title']->value['artists'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
							<a href="titles.php?search=<?php echo trim($_smarty_tpl->tpl_vars['item']->value);?>
">
								<span class="badge hover:badge-info p-3">
									<?php echo trim($_smarty_tpl->tpl_vars['item']->value);?>

								</span>
							</a>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php } else { ?>
						Unknown
					<?php }?>
				</p>
				<p class="mb-1">
					<span class="font-bold">Release Year:</span>
					<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['releaseYear'])) {?>
						<?php echo $_smarty_tpl->tpl_vars['title']->value['releaseYear'];?>

					<?php } else { ?>
						Unknown
					<?php }?>
				</p>
				<p class="mb-1">
					<span class="font-bold">Completion Year:</span>
					<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['completionYear'])) {?>
						<?php echo $_smarty_tpl->tpl_vars['title']->value['completionYear'];?>

					<?php } else { ?>
						Unknown
					<?php }?>
				</p>
				
				<h2 class="underline font-bold text-xl mb-2">Tags</h2>
				<div class="mb-1 grid grid-cols-2 gap-4">
					<div>
						<p><b>Formats</b></p>
						<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['tags']['formats'])) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['title']->value['tags']['formats'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
								<a href="titles.php?search=<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>
">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>

									</span>
								</a>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</div>
					<div>
						<p><b>Warnings</b></p>
						<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['tags']['warnings'])) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['title']->value['tags']['warnings'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
								<a href="titles.php?search=<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>
">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>

									</span>
								</a>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</div>
					<div>
						<p><b>Themes</b></p>
						<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['tags']['themes'])) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['title']->value['tags']['themes'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
								<a href="titles.php?search=<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>
">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>

									</span>
								</a>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</div>
					<div>
						<p><b>Genres</b></p>
						<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['tags']['genres'])) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['title']->value['tags']['genres'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
								<a href="titles.php?search=<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>
">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										<?php echo trim($_smarty_tpl->tpl_vars['item']->value['name']);?>

									</span>
								</a>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php if (!empty($_smarty_tpl->tpl_vars['title']->value['summary'])) {?>
			<div class="md:col-span-4">
				<h2 class="underline font-bold text-xl mb-2">Summary</h2>
				<div class="auto">
					<?php echo $_smarty_tpl->tpl_vars['title']->value['summary'];?>

				</div>
			</div>
		<?php }?>
    </div>
</div>
<!-- /Title Div -->

<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
    <input type="checkbox" id="editTitleModal" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-2xl text-center mb-4 underline">Edit Title</h3>
            <form method="POST" name="editTitle" id="editTitleForm">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Cover Image -->
                    <input type="file" id="cover" class="border border-black file-input w-full">
                    <img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['title']->value['cover'];?>
" alt="Cover" id="imgpreview" class="rounded-xl w-full border shadow-sm">
                    <!-- /Cover Image -->

                    <!-- Title Data-->
                    <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
" hidden>
                    <input name="cover" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['cover'];?>
" hidden>
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>
" placeholder="Title" name="title" class="input w-full border border-black">
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['alts'];?>
" placeholder="Alternate Names" name="alts" class="input w-full border border-black">
					<label for="tagsModal" class="btn">Select Tags</label>
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['authors2'];?>
" placeholder="Author/s (Seperate by comma)" name="authors" class="input w-full border border-black">
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['artists2'];?>
" placeholder="Artist/s (Seperate by comma)" name="artists" class="input w-full border border-black">
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['lang'];?>
" placeholder="Original Language" name="olang" class="input w-full border border-black">
                    <select name="ostatus" class="select w-full border border-black">
						<option disabled>Select original work status...</option>
						<option value="1" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 1) {?>selected<?php }?>>Announced</option>
						<option value="2" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 2) {?>selected<?php }?>>Releasing</option>
						<option value="3" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 3) {?>selected<?php }?>>Hiatus</option>
						<option value="4" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 4) {?>selected<?php }?>>Completed</option>
						<option value="5" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 5) {?>selected<?php }?>>Cancelled</option>
					</select>
                    <select name="sstatus" class="select w-full border border-black">
						<option disabled>Select scanlation status...</option>
						<option value="1" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>selected<?php }?>>Planned</option>
						<option value="2" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>selected<?php }?>>Ongoing</option>
						<option value="3" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>selected<?php }?>>Hiatus</option>
						<option value="4" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>selected<?php }?>>Completed</option>
						<option value="5" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 5) {?>selected<?php }?>>Cancelled</option>
					</select>
                    <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['releaseYear'];?>
" placeholder="Year of Release" name="release" class="input w-full border border-black">
                    <input type="number" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['completionYear'];?>
" placeholder="Year of Completion" name="completion" class="input w-full border border-black">
                    <textarea name="summary" class="textarea w-full border border-black" placeholder="Summary"><?php echo $_smarty_tpl->tpl_vars['title']->value['summary2'];?>
</textarea>
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
" <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_formats'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

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
" <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_warnings'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

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
" <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_themes'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

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
" <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_genres'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

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
                    <button class="btn btn-primary btn-block btn-outline" type="submit">Edit!</button>
                    <div class="text-center hidden text-error" id="edittitle-result"></div>
                    <label for="editTitleModal" class="btn btn-error btn-block">Cancel</label>
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
                                //preview.classList.remove("hidden");
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

        $("#editTitleForm").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "ajax\\titles\\edit.php",
                data: $(this).serialize(),
                success: function(data) {
                    let result = JSON.parse(data);
                    if (result.s == true) {
                        //let text = document.getElementById("addtitle-result");
                        //text.classList.add("hidden");
                        window.location.replace("title.php?id=" + result.msg);
                        // Redirect to Title?
                    } else {
                        let text = document.getElementById("edittitle-result");
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
