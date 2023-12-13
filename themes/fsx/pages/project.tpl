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
                <a href="{$config.url}project/{$project.uid}/info"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{$project.title}</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{ucfirst($tab)}</span>
            </div>
        </li>
    </ol>
</nav>

<div class="px-2 xl:px-0">
    <h1 class="text-2xl">{$project.title}</h1>

    <div class="my-2">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li>
                <a href="{$config.url}project/{$project.uid}/info" aria-current="page"
                    class="inline-block p-2 {if $tab == "info"}text-blue-600 bg-gray-100 active dark:bg-gray-800 dark:text-blue-500{else}hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300{/if}">Info</a>
            </li>
            <li>
                <a href="{$config.url}project/{$project.uid}/chapters"
                    class="inline-block p-2 {if $tab == "chapters"}text-blue-600 bg-gray-100 active dark:bg-gray-800 dark:text-blue-500{else}hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300{/if}">Chapters</a>
            </li>
            <li>
                <a href="{$config.url}project/{$project.uid}/comments"
                    class="inline-block p-2 {if $tab == "comments"}text-blue-600 bg-gray-100 active dark:bg-gray-800 dark:text-blue-500{else}hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300{/if}">Comments</a>
            </li>
            <li>
                {if $logged && $user.level < 15}
                    <a href="{$config.url}publisher/validate_custom/title/modify/{$uid}"
                        class="inline-block p-2 hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Edit</a>
                {else}
                    <a class="inline-block p-2 text-gray-400 cursor-not-allowed dark:text-gray-500">Edit</a>
                {/if}
            </li>
        </ul>
    </div>

    <div class="my-2">
        {if $tab == "info"}
            <div class="grid grid-cols-6 gap-x-2 mb-2">
                {if !empty($project.cover)}
                    <div class="col-span-1">
                        <img src="{$config.url}api/image/{$project.cover}/title" class="w-full">
                    </div>
                {/if}
                <div class="{if !empty($project.cover)}col-span-5{else}col-span-6{/if} w-full">
                    <div class="w-full">
                        {if !empty($project.summary)}
                            <div id="summary">
                                {$parsedown->text($project.summary)}
                            </div>
                            <hr class="h-px my-1 bg-gray-200 dark:bg-gray-700">
                        {/if}
                        {if !empty($project.alts)}
                            <div>
                                <b>Alternative Titles:</b> {$project.alts}
                            </div>
                        {/if}
                        {if !empty($project.authors) || !empty($project.artists)}
                            <div class="grid grid-cols-2 gap-x-2">
                                {if !empty($project.authors)}
                                    <div class="col-span-1">
                                        <b>Author/s:</b> {$project.authors}
                                    </div>
                                {/if}
                                {if !empty($project.artists)}
                                    <div class="col-span-1">
                                        <b>Artist/s:</b> {$project.artists}
                                    </div>
                                {/if}
                            </div>
                        {/if}
                        <div class="grid grid-cols-3 gap-x-2">
                            <div class="col-span-1">
                                <b>Original Language:</b> {$project.lang}
                            </div>
                            <div class="col-span-1">
                                <b>Original Status:</b>
                                {if $project.status.original == 1}
                                    Announced
                                {elseif $project.status.original == 2}
                                    Releasing
                                {elseif $project.status.original == 3}
                                    Hiatus
                                {elseif $project.status.original == 4}
                                    Completed
                                {else}
                                    Cancelled
                                {/if}
                            </div>
                            <div class="col-span-1">
                                <b>Upload Status:</b>
                                {if $project.status.upload == 1}
                                    Planned
                                {elseif $project.status.upload == 2}
                                    Ongoing
                                {elseif $project.status.upload == 3}
                                    Hiatus
                                {elseif $project.status.upload == 4}
                                    Completed
                                {else}
                                    Cancelled
                                {/if}
                            </div>
                        </div>
                        {if !empty($project.years)}
                            <div class="grid grid-cols-2 gap-x-2">
                                {if !empty($project.years.release)}
                                    <div class="col-span-1">
                                        <b>Released:</b> {$project.years.release}
                                    </div>
                                {/if}
                                {if !empty($project.years.completion)}
                                    <div class="col-span-1">
                                        <b>Completed:</b> {$project.years.completion}
                                    </div>
                                {/if}
                            </div>
                        {/if}
                        {if !empty($project.tags.format) || !empty($project.tags.genre) || !empty($project.tags.theme) || !empty($project.tags.warnings)}
                            <div class="grid grid-cols-2 gap-x-2 mt-2" id="tags">
                                {if !empty($project.tags.format)}
                                    <div class="col-span-1">
                                        <b>Formats:</b>
                                    </div>
                                {/if}
                                {if !empty($project.tags.genre)}
                                    <div class="col-span-1">
                                        <b>Genres:</b>
                                    </div>
                                {/if}
                                {if !empty($project.tags.theme)}
                                    <div class="col-span-1">
                                        <b>Themes:</b>
                                    </div>
                                {/if}
                                {if !empty($project.tags.warnings)}
                                    <div class="col-span-1">
                                        <b>Warnings:</b>
                                    </div>
                                {/if}
                            </div>
                        {/if}
                    </div>
                </div>
            </div>

            <script>
                function addClassesToLinks(clss, blnk) {
                    var summaryDiv = document.getElementById(clss);
                    if (summaryDiv) {
                        var links = summaryDiv.getElementsByTagName('a');
                        for (var i = 0; i < links.length; i++) {
                            links[i].classList.add('text-blue-500', 'dark:text-blue-600', 'hover:underline');
                            if (blnk)
                                links[i].setAttribute("target", "_blank");
                        }
                    }
                }

                {if !empty($project.summary)}
                    addClassesToLinks("summary", true);
                {/if}
                {if !empty($project.tags.format) || !empty($project.tags.genre) || !empty($project.tags.theme) || !empty($project.tags.warnings)}
                    addClassesToLinks("tags", false);
                {/if}
            </script>
        {elseif $tab == "chapters"}

        {else}
        {/if}
    </div>
</div>

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
                <a href="{$config.url}project/{$project.uid}/info"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{$project.title}</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{ucfirst($tab)}</span>
            </div>
        </li>
    </ol>
</nav>