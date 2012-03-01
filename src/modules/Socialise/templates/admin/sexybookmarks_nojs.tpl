{pageaddvar name='stylesheet' value='modules/Socialise/style/admin.css'}
{pageaddvar name='stylesheet' value='modules/Socialise/style/admin_sexybookmarks.css'}

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

{form cssClass='z-form'}
<fieldset>
    <legend>{gt text='Settings'}</legend>

    {formvalidationsummary}

    {foreach from=$range item='s'}
    <div class="z-formrow">
        {gt text='Service %s' tag1=$s assign='labeltext'}
        {formlabel for=$s text=$labeltext}
        {formdropdownlist id=$i items=$services}
    </div>
    {/foreach}
</fieldset>

<div class="z-formbuttons z-buttons">
    {formbutton id='create' commandName='create' __text='Save' class='z-bt-ok'}
</div>

<fieldset>
    <legend>{gt text='Demo'}</legend>

    {foreach from=$activeServices key='k' item='service'}
    <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}"></div>
    {/foreach}
</fieldset>
{/form}

{adminfooter}