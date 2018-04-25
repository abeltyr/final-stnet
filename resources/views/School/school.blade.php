<!doctype html>
<html>
<head>

</head>

<body>
<h1> hey {{Auth::guard('admin')->user()->firstname}}</h1>
</body>
</html>
