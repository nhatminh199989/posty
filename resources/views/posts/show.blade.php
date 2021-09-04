@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-6 w-8/12 bg-white rounded-lg">
            <x-post :post="$post"/>
        </div>
    </div>  
@endsection