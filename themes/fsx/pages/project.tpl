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