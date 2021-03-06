<?php 

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'register'; // Database Name
$data_name='';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}



$sql = 'SELECT data_name,data_address,data_phno,data_emergency,data_addmited,data_ward,data_report,data_medicines,lab
		FROM data
		';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

 mysqli_close($conn);

?>


<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	
		<table class="data-table">
		<caption class="title">Record of Patients</caption>
		<thead>
			<tr>
				
				<th>Name</th>
				<th>Address</th>
				<th>Phone number</th>
				<th>Emergency</th>
				<th>Addmited</th>
				<th>Ward</th>
				<th>Medicines</th>
				<th>General Report</th>
                <th>Lab Report</th>
				
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($record = mysqli_fetch_array($query))
		{
			   echo"<tr>";
			 		  
		  
		  echo "<td>".$record['data_name']."</td>";
		  echo "<td>".$record['data_address']."</td>";
		  echo "<td>".$record['data_phno']."</td>";
          echo "<td>".$record['data_emergency']."</td>";
          echo "<td>".$record['data_addmited']."</td>";
		  echo "<td>".$record['data_ward']."</td>";
		  echo "<td>".$record['data_medicines']."</td>";
		  echo "<td>".'<a href="' . $record['data_report'] . '" target="_blank">Full details</a> '."</td>";
		  echo "<td>".'<a href="' . $record['lab'] . '" target="_blank">Full details</a> '."</td>";
		  echo"</tr>";
		}?>
		</tbody>
	</table>
	
	<a href ="logout.php">Logout</a>
</body>
</html>
*