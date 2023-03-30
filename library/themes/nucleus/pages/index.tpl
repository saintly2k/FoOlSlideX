<div class="p-4 border shadow-md rounded-xl my-4">
    <div class="mb-4">
        <h1 class="font-bold text-2xl">
            <a href="titles.php" class="link">
                Recently Updated Titles
            </a>
        </h1>
    </div>
    {if !empty($recentlyUpdated)}
        <div class="carousel w-full rounded-xl border">
            {foreach from=$recentlyUpdated item=item key=key name=name}
                <div id="titleSlider_{$key}" class=" text-black carousel-item w-full rounded-xl backdrop-blur-sm overflow-auto"
                    style="background-image: url(data/covers/{$item.title.id}.png); background-size: cover; background-position: center;">
                    <div
                        class="w-full backdrop-blur-md bg-white/30 grid grid-cols-3 md:grid-cols-6 gap-2 md:gap-4 flex items-center">
                        <div class="col-span-1 pl-4 py-4">
                            <a href="title.php?id={$item.title.id}">
                                <img src="data/covers/{$item.title.id}.png" class="rounded-xl w-full border shadow-md">
                            </a>
                        </div>
                        <div class="col-span-2 md:col-span-5 pr-4">
                            <h1 class="font-bold text-2xl">
                                <a href="title.php?id={$item.title.id}"><span class="link">{$item.title.title}</span></a>
                                <div
                                    class="badge shadow-md badge-{if $item.title.sstatus == 1}info{elseif $item.title.sstatus == 2}success{elseif $item.title.sstatus == 3}warning{elseif $item.title.sstatus == 4}success-content{else}error{/if}">
                                    {if $item.title.sstatus == 1}Planned{elseif $item.title.sstatus == 2}Ongoing{elseif $item.title.sstatus == 3}Hiatus{elseif $item.title.sstatus == 4}Completed{else}Cancelled{/if}
                                </div>
                            </h1>
                            <p class="text-sm mb-2">{$item.title.alts}</p>
                            <div class="auto space-y-2 md:hidden">
                                {$item.title.summary2}
                            </div>
                            <div class="auto space-y-1 hidden md:block">
                                {$item.title.summary1}
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
        <div class="flex justify-center w-full pt-4 gap-2 btn-group">
            {foreach from=$recentlyUpdated item=item key=key name=name}
                <a href="#titleSlider_{$key}" class="carlink btn btn-xs md:btn-sm {if $key == 0}btn-active{/if}"
                    onclick="switchCarLink(event);" rel="mad">{$key + 1}</a>
            {/foreach}
        </div>
    {else}
        <p>There are no Titles at the Moment!</p>
    {/if}
</div>

<!-- Chapters Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
    <h1 class="mb-4 font-bold text-2xl">
        <a href="releases.php" class="link">
            Latest Releases
        </a>
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
                                <span class="sm:hidden">
                                    {shorten($item.title.title, 10)}
                                </span>
                                <span class="hidden sm:block md:hidden">
                                    {shorten($item.title.title, 21)}
                                </span>
                                <span class="hidden md:block lg:hidden">
                                    {shorten($item.title.title, 17)}
                                </span>
                                <span class="hidden lg:block xl:hidden">
                                    {shorten($item.title.title, 12)}
                                </span>
                                <span class="hidden xl:block 2xl:hidden">
                                    {shorten($item.title.title, 13)}
                                </span>
                                <span class="hidden 2xl:block">
                                    {shorten($item.title.title, 17)}
                                </span>
                            </a>
                        </p>
                        <div class="text-sm">
                            <p>
                                <a href="chapter.php?id={$item.id}" class="flex items-center gap-2 link"
                                    title="{formatChapterTitle($item.volume, $item.number, "full")}">
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
            <div class="col-span-2 md:col-span-3 lg:col-span-5 xl:col-span-6">
                <a href="releases.php?page=2" class="btn w-full">
                    More
                </a>
            </div>
        </div>
    {else}
        <p>There are no Chapters on this page!</p>
    {/if}
</div>
<!-- /Chapters Div -->