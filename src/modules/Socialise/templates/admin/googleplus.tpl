{pageaddvar name='stylesheet' value='modules/Socialise/style/admin.css'}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="Google+"}</h3>
</div>

<div class="z-informationmsg socialize-docblock">
    <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
        <br />
        {ldelim}googleplus{rdelim}<br />
        {ldelim}googleplus title=$title description=$description{rdelim}<br />
        {ldelim}googleplus title=$title width=450{rdelim}<br />
        {ldelim}googleplus title=$title size='standard'{rdelim}<br />
        {ldelim}googleplus title=$title annotation='inline'{rdelim}<br />
    </p>
    <ul>
        <li>{gt text='title: Text of the page to be shared. By default the button takes the title of the page the button is on.'}</li>
        <li>{gt text='description: Desription of the page to be shared.'}</li>
        <li>{gt text='width: The width of the button.'}</li>
        <li>{gt text='size: The size of the button. The possible values are: small (15px), medium (20px), standard (24px) and tall (60px).'}</li>
        <li>{gt text='inline: The method of the button. The possible values are: inline, bubble and none.'}</li>
    </ul>

    {assign var='googleplusurl' value='http://www.google.com/intl/en/webmasters/+1/button/index.html?utm_source=b2cp1&utm_medium=link&utm_campaign=p1'}
    <p>{gt text="You can find more informations and visuals examples <a href='%s'>here</a>." tag1=$googleplusurl}</p>
    <hr />
    <strong style="font-size:1.3em;">{gt text='Examples:'}</strong>
    <dl>
        <dt><strong>{gt text='%s module:' tag1='News'}</strong></dt>
        <dd>{ldelim}googleplus title=$info.title{rdelim}</dd>
        <dt><strong>{gt text='%s module:' tag1='Clip'}</strong></dt>
        <dd>{ldelim}googleplus title=$pubdata.core_title{rdelim}</dd>
    </dl>
</div>

{adminfooter}