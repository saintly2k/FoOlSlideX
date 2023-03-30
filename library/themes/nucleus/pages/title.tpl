<!-- Title Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<div class="mb-4 md:mb-0 md:hidden">
		<h1 class="font-bold text-2xl">
			{$title.title}
			<div
				class="badge shadow-md badge-{if $title.sstatus == 1}info{elseif $title.sstatus == 2}success{elseif $title.sstatus == 3}warning{elseif $title.sstatus == 4}success-content{else}error{/if}">
				{if $title.sstatus == 1}Planned{elseif $title.sstatus == 2}Ongoing{elseif $title.sstatus == 3}Hiatus{elseif $title.sstatus == 4}Completed{else}Cancelled{/if}
			</div>
			{if $logged && $user.level >= 75}
				<button class="btn btn-sm shadow-md" onclick="toggleCheck('editTitleModal');">Edit Title</button>
			{/if}
		</h1>
		<p>{$title.alts}</p>
	</div>
	<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
		<div>
			<a href="data/covers/{$title.id}.png" target="_blank">
				<img src="data/covers/{$title.id}.png" alt="Cover" class="w-full rounded-xl shadow-md">
			</a>
		</div>
		<div class="col-span-1 md:col-span-3">
			<div class="hidden md:block md:mb-4">
				<h1 class="font-bold text-2xl">
					{$title.title}
					<div
						class="badge shadow-md badge-{if $title.sstatus == 1}info{elseif $title.sstatus == 2}success{elseif $title.sstatus == 3}warning{elseif $title.sstatus == 4}success-content{else}error{/if}">
						{if $title.sstatus == 1}Planned{elseif $title.sstatus == 2}Ongoing{elseif $title.sstatus == 3}Hiatus{elseif $title.sstatus == 4}Completed{else}Cancelled{/if}
					</div>
					{if $logged && $user.level >= 75}
						<button class="btn btn-sm shadow-md" onclick="toggleCheck('editTitleModal');">Edit Title</button>
					{/if}
				</h1>
				<p>{$title.alts}</p>
			</div>
			<div>
				<h2 class="underline font-bold text-xl mb-2">Details</h2>
				<p class="mb-1">
					<span class="font-bold">Author/s:</span>
					{if !empty($title.authors)}
						{foreach from=$title.authors item=item key=key name=name}
							<a href="titles.php?search={trim($item)}">
								<span class="badge hover:badge-info p-3 shadow-md">
									{trim($item)}
								</span>
							</a>
						{/foreach}
					{else}
						Unknown
					{/if}
				</p>
				<p class="mb-1">
					<span class="font-bold">Artist/s:</span>
					{if !empty($title.artists)}
						{foreach from=$title.artists item=item key=key name=name}
							<a href="titles.php?search={trim($item)}">
								<span class="badge hover:badge-info p-3 shadow-md">
									{trim($item)}
								</span>
							</a>
						{/foreach}
					{else}
						Unknown
					{/if}
				</p>
				<p class="mb-1">
					<span class="font-bold">Release Year:</span>
					{if !empty($title.releaseYear)}
						{$title.releaseYear}
					{else}
						Unknown
					{/if}
				</p>
				<p class="mb-1">
					<span class="font-bold">Completion Year:</span>
					{if !empty($title.completionYear)}
						{$title.completionYear}
					{else}
						Unknown
					{/if}
				</p>

				<h2 class="underline font-bold text-xl mb-2">Tags</h2>
				<div class="mb-1 grid grid-cols-2 gap-4">
					<div>
						<p><b>Formats</b></p>
						{if !empty($title.tags.formats)}
							{foreach from=$title.tags.formats item=item key=key name=name}
								<a href="titles.php?search={trim($item.name)}">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										{trim($item.name)}
									</span>
								</a>
							{/foreach}
						{/if}
					</div>
					<div>
						<p><b>Warnings</b></p>
						{if !empty($title.tags.warnings)}
							{foreach from=$title.tags.warnings item=item key=key name=name}
								<a href="titles.php?search={trim($item.name)}">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										{trim($item.name)}
									</span>
								</a>
							{/foreach}
						{/if}
					</div>
					<div>
						<p><b>Themes</b></p>
						{if !empty($title.tags.themes)}
							{foreach from=$title.tags.themes item=item key=key name=name}
								<a href="titles.php?search={trim($item.name)}">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										{trim($item.name)}
									</span>
								</a>
							{/foreach}
						{/if}
					</div>
					<div>
						<p><b>Genres</b></p>
						{if !empty($title.tags.genres)}
							{foreach from=$title.tags.genres item=item key=key name=name}
								<a href="titles.php?search={trim($item.name)}">
									<span class="badge hover:badge-info p-3 mb-1 border border-black shadow-md">
										{trim($item.name)}
									</span>
								</a>
							{/foreach}
						{/if}
					</div>
				</div>
			</div>
		</div>
		{if !empty($title.summary)}
			<div class="md:col-span-4">
				<h2 class="underline font-bold text-xl mb-2">Summary</h2>
				<div class="auto space-y-2 md:space-y-1">
					{$title.summary}
				</div>
			</div>
		{/if}
	</div>
</div>
<!-- /Title Div -->

<!-- Chapters Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<h1 class="text-xl font-bold">
		<span class="underline">Chapters</span>
		(<span id="chapterCount">{$chapterCount}</span>)
		{if $logged && $user.level >= 75}
			<label for="addChapterModal" class="btn btn-sm shadow-md">
				Add Chapter
			</label>
		{/if}
	</h1>

	{if !empty($chapterLangs.0.language.chapters)}
		<div class="tabs tabs-boxed mt-4 rounded-xl shadow-md border gap-1">
			{foreach from=$chapterLangs item=item key=key name=name}
				{if count($chapterLangs) > 1}
					<button class="tab tablink border rounded-md {if $preflang == $item.language.1}tab-active{/if}"
						onclick="switchTab(event, 'chTab_{$item.language.1}'); setCookie('preflang','{$item.language.1}');">
					{else}
						<button class="tab tablink tab-active rounded-md">
						{/if}
						<img src="https://flagcdn.com/16x12/{$item.language.1}.png" alt="{$item.language.2}" class="h-3">
						<span class="hidden md:block md:ml-1">
							{$item.language.0}
						</span>
						<span class="badge ml-1 mr-0">{$item.language.count}</span>
					</button>
				{/foreach}
		</div>

		<!-- Chapter Tabs -->
		<div class="tabcontents mt-4">
			{foreach from=$chapterLangs item=_lang key=lkey name=lname}
				{if count($chapterLangs) > 1}
					<div class="tabcontent {if $preflang == $_lang.language.1}active{else}hidden{/if}"
						id="chTab_{$_lang.language.1}">
					{/if}
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
									{if $logged && $user.level >= 75}
										<th></th>
									{/if}
								</tr>
							</thead>
							<tbody>
								{foreach from=$_lang.language.chapters item=item key=key name=name}
									<tr class="hover">
										<th>
											<label class="swap swap-flip">
												<input type="checkbox" onchange="toggleRead({$item.id});" id="readBox{$item.id}"
													{if $logged && in_array($item.id, $readChapters)}checked{/if}>
												<div class="swap-on">&#9989;</div>
												<div class="swap-off">&#10060;</div>
											</label>
										</th>
										<td>
											<a href="chapter.php?id={$item.id}" class="link">
												<span class="md:hidden">
													{formatChapterTitle($item.volume, $item.number, "short")}
												</span>
												<span class="hidden md:inline">
													{formatChapterTitle($item.volume, $item.number, "full")}
												</span>
											</a>
											<label class="btn btn-xs" for="editChapterModal{$item.id}">
												Edit Chapter
											</label>
										</td>
										<td>
											<a href="chapter.php?id={$item.id}" class="link">
												{$item.name}
											</a>
										</td>
										<td>
											<a href="profile.php?id={$item.user.id}"
												class="link flex items-center text-center md:text-left">
												<img src="{$item.user.avatar}" class="rounded-full h-6">
												<span class="hidden md:inline md:ml-1">
													{$item.user.username}
												</span>
											</a>
										</td>
										<td class="text-right">
											<span class="md:hidden">
												{formatDate($item.timestamp)}
											</span>
											<span class="hidden md:inline">
												{formatDate($item.timestamp, true)}
											</span>
										</td>
										{if $logged && $user.level >= 75}
											<td class="text-center">
											</td>
										{/if}
									</tr>
									{if $logged && $user.level >= 75}
										<input type="checkbox" id="editChapterModal{$item.id}" class="modal-toggle">
										<div class="modal modal-bottom sm:modal-middle">
											<div class="modal-box">
												<h3 class="font-bold text-2xl text-center mb-4 underline">Edit Chapter</h3>
												<form method="POST" name="editChapterForm{$item.id}" id="editChapterForm{$item.id}"
													enctype="multipart/form-data">
													<div class="grid grid-cols-1 gap-4">
														<!-- Chapter Data-->
														<input name="id" value="{$title.id}" hidden>
														<input name="cid" value="{$item.id}" hidden>
														<input type="file" id="zip" name="zip{$item.id}"
															class="border border-black file-input w-full" title="File">
														<input type="number" step=".01" placeholder="Chapter" name="number"
															class="input w-full border border-black" value="{$item.number}"
															title="Chapter">
														<input type="number" placeholder="Volume" name="volume" value="{$item.volume}"
															class="input w-full border border-black" title="Volume">
														<input type="text" placeholder="Chapter Title" name="title"
															class="input w-full border border-black" value="{$item.name}" title="Title">
														<select name="language" class="select w-full border border-black"
															title="Language">
															<option disabled selected>Select chapter language...</option>
															{foreach from=$upl_langs item=_item key=_key name=_name}
																<option value="{$_item.name},{$_item.code},{$_item.flag}"
																	{if $item.language.1 == $_item.code}selected{/if}>
																	{$_item.flag} {$_item.name}
																</option>
															{/foreach}
														</select>
														<progress class="progress hidden" max="100"
															id="addChapterLoadingBar{$item.id}"></progress>
														<!-- /Chapter Data -->

														<!-- Submit, Error and Close -->
														<button class="btn btn-primary btn-block btn-outline"
															type="submit">Edit!</button>
														<div class="text-center hidden text-error" id="editchapter{$item.id}-result">
														</div>
														<!-- /Submit, Error and Close -->
													</div>
												</form>
												<button onclick="toggleCheck('editChapterModal{$item.id}');"
													id="editChapterModal{$item.id}Close"
													class="btn btn-error btn-block mt-4">Close</button>
											</div>
										</div>
										<script>
											$("#editChapterForm{$item.id}").submit(function(e) {
											let loading = document.getElementById("addChapterLoadingBar{$item.id}");
											let text = document.getElementById("editchapter{$item.id}-result");
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
														document.getElementById("editChapterModal{$item.id}Close").setAttribute("onclick", "location.reload()");
														document.getElementById("editChapterModal{$item.id}Close").setAttribute("for", "");
													}
												}
											});
											return false;
											});
										</script>
									{/if}
								{/foreach}
							</tbody>
						</table>
					</div>
					<!-- /Chapter Table -->
					{if count($chapterLangs) > 1}
					</div>
				{/if}
			{/foreach}
		</div>
		<!-- /Chapter Tabs -->
	{else}
		<p class="mt-4">There are no chapters at the moment!</p>
	{/if}
</div>
<!-- /Chapters Div -->

<!-- Comments Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
	<h1 class="text-xl font-bold">
		<span class="underline">Comments</span>
		(<span id="commentsCount">{$commentsCount}</span>)
	</h1>
	{if $logged && $user.level >= 50}
		{* <div class="w-full my-4">
			<div class="iconBar border border-black rounded-t-xl">
				<div class="m-1">
					<button class="btn btn-xs" onclick="insertTag('ca', '**', '**', '-2');">
						<b>
							<span class="sm:hidden">
								B
							</span>
							<span class="hidden sm:inline">
								Bold
							</span>
						</b>
					</button>
					<button class="btn btn-xs" onclick="insertTag('ca', '*', '*', '-1');">
						<i>
							<span class="sm:hidden">
								I
							</span>
							<span class="hidden sm:inline">
								Italic
							</span>
						</i>
					</button>
					<button class="btn btn-xs" onclick="insertTag('ca', '\n> ', '', '-4');">
						<code>
							<span class="sm:hidden">
								> Q
							</span>
							<span class="hidden sm:inline">
								Quote
							</span>
						</code>
					</button>
					<button class="btn btn-xs" onclick="insertTag('ca', '`', '`', '-1');">
						<code>
							<span class="sm:hidden">
								C
							</span>
							<span class="hidden sm:inline">
								Code
							</span>
						</code>
					</button>
					<button class="btn btn-xs" onclick="insertTag('ca', '[', '](https://)', '-1');">
						<span class="sm:hidden">
							URL
						</span>
						<span class="hidden sm:inline">
							Link
						</span>
					</button>
					<button class="btn btn-xs" onclick="insertTag('ca', '![Image]', '()', '-9');">
						<span class="sm:hidden">
							IMG
						</span>
						<span class="hidden sm:inline">
							Image
						</span>
					</button>
					<button class="btn btn-xs" onclick="insertTag('ca', '\n- ', '', '-4');">
						<span class="sm:hidden">
							-
						</span>
						<span class="hidden sm:inline">
							List
						</span>
					</button>
				</div>
			</div>
			<form method="POST" name="addComment" id="addCommentForm">
				<textarea class="textarea textarea-bordered textarea-sm p-2 w-full rounded-none m-0" id="ca"></textarea>
				<div class="m-0 -mt-1">
					<button type="submit"
						class="btn btn-success btn-bordered btn-sm btn-block rounded-none rounded-b-xl mt-0 -mt-10">
						Publish Comment
					</button>
				</div>
			</form>
		</div> *}
	{/if}
</div>

<!-- /Comments Div -->

{if $logged && $user.level >= 75}
	<input type="checkbox" id="editTitleModal" class="modal-toggle">
	<div class="modal modal-bottom sm:modal-middle">
		<div class="modal-box">
			<h3 class="font-bold text-2xl text-center mb-4 underline">Edit Title</h3>
			<form method="POST" name="editTitle" id="editTitleForm">
				<div class="grid grid-cols-1 gap-4">
					<!-- Cover Image -->
					<input type="file" id="cover" class="border border-black file-input w-full" title="Cover">
					<img src="data/covers/{$title.id}.png" alt="Cover" id="imgpreview"
						class="rounded-xl w-full border shadow-sm">
					<!-- /Cover Image -->

					<!-- Title Data-->
					<input name="id" value="{$title.id}" hidden>
					<input name="cover" value="{$title.cover}" hidden>
					<input type="text" value="{$title.title}" placeholder="Title" name="title"
						class="input w-full border border-black" title="Title">
					<input type="text" value="{$title.alts}" placeholder="Alternate Names" name="alts"
						class="input w-full border border-black" title="Alternate Names">
					<label for="tagsModal" class="btn">Select Tags</label>
					<input type="text" value="{$title.authors2}" placeholder="Author/s (Seperate by comma)" name="authors"
						class="input w-full border border-black" title="Author/s (Seperate by comma)">
					<input type="text" value="{$title.artists2}" placeholder="Artist/s (Seperate by comma)" name="artists"
						class="input w-full border border-black" title="Artist/s (Seperate by comma)">
					<input type="text" value="{$title.lang}" placeholder="Original Language" name="olang"
						class="input w-full border border-black" title="Original Language">
					<select name="ostatus" class="select w-full border border-black" title="Original Work Status">
						<option disabled>Select original work status...</option>
						<option value="1" {if $title.status == 1}selected{/if}>Announced</option>
						<option value="2" {if $title.status == 2}selected{/if}>Releasing</option>
						<option value="3" {if $title.status == 3}selected{/if}>Hiatus</option>
						<option value="4" {if $title.status == 4}selected{/if}>Completed</option>
						<option value="5" {if $title.status == 5}selected{/if}>Cancelled</option>
					</select>
					<select name="sstatus" class="select w-full border border-black" title="Scanlation Status">
						<option disabled>Select scanlation status...</option>
						<option value="1" {if $title.sstatus == 1}selected{/if}>Planned</option>
						<option value="2" {if $title.sstatus == 2}selected{/if}>Ongoing</option>
						<option value="3" {if $title.sstatus == 3}selected{/if}>Hiatus</option>
						<option value="4" {if $title.sstatus == 4}selected{/if}>Completed</option>
						<option value="5" {if $title.sstatus == 5}selected{/if}>Cancelled</option>
					</select>
					<input type="number" value="{$title.releaseYear}" placeholder="Year of Release" name="release"
						class="input w-full border border-black" title="Year of Release">
					<input type="number" value="{$title.completionYear}" placeholder="Year of Completion" name="completion"
						class="input w-full border border-black" title="Year of Completion">
					<textarea name="summary" class="textarea w-full border border-black" title="Summary"
						placeholder="Summary">{$title.summary2}</textarea>
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
										{foreach from=$upl_format item=item key=key name=name}
											<label>
												<input type="checkbox" name="format[]" value="{$item.id}"
													{if in_array($item.id, $title.tags._formats)}checked{/if}> {$item.name}
											</label>
										{/foreach}
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Warning/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										{foreach from=$upl_warnings item=item key=key name=name}
											<label>
												<input type="checkbox" name="warning[]" value="{$item.id}"
													{if in_array($item.id, $title.tags._warnings)}checked{/if}> {$item.name}
											</label>
										{/foreach}
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Theme/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										{foreach from=$upl_theme item=item key=key name=name}
											<label>
												<input type="checkbox" name="theme[]" value="{$item.id}"
													{if in_array($item.id, $title.tags._themes)}checked{/if}> {$item.name}
											</label>
										{/foreach}
									</div>
								</div>
								<div>
									<h4 class="font-bold text-xl text-left">Genre/s</h4>
									<div class="grid grid-cols-2 md:grid-cols-3 gap-1">
										{foreach from=$upl_genre item=item key=key name=name}
											<label>
												<input type="checkbox" name="genre[]" value="{$item.id}"
													{if in_array($item.id, $title.tags._genres)}checked{/if}> {$item.name}
											</label>
										{/foreach}
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
					<input name="id" value="{$title.id}" hidden>
					<input type="file" id="zip" name="zip" class="border border-black file-input w-full">
					<input type="number" step=".01" id="chapterNumber" placeholder="Chapter" name="number"
						class="input w-full border border-black" title="Chapter">
					<input type="number" id="volumeNumber" placeholder="Volume" name="volume"
						class="input w-full border border-black" title="Volume">
					<input type="text" id="chTitle" placeholder="Chapter Title" name="title"
						class="input w-full border border-black" title="Title">
					<select name="language" class="select w-full border border-black" title="Language">
						<option disabled selected>Select chapter language...</option>
						{foreach from=$upl_langs item=item key=key name=name}
							<option value="{$item.name},{$item.code},{$item.flag}">
								{$item.flag} {$item.name}
							</option>
						{/foreach}
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

	<script>
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
	</script>
{/if}