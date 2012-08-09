{pageaddvar name='stylesheet' value='modules/Socialise/style/style.css'}
{pageaddvar name='javascript' value='http://platform.twitter.com/widgets.js'}

{nocache}
<!-- Platzieren Sie dieses Tag an der Stelle, an der die +1-Schaltfläche angezeigt werden soll. -->
<g:plusone annotation="{$plugin.annotation|default:'inline'}" size="{$plugin.size|default:'standard'}" width="{$plugin.width|default:'450'}"></g:plusone>

<!-- Platzieren Sie diese Render-Anweisung an einer geeigneten Stelle. -->
<script type="text/javascript">
  window.___gcfg = {lang: '{{$plugin.lang}}'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
{/nocache}