<?php
 $con=mysqli_connect('localhost','root','');
 mysqli_select_db($con,'mydb');
?>
<html>
<head>
<title>Manipulate data From Database</title>
<style>
    body{
        background-color: lightblue;
        
        
    }
    td{
        font-weight: bold;
        color: black;
        padding: 0px;
    }
    td:hover{
        background-color: lightcoral;
    }
    select:hover{
      background-color: cyan;
    }
    th:hover{
        background-color: deepskyblue;
    }
</style>
</head>
<body>
<form method="post">
 <table>
 <tr>
  <td>Name</td>
  <td>
   <input type="text" name="name">
  </td>
 </tr>
 <tr>
  <td>Department</td>
  <td>
    <select name="dept">
    <option value="Computer Engineering">Computer</option>
    <option value="Civil Engineering">Civil</option>
    <option value="Mechanical Engineering">Mechanical</option>
    <option value="IT Engineering">IT</option>
    <option value="Aeronautical Engineering">Aeronautical</option>
    <option value="Agricultural Engineering">Agricultural</option>
    <option value="Automobile Engineering">Automobile</option>
    <option value="Biomedical Engineering">Biomedical</option>
    <option value="Electrical Engineering">Electrical</option>
    <option value="Environmental Engineering">Environmental</option>
    <option value="Petrochemical Engineering">Petrochemical</option>
    <option value="Chemical Engineering">Chemical</option>
   </select>
  </td>
 </tr>
 <tr>
  <td>Semester</td>
  <td>
   <select name="sem">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
   </select>
  </td>
 </tr>
 <tr>
  <td>Gender</td>
  <td>
   <input type="radio" name="gender" value="male">Male<br>
   <input type="radio" name="gender" value="female">Female
  </td>
 </tr>
 <tr>
  <td colspan="2">
   <input type="submit" name="insert" value="Insert New Student">
  </td>
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
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "Inserted successfully";
  }
 }
?>
<hr>
<br>
<table border="5">
 <tr>
  <th>ID</th><th>NAME</th><th>DEPARTMENT</th><th>SEMESTER</th><th>GENDER</th>
 </tr>
 <?php
 $sql="SELECT * FROM student";
 $query=mysqli_query($con,$sql);
 while($raw=mysqli_fetch_assoc($query))
 {
 ?>
 <tr>
  <td><?php echo $raw['id'] ?></td>
  <td><?php echo $raw['Name'] ?></td>
  <td><?php echo $raw['Dept'] ?></td>
  <td><?php echo $raw['Sem'] ?></td>
  <td><?php echo $raw['Gender'] ?></td>
 </tr>
 <?php
 }
 ?> 
</table>
<?php
 $sql="SELECT * FROM student";
 $query=mysqli_query($con,$sql);
?>
<br>
<hr>
<form method="post">
<select name="id">
 <option>Select Student ID</option>
 <?php
 while($raw=mysqli_fetch_assoc($query))
 {?>
  <option value="<?php echo $raw['id'] ?>"><?php echo $raw['id'] ?></option>
 <?php
 }
 ?>
</select>
<input type="submit" value="get student" name="sel-id">
<br>
<br>
<?php
 if(isset($_POST['sel-id']))
 {
  $id=$_POST['id'];
  $sql="SELECT * FROM student WHERE id='".$id."'";
  $query=mysqli_query($con,$sql);
  while($raw=mysqli_fetch_array($query))
  {?>
   <form method="post">
    name : <input type="text" name="uname" value="<?php echo $raw['Name']; ?>"><br><br>
    Department : <input type="text" name="udept" value="<?php echo $raw['Dept']; ?>"><br><br>
    Semester : <input type="text" name="usem" value="<?php echo $raw['Sem']; ?>"><br><br>
    <input type="hidden" name="uid" value="<?php echo $raw['id']; ?>">
    <input type="submit" name="update" value="Update">
    <input type="submit" name="delete" value="Delete"><br><br>
   </form>
  <?php
  }
 }
 if(isset($_POST['update']))
 {
  $sid=$_POST['uid'];
  $nm=$_POST['uname'];
  $dpt=$_POST['udept'];
  $sm=$_POST['usem'];
  $sql = "UPDATE student SET Name='$nm', Dept='$dpt', Sem='$sm' WHERE student.id='$sid' LIMIT 1"; 
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "data updated";
   header("location:table.php");
  }
 }
 elseif(isset($_POST['delete']))
 {
  $sid=$_POST['uid'];
  $sql="DELETE FROM student WHERE id='$sid'";
  $delete=mysqli_query($con,$sql);
  if($delete)
  {
   header("location:table.php");
  }
 }
?>
</body>
</html>