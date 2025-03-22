<?php
//online
/* $mysql_hostname = "localhost";
$mysql_user = "emr4allemail";
$mysql_password = "EMR4all@!!1";
$mysql_database = "EMR4allEmail";  */
//local
$mysql_hostname = "localhost";  
$mysql_user = "root";			
$mysql_password = "root";			
$mysql_database = "UMH";	

//$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
$mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
//mysqli_select_db($mysqli) or die("Error on database connection");
include ('paginate.php');

$page=0;
$per_page = 20;         // number of results to show per page
$result = mysqli_query($mysqli,"SELECT * FROM ClientTable");
//$result = mysqli_query($mysqli,"SELECT * FROM checklist");
$total_results =mysqli_num_rows($result);

$total_pages = ceil($total_results / $per_page);//total pages we going to have
$getpage=0;
$show_page=0;
if(isset($_GET['page']))
{
	$getpage=$_GET['page'];
}


//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
	$show_page = $_GET['page'];             //it will telles the current page
	if ($show_page > 0 && $show_page <= $total_pages) {
		$start = ($show_page - 1) * $per_page;
		$end = $start + $per_page;
	} else {
		// error - show first set of results
		$start = 0;
		$end = $per_page;
	}
} else {
	// if page isn't set, show first set of results
	$start = 0;
	$end = $per_page;
}
// display pagination
$page = intval($getpage);

$tpages=$total_pages;
if ($page <= 0)
	$page = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style type="text/css">
.logo
{
    text-align: center;
}
.container{

}
</style>
</head>
<body>

    <div class="container">
                <div class="mini-layout">
                 <?php
                    $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                    echo '<div class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
                    // display data in table
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>Name</th> <th>Address</th><th>city</th><th>zip</th><th>State</th><th>Country</th><th>phoneNumber</th><th>date</th><th>requestText</th></tr></thead>";
                    // loop through results of database query, displaying them in the table 
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }
                      
                        // echo out the contents of each row into a table
                        echo "<tr >";
                        echo '<td>' . mysqli_result($result, $i, 'clientName') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'Address') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'city') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'zip') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'State') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'Country') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'phoneNumber') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'date') . '</td>';
                        echo '<td>' . mysqli_result($result, $i, 'requestText') . '</td>';
                        echo "</tr>";
                    }       
                    // close table>
                echo "</table>";
            // pagination
            ?>
            </div>
</div>
</body>
</html>
<?php 
function mysqli_result($result, $row, $field = 0) {$result->data_seek($row);
$data = $result->fetch_array();return $data[$field];}
?>
