{include file='admin/header.tpl'}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{icon type='config' size='large'}</div>
    <h2>{gt text='Twitter'}</h2>

    <div class="z-informationmsg socialize-docblock">
        <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
            <br />
            {ldelim}twitter url=$url title=$title{rdelim}<br />
            {ldelim}twitter url=$url title=$title count='horizontal'{rdelim}
        </p>
        <ul>
            <li>{gt text='url: The URL to submit. By default it takes the current URL.'}</li>
            <li>{gt text='title: The title of the page the button is on.'}</li>
            <li>{gt text='count: The place of the count box. Allowed values: "horizontal", "vertical" and "none" (default)'}</li>
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
</div>
