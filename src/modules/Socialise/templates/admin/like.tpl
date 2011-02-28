{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text='Facebook like button'}</h2>

<div class="z-informationmsg">
    <p style="font-size:1.3em;"><strong>{gt text='Usage:'}</strong> {'{'}like layout=%layout% url=%url%}</p>
    <ul>
        <li>{gt text='%layout%: the place of the count box. Allowed values: "standard", "button_count", "box_count", "iframe" and "xfbml" (default)'}</li>
        <li>{gt text='%implementation%: The XFBML version is more versatile, but requires use of the JavaScript SDK.'}</li>
        <li>{gt text='%url%: the URL to like. Normally this parameter is needless!'}</li>
    </ul>
    {assign var='facebookurl' value='http://developers.facebook.com/docs/reference/plugins/like/'}
    <p>{gt text="You can find more informations and visuals examples <a href='%s'>here</a>." tag1=$facebookurl}</p>
    <hr />
    <dl>
        <dt><strong>{gt text='Example for the News module:'}</strong></dt>
        <dd>{'{'}like}</dd>
    </dl>
</div>

{form cssClass="z-form"}
    <fieldset>
        <legend>{gt text="Settings"}</legend>
    
        {formvalidationsummary}
    
        <div class="z-formrow">
            {formlabel for="id" __text="ID"}
            {formtextinput id="id" mandatory=true maxLength=255}
            <em class="z-formnote z-sub">{gt text="A comma-separated list of either the Facebook IDs of page administrators or a Facebook Platform application ID. At a minimum, include only your own Facebook ID."}</em>
        </div>
        
        <div class="z-formrow">
            {formlabel for="auth" __text="Type"}
            {formdropdownlist id="auth" items=$auths}
        </div>

        <div class="z-formbuttons z-buttons">
            {formbutton class="z-bt-ok" commandName="save" __text="Save"}
            {formbutton class="z-bt-cancel" commandName="cancel" __text="Cancel"}
        </div>

    </fieldset>

{/form}

{include file="admin/footer.tpl"}