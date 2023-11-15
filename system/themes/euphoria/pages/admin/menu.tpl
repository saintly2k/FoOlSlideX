<nav class="flex px-2 py-1 text-gray-700 bg-gray-50 dark:bg-gray-800 mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{$config.url}"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                {$config.title}
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <a href="{$config.url}admin"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Admin</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit Menu-Items</span>
            </div>
        </li>
    </ol>
</nav>

<div class="px-2 xl:px-0">
    <p class="text-2xl">Edit Menu-Items</p>

    <div class="space-y-2 my-4" id="itemDiv">
        {if empty($menuItems)}
            <p>No items yet.</p>
        {else}
            <div id="editAlert" class="p-2 text-sm mb-4 text-blue-800 hidden bg-blue-50 dark:bg-blue-200 dark:text-blue-800"
                role="alert">
                <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
            </div>
            {foreach from=$menuItems item=item key=key name=name}
                <form id="item{$item.id}" class="grid grid-cols-10 gap-2" method="POST">
                    <input type="number" name="id" value="{$item.id}" readonly class="hidden">
                    <div class="col-span-2">
                        <input name="display" type="text" placeholder="Display" value="{$item.display}"
                            class="w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div class="col-span-2">
                        <input name="url" type="text" placeholder="Page/URL" value="{$item.url}"
                            class="w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div class="col-span-1">
                        <input name="order" type="number" placeholder="Order" value="{$item.order}"
                            class="w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div class="col-span-1 flex items-center">
                        <label title="Only displayed for members">
                            <input name="logged" type="checkbox" {if $item.reqlogged}checked{/if}>
                            Logged only
                        </label>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <label title="Opens link in new browser tab">
                            <input name="tab" type="checkbox" {if $item.newtab}checked{/if}>
                            New Tab
                        </label>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <label title="Won't be shown at all, nowhere except here">
                            <input name="hidden" type="checkbox" {if $item.hidden}checked{/if}>
                            Hidden
                        </label>
                    </div>
                    <div class="col-span-1">
                        <button type="button" onclick="editItem('item{$item.id}')" id="editBtn{$item.id}"
                            class="w-full py-2 text-sm text-center text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Edit</button>
                        <button type="button" onclick="deleteItem('item{$item.id}')" id="confirmBtn{$item.id}"
                            class="w-full py-2 hidden text-sm text-center text-white bg-red-700 hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">Confirm</button>
                    </div>
                    <div class="col-span-1">
                        <button type="button"
                            onclick="$(this).addClass('hidden'); $('#editBtn{$item.id}').addClass('hidden'); $('#cancelBtn{$item.id}').removeClass('hidden'); $('#confirmBtn{$item.id}').removeClass('hidden');"
                            id="delBtn{$item.id}"
                            class="w-full py-2 text-sm text-center text-white bg-red-700 hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">Delete</button>
                        <button type="button"
                            onclick="$(this).addClass('hidden'); $('#editBtn{$item.id}').removeClass('hidden'); $('#confirmBtn{$item.id}').addClass('hidden'); $('#delBtn{$item.id}').removeClass('hidden');"
                            id="cancelBtn{$item.id}"
                            class="w-full hidden py-2 text-sm text-center text-white bg-gray-700 hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-700">Cancel</button>
                    </div>
                </form>
            {/foreach}
        {/if}
    </div>

    <hr>

    <div class="mt-4">
        <div id="addAlert" class="p-2 text-sm mb-4 text-blue-800 hidden bg-blue-50 dark:bg-blue-200 dark:text-blue-800"
            role="alert">
            <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
        </div>
        <form id="addForm" class="grid grid-cols-9 gap-2">
            <div class="col-span-2">
                <input type="text" placeholder="Display" id="addDisplay"
                    class="w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>
            <div class="col-span-2">
                <input type="text" placeholder="Page/URL" id="addUrl"
                    class="w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>
            <div class="col-span-1">
                <input type="number" placeholder="Order" id="addOrder"
                    class="w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>
            <div class="col-span-1 flex items-center">
                <label title="Only displayed for members">
                    <input type="checkbox" id="addLogged">
                    Logged only
                </label>
            </div>
            <div class="col-span-1 flex items-center">
                <label title="Opens link in new browser tab">
                    <input type="checkbox" id="addTab">
                    New Tab
                </label>
            </div>
            <div class="col-span-1 flex items-center">
                <label title="Won't be shown at all, nowhere except here">
                    <input type="checkbox" id="addHidden">
                    Hidden
                </label>
            </div>
            <div class="col-span-1">
                <button type="button" id="loginForm" onclick="addItem()"
                    class="w-full py-2 text-sm text-center text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
    function deleteItem(formId) {
        var values = $("#" + formId).serializeArray();
        $.ajax({
            type: "POST",
            url: "{$config.url}api/admin/menu/delete",
            data: values,
            success: function(data) {
                const $targetEl = document.getElementById('editAlert');
                const options = {};
                const instanceOptions = {
                    id: 'editAlert',
                    override: true
                };
                const dismiss = new Dismiss($targetEl, null, options, instanceOptions);

                if (data.done) {
                    // alert("session: " + data.session);
                    // If success, display an alert
                    $targetEl.innerHTML = "<b>Success!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                    //TODO: Update Menubar and footerbar to match the new updated stuff and also move the form up/down on order change
                    // THIS is bad practice...
                    setTimeout(() => {
                        document.location.reload();
                    }, 500);
                } else {
                    // If not successful, show the element with id "editAlert" and set its inner HTML to the response message
                    $targetEl.innerHTML = "<b>Error!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                }
                setTimeout(() => {
                    $targetEl.classList.add("hidden");
                }, 2000);
            }
        });
        return false;
    }

    function editItem(formId) {
        var values = $("#" + formId).serializeArray();
        values[1].value = encodeString(values[1].value, "{$config["salt"]}");
        values[2].value = encodeString(values[2].value, "{$config["salt"]}");
        // alert(values[0].name)
        $.ajax({
            type: "POST",
            url: "{$config.url}api/admin/menu/edit",
            data: values,
            success: function(data) {
                const $targetEl = document.getElementById('editAlert');
                const options = {};
                const instanceOptions = {
                    id: 'editAlert',
                    override: true
                };
                const dismiss = new Dismiss($targetEl, null, options, instanceOptions);

                if (data.done) {
                    // alert("session: " + data.session);
                    // If success, display an alert
                    $targetEl.innerHTML = "<b>Success!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                    //TODO: Update Menubar and footerbar to match the new updated stuff and also move the form up/down on order change
                    // THIS is bad practice...
                    setTimeout(() => {
                        document.location.reload();
                    }, 500);
                } else {
                    // If not successful, show the element with id "editAlert" and set its inner HTML to the response message
                    $targetEl.innerHTML = "<b>Error!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                }
                setTimeout(() => {
                    $targetEl.classList.add("hidden");
                }, 2000);
            }
        });
        return false;
    }

    function addItem() {
        var dsplay = "";
        var rul = "";
        var ordr = "0";
        var loggd = 0;
        var newtb = 0;
        var hddn = 0;

        if ($("#addDisplay").val()) {
            dsplay = encodeString($("#addDisplay").val(), "{$config.salt}");
        }
        if ($("#addUrl").val()) {
            rul = encodeString($("#addUrl").val(), "{$config.salt}");
        }
        if ($("#addOrder").val()) {
            ordr = $("#addOrder").val();
        }

        if ($("#addLogged").is(":checked")) {
            loggd = 1;
        }
        if ($("#addTab").is(":checked")) {
            newtb = 1;
        }
        if ($("#addHidden").is(":checked")) {
            hddn = 1;
        }

        $.ajax({
            type: "POST",
            url: "{$config.url}api/admin/menu/add",
            data: {
                display: dsplay,
                url: rul,
                order: ordr,
                logged: loggd,
                tab: newtb,
                hidden: hddn
            },
            success: function(data) {
                const $targetEl = document.getElementById('addAlert');
                const options = {};
                const instanceOptions = {
                    id: 'addAlert',
                    override: true
                };
                const dismiss = new Dismiss($targetEl, null, options, instanceOptions);

                if (data.done) {
                    // alert("session: " + data.session);
                    // If success, display an alert
                    $targetEl.innerHTML = "<b>Success!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                    $("#addForm")[0].reset();
                    //TODO: Add form into div formDiv instead of force refreshing page
                    // THIS is bad practice...
                    setTimeout(() => {
                        document.location.reload();
                    }, 500);

                } else {
                    // If not successful, show the element with id "addAlert" and set its inner HTML to the response message
                    $targetEl.innerHTML = "<b>Error!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                }
                //Doesn't make sense if page is force-refreshed.
                // setTimeout(() => {
                //     $targetEl.classList.add("hidden");
                // }, 2000);
            }
        });
        return false;
    }
</script>

<nav class="flex px-2 py-1 text-gray-700 bg-gray-50 dark:bg-gray-800 mt-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{$config.url}"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                {$config.title}
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <a href="{$config.url}admin"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Admin</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit Menu-Items</span>
            </div>
        </li>
    </ol>
</nav>