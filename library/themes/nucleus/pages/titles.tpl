<!-- Titles Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
    <h1 class="mb-4 font-bold text-2xl">
        Titles - Page {$page}
        {if $logged && $user.level >= 75}
            <a href="#/" class="btn btn-sm" onclick="toggleCheck('addTitleModal');">Add Title</a>
        {/if}
    </h1>
    {if !empty($titles)}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            {foreach from=$titles item=item key=key name=name}
                <div>
                    <div class="card card-compact w-full bg-base-200 shadow-lg border">
                        <figure>
                            <a href="title.php?id={$item.id}">
                                <img src="data/covers/{$item.id}.png" alt="Cover">
                            </a>
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title flex">
                                <a href="title.php?id={$item.id}" class="link">
                                    {$item.title}
                                </a>
                            </h2>
                            <div class="card-actions justify-end">
                                <span
                                    class="badge shadow-md badge-{if $item.sstatus == 1}info{elseif $item.sstatus == 2}success{elseif $item.sstatus == 3}warning{elseif $item.sstatus == 4}success-content{else}error{/if}">
                                    {if $item.sstatus == 1}Planned{elseif $item.sstatus == 2}Ongoing{elseif $item.sstatus == 3}Hiatus{elseif $item.sstatus == 4}Completed{else}Cancelled{/if}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    {else}
        <p>There are no Titles on this page!</p>
    {/if}

    {if !empty($pagis)}
        <div class="btn-group mx-auto pt-4">
            {if $page > 1}
                <a href="?page=1" class="btn btn-sm md:btn-md shadow-md">«</a>
                <a href="?page={$page - 1}" class="btn btn-sm md:btn-md shadow-md">‹</a>
            {/if}
            {foreach from=$pagis item=item key=key name=name}
                {if $page != $item}
                    <a href="?page={$item}" class="btn btn-sm md:btn-md shadow-md">{$item}</a>
                {else}
                    <span class="btn btn-active btn-sm md:btn-md shadow-md">{$item}</span>
                {/if}
            {/foreach}
            {if $page < $totalPages}
                <a href="?page={$page + 1}" class="btn btn-sm md:btn-md shadow-md">›</a>
                <a href="?page={$totalPages}" class="btn btn-sm md:btn-md shadow-md">»</a>
            {/if}
        </div>
    {/if}
</div>
<!-- /Titles Div -->

{if $logged && $user.level >= 75}
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
                    <input type="text" placeholder="Author/s (Seperate by comma)" name="authors"
                        class="input w-full border border-black">
                    <input type="text" placeholder="Artist/s (Seperate by comma)" name="artists"
                        class="input w-full border border-black">
                    <input type="text" placeholder="Original Language" name="olang"
                        class="input w-full border border-black">
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
                    <input type="number" placeholder="Year of Release" name="release"
                        class="input w-full border border-black">
                    <input type="number" placeholder="Year of Completion" name="completion"
                        class="input w-full border border-black">
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
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-1">
                                        {foreach from=$upl_format item=item key=key name=name}
                                            <label>
                                                <input type="checkbox" name="format[]" value="{$item.id}"> {$item.name}
                                            </label>
                                        {/foreach}
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xl text-left">Warning/s</h4>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-1">
                                        {foreach from=$upl_warnings item=item key=key name=name}
                                            <label>
                                                <input type="checkbox" name="warning[]" value="{$item.id}"> {$item.name}
                                            </label>
                                        {/foreach}
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xl text-left">Theme/s</h4>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-1">
                                        {foreach from=$upl_theme item=item key=key name=name}
                                            <label>
                                                <input type="checkbox" name="theme[]" value="{$item.id}"> {$item.name}
                                            </label>
                                        {/foreach}
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xl text-left">Genre/s</h4>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-1">
                                        {foreach from=$upl_genre item=item key=key name=name}
                                            <label>
                                                <input type="checkbox" name="genre[]" value="{$item.id}"> {$item.name}
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
                    <button class="btn btn-primary btn-block btn-outline" type="submit">Add!</button>
                    <div class="text-center hidden text-error" id="addtitle-result"></div>
                    <label for="addTitleModal" class="btn btn-error btn-block">Cancel</label>
                    <!-- /Submit, Error and Close -->
                </div>
            </form>
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
    </script>
{/if}