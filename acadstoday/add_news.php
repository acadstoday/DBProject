<html>
	<head>
		<title>Dynamic Form</title>
		<script language="javascript">
			var $count=0;
			function AddTag(){
				var i = 1;
				my_tag.innerHTML = my_tag.innerHTML +"<br><input type='text' name='mytext'+ i>"
				i++;
			}
		</script>
	</head>
	<body>
		<form name="form" action="post" method="">
		<input type="button" value="Add More Tags" onClick="AddTag()">
		<div id="my_tag"></div>
		</form>
	</body>
</html>



