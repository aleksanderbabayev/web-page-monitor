@extends('layouts.app')
@section('content')
<h3><b>Monitored web page address:</b> <a target="_blank" href="http://{{env('MONITORED_SITE_ADDRESS')}}/{{env('MONITORED_PAGE_ADDRESS')}}">{{env('MONITORED_SITE_ADDRESS')}}/{{env('MONITORED_PAGE_ADDRESS')}}</a></h3>
<table>
    <thead><tr>
        <th>id</th>
        <th>date/time</th>
        <th>contents</th>
        <th>inserted</th>
        <th>deleted</th>
        <th>unmodified</th>
        <th>changed ratio</th>
        <th>diff</th>
    </tr></thead>
    <tbody>
        @for ($i = 0; $i < count($changes); ++$i)
        <tr>
            <td>{{$changes[$i]->id}}</td>
            <td>{{$changes[$i]->created_at}}</td>
            <td class="link"><a href="{{route('show',['change'=>$changes[$i]->id])}}">show</a></td>
            <td class="number">@if ($changes[$i]['diff']) {{$changes[$i]->inserted}} @endif</td>
            <td class="number">@if ($changes[$i]['diff']) {{$changes[$i]->deleted}} @endif</td>
            <td class="number">@if ($changes[$i]['diff']) {{$changes[$i]->unmodified}} @endif</td>
            <td class="number">@if ($changes[$i]['diff']) {{$changes[$i]->changed_ratio}}% @endif</td>
            <td class="link">@if ($changes[$i]['diff']) <a href="{{route('diff',['old'=>$changes[$i+1]->id,'new'=>$changes[$i]->id])}}">diff</a> @endif</td>
        </tr>
        @endfor
    </tbody>
</table>
@endsection
