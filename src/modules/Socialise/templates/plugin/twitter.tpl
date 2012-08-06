{pageaddvar name='stylesheet' value='modules/Socialise/style/style.css'}
{pageaddvar name='javascript' value='http://platform.twitter.com/widgets.js'}

{nocache}
<a href="http://twitter.com/share" class="twitter-share-button"{if $plugin.url} data-url="{$plugin.url}"{/if} data-text="{$plugin.title}" data-count="{$plugin.count}" data-lang="{$plugin.lang}"{if $plugin.via} data-via="{$plugin.via}"{/if}{if $plugin.related} data-related="{$plugin.related}"{/if}>Tweet</a>
{/nocache}
