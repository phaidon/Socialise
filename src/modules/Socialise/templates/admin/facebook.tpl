{pageaddvar name='stylesheet' value='modules/Socialise/style/admin.css'}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Facebook"}</h3>
</div>

<h4>{gt text='Like button'}</h4>

<div class="z-informationmsg socialize-docblock">
    <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
        <br />
        {ldelim}fblike url=$url layout='horizontal'{rdelim}<br />
        {ldelim}fblike url=$url faces=true tpl='xfbml'{rdelim}<br />
        {ldelim}fblike url=$url layout='vertical' action='like' colorscheme='dark'{rdelim}<br />
        {ldelim}fblike url=$url layout='standard' width='350' height='25' action='recommend' font='tahoma'{rdelim}<br />
    </p>
    <ul>
        <li>{gt text='url: The URL to submit. By default it takes the current URL.'}</li>
        <li>{gt text='layout: Allowed values: "horizontal"/"button_count", "vertical"/"box_count" and "standard" (default)'}</li>
        <li>{gt text='rel: Identifier of the button source of the traffic (optional).'}</li>
        <li>{gt text='tpl: Template to use (plugin/fblike_XYZ.tpl). The XFBML version is more versatile, but requires use of the JavaScript SDK.'}</li>
        <li>{gt text='width: Width of the widget (default: 55).'}</li>
        <li>{gt text='height: Height of the widget (default: 20).'}</li>
        <li>{gt text='action: The verb to display on the button. Options: "like", "recommend" (default: like).'}</li>
        <li>{gt text='colorscheme: The color scheme for the like button. Options: "light", "dark" (default: light).'}</li>
        <li>{gt text='font: Possible values: arial, lucida grande, segoe ui, tahoma, trebuchet ms, verdana.  (optional)'}</li>
        <li>{gt text='faces: Specifies whether to display profile photos below the button (standard layout only) (default: false).'}</li>
        <li>{gt text='addmetatags: Enable the addition of the meta tags by the plugin (default: false).'}</li>
        <li>{gt text='metatitle: Title to be set on the meta tag, if enabled  (default: false).'}</li>
        {assign var='url' value='http://developers.facebook.com/docs/opengraph#types'}
        <li>{gt text='metatype: The type of entity. You must select a type from the list of <a href="%s">Open Graph types</a>. (default: article).' tag1=$url}</li>
        <li>{gt text='metaimage: Image to be set on the meta tag  (optional).'}</li>
    </ul>

    {assign var='url' value='http://developers.facebook.com/docs/reference/plugins/like/'}
    <p>{gt text="You can find more information and visuals examples <a href='%s'>here</a>." tag1=$url}</p>
    <hr />
    <strong style="font-size:1.3em;">{gt text='Examples:'}</strong>
    <dl>
        <dt><strong>{gt text='%s module:' tag1='News'}</strong></dt>
        <dd>{ldelim}fblike url=$links.permalink layout='horizontal'{rdelim}</dd>
        <dt><strong>{gt text='%s module:' tag1='Clip'}</strong></dt>
        <dd>{ldelim}fblike url=$returnurl tpl='xfbml'{rdelim}</dd>
    </dl>
</div>

{adminfooter}