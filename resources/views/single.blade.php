@extends('layouts.app')

@section('content')
    <single-pokemon-component :pokemon-id="{{ $pokemonId }}"></single-pokemon-component>
@stop
