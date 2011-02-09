{include file="admin/header.tpl"}

<h2>{gt text='Facebook like button'}</h2>

<p class="z-informationmsg">
	<b>{gt text='Usage:'}</b><br />
	{'{'}like layout=%<u>standard</u>|button_count|box_count% implementation=%<u>xfbml</u>|iframe% url=%url%}<br />
	layout: the place of the count box.<br />
	implementation: The XFBML version is more versatile, but requires use of the JavaScript SDK.<br />
	url: the URL to like. Normally this parameter is needless!<br />
	The default values are <u>underlined</u>.<br />
	More informations and visuals examples you can find <a href='http://developers.facebook.com/docs/reference/plugins/like/'>here</a>.<br />
	<b>{gt text='Example for the News module:'}</b><br />
	{'{'}like}
</p>


{form cssClass="z-form"}	
	<fieldset>
		<legend>{gt text="Settings"}</legend>

		{formvalidationsummary}

		<div class="z-formrow">
			{formlabel for="id" __text="ID"}
			{formtextinput id="id" mandatory=true maxLength=255}
			<em class="z-formnote">{gt text="A comma-separated list of either the Facebook IDs of page administrators or a Facebook Platform application ID. At a minimum, include only your own Facebook ID."}</em>
		</div>

		<div class="z-formrow">
			{formlabel for="type" __text="Type"}
			{formdropdownlist id="type" items=$types}
		</div>
		


		<div class="z-formbuttons">
			{formimagebutton id="create" commandName="create" __text="Save" imageUrl="images/icons/small/button_ok.gif"}
		</div>
	</fieldset>
{/form}

{include file="admin/footer.tpl"}







        





