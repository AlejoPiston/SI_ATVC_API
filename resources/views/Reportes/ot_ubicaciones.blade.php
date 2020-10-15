@extends('layouts.panel')

@section('titulo', 'Panel')

@section('nav-link Inicio', 'nav-link')
@section('nav-link OT', 'nav-link')
@section('nav-link IN', 'nav-link')
@section('nav-link Administradores', 'nav-link')
@section('nav-link Tecnicos', 'nav-link')
@section('nav-link Clientes', 'nav-link')
@section('nav-link MOT', 'nav-link')
@section('nav-link MD', 'nav-link')
@section('nav-link FOT', 'nav-link')
@section('nav-link Ubi', 'nav-link active')
@section('nav-link TMA', 'nav-link')
@section('header')
<div class="container-fluid">
  <div class="header-body">
<div class="row align-items-center py-4">
  <div class="col-lg-8">
    <h6 class="h2 text-white d-inline-block mb-0">{{ Auth::user()->Tipo }}</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Reportes</li>
        <li class="breadcrumb-item"><a href="{{ url('/reportes/ot/ubicaciones') }}">Ubicación de técnicos</a></li>
      </ol>
    </nav>
  </div>  
</div>
</div>
</div>
@endsection

@section('styles')
<style>
  div#map {
  height: 450px!important;
  width: 100%!important;
}
</style>
@endsection

@section('contenido')

<div class="card">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Reporte: Ubicación de técnicos</h3>
        </div>
        
      </div>
    </div>
    <div class="card-body">
      <div class="card border-0">
        <div id="map"></div>

      </div>
      
    </div>
    
    
  </div>     
@endsection

@section('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="{{ asset('js/goglemap.js') }}" defer></script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{config('googlemap')['map_apikey']}}&callback=initMap" async defer></script>
<!-- Optional JS -->
@endsection