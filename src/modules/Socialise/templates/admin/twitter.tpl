{include file="admin/header.tpl"}
<div class="z-adminpageicon">{icon type="config" size="large"}</div>
<h2>{gt text='Twitter'}</h2>

<div class="z-informationmsg">
    <p style="font-size:1.3em;"><strong>{gt text='Usage:'}</strong> {'{'}twitter title=%title% count=%count% url=%url%}</p>
    <ul>
        <li>{gt text='%title%: The title of the page the button is on.'}</li>
        <li>{gt text='%count%: The place of the count box. Allowed values: "horizontal", "vertical" and "none" (default)'}</li>
        <li>{gt text='%url%: The URL to like. Normally this parameter is needless!'}</li>
    </ul>
    {assign var='twitterurl' value='http://twitter.com/about/resources/tweetbutton'}
    <p>{gt text="You can find more informations and visuals examples <a href='%s'>here</a>." tag1=$twitterurl}</p>
    <hr />
    <dl>
        <dt><strong>{gt text='Example for the News module:'}</strong></dt>
        <dd>{'{'}twitter title=$info.title}</dd>
    </dl>
</div>

{include file="admin/footer.tpl"}
