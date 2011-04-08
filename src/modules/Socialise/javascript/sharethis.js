
function akst_share(id, url, title) {
    var form = $('akst_form');

    var link = $('akst_link_' + id);
    var offset = Position.cumulativeOffset(link);

    $("akst_delicious").href = akst_share_url("http://del.icio.us/post?url={url}&title={title}", url, title);
    $("akst_digg").href = akst_share_url("http://digg.com/submit?phase=2&url={url}&title={title}", url, title);
    $("akst_furl").href = akst_share_url("http://furl.net/storeIt.jsp?u={url}&t={title}", url, title);
    $("akst_facebook").href = akst_share_url("http://www.facebook.com/sharer.php?u={url}&t={title}", url, title);
    $("akst_netscape").href = akst_share_url(" http://www.netscape.com/submit/?U={url}&T={title}", url, title);
    $("akst_yahoo_myweb").href = akst_share_url("http://myweb2.search.yahoo.com/myresults/bookmarklet?u={url}&t={title}", url, title);
    $("akst_stumbleupon").href = akst_share_url("http://www.stumbleupon.com/submit?url={url}&title={title}", url, title);
    $("akst_google_bmarks").href = akst_share_url("  http://www.google.com/bookmarks/mark?op=edit&bkmk={url}&title={title}", url, title);
    $("akst_technorati").href = akst_share_url("http://www.technorati.com/faves?add={url}", url, title);
    $("akst_blinklist").href = akst_share_url("http://blinklist.com/index.php?Action=Blink/addblink.php&Url={url}&Title={title}", url, title);
    $("akst_newsvine").href = akst_share_url("http://www.newsvine.com/_wine/save?u={url}&h={title}", url, title);
    $("akst_magnolia").href = akst_share_url("http://ma.gnolia.com/bookmarklet/add?url={url}&title={title}", url, title);
    $("akst_twitter").href = akst_share_url("http://twitter.com/home?status=Currently%20reading%20{url}", url, title);
    $("akst_reddit").href = akst_share_url("http://reddit.com/submit?url={url}&title={title}", url, title);
    $("akst_windows_live").href = akst_share_url("https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url={url}&title={title}&top=1", url, title);
    $("akst_tailrank").href = akst_share_url("http://tailrank.com/share/?link_href={url}&title={title}", url, title);

    form.style.left = offset[0] + 'px';
    form.style.top = (offset[1] + link.offsetHeight + 3) + 'px';
    form.style.display = 'block';
}

function akst_share_url(base, url, title) {
    base = base.replace('{url}', url);
    return base.replace('{title}', title);
}

function akst_share_tab(tab) {
    var tab1  = document.getElementById('akst_tab1');
    var tab2  = document.getElementById('akst_tab2');
    var body1 = document.getElementById('akst_social');
    var body2 = document.getElementById('akst_email');

    switch (tab) {
        case '1':
            tab2.className = '';
            tab1.className = 'selected';
            body2.style.display = 'none';
            body1.style.display = 'block';
            break;
        case '2':
            tab1.className = '';
            tab2.className = 'selected';
            body1.style.display = 'none';
            body2.style.display = 'block';
            break;
    }
}

function akst_xy(id) {
    var element = $(id);
    var x = 0;
    var y = 0;
}

Event.observe(window, 'load', function() {
    Element.insert($(document.body), {bottom: $('akst_form')});
});