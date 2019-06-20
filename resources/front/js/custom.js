window.renderScripts = () => {
    $('.article-post').find('div.code').each(function() {
        var iframe = document.createElement('iframe');
        $(this).addClass('embed-responsive embed-responsive-16by9');
        $(this).append(iframe);
        var doc = iframe.contentWindow.document;
        doc.open();
        doc.write('<script src="' + $(this).attr('title') + '.js">\x3C/script>');
        doc.close();
    });
}

window.addMeta = (attributeTitle, attributeValue, content) => {
    var meta = document.createElement('meta');
    meta[attributeTitle] = attributeValue;
    meta.content = content;
    document.getElementsByTagName('head')[0].appendChild(meta);
}

{/* <meta name="description" content="{{ prettifyString($post->short_text) }}" />
<meta name="author" content="{{ $author->name }}" />
<meta name="robots" content="follow, index" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:url" content="{{ post_url($post) }}" />
<meta property="og:description" content="{{ prettifyString($post->short_text) }}" />
<link rel="canonical" href="{{ url('/') . '/posts/' . $post->id }}" />

<meta property="og:image" content="{{ url('/assets/images/posts', $image) }}.jpg" />
<meta itemprop="image" content="{{ url('/assets/images/posts', $image) }}.jpg" />

<meta itemprop="datePublished" content="{{ $post->created_at->format('Y-m-d\TH:i:s+03:30') }}" />
<meta itemprop="dateModified" content="{{ $post->updated_at->format('Y-m-d\TH:i:s+03:30') }}" />
<meta itemprop="name" content="{{ $post->title }}" />
<meta itemprop="description" content="{{ prettifyString($post->short_text) }}" /> */}