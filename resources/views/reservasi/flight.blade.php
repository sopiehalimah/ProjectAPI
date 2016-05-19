@extends('layouts.app_flight')

@section('content')

<div class="">
<h1>Search Flight</h1>
	<div class="row">
		<div class="col s12">
		<div class="row">
			<div class="col s6">
			<select type="text" class="browser-default" name="form" id="form">
			@foreach($airport as $key)
				<option value="{{$key->airport_code}}">
					{{$key->airport_name}} ({{$key->airport_code}})
				</option>
			@endforeach
			</select>
			</div>
			<div class="col s6">
			<select name="to" id="to" class="browser-default">
			@foreach($airport as $key)
				<option value="{{$key->airport_code}}">
					{{$key->airport_name}} ({{$key->airport_code}})
				</option>
			@endforeach
			</select>
			</div>
			
		</div>
		<div class="row">
			<div class="col s2">
				<select name="type" onchange="check_type()" id="type" class="browser-default">
				<option value="OW">Oneway</option>
				<option value="RT">Roundtrip</option>	
				</select>
			</div>
			<div class=" col s2">
				<input type="text" class="for_date" name="depart_date" id="depart_date">
			</div>
			<div class="col s2">
				<input type="text" class="for_date" name="return_date" id="return_date">
			</div>
			<div class="col s1">
				<select name="adult" id="adult" class="browser-default">
				@for($i=0;$i<6;$i++)
				<option value="{{$i}}">{{$i}}</option>
				@endfor
				</select>
			</div>
			<div class="col s1">
				<select name="child" id="child" class="browser-default">
				@for($i=0;$i<6;$i++)
				<option value="{{$i}}">{{$i}}</option>
				@endfor
				</select>
			</div>
			<div class="col s1">
				<select name="infant" id="infant" class="browser-default">
				@for($i=0;$i<6;$i++)
				<option value="{{$i}}">{{$i}}</option>
				@endfor
				</select>
			</div>
			<div class="col s3">
				<span class="btn" onclick="search()"><i class="material-icons right">search</i>Search</span>
				
			</div>

		</div>
			
		</div>
		
	</div>
</div>
<div id="result">
	
</div>
@endsection
@section('footer')
<script type="text/javascript">
	$(".for_date").datepicker();

	function check_type(){
		var tipe = $("#type").val();
		if(tipe=='OW'){
			$("#return_date").prop('disabled',true);
		}else{
			$("#return_date").prop('disabled',false);
		}
	}
	check_type();

	function search(){
		$.ajax({
			url:'{{route("ajax_search_flight")}}',
			type:'POST',
			data:{
					from:$("#form").val(),
					to:$("#to").val(),
					type:$("#type").val(),
					depart_date:$("#depart_date").val(),
					return_date:$("#return_date").val(),
					adult:$("#adult").val(),
					child:$("#child").val(),
					infant:$("#infant").val(),
					_token:'{{csrf_token()}}'
				}, 
				dataType:'json',

				success:function(data){

					var hasil_depart = data.departures;

					var res_depart = hasil_depart.result;

                        var html = '<ul class="collapsible popout" data-collapsible="accordion">';
                        //looping hasil departures
                        for(data in res_depart){
                              //tampilkan dalam bentuk collapsible
                              html += '<li>';
                              html += '<div class="collapsible-header">';
                              html += '<img src="'+res_depart[data].image+'">'
                              html += res_depart[data].airlines_name+ ' ('+res_depart[data].full_via+') with '+res_depart[data].flight_number;
                              html += '<div class="right">'+res_depart[data].markup_price_string+'</div>';
                              html += '</div>';
                              html += '<div class="collapsible-body" style="padding:10px;">';
                              //ambil array object flight info
                              var flights = res_depart[data].flight_infos;
                              var flight_infos = flights.flight_info;
                              //looping isi array flight info
                              for(info in flight_infos){
                                    //masukkan ke dalam body collapsible
                                    html += '<h5>'+flight_infos[info].flight_number+'</h5>';
                                    html += '<div class="right">';
                                    html += flight_infos[info].arrival_city+' at '
                                          +flight_infos[info].simple_arrival_time;
                                    html += '</div>';
                                    html += '<div class="left">';
                                    html += flight_infos[info].departure_city+' at '
                                          +flight_infos[info].simple_departure_time;
                                    html += '</div>';
                                    html += '<br>';
                                    html += '<hr>';
                              }
                              html += '</div>';
                              html += '</li>';
                        }
                        html += '</ul>';
					$("#result").html(html);
					$('.collapsible').collapsible();
				}
		})
	}

</script>
@endsection