{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text='SexyBookmarks'}</h2>

{pageaddvar name='stylesheet' value='modules/Socialise/style/sexybookmarks-admin.css'}
{ajaxheader modname=Socialise filename='sexybookmarks-admin.js'}

<p class="z-informationmsg">
    <b>{gt text='Usage:'}</b><br />
    {'{'}sexybookmarks title=%title% url=%url%}<br />
    title: the title of the page the buttons are on.<br />
    url: the URL to like. Normally this parameter is needless!<br />
    <b>{gt text='Example for the News module:'}</b><br />
    {'{'}sexybookmarks title=$info.title}
</p>

<div id="group1" class="section">
        <h3 class="handle">Inactive services</h3>
        {foreach item=service key=k from=$inactiveServices}
        <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}"></div>
        {/foreach}
</div>

<div id="group2" class="section">
        <h3 class="handle">Active services</h3>
        {foreach item=service key=k from=$activeServices}
        <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}"></div>
        {/foreach}
</div>

<input type="button" onClick="updateServices()" value="{gt text='Save'}" class="z-button">


<script type="text/javascript">
    // <![CDATA[
    Sortable.create('group1',{tag:'div',dropOnEmpty: true, containment: sections,only:'lineitem'});
    Sortable.create('group2',{tag:'div',dropOnEmpty: true, containment: sections,only:'lineitem'});
    Sortable.create('page',{tag:'div',only:'section',handle:'handle'});
    // ]]>
 </script>