{pageaddvar name='stylesheet' value='modules/Socialise/style/admin.css'}
{pageaddvar name='stylesheet' value='modules/Socialise/style/admin_sexybookmarks.css'}
{ajaxheader modname='Socialise' filename='admin_sexybookmarks.js'}

{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="SexyBookmarks"}</h3>
</div>



<div class="z-informationmsg socialize-docblock">
    <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
        <br />
        {ldelim}sexybookmarks url=$url title=$title{rdelim}
    </p>
    <ul>
        <li>{gt text='url: The URL to submit. By default it takes the current URL.'}</li>
        <li>{gt text='title: The title of the page the button is on.'}</li>
    </ul>

    <hr />
    <strong style="font-size:1.3em;">{gt text='Examples:'}</strong>
    <dl>
        <dt><strong>{gt text='%s module:' tag1='News'}</strong></dt>
        <dd>{ldelim}sexybookmarks url=$links.permalink title=$info.title{rdelim}</dd>
        <dt><strong>{gt text='%s module:' tag1='Clip'}</strong></dt>
        <dd>{ldelim}sexybookmarks url=$returnurl title=$pubdata.core_title{rdelim}</dd>
    </dl>
</div>

<div id="group1" class="section">
    <h3 class="handle">{gt text='Inactive services'}</h3>
    {foreach from=$inactiveServices key='k' item='service'}
    <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}">&nbsp;</div>
    {/foreach}
</div>

<div id="group2" class="section">
    <h3 class="handle">{gt text='Active services'}</h3>
    {foreach from=$activeServices key='k' item='service'}
    <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}">&nbsp;</div>
    {/foreach}
</div>

<div class="z-buttons z-center z-gap">
    <input type="button" onclick="updateServices()" value="{gt text='Save'}" class="z-bt-ok" />
</div>

<script type="text/javascript">
    // <![CDATA[
    Sortable.create('group1',{tag:'div', dropOnEmpty:true, containment:sections, only:'lineitem'});
    Sortable.create('group2',{tag:'div', dropOnEmpty:true, containment:sections, only:'lineitem'});
    Sortable.create('page',{tag:'div', only:'section', handle:'handle'});
    // ]]>
</script>

{adminfooter}