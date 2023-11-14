@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidFonct')
  <div class="container m-3">
        <div class="row rowTitre">
            <div class="col col-md-6 ">
               
              <h2>Consultation</h2>
            </div>
          </div>
        <div class="row">
            <div class="col col-md-3">
                <a href="{{route('information')}}" class="animated-button1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="mdi mdi-eye \f2fd"></i> 
                    Activités
                  </a>
            </div>

            <div class="col col-md-3">
                <a href="{{route('actionInformations')}}" class="animated-button1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="mdi mdi-eye \f2fd"></i> 
                    <div>Actions</div>
                  </a>
            </div>
            <div class="col col-md-3">
                <a href="#" class="animated-button1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <i class="mdi mdi-eye \f2fd"></i> 
                    Contraints
                  </a>
            </div>
           
            <div class="col col-md-3 ">
                <a href="{{route('proppositionsInformations')}}" class="animated-button1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span ></span>
                    <i class="mdi mdi-eye \f2fd"></i> 
                    Propositions
                  </a>
            </div>
           
                         
        </div>
    </div>
</div>
@endsection