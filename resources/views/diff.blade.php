@extends('layouts.app')

@section('style')
<style>{!! \Jfcherng\Diff\DiffHelper::getStyleSheet() !!}</style>
@endsection

@section('content')
<h3>Diff: {{$old->created_at}} & {{$new->created_at}}</h3>
<p>
    <span><b>Inserted:</b> {{ round($new->inserted) }},</span>
    <span><b>Deleted:</b> {{ round($new->deleted) }},</span>
    <span><b>Unmodified:</b> {{ round($new->unmodified) }},</span>
    <span><b>Changed Ratio:</b> {{ $new->changed_ratio }}%,</span>
</p>
{!! $diff !!}
@endsection
