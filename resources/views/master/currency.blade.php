@extends('layouts.app')

@section('content')
<H4 style="text-align: center; margin-top: 50px;" >Currency</H4>
<table class="highlight" style="width: 80%; margin: auto; cursor: pointer;">
	<thead>
		<tr>
			<th>Code</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{ $key->code }}</td>
			<td>{{ $key->name }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection