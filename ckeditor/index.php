<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="js/ckeditor.js"></script>
</head>
<body>

<form>
	<!-- creating a text area for my editor in the form -->
        <textarea id="myeditor" name="myeditor" id="myeditor"> 
		<b>Introduction</b>
		<p> This is the text to be edited which I'm adding to my CKEditor. 
		.......
		<br />
		<b> Kesimpulan </b>
	    </textarea>
 
	<!-- creating a CKEditor instance called myeditor -->
	<script type="text/javascript">
		CKEDITOR.replace('myeditor');
	</script>

</form>
    
</body>
</html>