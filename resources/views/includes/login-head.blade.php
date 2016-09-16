<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Listi">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Log In - Powered by Listi</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/css/bootstrap.css">

<!-- Latest compiled and minified CSS -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- CSS for the sticky footer -->
<link rel="stylesheet" href="/css/stickyfooter.css">

<script src="/js/dropzone.js"></script>

<script language="JavaScript">
function showInput() {
    var message_entered =  document.getElementById("user_input").value;

    document.getElementById('display').innerHTML = message_entered;
}

  </script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({
  selector: 'textarea',
  height: 300,
  automatic_uploads: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});</script>
