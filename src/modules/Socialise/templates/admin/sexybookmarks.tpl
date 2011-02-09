{include file="admin/header.tpl"}
<h2>{gt text='SexyBookmarks'}</h2>

{pageaddvar name='stylesheet' value='modules/Socialise/style/sexybookmarks-admin.css'}

<p class="z-informationmsg">
	<b>{gt text='Usage:'}</b><br />
	{'{'}sexybookmarks title=%title% url=%url%}<br />
	title: the title of the page the buttons are on.<br />
	url: the URL to like. Normally this parameter is needless!<br />
	<b>{gt text='Example for the News module:'}</b><br />
	{'{'}sexybookmarks title=$info.title}
</p>

{form cssClass="z-form"}	
	<fieldset>
		<legend>{gt text="Settings"}</legend>

		{formvalidationsummary}

		{foreach item=i from=$range}
		<div class="z-formrow">
			{formlabel for=$i text="Service $i"}
			{formdropdownlist id=$i items=$services}
		</div>
		{/foreach}
		


		<div class="z-formbuttons">
			{formimagebutton id="create" commandName="create" __text="Save" imageUrl="images/icons/small/button_ok.gif"}
		</div>
	</fieldset>


	<fieldset>
		<legend>{gt text="Demo"}</legend>

		{foreach item=service key=k from=$activeServices}
		<div id="item_{$k}" class="lineitem sexy-{$k}" title="{$service.name}"></div>
		{/foreach}
	</fieldset>
{/form}





{include file="admin/footer.tpl"}
