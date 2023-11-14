@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidChef')
  <div class="container m-3">

        <div class="buttonStyl ">
            <div class="btn" ><a href="#" >ACTIVITES </a></div>
            <button  id="btn-Activite" class="btn"><a href="#">CONTRAINTS</a></button> 
            <div class="btn"><a href="#">ACTIONS</a></div>
            <div class="btn"><a href="#">PROPOSITIONS</a></div> 
                       
          </div>

    </div>
</div>
@endsection
