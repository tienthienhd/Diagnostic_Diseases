<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Collapse Navigation Bar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
	
	<div class="container-fluid">
		
		<?php require_once('header.php') ?>
		
		
	</div>
	<div class="container">
			<h2>Form show result</h2>
			
			<table class="table table-hover table-responsive">
				<thead>
					<th>STT</th>
					<th>My Diseases</th>
					<th>Precent Accurate</th>
				</thead>
				<tbody>
					<?php foreach ($result as $value): ?>
						<?php $list = explode(" ", $value); ?>
						<tr>
							<td><?= $list[0] ?></td>
							<td><?php for($i=1 ;$i< sizeof($list)-1; $i++) {
								echo $list[$i]. " ";
							} ?></td>
							<td><?= $list[sizeof($list)-1] ?></td>
						</tr>
					<?php endforeach ?>
					
					
					
				</tbody>
				
			</table>
		</div>
</body>
</html>