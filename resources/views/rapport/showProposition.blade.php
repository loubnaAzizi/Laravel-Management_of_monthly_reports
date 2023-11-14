@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3 ">
        <div class="row rowBack">
            <div class="col col-md-3">
              <div class="text text-center">Hover over the arrow</div>
              <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('proppositionsInformations')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
            </div>
           
          </div>
          <div class="row  mb-5">
            <div class="col col-md-12">
                  <div class="row blog-slider__img ">   
                    <div class="col col-md-6">      
                          <h3 class="H3 text-dark">Date de création:  <i class="text-dark">{{$proposition->created_at}}</i></h3>
                  </div>
             
                  </div>
            </div>
        </div>

        <div class="row ">
            <div class="col col-md-7">
              <div class="row">
                <div class="col col-md-3">
                <h4 class="text-info">Titre:</h4>
              </div>
              <div class="col col-md-9">
                <h4>{{$proposition->titre}}</h4>
              </div>
              </div>
             
                <hr>
                <div class="row">
                  <div class="col col-md-3">
                    <h4 class="text-info">Déscription:</h4>
                  </div>
                  <div class="col col-md-9">
                    <h4>{{$proposition->description}}</h4>
                  </div>
                </div>
                
             
              
            </div>
        
            <div class="col col-md-5">
              <div class="row">
                <div class="col col-md-5">
                  <h4 class="text-info">Etat:</h4>
                </div>
                <div class="col col-md-7">
                    @if($proposition->etat=='Valider')
                    <h4 class="text-dark"><span class="badge bg-success">{{$proposition->etat}}</span></h4>
                    @else
                    <h4 class="text-dark"><span class="badge bg-danger">{{$proposition->etat}}</span></h4>
                    @endif
                </div>
              
              </div>
              <hr>
            </div>
          
            </div>        
  

    
    </div>
</div>
@endsection