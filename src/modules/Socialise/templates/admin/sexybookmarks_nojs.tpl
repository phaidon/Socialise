{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text='SexyBookmarks'}</h2>

{pageaddvar name='stylesheet' value='modules/Socialise/style/sexybookmarks-admin.css'}

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

{form cssClass="z-form"}
<fieldset>
    <legend>{gt text="Settings"}</legend>

    {formvalidationsummary}

    {foreach item=i from=$range}
    <div class="z-formrow">
        {formlabel for=$i text="Service $i"}
        {formdropdownlist id=$i items=$services}
    </div>
    {/foreach}
</fieldset>

<div class="z-formbuttons z-buttons">
    {formbutton id="create" commandName="create" __text="Save" class="z-bt-ok"}
</div>

<fieldset>
    <legend>{gt text="Demo"}</legend>

    {foreach item=service key=k from=$activeServices}
    <div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}"></div>
    {/foreach}
</fieldset>
{/form}

{include file="admin/footer.tpl"}