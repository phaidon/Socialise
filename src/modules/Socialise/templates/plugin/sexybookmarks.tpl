{pageaddvar name='stylesheet' value='modules/Socialise/style/sexybookmarks.css'}

<div class="sexy-bookmarks sexy-bookmarks-expand sexy-bookmarks-spaced">
<ul class="socials">
    {foreach item=sexybookmark from=$sexybookmarks}
    <li style="margin-left: 4px;" class="sexy-{$sexybookmark.name}">
        <a href="{$sexybookmark.url}" target="_blank"  rel="nofollow" class="external" title="{$sexybookmark.title}"></a>
    </li>
    {/foreach}
</ul>
</div>
<hr style="height:1px;width:{$linewidth}px;border-width:0px;border-bottom:0.1px solid #b7b5b5;" />


