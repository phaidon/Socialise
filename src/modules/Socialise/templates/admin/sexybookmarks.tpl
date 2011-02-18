{include file="admin/header.tpl"}
<h2>{gt text='SexyBookmarks'}</h2>

{pageaddvar name='stylesheet' value='modules/Socialise/style/sexybookmarks-admin.css'}
{ajaxheader modname=Socialise filename='sexybookmarks-admin.js'}

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