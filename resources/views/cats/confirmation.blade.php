<html>

<head>
<title>Form Example</title>
</head>

<body>
<form action = "/cat/save" method = "post">
<input type = "hidden" name = "_token" value =  "<?php echo csrf_token() ?>">

<table>
<tr>
<td>Cat Name Confirm</td>
<td><input type = "text" name = "name" value="{{ Input::old('name') }}" />
<?php echo $errors->first('name'); ?>
</td>

</tr>

<tr>
<td>Birth Date Confirm</td>
<td>
<input type = "date" name = "birthdate" value="{{ Input::old('birthdate') }}" />
<?php echo $errors->first('birthdate'); ?>
</td>

</tr>

<tr>
<td>Breed ID Confirm</td>
<td><input type = "text" name = "breedID" value="{{ Input::old('breedID') }}" />
<?php echo $errors->first('breedID'); ?>
</td>

</tr>

<tr>
<td>Password</td>
<td><input type = "text" name = "password" /></td>
</tr>


<tr>
<td colspan = "2" align = "center">
<input type = "submit" value = "Confirmation" />
</td>
</tr>
</table>

</form>

</body>
</html>