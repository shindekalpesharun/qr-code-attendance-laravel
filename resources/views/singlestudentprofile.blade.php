@extends('layouts.app')

@section('content')

@livewire('singlestudentprofile', ['id' => $id], key($id))

@stop