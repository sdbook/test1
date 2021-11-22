<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>input form</title>
</head>
<body>
<p>Add new Job!! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>title</td>
    <td>note</td>
    <td></td
  </tr>
  <tr><form method="post" action="todoControl.php">
  <input name="act" type="hidden" value='addJob' />
    <td><label>
      <input name="title" type="text" id="title" />
    </label></td>
    <td><label>
      <input name="note" type="text" id="note" />
    </label></td>
    <td><label>
      <input type="submit" name="Submit" value="送出" />
    </label></td>
	</form>
  </tr>
</table>
</body>
</html>
