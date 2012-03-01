{pageaddvar name='stylesheet' value='modules/Socialise/style/admin.css'}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Twitter"}</h3>
</div>

<div class="z-informationmsg socialize-docblock">
    <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
        <br />
        {ldelim}twitter{rdelim}<br />
        {ldelim}twitter url=$url title=$title{rdelim}<br />
        {ldelim}twitter url=$url title=$title count='horizontal'{rdelim}<br />
        {ldelim}twitter url=$url title=$title via=false count='vertical'{rdelim}<br />
        {ldelim}twitter url=$url title=$title via='{gt text='anotherTwitterAccount'}'{rdelim}<br />
        {ldelim}twitter url=$url title=$title related='{gt text='account:description'}'{rdelim}
    </p>
    <ul>
        <li>{gt text='url: The URL to submit (optional). By default the button takes the current URL.'}</li>
        <li>{gt text='title: Text of the tweet to be shared. By default the button takes the title of the page the button is on.'}</li>
        <li>{gt text='count: The place of the count box. Allowed values: "horizontal", "vertical" and "none" (default)'}</li>
        <li>{gt text='Recommends up to two Twitter accounts to users to follow after sharing the contents of your web site with:'}
            <ul>
                <li>{gt text="via: The site's Twitter account or a fixed one, or false to disable (default: true)."}</li>
                <li>{gt text="related: A collaborator or partner account with its description in the format: %s." __tag1='account:description'}</li>
            </ul>
        </li>
    </ul>

    {assign var='twitterurl' value='http://twitter.com/about/resources/tweetbutton'}
    <p>{gt text="You can find more informations and visuals examples <a href='%s'>here</a>." tag1=$twitterurl}</p>
    <hr />
    <strong style="font-size:1.3em;">{gt text='Examples:'}</strong>
    <dl>
        <dt><strong>{gt text='%s module:' tag1='News'}</strong></dt>
        <dd>{ldelim}twitter url=$links.permalink title=$info.title{rdelim}</dd>
        <dt><strong>{gt text='%s module:' tag1='Clip'}</strong></dt>
        <dd>{ldelim}twitter url=$returnurl title=$pubdata.core_title{rdelim}</dd>
    </dl>
</div>

{adminfooter}