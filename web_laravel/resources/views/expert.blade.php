@extends('master')
@section('content')
<div class="feedback">
	<table style="height: 184px;" width="100%">
		<thead>
			<tr style="font-size: 20px">
				<th>STT</th>
				<th>Triệu chứng</th>
				<th>Chuẩn đo&aacute;n</th>
				<th>Phản hồi</th>
				<th>Xác thực</th>
			</tr>
		</thead>
		<tbody>
			@foreach($fb as $feedback)
			<tr>
				<td>{{$loop->index + 1}}</td>				
				<td>
					@foreach($feedback['symptoms'] as $symptom)
					{{$symptom}}<br>
					@endforeach
				</td>

				<td>
					@foreach($feedback['diseases'] as $diseases)
					{{$diseases}}<br>
					@endforeach
				</td>

				<td>
					@foreach($feedback['evaluation'] as $evaluation)
					{{$evaluation}}<br>
					@endforeach
				</td>

				<td>
					@foreach($feedback['evaluation'] as $evaluation)
					<input type="radio" name="evaluation{{$loop->index}}" value="Yes">Đúng  <input type="radio" name="evaluation" value="No">Sai<br>
					@endforeach
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<br><br>
	<input type="submit" id="submit" name="submit" value="Submit">
</div>


<script type="text/javascript">
	$('#submit').click(function(e) {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		e.preventDefault();


		$.ajax({
			type : "get",
			url : "expertDone",
			data : {"content": ""},
			success: function(data) {
				// console.log("type: " + typeof data + " data: "+ data + " length: " + data.length);
				alert('Hệ thống đã lưu lại phản hồi của chuyên gia. Cảm ơn chuyên gia đã giúp chúng tôi tăng độ chính xác của hệ thống.');
			},
			error : function() {
				alert("Cập nhật lỗi.");
			}
		});
		location.reload();
	});
</script>
@endsection