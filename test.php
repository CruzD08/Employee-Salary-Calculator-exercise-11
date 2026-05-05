<?php
$students = ["Ana", "Luis", "Carlos", "Maria", "Cruz"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<h2>Student Table</h2>

<table border="1">
<tr>
    <th>#</th>
    <th>Name</th>
</tr>

<?php
$i = 1;
foreach ($students as $name) {
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>$name</td>";
    echo "</tr>";
    $i++;
}
?>

</table>

</body>
</html>