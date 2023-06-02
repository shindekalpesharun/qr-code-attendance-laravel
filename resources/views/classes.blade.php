@extends('layouts.app')

@section('content')

{{-- {{dd($id)}} --}}


{{--
<livewire:classes :id="$id" /> --}}
{{--
<livewire:classes :id='$id' /> --}}
@livewire('classes', ['id' => $id], key($id))

@stop