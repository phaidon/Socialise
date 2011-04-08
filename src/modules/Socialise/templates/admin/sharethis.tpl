{include file='admin/header.tpl'}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{icon type='config' size='large'}</div>
    <h2>{gt text='ShareThis'}</h2>

    <div class="z-informationmsg socialize-docblock">
        <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
            <br />
            {ldelim}sharethis id=$id url=$url title=$title{rdelim}<br />
            {ldelim}sharethis id=$id title=$title __text='Share this'{rdelim}
        </p>
        <ul>
            <li>{gt text='id: The unique ID to apply to this instance of the ShareThis Link.'}</li>
            <li>{gt text='url: The URL to submit. By default it takes the current URL.'}</li>
            <li>{gt text='title: The title of the page the button is on.'}</li>
            <li>{gt text='text: Text to use in the plugin link (optional) (default: Share!).'}</li>
        </ul>

        <hr />
        <strong style="font-size:1.3em;">{gt text='Examples:'}</strong>
        <dl>
            <dt><strong>{gt text='%s module:' tag1='News'}</strong></dt>
            <dd>{ldelim}sharethis id=$info.sid url=$links.permalink title=$info.title{rdelim}</dd>
            <dt><strong>{gt text='%s module:' tag1='Clip'}</strong></dt>
            <dd>{ldelim}sharethis id=$pubdata.core_uniqueid url=$returnurl title=$pubdata.core_title{rdelim}</dd>
        </dl>
    </div>
</div>
