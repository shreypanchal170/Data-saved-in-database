<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
}
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    border: 1px solid #ddd;
    padding: 8px;
}
th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
</head>
<body>
<h2>Insert New Student</h2>
<form method="post">
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name"></td>
</tr>
<tr>
<td>Department:</td>
<td><input type="text" name="dept"></td>
</tr>
<tr>
<td>Semester:</td>
<td><input type="text" name="sem"></td>
</tr>
<tr>
<td>Gender:</td>
<td><input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="female"> Female</td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="insert" value="Insert New Student"></td>
</tr>
</table>
</form>
<?php
 if(isset($_POST['insert']))
 {
  $name=$_POST['name'];
  $dept=$_POST['dept'];
  $sem=$_POST['sem'];
  $gender=$_POST['gender'];
  $sql="INSERT INTO student(Name,Dept,Sem,Gender) VALUES('$name','$dept','$sem','$gender')";
 }