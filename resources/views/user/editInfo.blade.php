@extends('layouts.app')



@section('content')
<div class="wrapper d-flex align-items-stretch">
  @include('layouts.testSid')
  <div class="container m-3">

@if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form class="forms-sample" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
          @method('put')
          @csrf
<div class="row  p-4">
<div class="col-12 grid-margin ">
    <div class="card">
      <div class="card-body">
        
          <h2 class="card-description">
            Modifier les informations personnel
          </h2>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('nom') is-invalid @enderror" id="Nom"  placeholder="nom..." name='nom' value="{{ $user->nom }}" />
                </div>
              </div>
              @error('CIN')
            <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Prénom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control  @error('prenom') is-invalid @enderror" id="Prenom"  placeholder="prenom..." name='prenom' value="{{ $user->prenom }}" />
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
                    <input type="text" class="form-control @error('CIN') is-invalid @enderror" id="CIN"  placeholder="CIN..." name='CIN' value="{{ $user->CIN }}" />
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
                    <input type="text" class="form-control @error('emailPrson') is-invalid @enderror" id="emailPrson"  placeholder="Email..." name='emailPrson' value="{{ $user->emailPrson }}"  />
                  </div>
                </div>
                @error('emailPrson')
                <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
             
              
          </div>
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Grade</label>
                  <div class="col-sm-9">
                      <select class="form-select select @error('grade') is-invalid @enderror" id="grade"   name='grade' >
                        
                        
                        <option value="{{$user->grade}}" {{$user->grade? 'selected':''}}>
                          {{$user->grade}}
                          </option>
                          <option>fonctionnaire</option>
                       
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
                  <input type="text" class="form-control @error('telephon') is-invalid @enderror" id="telephon"  placeholder="Telephon..." name='telephon' value="{{ $user->telephon }}" />
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
                    <input type="text" class="form-control  @error('N_SOM') is-invalid @enderror" id="N_SOM"  placeholder="N_SOM..." name='N_SOM' value="{{ $user->N_SOM }}" />
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
                    <select class="form-select select @error('statue') is-invalid @enderror" id="statue"  name='statue'>
                      <option value="{{$user->statue}}" {{$user->statue? 'selected':''}}>{{$user->statue}}</option>
                      <option value="fonctionnaire">fonctionnaire</option>
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
                        <select class="form-select select @error('service') is-invalid @enderror" id="service"   name='service' >
                          
                          @foreach($services as $item)
                          <option value="{{$item->id}}" {{$user->services_id==$item->id? 'selected':''}}>
                            {{$item->nomService}}
                            </option>
                          @endforeach
                        </select>
                    </div>
                </div>
                    @error('service')
                  <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">Email compte</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name='email' value="{{ $user->email }}">
                  </div>
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row ">
                <label for="role" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Role d'utilisateur.." name='role' value="{{ $user->role }}">
                </div>
              </div>
              @error('role')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>

          

          <div class="row">
            <div class="col-md-4">
              <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save </button>
            </div>
          </div>
          
      
      </div>
    </div>
  </div>
        </div>
  
       
      </form>
    </div>
</div>
@endsection