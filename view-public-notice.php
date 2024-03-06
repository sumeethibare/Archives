<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html>

<head>
	<title>Student Management System || Home Page</title>
	<link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="includes/skin.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="hero min-h-screen bg-white">
		<div class="hero-content text-center">
			<div class="max-w-6xl">
				<table border="1" class="table">
					<?php
					$vid = $_GET['viewid'];
					$sql = "SELECT * from tblpublicnotice where ID=:vid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':vid', $vid, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $row) {               ?>
							<tr align="center" class="table-warning">
								<td colspan="4" style="font-size:20px;color:blue">
									</td>
							</tr>
							<tr class="table-info">
								<th>Notice Announced Date</th>
								<td><?php echo $row->CreationDate; ?></td>
							</tr>
							<tr class="table-info">
								<th>Noitice Title</th>
								<td><?php echo $row->NoticeTitle; ?></td>
							</tr>
							<tr class="table-info">
								<th>Message</th>
								<td><?php echo $row->NoticeMessage; ?></td>

							</tr>

					<?php $cnt = $cnt + 1;
						}
					} ?>
				</table>
			</div>
		</div>
	</div>

</body>

</html>