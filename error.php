<h2>SESSION VARIABLES</h2>
<table>
<?php 


    foreach ($_SESSION as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        print_r($value);
        echo "</td>";
        echo "</tr>";
    }


?>
</table>
<h2>POST VARIABLES</h2>
<table>
<?php 


    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>
</table>
<h2>GET VARIABLES</h2>
<table>
<?php 


    foreach ($_GET as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }


?>
</table>
