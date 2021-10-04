@extends('layouts.app')

@section('content')
<h3>Change [{{$change->id}}] {{$change->created_at}}</h3>
<pre>{{ $change->contents }}</pre>
@endsection
