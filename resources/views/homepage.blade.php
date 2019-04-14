@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid" id="jumbotron_index">
        <div class="container">
          <div class="text-center">
              <h1 id="x">Bootstrap Tutorial</h1>
              <p id="x">Bootstrap is the most popular HTML, CSS...</p>
          </div>
        </div>
            <router-view></router-view>
    
    </div>
</div>
@endsection
