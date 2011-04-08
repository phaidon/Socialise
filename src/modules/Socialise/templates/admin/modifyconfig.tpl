{include file='admin/header.tpl'}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{icon type='config' size='large'}</div>
    <h2>{gt text='Keys Management'}</h2>

    {form cssClass='z-form'}
       {formvalidationsummary}

       {foreach from=$indexes key='service' item='index'}
        <fieldset>
            <legend>{$service}</legend>

            {* default warning *}
            {if $service eq 'Facebook'}
            <div class="z-informationmsg">{gt text="A comma-separated list of either the Facebook IDs of page administrators or a Facebook Platform application ID. At a minimum, include only your own Facebook ID."}</div>
            {/if}

            {foreach from=$index key='id' item='text'}
            <div class="z-formrow">
                {formlabel for=$id text=$text}
                {formtextinput id=$id maxLength=255 group=$service}
            </div>
            {/foreach}
        </fieldset>
        {/foreach}

        <div class="z-formbuttons z-buttons">
            {formbutton class='z-bt-ok' commandName='save' __text='Save'}
            {formbutton class='z-bt-cancel' commandName='cancel' __text='Cancel'}
        </div>
    {/form}
</div>
