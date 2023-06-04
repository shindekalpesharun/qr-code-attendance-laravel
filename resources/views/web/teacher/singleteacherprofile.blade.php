@extends('layouts.app')

@section('content')

@livewire('teacher.singleteacherprofile',['id' => $id], key($id))

@stop