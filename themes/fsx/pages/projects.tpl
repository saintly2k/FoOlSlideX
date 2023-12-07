<nav class="flex px-2 py-1 text-gray-700 bg-gray-50 dark:bg-gray-800 mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li>
            <div class="flex items-center">
                <a href="{$config.url}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">{$config.title}</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <a href="{$config.url}projects"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Page {$page}</span>
            </div>
        </li>
    </ol>
</nav>

<div class="px-2 xl:px-0">
    <p class="text-2xl">
        Projects - Page {$page}
        {if $logged && $user.level <= 14}
            <a type="button" href="{$config.url}publisher/validate_custom/title/create"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium text-sm p-1 dark:bg-blue-600 dark:hover:bg-blue-700">Create
                Title</a>
        {/if}
    </p>
    <div class="grid grid-cols-6 gap-2 my-2" id="titlesDiv">
        {foreach from=$projects item=item key=key name=name}
            <div class="col-span-1">
                <a href="{$config.url}project/{$item.uid}/info">
                    <div>
                        {if $item.cover}
                            <img src="{$config.url}api/image/{$item.cover}/title" alt="Cover Image">
                        {/if}
                    </div>
                    <span class="text-blue-500 hover:underline dark:text-blue-600">{$item.title}</span>
                </a>
            </div>
        {/foreach}
    </div>
</div>

<script>
    function getTitles() {
        $.ajax({
            url: "{$config.url}api/titles/{$page}",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Work with the JSON data here
                console.log('Data from API:', data);

                // Check if the data is an object
                if (typeof data !== 'object') {
                    console.error('Data is not in the expected format.');
                    return;
                }

                // Loop through each array in the data and create checkboxes
                Object.keys(data.msg).forEach(key => {
                    const itemsArray = data[key] || [];

                    // Create a container div for each array
                    if (document.getElementById(key + "Div")) {
                        $("#titlesDiv").empty();
                        const containerDiv = document.getElementById("titlesDiv");
                        if (containerDiv) {
                            // Create checkboxes for each item in the array
                            itemsArray.forEach(item => {
                                containerDiv.appendChild(div);
                            });
                        }
                    }
                });

                $("#loadingTagsText").addClass("hidden");
            },
            error: function(xhr, status, error) {
                console.error('There was a problem fetching data:', error);
            }
        });
    }

    getTitles();
</script>

<nav class="flex px-2 py-1 text-gray-700 bg-gray-50 dark:bg-gray-800 my-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li>
            <div class="flex items-center">
                <a href="{$config.url}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">{$config.title}</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <a href="{$config.url}projects"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Page {$page}</span>
            </div>
        </li>
    </ol>
</nav>