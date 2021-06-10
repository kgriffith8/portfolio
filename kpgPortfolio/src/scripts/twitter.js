var Tweeter = new Object();
Tweeter.title = "My Latest Tweets";
Tweeter.tweetCount = 2;
Tweeter.links = new Array();
Tweeter.titles = new Array();
Tweeter.descriptions = new Array();
Tweeter.dates = new Array();
Tweeter.location = null;

Tweeter.Initialize = function()
{
        var scripts = document.getElementsByTagName('script');
        for(var i=0; i<scripts.length; i++)
        {
                if(scripts[i].src.indexOf("Tweeter.js") != -1)
                {
                        Tweeter.location = scripts[i];
                        Tweeter.Request();
                        break;
                }
        }
}

Tweeter.Request = function()
{
        var gateway = 'service/gateway.php?feed='+escape(this.url);
        this.request = (window.XMLHttpRequest) ? new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP"); 
        this.request.onreadystatechange = function() { Tweeter.checkReadyState(); };
        this.request.open('GET', gateway, true);
        this.request.send(gateway);
}

Tweeter.onResponse = function(feed)
{
        var items = feed.getElementsByTagName('item');
        for(var i=0; i<items.length; i++) 
        {
                this.links.push(items[i].getElementsByTagName('link')[0].firstChild.nodeValue);
                this.titles.push(items[i].getElementsByTagName('title')[0].firstChild.nodeValue);
                this.descriptions.push(items[i].getElementsByTagName('description')[0].firstChild.nodeValue);
                this.dates.push(items[i].getElementsByTagName('pubDate')[0].firstChild.nodeValue);
        }
        var ul = document.createElement('ul');
        ul.id = 'tweetWidget';
        var title = document.createElement('li');
        title.className = 'tweetTitle';
        title.appendChild(document.createTextNode(this.title));
        ul.appendChild(title);
        for(var i=0; i<this.tweetCount; i++)
        {
                var li = document.createElement('li');
                var link = document.createElement('a');
                link.appendChild(document.createTextNode(this.descriptions[i]));
            link.setAttribute('href', this.links[i]);
            li.appendChild(link);
            ul.appendChild(li);
        }
        
        this.location.parentNode.insertBefore(ul, this.location.nextSibling);
}
        
Tweeter.checkReadyState = function()
{
        switch(this.request.readyState)
        {
                case 1: break;
                case 2: break;
                case 3: break;
                case 4:
                        this.onResponse(this.request.responseXML.documentElement);
        }
}

window.onload = function() { Tweeter.Initialize(); }