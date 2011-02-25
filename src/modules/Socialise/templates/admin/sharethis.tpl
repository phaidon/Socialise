{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text='ShareThis'}</h2>

<div class="z-informationmsg">
    <p style="font-size:1.3em;"><strong>{gt text='Usage:'}</strong> {'{'}sharethis title=%title% id=%id% url=%url%}</p>
    <ul>
        <li>{gt text='%id%: The unique ID to apply to this instance of the ShareThis Link'}</li>
        <li>{gt text='%title%: the title of the page the button is on.'}</li>
        <li>{gt text='%url%: the URL to like. Normally this parameter is needless!'}</li>
    </ul>
    {assign var='facebookurl' value='ttp://developers.facebook.com/docs/reference/plugins/like/'}
    <p>{gt text="You can find more informations and visuals examples <a href='%s'>here</a>." tag1=$facebookurl}</p>
    <hr />
    <dl>
        <dt><strong>{gt text='Example for the News module:'}</strong></dt>
        <dd>{'{'}sharethis id=$info.sid title=$info.title}</dd>
    </dl>
</div>

{include file="admin/footer.tpl"}
