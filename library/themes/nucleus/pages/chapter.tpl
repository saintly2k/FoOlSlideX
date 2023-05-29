<div class="grid grid-cols-12">
    <div class="col-span-1"></div>

    <div class="col-span-10">
        <h1 class="text-3xl"><a href="title.php?id={$title.id}" class="text-blue-500 hover:underline">{$title.title}</a>
        </h1>
        <h2 class="text-2xl flex">
            {$fullChapterTitle}
            <label class="swap swap-flip">
                <input type="checkbox" onchange="toggleRead({$chapter.id});toggleCheck('readBox{$chapter.id}0');toggleCheck('readBox{$chapter.id}Modal');"
                    id="readBox{$chapter.id}" {if $logged && in_array($chapter.id, $readChapters)}checked{/if}>
                <div class="swap-on">&#9989;</div>
                <div class="swap-off">&#10060;</div>
            </label>
        </h2>
        <hr class="w-full mb-2">
        <div class="w-full grid grid-cols-9 gap-2">
            {if $readingMode == "strip"}
                <select onchange="c = document.getElementById('chSelect'); location.href = 'chapter.php?id=' + c.value;"
                    class="col-span-3" id="chSelect">
                    {foreach from=$chapters item=item key=key name=name}
                        <option value="{$item.id}" {if $item.id == $chapter.id}selected{/if}>
                            {formatChapterTitle($item.volume, $item.number, "short")}</option>
                    {/foreach}
                </select>
                <select
                    onchange="s = document.getElementById('pageSelect'); Cookies.set('{cat($config.title)}_readingmode', s.value); location.href = 'chapter.php?id={$chapter.id}&page=1';"
                    class="col-span-2" id="pageSelect">
                    <option value="strip" selected>All Pages</option>
                    <option value="single">Single Page</option>
                </select>
                {if $prevChapter || $nextChapter}
                    <a href="{if $prevChapter}chapter.php?id={$prevChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $prevChapter}Previous{else}Title{/if}</a>
                    <a href="{if $nextChapter}chapter.php?id={$nextChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $nextChapter}Next{else}Title{/if}</a>
                {else}
                    <a href="title.php?id={$title.id}"
                        class="col-span-4 p-2 border border-black text-center hover:bg-gray-200">Title</a>
                {/if}
            {else}
                <select onchange="c = document.getElementById('chSelect'); location.href = 'chapter.php?id=' + c.value;"
                    class="col-span-2" id="chSelect">
                    {foreach from=$chapters item=item key=key name=name}
                        <option value="{$item.id}" {if $item.id == $chapter.id}selected{/if}>
                            {formatChapterTitle($item.volume, $item.number, "short")}</option>
                    {/foreach}
                </select>
                <select
                    onchange="s = document.getElementById('pageSelect'); Cookies.set('{cat($config.title)}_readingmode', s.value); location.href = 'chapter.php?id={$chapter.id}';"
                    class="col-span-2" id="pageSelect">
                    <option value="strip">All Pages</option>
                    <option value="single" selected>Single Page</option>
                </select>
                <select
                    onchange="this.options[this.selectedIndex].value&&window.open('chapter.php?id={$chapter.id}&page=' + this.options[this.selectedIndex].value,'_self')"
                    class="col-span-1">
                    {foreach from=$imgind item=item key=key name=name}
                        <option value="{$item.order}" {if $item.order == $currentPage}selected{/if}>
                            {$item.order}{if $item.order == $currentPage}/{count($images)}{/if}</option>
                    {/foreach}
                </select>
                {if $prevChapter || $nextChapter}
                    <a href="{if $prevChapter}chapter.php?id={$prevChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $prevChapter}Previous{else}Title{/if}</a>
                    <a href="{if $nextChapter}chapter.php?id={$nextChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $nextChapter}Next{else}Title{/if}</a>
                {else}
                    <a href="title.php?id={$title.id}"
                        class="col-span-4 p-2 border border-black text-center hover:bg-gray-200">Title</a>
                {/if}
            {/if}
        </div>
        <hr class="w-full my-2">
    </div>

    <div class="col-span-1"></div>

    {if $readingMode == "strip"}
        <div class="col-span-2" onclick="scrollPx(-800)"></div>
    {else}
        <a href="chapter.php?id={$chapter.id}&page={$currentPage - 1}" class="col-span-2">
        </a>
    {/if}

    <div class="col-span-8 cursor-pointer" onclick="toggleCheck('chapterModal');">
        {if $readingMode == "strip"}
            {foreach from=$images item=item key=key name=name}
                <img src="data/chapters/{$chapter.id}/{basename($item)}" alt="Page {$key + 1}" class="w-full mx-auto">
            {/foreach}
        {else}
            <img src="data/chapters/{$chapter.id}/{$imgind.$currentPage.order}.{$imgind.$currentPage.ext}"
                alt="Page {$currentPage}" class="w-full mx-auto">
        {/if}
    </div>

    {if $readingMode == "strip"}
        <div class="col-span-2" onclick="scrollPx(800)"></div>
    {else}
        <a href="chapter.php?id={$chapter.id}&page={$currentPage + 1}" class="col-span-2">
        </a>
    {/if}


    <div class="col-span-1"></div>

    <div class="col-span-10">
        <hr class="w-full my-2">
        <div class="w-full grid grid-cols-9 gap-2">
            {if $readingMode == "strip"}
                <select onchange="c = document.getElementById('chSelect'); location.href = 'chapter.php?id=' + c.value;"
                    class="col-span-3" id="chSelect">
                    {foreach from=$chapters item=item key=key name=name}
                        <option value="{$item.id}" {if $item.id == $chapter.id}selected{/if}>
                            {formatChapterTitle($item.volume, $item.number, "short")}</option>
                    {/foreach}
                </select>
                <select
                    onchange="s = document.getElementById('pageSelect'); Cookies.set('{cat($config.title)}_readingmode', s.value); location.href = 'chapter.php?id={$chapter.id}&page=1';"
                    class="col-span-2" id="pageSelect">
                    <option value="strip" selected>All Pages</option>
                    <option value="single">Single Page</option>
                </select>
                {if $prevChapter || $nextChapter}
                    <a href="{if $prevChapter}chapter.php?id={$prevChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $prevChapter}Previous{else}Title{/if}</a>
                    <a href="{if $nextChapter}chapter.php?id={$nextChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $nextChapter}Next{else}Title{/if}</a>
                {else}
                    <a href="title.php?id={$title.id}"
                        class="col-span-4 p-2 border border-black text-center hover:bg-gray-200">Title</a>
                {/if}
            {else}
                <select onchange="c = document.getElementById('chSelect'); location.href = 'chapter.php?id=' + c.value;"
                    class="col-span-2" id="chSelect">
                    {foreach from=$chapters item=item key=key name=name}
                        <option value="{$item.id}" {if $item.id == $chapter.id}selected{/if}>
                            {formatChapterTitle($item.volume, $item.number, "short")}</option>
                    {/foreach}
                </select>
                <select
                    onchange="s = document.getElementById('pageSelect'); Cookies.set('{cat($config.title)}_readingmode', s.value); location.href = 'chapter.php?id={$chapter.id}';"
                    class="col-span-2" id="pageSelect">
                    <option value="strip">All Pages</option>
                    <option value="single" selected>Single Page</option>
                </select>
                <select
                    onchange="this.options[this.selectedIndex].value&&window.open('chapter.php?id={$chapter.id}&page=' + this.options[this.selectedIndex].value,'_self')"
                    class="col-span-1">
                    {foreach from=$imgind item=item key=key name=name}
                        <option value="{$item.order}" {if $item.order == $currentPage}selected{/if}>
                            {$item.order}{if $item.order == $currentPage}/{count($images)}{/if}</option>
                    {/foreach}
                </select>
                {if $prevChapter || $nextChapter}
                    <a href="{if $prevChapter}chapter.php?id={$prevChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $prevChapter}Previous{else}Title{/if}</a>
                    <a href="{if $nextChapter}chapter.php?id={$nextChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-2 p-2 border border-black text-center hover:bg-gray-200">{if $nextChapter}Next{else}Title{/if}</a>
                {else}
                    <a href="title.php?id={$title.id}"
                        class="col-span-4 p-2 border border-black text-center hover:bg-gray-200">Title</a>
                {/if}
            {/if}
        </div>
        <hr class="w-full my-2">
        <h2 class="text-2xl flex">
            {$fullChapterTitle}
            <label class="swap swap-flip">
                <input type="checkbox" onchange="toggleRead({$chapter.id});toggleCheck('readBox{$chapter.id}');toggleCheck('readBox{$chapter.id}Modal');"
                    id="readBox{$chapter.id}0" {if $logged && in_array($chapter.id, $readChapters)}checked{/if}>
                <div class="swap-on">&#9989;</div>
                <div class="swap-off">&#10060;</div>
            </label>
        </h2>
        <h1 class="text-3xl"><a href="title.php?id={$title.id}" class="text-blue-500 hover:underline">{$title.title}</a>
        </h1>
    </div>

    <div class="col-span-1"></div>
</div>

<input type="checkbox" id="chapterModal" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h1 class="text-3xl"><a href="title.php?id={$title.id}" class="text-blue-500 hover:underline">{$title.title}</a>
        </h1>
        <h2 class="text-2xl flex">
            {$fullChapterTitle}
            <label class="swap swap-flip">
                <input type="checkbox" onchange="toggleRead({$chapter.id});toggleCheck('readBox{$chapter.id}0');toggleCheck('readBox{$chapter.id}');"
                    id="readBox{$chapter.id}Modal" {if $logged && in_array($chapter.id, $readChapters)}checked{/if}>
                <div class="swap-on">&#9989;</div>
                <div class="swap-off">&#10060;</div>
            </label>
        </h2>
        <hr class="w-full my-2">
        <div class="w-full grid grid-cols-8 gap-2">
            {if $readingMode == "strip"}
                <select
                    onchange="c = document.getElementById('chSelectModal'); location.href = 'chapter.php?id=' + c.value;"
                    class="col-span-8 p-2 border border-black rounded-lg" id="chSelectModal">
                    {foreach from=$chapters item=item key=key name=name}
                        <option value="{$item.id}" {if $item.id == $chapter.id}selected{/if}>
                            {formatChapterTitle($item.volume, $item.number, "full")}</option>
                    {/foreach}
                </select>
                <select
                    onchange="s = document.getElementById('pageSelectModal'); Cookies.set('{cat($config.title)}_readingmode', s.value); location.href = 'chapter.php?id={$chapter.id}&page=1';"
                    class="col-span-8 p-2 rounded-lg border-1 border border-black" id="pageSelectModal">
                    <option value="strip" selected>All Pages</option>
                    <option value="single">Single Page</option>
                </select>
                {if $prevChapter || $nextChapter}
                    <a href="{if $prevChapter}chapter.php?id={$prevChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-4 p-2 rounded-lg border border-black text-center hover:bg-gray-200">{if $prevChapter}Previous{else}Title{/if}</a>
                    <a href="{if $nextChapter}chapter.php?id={$nextChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-4 p-2 rounded-lg border border-black text-center hover:bg-gray-200">{if $nextChapter}Next{else}Title{/if}</a>
                {else}
                    <a href="title.php?id={$title.id}"
                        class="col-span-8 p-2 rounded-lg border border-black text-center hover:bg-gray-200">Title</a>
                {/if}
                <label for="chapterModal" class="btn col-span-8">Close</label>
            {else}
                <select
                    onchange="c = document.getElementById('chSelectModal'); location.href = 'chapter.php?id=' + c.value;"
                    class="col-span-8 p-2 border border-black rounded-lg" id="chSelectModal">
                    {foreach from=$chapters item=item key=key name=name}
                        <option value="{$item.id}" {if $item.id == $chapter.id}selected{/if}>
                            {formatChapterTitle($item.volume, $item.number, "full")}</option>
                    {/foreach}
                </select>
                <select
                    onchange="s = document.getElementById('pageSelectModal'); Cookies.set('{cat($config.title)}_readingmode', s.value); location.href = 'chapter.php?id={$chapter.id}';"
                    class="col-span-4 p-2 border border-black rounded-lg" id="pageSelectModal">
                    <option value="strip">All Pages</option>
                    <option value="single" selected>Single Page</option>
                </select>
                <select
                    onchange="this.options[this.selectedIndex].value&&window.open('chapter.php?id={$chapter.id}&page=' + this.options[this.selectedIndex].value,'_self')"
                    class="col-span-4 p-2 border border-black rounded-lg">
                    {foreach from=$imgind item=item key=key name=name}
                        <option value="{$item.order}" {if $item.order == $currentPage}selected{/if}>
                            {$item.order}{if $item.order == $currentPage}/{count($images)}{/if}</option>
                    {/foreach}
                </select>
                {if $prevChapter || $nextChapter}
                    <a href="{if $prevChapter}chapter.php?id={$prevChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-4 rounded-lg p-2 border border-black text-center hover:bg-gray-200">{if $prevChapter}Previous{else}Title{/if}</a>
                    <a href="{if $nextChapter}chapter.php?id={$nextChapter}{else}title.php?id={$title.id}{/if}"
                        class="col-span-4 rounded-lg p-2 border border-black text-center hover:bg-gray-200">{if $nextChapter}Next{else}Title{/if}</a>
                {else}
                    <a href="title.php?id={$title.id}"
                        class="col-span-8 rounded-lg p-2 border border-black text-center hover:bg-gray-200">Title</a>
                {/if}
                <label for="chapterModal" class="btn col-span-8">Close</label>
            {/if}
        </div>
    </div>
</div>

<script>
    function scrollPx(px) {
        var y = $(window).scrollTop();
        $("html, body").animate({
            scrollTop: y + px
        }, 600);
    }
</script>