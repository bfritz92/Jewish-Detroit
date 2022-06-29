/*
* FeedEk jQuery RSS/ATOM Feed Plugin v1.1.2
* http://jquery-plugins.net/FeedEk/FeedEk.html
* Author : Engin KIZIL 
* http://www.enginkizil.com
*/
(function (e) { e.fn.FeedEk = function (t) { var n = { RSsUrl: "https://fetchrss.com/rss/60f053f97006b006173d549260f053e838ea6c1ce353c8e2.atom", Jml: 5, Ket: true, Tgl: true, MakHuruf: 0, UrlTarget: "_blank" }; if (t) { e.extend(n, t) } var r = e(this).attr("id"); var i; e("#" + r).empty().append('<div style="padding:3px;"><img src="loader.gif" /></div>'); e.ajax({ url: "https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=" + n.Jml + "&output=json&q=" + encodeURIComponent(n.RSsUrl) + "&hl=en&callback=?", dataType: "json", success: function (t) { e("#" + r).empty(); var s = ""; e.each(t.responseData.feed.entries, function (e, t) { s += '<li><div class="itemTitle"><a href="' + t.link + '" target="' + n.UrlTarget + '" >' + t.title + "</a></div>"; if (n.Tgl) { i = new Date(t.publishedDate); s += '<div class="itemDate">' + i.toLocaleDateString() + "</div>" } if (n.Ket) { if (n.DescCharacterLimit > 0 && t.content.length > n.DescCharacterLimit) { s += '<div class="itemContent">' + t.content.substr(0, n.DescCharacterLimit) + "...</div>" } else { s += '<div class="itemContent">' + t.content + "</div>" } } }); e("#" + r).append('<ul class="feedEkList">' + s + "</ul>") } }) } })(jQuery)

///////////////////
$(document).ready(function () {
        $('#divRss').FeedEk({
            RSsUrl: 'https://fetchrss.com/rss/60f053f97006b006173d549260f053e838ea6c1ce353c8e2.atom',
            Jml: 5
        });
  
});    