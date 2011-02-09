{include file="admin/header.tpl"}

<h2>{gt text='Twitter'}</h2>

<p class="z-informationmsg">
	{gt text='Usage:'}<br />
	{'{'}twitter title=%title% count=%<u>none</u>|horrizontal|vertical% url=%url%}<br />
	title: the title of the page the button is on.<br />
	count: the place of the count box.<br />
	url: the URL to like. Normally this parameter is needless!<br />
	The default values are <u>underlined</u>.<br />
	More informations and visuals examples you can find <a href='http://twitter.com/about/resources/tweetbutton#type-fields'>here</a>.<br />
	<b>{gt text='Example for the News module:'}</b><br />
	{'{'}twitter title=$info.title}
</p>


{include file="admin/footer.tpl"}


