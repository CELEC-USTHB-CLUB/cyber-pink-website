<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
</head>
<body>
	<form method="POST" action="{{ url('admin/login') }}">
		@csrf
		<input type="text" name="username" placeholder="username">
		<br/>
		<input type="password" name="password" placeholder="password">
		<br/>
		<button type="submit">Go!</button>
	</form>
</body>
</html>