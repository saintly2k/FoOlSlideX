<?php
/* Smarty version 4.3.0, created on 2023-02-24 15:45:40
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\pages\title.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63f8cd942ed844_01359944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f30f9a1336cdea332b64c0ab64d71bb20a3923f0' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\pages\\title.tpl',
      1 => 1677249865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63f8cd942ed844_01359944 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Title Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<div class="mb-4 md:mb-0 md:hidden">
		<h1 class="font-bold text-2xl">
			<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>

			<div
				class="badge shadow-md badge-<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>info<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>success<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>success-content<?php } else { ?>error<?php }?>">
				<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>Planned<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>Ongoing<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>Hiatus<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>Completed<?php } else { ?>Cancelled<?php }?>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
				<button class="btn btn-sm shadow-md" onclick="toggleCheck('editTitleModal');">Edit Title</button>
			<?php }?>
		</h1>
		<p><?php echo $_smarty_tpl->tpl_vars['title']->value['alts'];?>
</p>
	</div>
	<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
		<div>
			<a href="data/covers/<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
.png" target="_blank">
				<img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
.png" alt="Cover" class="w-full rounded-xl shadow-md">
			</a>
		</div>
		<div class="col-span-1 md:col-span-3">
			<div class="hidden md:block md:mb-4">
				<h1 class="font-bold text-2xl">
					<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>

					<div
						class="badge shadow-md badge-<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>info<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>success<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>success-content<?php } else { ?>error<?php }?>">
						<?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>Planned<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>Ongoing<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>Hiatus<?php } elseif ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>Completed<?php } else { ?>Cancelled<?php }?>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
						<button class="btn btn-sm shadow-md" onclick="toggleCheck('editTitleModal');">Edit Title</button>
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
								<span class="badge hover:badge-info p-3 shadow-md">
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
								<span class="badge hover:badge-info p-3 shadow-md">
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
				<div class="auto space-y-2 md:space-y-1">
					<?php echo $_smarty_tpl->tpl_vars['title']->value['summary'];?>

				</div>
			</div>
		<?php }?>
	</div>
</div>
<!-- /Title Div -->

<!-- Chapters Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<h1 class="text-xl font-bold">
		<span class="underline">Chapters</span>
		(<span id="chapterCount"><?php echo $_smarty_tpl->tpl_vars['chapterCount']->value;?>
</span>)
		<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
			<label for="addChapterModal" class="btn btn-sm shadow-md">
				Add Chapter
			</label>
		<?php }?>
	</h1>

	<?php if (!empty($_smarty_tpl->tpl_vars['chapterLangs']->value[0]['language']['chapters'])) {?>
		<div class="tabs tabs-boxed mt-4 rounded-xl shadow-md border gap-1">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chapterLangs']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
				<?php if (count($_smarty_tpl->tpl_vars['chapterLangs']->value) > 1) {?>
					<button class="tab tablink border rounded-md <?php if ($_smarty_tpl->tpl_vars['preflang']->value == $_smarty_tpl->tpl_vars['item']->value['language'][1]) {?>tab-active<?php }?>"
						onclick="switchTab(event, 'chTab_<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][1];?>
'); setCookie('preflang','<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][1];?>
');">
					<?php } else { ?>
						<button class="tab tablink tab-active rounded-md">
						<?php }?>
						<img src="https://flagcdn.com/16x12/<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][1];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][2];?>
" class="h-3">
						<span class="hidden md:block md:ml-1">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][0];?>

						</span>
						<span class="badge ml-1 mr-0"><?php echo $_smarty_tpl->tpl_vars['item']->value['language']['count'];?>
</span>
					</button>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>

		<!-- Chapter Tabs -->
		<div class="tabcontents mt-4">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chapterLangs']->value, '_lang', false, 'lkey', 'lname', array (
));
$_smarty_tpl->tpl_vars['_lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lkey']->value => $_smarty_tpl->tpl_vars['_lang']->value) {
$_smarty_tpl->tpl_vars['_lang']->do_else = false;
?>
				<?php if (count($_smarty_tpl->tpl_vars['chapterLangs']->value) > 1) {?>
					<div class="tabcontent <?php if ($_smarty_tpl->tpl_vars['preflang']->value == $_smarty_tpl->tpl_vars['_lang']->value['language'][1]) {?>active<?php } else { ?>hidden<?php }?>"
						id="chTab_<?php echo $_smarty_tpl->tpl_vars['_lang']->value['language'][1];?>
">
					<?php }?>
					<!-- Chapter Table -->
					<div class="overflow-x-auto border shadow-md rounded-xl">
						<table class="table table-compact w-full">
							<thead>
								<tr>
									<th></th>
									<th class="text-center">
										<span class="md:hidden">&#65283;</span>
										<span class="hidden md:inline">Chapter</span>
									</th>
									<th class="text-center">
										<span class="md:hidden">&#120139;</span>
										<span class="hidden md:inline">Title</span>
									</th>
									<th class="text-center">
										<span class="md:hidden">&#64;</span>
										<span class="hidden md:inline">User</span>
									</th>
									<th class="text-right">
										<span class="md:hidden">&#10226;</span>
										<span class="hidden md:inline">Date</span>
									</th>
									<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
										<th></th>
									<?php }?>
								</tr>
							</thead>
							<tbody>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_lang']->value['language']['chapters'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
									<tr class="hover">
										<th>
											<label class="swap swap-flip">
												<input type="checkbox" onchange="toggleRead(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" id="readBox<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
													<?php if ($_smarty_tpl->tpl_vars['logged']->value && in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['readChapters']->value)) {?>checked<?php }?>>
												<div class="swap-on">&#9989;</div>
												<div class="swap-off">&#10060;</div>
											</label>
										</th>
										<td>
											<a href="chapter.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="link">
												<span class="md:hidden">
													<?php echo formatChapterTitle($_smarty_tpl->tpl_vars['item']->value['volume'],$_smarty_tpl->tpl_vars['item']->value['number'],"short");?>

												</span>
												<span class="hidden md:inline">
													<?php echo formatChapterTitle($_smarty_tpl->tpl_vars['item']->value['volume'],$_smarty_tpl->tpl_vars['item']->value['number'],"full");?>

												</span>
											</a>
											<label class="btn btn-xs" for="editChapterModal<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
												Edit Chapter
											</label>
										</td>
										<td>
											<a href="chapter.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="link">
												<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

											</a>
										</td>
										<td>
											<a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['id'];?>
"
												class="link flex items-center text-center md:text-left">
												<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['avatar'];?>
" class="rounded-full h-6">
												<span class="hidden md:inline md:ml-1">
													<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['username'];?>

												</span>
											</a>
										</td>
										<td class="text-right">
											<span class="md:hidden">
												<?php echo formatDate($_smarty_tpl->tpl_vars['item']->value['timestamp']);?>

											</span>
											<span class="hidden md:inline">
												<?php echo formatDate($_smarty_tpl->tpl_vars['item']->value['timestamp'],true);?>

											</span>
										</td>
										<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
											<td class="text-center">
											</td>
										<?php }?>
									</tr>
									<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
										<input type="checkbox" id="editChapterModal<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="modal-toggle">
										<div class="modal modal-bottom sm:modal-middle">
											<div class="modal-box">
												<h3 class="font-bold text-2xl text-center mb-4 underline">Edit Chapter</h3>
												<form method="POST" name="editChapterForm<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="editChapterForm<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
													enctype="multipart/form-data">
													<div class="grid grid-cols-1 gap-4">
														<!-- Chapter Data-->
														<input name="id" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
" hidden>
														<input name="cid" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" hidden>
														<input type="file" id="zip" name="zip<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
															class="border border-black file-input w-full" title="File">
														<input type="number" step=".01" placeholder="Chapter" name="number"
															class="input w-full border border-black" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['number'];?>
"
															title="Chapter">
														<input type="number" placeholder="Volume" name="volume" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['volume'];?>
"
															class="input w-full border border-black" title="Volume">
														<input type="text" placeholder="Chapter Title" name="title"
															class="input w-full border border-black" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="Title">
														<select name="language" class="select w-full border border-black"
															title="Language">
															<option disabled selected>Select chapter language...</option>
															<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_langs']->value, '_item', false, '_key', '_name', array (
));
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
,<?php echo $_smarty_tpl->tpl_vars['_item']->value['code'];?>
,<?php echo $_smarty_tpl->tpl_vars['_item']->value['flag'];?>
"
																	<?php if ($_smarty_tpl->tpl_vars['item']->value['language'][1] == $_smarty_tpl->tpl_vars['_item']->value['code']) {?>selected<?php }?>>
																	<?php echo $_smarty_tpl->tpl_vars['_item']->value['flag'];?>
 <?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>

																</option>
															<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
														</select>
														<progress class="progress hidden" max="100"
															id="addChapterLoadingBar<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></progress>
														<!-- /Chapter Data -->

														<!-- Submit, Error and Close -->
														<button class="btn btn-primary btn-block btn-outline"
															type="submit">Edit!</button>
														<div class="text-center hidden text-error" id="editchapter<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
-result">
														</div>
														<!-- /Submit, Error and Close -->
													</div>
												</form>
												<button onclick="toggleCheck('editChapterModal<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"
													id="editChapterModal<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
Close"
													class="btn btn-error btn-block mt-4">Close</button>
											</div>
										</div>
										<?php echo '<script'; ?>
>
											$("#editChapterForm<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
").submit(function(e) {
											let loading = document.getElementById("addChapterLoadingBar<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
");
											let text = document.getElementById("editchapter<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
-result");
											loading.classList.remove("hidden");
											e.preventDefault();
											$.ajax({
												xhr: function() {
													var xhr = new window.XMLHttpRequest();
													xhr.upload.addEventListener("progress", function(evt) {
														if (evt.lengthComputable) {
															var percentComplete = ((evt.loaded / evt.total) * 100);
															loading.setAttribute("value", percentComplete);
														}
													}, false);
													return xhr;
												},
												type: "POST",
												url: "ajax\\chapters\\edit.php",
												data: new FormData(this),
												contentType: false,
												cache: false,
												processData: false,
												beforeSend: function() {
													loading.setAttribute("value", 0);
													text.classList.add("hidden");
													text.innerHTML = "";
													loading.classList.remove("progress-error");
													loading.classList.remove("progress-success");
												},
												success: function(data) {
													if (data != "success") {
														loading.classList.add("progress-error");
														text.classList.remove("hidden");
														text.innerHTML = "<b>Error:</b> " + data;
													} else {
														loading.classList.add("progress-success");

														// Now make the close button reload
														document.getElementById("editChapterModal<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
Close").setAttribute("onclick", "location.reload()");
														document.getElementById("editChapterModal<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
Close").setAttribute("for", "");
													}
												}
											});
											return false;
											});
										<?php echo '</script'; ?>
>
									<?php }?>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</tbody>
						</table>
					</div>
					<!-- /Chapter Table -->
					<?php if (count($_smarty_tpl->tpl_vars['chapterLangs']->value) > 1) {?>
					</div>
				<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		<!-- /Chapter Tabs -->
	<?php } else { ?>
		<p class="mt-4">There are no chapters at the moment!</p>
	<?php }?>
</div>
<!-- /Chapters Div -->

<!-- Comments Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<h1 class="text-xl font-bold">
		<span class="underline">Comments</span>
		(<span id="commentsCount"><?php echo $_smarty_tpl->tpl_vars['commentsCount']->value;?>
</span>)
	</h1>
	<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 50) {?>
			<?php }?>
</div>

<!-- /Comments Div -->

<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] >= 75) {?>
	<input type="checkbox" id="editTitleModal" class="modal-toggle">
	<div class="modal modal-bottom sm:modal-middle">
		<div class="modal-box">
			<h3 class="font-bold text-2xl text-center mb-4 underline">Edit Title</h3>
			<form method="POST" name="editTitle" id="editTitleForm">
				<div class="grid grid-cols-1 gap-4">
					<!-- Cover Image -->
					<input type="file" id="cover" class="border border-black file-input w-full" title="Cover">
					<img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
.png" alt="Cover" id="imgpreview"
						class="rounded-xl w-full border shadow-sm">
					<!-- /Cover Image -->

					<!-- Title Data-->
					<input name="id" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
" hidden>
					<input name="cover" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['cover'];?>
" hidden>
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>
" placeholder="Title" name="title"
						class="input w-full border border-black" title="Title">
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['alts'];?>
" placeholder="Alternate Names" name="alts"
						class="input w-full border border-black" title="Alternate Names">
					<label for="tagsModal" class="btn">Select Tags</label>
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['authors2'];?>
" placeholder="Author/s (Seperate by comma)" name="authors"
						class="input w-full border border-black" title="Author/s (Seperate by comma)">
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['artists2'];?>
" placeholder="Artist/s (Seperate by comma)" name="artists"
						class="input w-full border border-black" title="Artist/s (Seperate by comma)">
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['lang'];?>
" placeholder="Original Language" name="olang"
						class="input w-full border border-black" title="Original Language">
					<select name="ostatus" class="select w-full border border-black" title="Original Work Status">
						<option disabled>Select original work status...</option>
						<option value="1" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 1) {?>selected<?php }?>>Announced</option>
						<option value="2" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 2) {?>selected<?php }?>>Releasing</option>
						<option value="3" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 3) {?>selected<?php }?>>Hiatus</option>
						<option value="4" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 4) {?>selected<?php }?>>Completed</option>
						<option value="5" <?php if ($_smarty_tpl->tpl_vars['title']->value['status'] == 5) {?>selected<?php }?>>Cancelled</option>
					</select>
					<select name="sstatus" class="select w-full border border-black" title="Scanlation Status">
						<option disabled>Select scanlation status...</option>
						<option value="1" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 1) {?>selected<?php }?>>Planned</option>
						<option value="2" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 2) {?>selected<?php }?>>Ongoing</option>
						<option value="3" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 3) {?>selected<?php }?>>Hiatus</option>
						<option value="4" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 4) {?>selected<?php }?>>Completed</option>
						<option value="5" <?php if ($_smarty_tpl->tpl_vars['title']->value['sstatus'] == 5) {?>selected<?php }?>>Cancelled</option>
					</select>
					<input type="number" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['releaseYear'];?>
" placeholder="Year of Release" name="release"
						class="input w-full border border-black" title="Year of Release">
					<input type="number" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['completionYear'];?>
" placeholder="Year of Completion" name="completion"
						class="input w-full border border-black" title="Year of Completion">
					<textarea name="summary" class="textarea w-full border border-black" title="Summary"
						placeholder="Summary"><?php echo $_smarty_tpl->tpl_vars['title']->value['summary2'];?>
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
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_format']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
											<label>
												<input type="checkbox" name="format[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
													<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_formats'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

											</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Warning/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_warnings']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
											<label>
												<input type="checkbox" name="warning[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
													<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_warnings'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

											</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Theme/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_theme']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
											<label>
												<input type="checkbox" name="theme[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
													<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_themes'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

											</label>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Genre/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_genre']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
											<label>
												<input type="checkbox" name="genre[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
													<?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['title']->value['tags']['_genres'])) {?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

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
	<input type="checkbox" id="addChapterModal" class="modal-toggle">
	<div class="modal modal-bottom sm:modal-middle">
		<div class="modal-box">
			<h3 class="font-bold text-2xl text-center mb-4 underline">Add Chapter</h3>
			<form method="POST" name="addChapter" id="addChapterForm" enctype="multipart/form-data">
				<div class="grid grid-cols-1 gap-4">
					<!-- Chapter Data-->
					<input name="id" value="<?php echo $_smarty_tpl->tpl_vars['title']->value['id'];?>
" hidden>
					<input type="file" id="zip" name="zip" class="border border-black file-input w-full">
					<input type="number" step=".01" id="chapterNumber" placeholder="Chapter" name="number"
						class="input w-full border border-black" title="Chapter">
					<input type="number" id="volumeNumber" placeholder="Volume" name="volume"
						class="input w-full border border-black" title="Volume">
					<input type="text" id="chTitle" placeholder="Chapter Title" name="title"
						class="input w-full border border-black" title="Title">
					<select name="language" class="select w-full border border-black" title="Language">
						<option disabled selected>Select chapter language...</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upl_langs']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['flag'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['item']->value['flag'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

							</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
					<progress class="progress hidden" max="100" id="addChapterLoadingBar"></progress>
					<!-- /Chapter Data -->

					<!-- Submit, Error and Close -->
					<button class="btn btn-primary btn-block btn-outline" type="submit">Add!</button>
					<div class="text-center hidden text-error" id="addchapter-result"></div>
					<!-- /Submit, Error and Close -->
				</div>
			</form>
			<button onclick="toggleCheck('addChapterModal');" id="addChapterModalClose"
				class="btn btn-error btn-block mt-4">Close</button>
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

		$("#addChapterForm").submit(function(e) {
			let loading = document.getElementById("addChapterLoadingBar");
			let text = document.getElementById("addchapter-result");
			loading.classList.remove("hidden");
			e.preventDefault();
			$.ajax({
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt) {
						if (evt.lengthComputable) {
							var percentComplete = ((evt.loaded / evt.total) * 100);
							loading.setAttribute("value", percentComplete);
						}
					}, false);
					return xhr;
				},
				type: "POST",
				url: "ajax\\chapters\\add.php",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					loading.setAttribute("value", 0);
					text.classList.add("hidden");
					text.innerHTML = "";
					loading.classList.remove("progress-error");
					loading.classList.remove("progress-success");
				},
				success: function(data) {
					if (data != "success") {
						loading.classList.add("progress-error");
						text.classList.remove("hidden");
						text.innerHTML = "<b>Error:</b> " + data;
					} else {
						loading.classList.add("progress-success");
						let chIn = document.getElementById("chapterNumber");
						let volIn = document.getElementById("volumeNumber");
						let allChs = document.getElementById("chapterCount");
						let chNum = (Number(chIn.value) + 1).toFixed(2);
						let volNum = Number(volIn.value);
						let chNos = Number(allChs.innerHTML) + 1;

						// Reset Form
						document.getElementById("chTitle").value = "";
						document.getElementById("zip").value = "";

						// Set all values for next chapter
						chIn.value = chNum;
						volIn.value = volNum;
						allChs.innerHTML = chNos;

						// Now make the close button reload
						document.getElementById("addChapterModalClose").setAttribute("onclick",
							"location.reload()");
						document.getElementById("addChapterModalClose").setAttribute("for", "");
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
