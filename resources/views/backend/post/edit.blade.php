@extends('__layouts.backend')
@section('content')

    @livewire('edit-post',['post_id'=>$id])

@endsection



