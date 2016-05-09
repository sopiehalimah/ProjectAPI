@extends('layouts.app')

@section('content')
<H4 style="text-align: center; margin-top: 50px;" >Airport</H4>
<table class="highlight" style="width: 80%; margin: auto; cursor: pointer;">
	<thead>
		<tr>
			<th>Airport Name (Code)</th>
			<th>Location Name </th>
			<th>Country ID </th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{ $key->airport_name }} ({{ $key->airport_code }})</td>
			<td>{{ $key->location_name }}</td>
			<td>{{ $key->country_id }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection