@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3 ">
        <div class="row rowBack">
            <div class="col col-md-3">
              <div class="text text-center">Hover over the arrow</div>
              <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('actionInformations')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
            </div>
           
          </div>

          <div class="row  mb-5">
            <div class="col col-md-12">
                  <div class="row blog-slider__img ">   
                    <div class="col col-md-6">      
                          <h3 class="H3 text-dark">Date de création:  <i class="text-dark">{{$action->created_at}}</i></h3>
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
                <h4>{{$action->titre}}</h4>
              </div>
             
                <hr>
                <div class="row">
                  <div class="col col-md-3">
                    <h4 class="text-info">Date debut:</h4>
                  </div>
                  <div class="col col-md-9">
                    <h4>{{$date_Deb}}</h4>
                  </div>
                </div>
                
                <hr>
                <div class="row">
                      <div class="col col-md-3">
                      <h4 class="text-info">Déscription:</h4>
                      </div>
                      <div class="col col-md-9">
                        <h4>{{$action->description}}</h4>
                      </div>
                  </div>
               
                </div>
            </div>

            <div class="col col-md-5">
              <div class="row">
                <div class="col col-md-5">
                  <h4 class="text-info">Order de priorité:</h4>
              </div>
              <div class="col col-md-7">
                <h4>{{$action->order_priority}}</h4>
              </div>
             
                <hr>
                <div class="row">
                  <div class="col col-md-5">
                    <h4 class="text-info">Date fin:</h4>
                  </div>
                  <div class="col col-md-7">
                    <h4>{{$date_fin}}</h4>
                  </div>
                </div>
                
                <hr>
                <div class="row">
                  <div class="col col-md-5">
                  <h4 class="text-info">Etat:</h4>
                  </div>
                  <div class="col col-md-7">
                    @if($action->etat=='Valider')
                    <h4 class="text-dark"><span class="badge bg-success">{{$action->etat}}</span></h4>
                    @else
                    <h4 class="text-dark"><span class="badge bg-danger">{{$action->etat}}</span></h4>
                    @endif
                    </div>
                  </div>
               
                </div>
            </div>
           
                
              
               
            </div>
          </div>

           
                

      
                         
        </div>






    </div>
</div>
@endsection