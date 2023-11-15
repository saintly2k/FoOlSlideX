</div>

<footer class="my-4 bg-gray-50 dark:bg-gray-700">
    <div class="w-full mx-auto max-w-screen-xl p-2 md:flex md:items-center md:justify-between">
        <span class="text-sm sm:text-center">
            Copyright &copy; {date("Y")} <a href="{$config.url}"
                class="hover:underline text-blue-600">{$config.title}</a>.
            Proudly powered by <a href="https://github.com/saintly2k/FoOlSlideX" target="_blank"
                class="hover:underline text-blue-600">FoOlSlideX</a>
            <span
                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 dark:bg-blue-900 dark:text-blue-300">v{$version}</span>
        </span>
        <ul class="flex flex-wrap items-center mt-2 text-sm font-medium sm:mt-0 space-x-4">
            {if empty($menu)}
                <li>
                    <a href="{$config.url}index" class="text-gray-900 dark:text-white hover:underline">Index</a>
                </li>
            {else}
                {foreach from=$menu item=item key=key name=name}
                    {if !$item.hidden}
                        {if ($item.reqlogged && $logged) || !$item.reqlogged}
                            <li>
                                <a href="{if startsWith($item.url, "http")}{$item.url}{else}{$config.url}{$item.url}{/if}"
                                    {if $item.newtab}target="_blank" {/if}
                                    class="text-gray-900 dark:text-white hover:underline">{$item.display}</a>
                            </li>
                        {/if}
                    {/if}
                {/foreach}
            {/if}
        </ul>
    </div>
</footer>