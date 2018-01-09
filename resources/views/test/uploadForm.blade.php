<html>
<body>
	<form method="post" action="{!!route('postUploadFile')!!}" name="frm" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
		<input type="file" name="myFile"/>
		<input type="submit" name="submit" value="Upload"/>
	</form>
</body>
</html>