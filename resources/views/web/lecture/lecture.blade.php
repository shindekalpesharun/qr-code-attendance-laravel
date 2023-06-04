@extends('layouts.app')

@section('content')

@livewire('lectures.lectures',['id' => $id], key($id))

@stop