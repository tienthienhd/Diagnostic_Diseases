@extends('master')

@section('content')
<div id="Diagnostic" class="container tab-pane active"><br/>


	<label for="brgy">Nhập các triệu chứng của bạn:</label>
	<input  class="form-control" list="suggestions" id="symptom" type="text" name="diagnostic" placeholder="Triệu chứng">

	<datalist id="suggestions">
		<option value="itching"/>
		<option value="skin_rash"/>
		<option value="nodal_skin_eruptions"/>
		<option value="continuous_sneezing"/>
		<option value="shivering"/>
		<option value="chills"/>
		<option value="joint_pain"/>
		<option value="stomach_pain"/>
		<option value="acidity"/>
		<option value="ulcers_on_tongue"/>
		<option value="muscle_wasting"/>
		<option value="vomiting"/>
		<option value="burning_micturition"/>
		<option value="spotting_ urination"/>
		<option value="fatigue"/>
		<option value="weight_gain"/>
		<option value="anxiety"/>
		<option value="cold_hands_and_feets"/>
		<option value="mood_swings"/>
		<option value="weight_loss"/>
		<option value="restlessness"/>
		<option value="lethargy"/>
		<option value="patches_in_throat"/>
		<option value="irregular_sugar_level"/>
		<option value="cough"/>
		<option value="high_fever"/>
		<option value="sunken_eyes"/>
		<option value="breathlessness"/>
		<option value="sweating"/>
		<option value="dehydration"/>
		<option value="indigestion"/>
		<option value="headache"/>
		<option value="yellowish_skin"/>
		<option value="dark_urine"/>
		<option value="nausea"/>
		<option value="loss_of_appetite"/>
		<option value="pain_behind_the_eyes"/>
		<option value="back_pain"/>
		<option value="constipation"/>
		<option value="abdominal_pain"/>
		<option value="diarrhoea"/>
		<option value="mild_fever"/>
		<option value="yellow_urine"/>
		<option value="yellowing_of_eyes"/>
		<option value="acute_liver_failure"/>
		<option value="fluid_overload"/>
		<option value="swelling_of_stomach"/>
		<option value="swelled_lymph_nodes"/>
		<option value="malaise"/>
		<option value="blurred_and_distorted_vision"/>
		<option value="phlegm"/>
		<option value="throat_irritation"/>
		<option value="redness_of_eyes"/>
		<option value="sinus_pressure"/>
		<option value="runny_nose"/>
		<option value="congestion"/>
		<option value="chest_pain"/>
		<option value="weakness_in_limbs"/>
		<option value="fast_heart_rate"/>
		<option value="pain_during_bowel_movements"/>
		<option value="pain_in_anal_region"/>
		<option value="bloody_stool"/>
		<option value="irritation_in_anus"/>
		<option value="neck_pain"/>
		<option value="dizziness"/>
		<option value="cramps"/>
		<option value="bruising"/>
		<option value="obesity"/>
		<option value="swollen_legs"/>
		<option value="swollen_blood_vessels"/>
		<option value="puffy_face_and_eyes"/>
		<option value="enlarged_thyroid"/>
		<option value="brittle_nails"/>
		<option value="swollen_extremeties"/>
		<option value="excessive_hunger"/>
		<option value="extra_marital_contacts"/>
		<option value="drying_and_tingling_lips"/>
		<option value="slurred_speech"/>
		<option value="knee_pain"/>
		<option value="hip_joint_pain"/>
		<option value="muscle_weakness"/>
		<option value="stiff_neck"/>
		<option value="swelling_joints"/>
		<option value="movement_stiffness"/>
		<option value="spinning_movements"/>
		<option value="loss_of_balance"/>
		<option value="unsteadiness"/>
		<option value="weakness_of_one_body_side"/>
		<option value="loss_of_smell"/>
		<option value="bladder_discomfort"/>
		<option value="foul_smell_of urine"/>
		<option value="continuous_feel_of_urine"/>
		<option value="passage_of_gases"/>
		<option value="internal_itching"/>
		<option value="toxic_look_(typhos)"/>
		<option value="depression"/>
		<option value="irritability"/>
		<option value="muscle_pain"/>
		<option value="altered_sensorium"/>
		<option value="red_spots_over_body"/>
		<option value="belly_pain"/>
		<option value="abnormal_menstruation"/>
		<option value="dischromic _patches"/>
		<option value="watering_from_eyes"/>
		<option value="increased_appetite"/>
		<option value="polyuria"/>
		<option value="family_history"/>
		<option value="mucoid_sputum"/>
		<option value="rusty_sputum"/>
		<option value="lack_of_concentration"/>
		<option value="visual_disturbances"/>
		<option value="receiving_blood_transfusion"/>
		<option value="receiving_unsterile_injections"/>
		<option value="coma"/>
		<option value="stomach_bleeding"/>
		<option value="distention_of_abdomen"/>
		<option value="history_of_alcohol_consumption"/>
		<option value="fluid_overload.1"/>
		<option value="blood_in_sputum"/>
		<option value="prominent_veins_on_calf"/>
		<option value="palpitations"/>
		<option value="painful_walking"/>
		<option value="pus_filled_pimples"/>
		<option value="blackheads"/>
		<option value="scurring"/>
		<option value="skin_peeling"/>
		<option value="silver_like_dusting"/>
		<option value="small_dents_in_nails"/>
		<option value="inflammatory_nails"/>
		<option value="blister"/>
		<option value="red_sore_around_nose"/>
		<option value="yellow_crust_ooze"/>;
	</datalist>


	<br/>
	<div class="row">
		<div class="col-md-4">
			<button onclick="addSymptom()" class="btn btn-success">Thêm triệu chứng vào danh sách</button>
		</div>
		<div class="col-md-4">
			<form action="#" method="get">
				<input type="hidden" name="param" id="param">
				<input  type="button" id="sendServer" value="Chuẩn đoán" class="btn btn-success">
			</form>
		</div>
		<div class="col-md-4">
			<button onclick="getRequest()" class="btn btn-success">Lưu</button>
		</div>
	</div>
	<br/><br/>

	<table id="symptoms" class="table table-hover">
		<thead>
			<th style="font-size: 25px; color: #b9421b;">Các triệu chứng vừa nhập:</th>
		</thead>
		<tbody id="tbody">

		</tbody>	
	</table>

	<br/><br/>

	<div id="result">
		
	</div>

	<script type="text/javascript">

		function getRequest(){
			alert("Kết quả đã được lưu vào hệ thống. Kết quả sẽ được chuyên gia xử lý trong thời gian tới. Cảm ơn!");
		}

		function addSymptom(){
			var input = document.getElementById("symptom").value;
			if(input.length <= 0) return;
			var table = document.getElementById("tbody");
			var row = document.createElement("tr");
			var td = document.createElement("td");


			td.innerHTML = input;
			row.appendChild(td);
			table.appendChild(row);

			document.getElementById("symptom").value = "";

		}
	</script>

	<script type="text/javascript">
		
		$(document).ready(function(){
			
			$('#sendServer').click(function(e){
				var dataArr = [];
				$("#tbody tr td").each(function(){
					dataArr.push($(this).html());
				});
				console.log(dataArr);

				if(dataArr.length < 4) {
					alert("Số lượng triệu chứng không đủ để chuẩn đoán! Vui lòng nhập thêm.");
					return;
				}

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				e.preventDefault();


				$.ajax({
					type : "get",
					url : "predict_disease",
					data : "content="+dataArr,
					success: function(data) {
						console.log(data);
						display_result(data['result']);

					},
					error : function() {
						alert("error");
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function display_result(data) {
			console.log(data);
			dict = preprocess_result(data);
			var tmp = document.getElementById("Diagnostic");


			// var old = document.getElementById('result');
			var container = document.createElement('div');
			tmp.replaceChild(container, tmp.childNodes[0]);
			container.setAttribute('class', 'result');

			var title_result = document.createElement('div');
			title_result.setAttribute('style', 'font-size: 25px; color: #b9421b;');
			title_result.innerHTML = "Kết quả chuẩn đoán";
			container.appendChild(title_result);

			var table = document.createElement('table');

			table.setAttribute('id', 'result');
			table.setAttribute('class', 'table table-hover')
			var thead = document.createElement('thead');
			var th_name = document.createElement('th');
			var th_probably = document.createElement('th');
			th_name.innerHTML = "Tên bệnh";
			th_probably.innerHTML = "Khả năng xảy ra";
			thead.appendChild(th_name);
			thead.appendChild(th_probably);
			table.appendChild(thead);
			


			var tbody = document.createElement('tbody');
			tbody.setAttribute('id', 'tbody-result');

			for (var i = dict.length - 1; i >= 0; i--) {
				var row = document.createElement("tr");
				tbody.appendChild(row);

				var td_name = document.createElement("td");
				var td_probably = document.createElement("td");
				td_name.innerHTML = dict[i]['name'];
				td_probably.innerHTML = dict[i]['probably'];
				row.appendChild(td_name);
				row.appendChild(td_probably);
			}
			

			table.appendChild(tbody);

			container.appendChild(table);
		}

		function preprocess_result(data) {
			var result = [];
			for (var i = data.length - 1; i >= 0; i--) {
				var tmp = data[i];
				var n = tmp.lastIndexOf(" ");
				var disease = tmp.substring(0, n);
				var prob = tmp.substring(n+1);

				var c = "cao";
				if(prob > 0.8){
					c = "cao";
				} else if(prob > 0.6){
					c = "trung bình";
				} else {
					c = "thấp";
				}

				result.push({
					'name': disease,
					'probably': c
				});
			}
			return result;
		}
	</script>

</div>
@endsection