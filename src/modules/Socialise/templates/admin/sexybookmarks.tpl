{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text='SexyBookmarks'}</h2>

{pageaddvar name='stylesheet' value='modules/Socialise/style/sexybookmarks-admin.css'}
{ajaxheader modname=Socialise filename='sexybookmarks-admin.js'}

<div class="z-informationmsg">
    <p style="font-size:1.3em;"><strong>{gt text='Usage:'}</strong> {'{'}sexybookmarks title=%title% url=%url%}</p>
    <ul>
        <li>{gt text='%title%: the title of the page the buttons are on.'}</li>
        <li>{gt text='%url%: the URL to like. Normally this parameter is needless!'}</li>
    </ul>
    <hr />
    <dl>
        <dt><strong>{gt text='Example for the News module:'}</strong></dt>
        <dd>{'{'}sexybookmarks title=$info.title}</dd>
    </dl>
</div>


<div id="group1" class="section">
    <h3 class="handle">Inactive services</h3>
    {foreach item=service key=k from=$inactiveServices}
    <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}">&nbsp;</div>
    {/foreach}
</div>

<div id="group2" class="section">
    <h3 class="handle">Active services</h3>
    {foreach item=service key=k from=$activeServices}
    <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}">&nbsp;</div>
    {/foreach}
</div>

<script type="text/javascript">
    // <![CDATA[
    Sortable.create('group1',{tag:'div',dropOnEmpty: true, containment: sections,only:'lineitem'});
    Sortable.create('group2',{tag:'div',dropOnEmpty: true, containment: sections,only:'lineitem'});
    Sortable.create('page',{tag:'div',only:'section',handle:'handle'});
    // ]]>
</script>

<div class="z-buttons z-center z-gap">
    <input type="button" onclick="updateServices()" value="{gt text='Save'}" class="z-bt-ok" />
</div>

{include file="admin/footer.tpl"}