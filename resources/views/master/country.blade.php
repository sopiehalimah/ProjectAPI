@extends('layouts.app')

@section('content')
<H4 style="text-align: center; margin-top: 50px;" >Country</H4>
<table class="highlight" style="width: 80%; margin: auto; cursor: pointer;">
	<thead>
		<tr>
			<th>Country ID</th>
			<th>Country Name</th>
			<th>Country Area Code</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{ $key->country_id }}</td>
			<td>{{ $key->country_name }}</td>
			<td>{{ $key->country_areacode }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection