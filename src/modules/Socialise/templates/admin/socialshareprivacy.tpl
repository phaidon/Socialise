{pageaddvar name='stylesheet' value='modules/Socialise/style/admin.css'}
{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="config" size="small"}
    <h3>{gt text="SocialSharePrivacy"}</h3>
</div>

<div class="z-informationmsg socialize-docblock">
    <p style="font-size:1.3em;"><strong>{gt text='Usages:'}</strong>
        <br />
        {ldelim}socialshareprivacy{rdelim}<br />
    </p>

    {assign var='url' value='http://www.heise.de/extras/socialshareprivacy/'}
    <p>{gt text="You can find more informations <a href='%s'>here</a>." tag1=$url}</p>
</div>

{adminfooter}