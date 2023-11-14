@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3 ">

      <div class="row rowBack">
        <div class="col col-md-3">
          <div class="text text-center">Hover over the arrow</div>
            <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('information')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
        </div>
       
      </div>

      <div class="row  mb-5">
          <div class="col col-md-12">
                <div class="row blog-slider__img ">   
                  <div class="col col-md-6">      
                        <h3 class="H3 text-dark">Date de création:  <i class="text-dark">{{$activite->created_at}}</i></h3>
                  </div>
           
                </div>
          </div>
      </div>
      

      <div class="row mb-3">
        <div class="col col-md-12 text-center">
          <span class="titreShow">L'activitée</span>
        </div>
      </div>
      <div class="card p-3">
        <div class="row ">
          <div class="col col-md-7">
            <div class="row">
              <div class="col col-md-3">
                <h4 class="text-info">intitulé:</h4>
              </div>
              <div class="col col-md-9">
                <h4>{{$activite->intitulé}}</h4>
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
                        <h4>{{$activite->description}}</h4>
                      </div>
              </div>
            
            </div>
          </div>

            <div class="col col-md-5">
              <div class="row">
                  <div class="col col-md-3">
                    <h4 class="text-info">Type:</h4>
                  </div>
                  <div class="col col-md-9">
                    <h4>{{$activite->type}}</h4>
                  </div>
            
                  <hr>
                  <div class="row">
                    <div class="col col-md-3">
                      <h4 class="text-info">Date fin:</h4>
                    </div>
                    <div class="col col-md-9">
                      <h4>{{$date_fin}}</h4>
                    </div>
                  </div>
                
                  <hr>
                  <div class="row">
                      <div class="col col-md-3">
                        <h4 class="text-info">Etat:</h4>
                      </div>
                      <div class="col col-md-9">
                          @if($activite->etat=='Valider')
                              <h4 class="text-dark"><span class="badge bg-success">{{$activite->etat}}</span></h4>
                              @elseif($activite->etat=='Regeter')
                              <h4 class="text-dark"><span class="badge bg-warning">{{$activite->etat}}</span></h4>
                              @else
                              <h4 class="text-dark"><span class="badge bg-danger">{{$activite->etat}}</span></h4>
                          @endif
                        </div>
                      </div>
                
                  </div>
              </div>    
            </div>


      </div>
        
                <hr>
                @if($countContr>0)
                <div class="row ">
                  <div class="col col-md-12 text-center">
                    <span class="titreContrain">Les contraints</span>
                  </div>
                </div>
                
                <div class="card p-3">
                  @foreach($contraints as $contraint)
                <div class="row ">
                  <div class="col col-md-2">
                    <h4 class="text-info">Sujet:</h4>
                  </div>
                  
                  <div class="col col-md-5">
                    <h4>{{$contraint->sujet}}</h4>
                  </div>
                  <div class="col col-md-2">
                    <h4 class="text-info">Description:</h4>
                  </div>
                  
                  <div class="col col-md-2">
                    <h4>{{$contraint->description}}</h4>
                  </div>
                </div>
                <hr>
                @endforeach
                  
                </div>
                @endif
          </div>  

         
                  
     </div>
    

        
       
      
       

     
              
       
                 
                 
                  
                 
             
   
</div>
@endsection