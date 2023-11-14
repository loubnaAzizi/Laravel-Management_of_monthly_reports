@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidebarAdmin')
    <div class="container">


@if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif 
        <div class="container">

         

        <div class="row">
            <div class=" col col-md-12">
                <h2>Informations fonctionnaire</h2>
            </div>
        </div>
        <div class="row ">
          <div class="col-12 grid-margin ">
      <div class="">
      <div class="card-body">
        <form class="forms-sample" action="{{route('fonctionnaire.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <p class="card-description">
            Personal info
          </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nom</label>
              <div class="col-sm-9">
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"  placeholder="nom..." name='nom' value="{{ old('nom') }}" />
              </div>
            </div>
            @error('nom')
          <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Prénom</label>
              <div class="col-sm-9">
                <input type="text" class="form-control  @error('prenom') is-invalid @enderror" id="Prenom"  placeholder="prenom..." name='prenom' value="{{ old('prenom') }}" />
              </div>
            </div>
            @error('prenom')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
         
        <div class="row">
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">CIN</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('CIN') is-invalid @enderror" id="CIN"  placeholder="CIN..." name='CIN' value="{{ old('CIN') }}" />
                </div>
              </div>
              @error('CIN')
            <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            

            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="Email..." name='email' value="{{ old('email') }}"  />
                </div>
              </div>
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           
            
        </div>
        <div class="row">
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Grade</label>
                <div class="col-sm-9">
                    <select class="form-control @error('grade') is-invalid @enderror" id="grade"  name='grade' value="{{ old('grade') }}">
                      <option></option>
                      <option>supper</option>
                    </select>
                </div>
            </div>
                @error('grade')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
              
      
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Télephon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control @error('telephon') is-invalid @enderror" id="telephon"  placeholder="Telephon..." name='telephon' value="{{ old('telephon') }}" />
              </div>
            </div>
              @error('telephon')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          </div>
       
        <div class="row">
          <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">N° SOM</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control  @error('N_SOM') is-invalid @enderror" id="N_SOM"  placeholder="N_SOM..." name='N_SOM' value="{{ old('N_SOM') }}" />
                </div>
              </div>
              @error('N_SOM')
            <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Statue</label>
                  <div class="col-sm-9">
                      <select class="form-control @error('statue') is-invalid @enderror" id="statue"  name='statue'>
                        <option >Chef service</option>
                        <option >fonctionnaire</option>
                      </select>
                  </div>
              </div>
              @error('statue')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Service</label>
                <div class="col-sm-9">
                    <select class="form-control select @error('service') is-invalid @enderror" id="service"   name='service' value="{{ old('service') }}">
                      <option></option>
                      @foreach($services as $service)
                      <option value="{{$service->id}}">{{$service->nomService}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
                @error('service')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-icon-text">
              <i class="mdi mdi-file-check btn-icon-prepend"></i>
              Enregistrer
              
            </button>
      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      
      </div>
      </form>
    </div>
      </div>
            </div>
        </div>
        </div>
@endsection