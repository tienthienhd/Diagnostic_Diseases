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
		<div>
			<div class="bg-info" style="text-align: right;">
				<?php if($isLogin!=false){ ?>
					<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#hello" style="padding: 10px;">Hello <?= $isLogin['name'] ?></button>
					&nbsp;&nbsp;&nbsp;	
				<?php }else{ ?>
					<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#login" style="padding: 10px;">Login</button>
					&nbsp;&nbsp;&nbsp;		
				<?php } ?>
			</div>
			<div id="hello" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title text-xs-center">Information</h4>
			            </div>
			            <div class="modal-body">
			                	<div class="form-group">
			                        <label class="control-label">Tên</label>
			                        <div>
			                            <input type="text" class="form-control input-lg disable" name="name" value="<?= $isLogin['name'] ?>">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">Tuổi</label>
			                        <div>
			                            <input type="text" class="form-control input-lg disable" name="age" value="<?= $isLogin['age'] ?>">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">Chiều cao</label>
			                        <div>
			                            <input type="text" class="form-control input-lg disable" name="height" value="<?= $isLogin['height'] ?>">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">Cân nặng</label>
			                        <div>
			                            <input type="text" class="form-control input-lg disable" name="weight" value="<?= $isLogin['weight'] ?>">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">Công việc</label>
			                        <div>
			                            <input type="text" class="form-control input-lg disable" name="job" value="<?= $isLogin['job'] ?>">
			                        </div>
			                    </div>
			                    
			                    
			                    <button type="Close" class="btn btn-outline-danger btn-block">Close</button>
			                    
			               
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!-- The Modal -->
			<div id="login" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title text-xs-center">Form Log in</h4>
			            </div>
			            <div class="modal-body">
			                <form role="form" method="POST" action="<?= base_url(); ?>/index.php/predictdiseases/login">
			                    <input type="hidden" name="_token" value="">
			                    <div class="form-group">
			                        <label class="control-label">E-Mail Address</label>
			                        <div>
			                            <input type="text" class="form-control input-lg" name="email" value="">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label class="control-label">Password</label>
			                        <div>
			                            <input type="text" class="form-control input-lg" name="password">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <div>
			                            <div class="checkbox">
			                                <label>
			                                    <input type="checkbox" name="remember"> Remember Me
			                                </label>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <div>
			                            <a class="btn btn-link" href="">Forgot Your Password?</a>
			                            <button type="submit" class="btn btn-info btn-block">Login</button>
			                        </div>
			                    </div>
			                </form>
			            </div>
			            <div class="modal-footer text-xs-center">
			                Don't have an account? <a href="/auth/register">Sign up »</a>
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
		<script>
			
		</script>
		<?php require_once('header.php') ?>
		
	</div>
		<div class="container">
			<h2>Detail information in each tabs</h2>
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a href="#Diagnostic" class="nav-link active" data-toggle="tab">Diagnostic</a>
				</li>
				<li class="nav-item">
					<a href="#Diseases" class="nav-link" data-toggle="tab">Diseases</a>
				</li>
				<li class="nav-item">
					<a href="#Symptom" class="nav-link" data-toggle="tab">Symptom</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="Diagnostic" class="container tab-pane active"><br/>
					
					<label for="brgy">Diagnostic:</label>
					<input  class="form-control" id="diagnostic" type="text" name="diagnostic" placeholder="vd: tương tư">
						
					<br/>
					<div class="row">
						<div class="col-md-4">
							<button onclick="myFunction1()" class="btn btn-primary">Add to table</button>
						</div>
						<div class="col-md-4">
							<form action="<?php echo base_url(); ?>index.php/predictdiseases/result" method="post">
								<input type="hidden" name="param" id="param">
								<input  type="submit" name="submit" class="btn btn-primary">
							</form>
						</div>
						<div class="col-md-4">
							<button onclick="getRequest()" class="btn btn-primary">Save</button>
						</div>
					</div><br/><br/>
					
					<table id="myTable" class="table table-hover">
						<thead>
							<th>My symptoms</th>
						</thead>
						<tbody>
							
						</tbody>	
					</table>
					<?php 
						$json = json_encode($symptoms);
					?>
					<script>
						var request = " ";
						function myFunction1(){
							var tableRef = document.getElementById('myTable');

							if (document.getElementById('diagnostic').value!="") {
								// Insert a row in the table at the last row
								var newRow   = tableRef.insertRow(tableRef.rows.length);

								// Insert a cell in the row at index 0
								var newCell  = newRow.insertCell(0);

								var inputValue = document.getElementById('diagnostic').value;
								// Append a text node to the cell
								newCell.innerHTML = inputValue;

								inputValue = inputValue.split(':');
								request += inputValue[0] +' ';
							}
							

							document.getElementById('diagnostic').value="";
						}
						function getRequest(){
							document.getElementById('param').value=request;
						}

						// Suggestion
						$(function() {
						var availableTags =  <?php echo $json; ?>;
						    $( "#diagnostic" ).autocomplete({
						    	source: availableTags
						    });
						});

					</script>
				</div>
				<div id="Diseases" class="container tab-pane fade"><br/>
					<div class="container mt-3">
						<h2>Filterable List Diseases</h2>
					    <p>Type something in the input field to search the list for specific items:</p>  
					    <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>
					    
					    <ul class="list-group" id="myList">
							<?php foreach ($diseases as $value): ?>
								<li class="list-group-item"><?= $value ?></li>
							<?php endforeach ?>
					    </ul>  
					</div>

					<script>
						$(document).ready(function(){
							$("#myInput").on("keyup", function() {
						    	var value = $(this).val().toLowerCase();
						    	$("#myList li").filter(function() {
						    		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						    	});
						    });
					  	});
					</script>
				</div>
				<div id="Symptom" class="container tab-pane fade"><br/>
					<div class="container mt-3">
						<h2>Filterable List Symptom</h2>
					    <p>Type something in the input field to search the list for specific items:</p>  
					    <input class="form-control" id="myInputs" type="text" placeholder="Search.."><br>
					    
					    <ul class="list-group" id="myLists">
							<?php foreach ($symptoms as $value): ?>
								<li class="list-group-item"><?= $value ?></li>
							<?php endforeach ?>
					    </ul>  
					</div>

					<script>
						$(document).ready(function(){
							$("#myInputs").on("keyup", function() {
						    	var value = $(this).val().toLowerCase();
						    	$("#myLists li").filter(function() {
						    		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						    	});
						    });
					  	});
					</script>
				</div>
			</div>
		</div>
	

</body>
</html>