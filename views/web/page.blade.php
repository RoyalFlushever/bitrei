@extends('member.dash')

@section('pageTitle', $data[0]->title)
@section('pageDesc', $data[0]->description)
@section('pageKeys', $data[0]->keywords)

@section('content')

<div style="margin-top:-50px;">
<?= $data[0]->text ?>
</div>
				
@endsection
