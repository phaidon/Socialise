{fblang assign='fblang'}
{pageaddvar name='javascript' value="http://connect.facebook.net/`$fblang`/all.js#xfbml=1"}

{nocache}
<fb:like href="{$plugin.url|urlencode}" layout="{$plugin.layout}" show-faces="{$plugin.faces}" width="{$plugin.width}" action="{$plugin.action}"{if $plugin.font} font="{$plugin.font}"{/if} colorscheme="{$plugin.colorscheme}"{if $plugin.ref} ref="{$plugin.ref}"{/if}></fb:like>
{/nocache}
