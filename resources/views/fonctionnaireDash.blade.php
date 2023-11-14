@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidFonct')

  <div class="container m-3 ">
    <div class="row ">
      <div class="col-md-3 ">
        <div class="stati bg-turquoise ">
          <i class="icon-crop icons"></i>
          <div>
            <b>{{$activites}}</b>
            <span>Activites</span>
          </div>
        </div>
      </div>
     

       

          <div class="col-md-3">
            <div class="stati bg-peter_river ">
            <i class="icon-crop icons"></i>
           
            <div>
            <b>{{$actions}}</b>
            <span>Actions</span>
            </div>
            </div>
            </div>

            <div class="col-md-3">
              <div class="stati bg-amethyst ">
              <i class="icon-crop icons"></i>
              <div>
              <b>{{$propositions}}</b>
              <span>Propositions</span>
              </div>
              </div>
              </div>

            <div class="col-md-3">
              <div class="stati bg-alizarin ">
              <i class="icon-crop icons"></i>
              <div>
              <b>{{$contraints}}</b>
              <span>Contraints</span>
              </div>
              </div>
              </div>

    </div>

    <div class="container m-3 card">
          <div class="row titrRap mb-4">
            <div class="col col-md-6 titrRap">
              <h1>REMPLIR RAPPORT</h1>            
            </div>
          </div>

          <div class="row  rowRap">
            {{-- <div class="card">
              <div class="card-body"> --}}
            <div class="col-md-2 colRap m-3 text-center">
              <div class=" divA"> 
                <i class="mdi mdi-pen mdi-24px "></i> 
                
                  <a href="{{route('remplirActivite')}}" class=" aDashboard">  
                    Activitées
                  </a>         
              </div>
            </div>
      
                <div class="col-md-3 colRap m-3 text-center">
                  <div class=" divA">     
                    <i class="mdi mdi-pen mdi-24px "></i>
                    <a href="{{route('remplirContraint')}}" class="aDashboard">
                      Contraints & Difficultées </a>   
                  </div>
                </div>
      
                  <div class="col-md-2 colRap m-3 text-center">
                    <div class=" divA">
                      <i class="mdi mdi-pen mdi-24px "></i>             
                      <a href="{{route('remplirAction')}}" class="aDashboard">Actions</a>             
                    </div>
                  </div>
      
                  
                  <div class="col-md-2 colRap m-3 text-center">
               
                    <div class=" divA">
                      <i class="mdi mdi-pen mdi-24px "></i>             
                      <a href="{{route('remplirProposition')}}" class="aDashboard">Propositions</a>             
                    </div>
                
                </div>  
      
          </div>
 
    </div>
</div>   
   

</div>


     

      


@endsection



@section('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

@endsection