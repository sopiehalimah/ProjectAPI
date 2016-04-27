@extends('layouts.app')

@section('content')
<H4 style="text-align: center; margin-top: 50px;" >Language</H4>
<table class="highlight" style="width: 80%; margin: auto; cursor: pointer;">
	<thead>
		<tr>
			<th>Code</th>
			<th>Name Long</th>
			<th>Name Short</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $key)
		<tr>
			<td>{{ $key->code }}</td>
			<td>{{ $key->name_long }}</td>
			<td>{{ $key->name_short }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection