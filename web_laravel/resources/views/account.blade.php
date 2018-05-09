@extends('master')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">  <h4 >User Profile</h4></div>
	<div class="panel-body">

		<div class="box box-info">

			<div class="box-body">
				<div class="col-sm-6">
					<div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 

						<input id="profile-image-upload" class="hidden" type="file">
						<div style="color:#999;" >click here to change profile image</div>
						<!--Upload Image Js And Css-->







					</div>

					<br>

					<!-- /input-group -->
				</div>
				<div class="col-sm-6">
					<h4 style="color:#00b1b1;"> </h4></span>
					<span><p></p></span>            
				</div>
				<div class="clearfix"></div>
				<hr style="margin:5px 0 5px 0;">


				<div class="col-sm-5 col-xs-6 tital " >Họ và tên:</div><div class="col-sm-7 col-xs-6 "> Nguyễn Tiến Thiện</div>
				<div class="clearfix"></div>
				<div class="bot-border"></div>

				<div class="col-sm-5 col-xs-6 tital " >Tuổi:</div><div class="col-sm-7"> 21</div>
				<div class="clearfix"></div>
				<div class="bot-border"></div>


				<div class="col-sm-5 col-xs-6 tital " >Số điện thoại:</div><div class="col-sm-7"> 0964411851</div>

				<div class="clearfix"></div>
				<div class="bot-border"></div>

				<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"> tienthienhd@gmail.com</div>

				<div class="clearfix"></div>
				<div class="bot-border"></div>

				<div class="col-sm-5 col-xs-6 tital " >Chiều cao:</div><div class="col-sm-7"> 173cm</div>

				<div class="clearfix"></div>
				<div class="bot-border"></div>

				<div class="col-sm-5 col-xs-6 tital " >Cân nặng:</div><div class="col-sm-7"> 58</div>

				<div class="clearfix"></div>
				<div class="bot-border"></div>

				<div class="col-sm-5 col-xs-6 tital " >Tiền sử bệnh án:</div><div class="col-sm-7"> đau dạ dày</div>

				<div class="clearfix"></div>
				<div class="bot-border"></div>

				<div class="col-sm-5 col-xs-6 tital " >Công việc hiện tại:</div><div class="col-sm-7"> Sinh viên</div>



				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>


	</div> 

</div>  
<script>
	$(function() {
		$('#profile-image1').on('click', function() {
			$('#profile-image-upload').click();
		});
	}); 
	@endsection