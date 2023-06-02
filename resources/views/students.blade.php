@extends('layouts.app')

@section('content')

@livewire('students', ['id' => $id], key($id))

@stop