<?php 

include "config.php";

$sql = "SELECT * FROM contact";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="icon" href="./images/favicon-removebg-preview.png" type="image/icon type">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
tr,th,td,table{
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
    font-family: serif;
}
th{
    background-color:green;
    color:white;
}
td{
    background-color:lightgreen;
}
table{
    width: 80%;
    height:auto;
}
.excel button{
    background-color: green; 
    color: #fff; 
    padding: 10px; 
    border: none;
    border-radius: 5px; 
    margin: 2rem 0;
    cursor: pointer;
    margin:auto;
}
.button_1{
    background:rgb(221, 56, 56);
}
.button_2{
    background:grey;
}
a{
    color:inherit;
}
.center {
  margin-left: auto;
  margin-right: auto;
}


</style>
</head>
<body>
    <script>
        $(document).ready(function () {
            $('#dwnldBtn').on('click', function () {
                $("#dataTable").table2excel({
                    filename: "employeeData.xls"
                });
            });
        });
    </script>
    <table id="dataTable"class="center" >
        <tr>
        <th>S.no</th>

            <th>Name</th>
            <th>Email</th>
            <th>Mobile number</th>
            <th>City</th>
            <th>Courses</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        <?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>

        <tr>
        <td><?php echo $row['s_no']; ?></td>

        <td><?php echo $row['firstname']; ?></td>

        <td><?php echo $row['email']; ?></td>

        <td><?php echo $row['mobile']; ?></td>

        <td><?php echo $row['city']; ?></td>

        <td><?php echo $row['country']; ?></td>

        <td><a class="btn btn-info" href="update.php?s_no=<?php echo $row['s_no']; ?>"><button>Update</button></a></td>

        <td><a class="btn btn-danger" href="delete.php?s_no=<?php echo $row['s_no']; ?>"><button>Delete</button></a></td>

        </tr>                       

<?php       }

}

?>                

</tbody>
<br>

</table>
<div class="excel">
        <button id="dwnldBtn">Export To Excel</button></div> 

       
</body>
</html>