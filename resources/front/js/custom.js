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