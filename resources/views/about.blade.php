@extends('layouts.app')
 
@section('title', 'About Page')
 
@section('navbar')
  @parent
  <p>This is appended to the about master navbar.</p>
@endsection
 
@section('content')
    <p>This is my about body content.</p>
@endsection