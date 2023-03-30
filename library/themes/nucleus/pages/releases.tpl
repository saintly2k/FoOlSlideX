<!-- Chapters Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
    <h1 class="mb-4 font-bold text-2xl">
        Releases - Page {$page}
    </h1>
    {if !empty($chapters)}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            {foreach from=$chapters item=item key=key name=name}
                <div class="w-full grid grid-cols-3 gap-2 border rounded-xl shadow-md">
                    <div class="col-span-1 p-2">
                        <a href="title.php?id={$item.title.id}">
                            <img src="data/covers/{$item.title.id}.png" alt="Cover" class="w-full rounded-md border shadow-md">
                        </a>
                    </div>
                    <div class="col-span-2 py-2 pr-2">
                        <p class="font-bold text-md">
                            <a href="title.php?id={$item.title.id}" class="link" title="{$item.title.title}">
                                <span class="md:hidden">
                                    {shorten($item.title.title, 10)}
                                </span>
                                <span class="hidden md:block lg:hidden">
                                    {shorten($item.title.title, 18)}
                                </span>
                                <span class="hidden lg:block xl:hidden">
                                    {shorten($item.title.title, 13)}
                                </span>
                                <span class="hidden xl:block 2xl:hidden">
                                    {shorten($item.title.title, 14)}
                                </span>
                                <span class="hidden 2xl:block">
                                    {shorten($item.title.title, 17)}
                                </span>
                            </a>
                        </p>
                        <div class="text-sm">
                            <p>
                                <a href="chapter.php?id={$item.id}" class="flex items-center gap-2 link" title="{formatChapterTitle($item.volume, $item.number, "full")}">
                                    <img src="https://flagcdn.com/16x12/{$item.language.1}.png" alt="{$item.language.2}"
                                        class="h-3">
                                    {formatChapterTitle($item.volume, $item.number)}
                                </a>
                            </p>
                            <p>
                                <a href="profile.php?id={$item.user.id}"
                                    class="link flex items-center text-center md:text-left">
                                    <img src="{$item.user.avatar}" class="rounded-full h-5">
                                    <span class="ml-1">
                                        {$item.user.username}
                                    </span>
                                </a>
                            </p>
                            <p>
                                {timeAgo($item.timestamp)}
                            </p>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    {else}
        <p>There are no Chapters on this page!</p>
    {/if}

    {if !empty($pagis)}
        <!-- Pagination Div -->
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
        <!-- /Pagination Div -->
    {/if}
</div>
<!-- /Chapters Div -->