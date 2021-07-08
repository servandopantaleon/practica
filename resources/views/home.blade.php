@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-primary">
      <div class="card-header" style="background-color: orange;">
        {{ __('Inicio') }}
      </div>
      <div class="card-body">
        @if (session('addMessage'))
            <div class="alert alert-success" role="alert">
                {{ session('addMessage') }}
            </div>
        @endif
        <h4>Bienvenido {{\Auth::user()->name}}</h4>
        
      </div>
    </div>
</div>
@endsection
