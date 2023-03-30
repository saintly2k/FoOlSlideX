{foreach from=$images item=item key=key name=name}
    <img src="data/chapters/{$chapter.id}/{basename($item)}" alt="Page {$key + 1}">
{/foreach}