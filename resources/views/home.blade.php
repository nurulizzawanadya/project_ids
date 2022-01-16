@extends('layout/main_layout')
@section('title', 'IDS PROJECT')

@section('css_custom')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Default Layout</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Informasi Login</h2>
        <p class="section-lead">Informasi Login User</p>
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                        {{ Auth::user()->provider_id }} 
                    <br>
                        {{ Auth::user()->name }} 
                    <br>
                        <img src="{{ Auth::user()->avatar }}"alt="{{ Auth::user()->name }}">
                    <br>
                        {{ Auth::user()->email }} 
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection