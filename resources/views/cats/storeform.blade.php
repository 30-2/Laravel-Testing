<html>

<head>
<title>Form Example</title>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
</head>

<body>
<form action = "/cat/store" method = "post"  enctype="multipart/form-data">
<input type = "hidden" name = "_token" value =  "<?php echo csrf_token() ?>">
<div class="dropzone" id="myDropzone"></div>
<table>
<tr>
<td>Cat Name</td>

<td><input type = "text" name = "name" value="{{ Input::old('name') }}"/>

<?php echo $errors->first('name'); ?>
</td>

</tr>

<tr>
<td>Birth Date</td>
<td>
<input type = "date" name = "birthdate" value="{{ Input::old('birthdate') }}"/>
<?php echo $errors->first('birthdate'); ?>
</td>

</tr>

<tr>
<td>Breed ID</td>
<td><input type = "text" name = "breedID" value="{{ Input::old('breedID') }}" />
<?php echo $errors->first('breedID'); ?>
</td>

</tr>

<tr>
<td>Password</td>
<td><input type = "text" name = "password" /></td>
</tr>

<tr>
<td>File</td>
<td><input type = "file" name = "file" />
<?php echo $errors->first('file'); ?></td>
</tr>

<tr>
<td>Multiple File</td>
<td><input type="file" name="vehicle_image[{{'1'}}]" multiple="multiple">
</td>
</tr>


<tr>
<td colspan = "2" align = "center">
<input type = "submit" value = "Register" />
</td>
</tr>
</table>

</form>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script type="text/javascript">

</script>

</body>


</html>