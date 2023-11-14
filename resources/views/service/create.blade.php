@extends('layouts.app')
@section('content')
<div class="wrapper d-flex align-items-stretch">
  @include('layouts.testSid')
  <div class="container-fluid m-3">
    <div class="row rowBack">
      <div>
        <div class="text text-center">Hover over the arrow</div>
        <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('service.index')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
      </div>
    </div>
      <form class="forms-sample" action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">           
        @csrf
        <div class="row m-4">
          <div class="col col-md-3">
            <div class='col col-md-6'>
              <img src='{{url("images/s2.jpg")}}' class="imgSrvc"/>
            </div>
          </div>
      
          <div class="col col-md-9 colServiceEdit">
            <div class="row rowService ">
              <div class="col col-md-6 ">
                
                  <div class="card-body text-center cardTitreEditService">
                    <h2 class="text-dark "><i>Nouveau service</i></h2>
                  </div>
              
              </div>
          
            <div class="row rowService mb-4">
              <div class="col col-md-6">
                <label>Nom du service</label>
                <input type="text" class="form-control @error('nomService') is-invalid @enderror" placeholder="Service..." name="nomService"/>
                @error('nomService')
                <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
            </div>
        </div>
        <div class="row rowService">
          <div class="col col-md-6 ">
            <button class="btn btn-primary profile-button" type="submit">Enregistrer </button>
            <button type="reset" class="btn btn-secondary">Anuler</button>
          </div>
        </div>
      </div>
      

      

     

      </form>
    </div>
</div>
@endsection