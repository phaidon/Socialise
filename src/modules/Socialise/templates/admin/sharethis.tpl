{include file="admin/header.tpl"}
<h2>{gt text='ShareThis'}</h2>

<p class="z-informationmsg">
    {gt text='Usage:'}<br />
    {'{'}sharethis title=%title% id=%id% url=%url%}<br />
    id: The unique ID to apply to this instance of the ShareThis Link
    title: the title of the page the button is on.<br />
    url: the URL to like. Normally this parameter is needless!<br />
    <b>{gt text='Example for the News module:'}</b><br />
    {'{'}sharethis id=$info.sid title=$info.title}
</p>

{include file="admin/footer.tpl"}
