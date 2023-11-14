@extends('./layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidebarAdmin')
    <div class="container">

  <div class="row rowForm  bg-secondary ">
    <div class="col col-md-12 grid-margin stretch-card mt-4 ">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Changement de nom et email</h4>
            
            <form class="forms-sample" action="{{route('updatetProfil',$user->id)}}" method="POST" enctype="multipart/form-data">
              @method('put')
                @csrf

              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"  placeholder="name" name='nom' value="{{ $user->nom }}" >
                </div>
              </div>
               @error('nom')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name='email' value="{{ $user->email }}">
                </div>
              </div>
              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              <div class="form-group row ">
                <label for="role" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Role d'utilisateur.." name='role' value="{{ $user->role }}">
                </div>
              </div>
              @error('role')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              

              
              
        
              <button type="submit" class="btn btn-gradient-primary mr-2">Modifier</button>
              <button type="reset" class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row rowForm  bg-secondary ">
    <div class="col col-md-12 grid-margin stretch-card mt-4 ">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" action="{{route('updatePassword')}}" method="POST" enctype="multipart/form-data">
           
            @csrf
            <h4 class="card-title">Changement du mot de pass</h4>
            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label">Old Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" placeholder="old Password ..." name='oldPassword' >
              </div>
            </div>
            @error('oldPassword')
            <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Neuveau password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Neuveau password ..." name='password' >
                </div>
              </div>
              @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row">
                  <label for="password" class="col-sm-3 col-form-label">Confirm password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control @error('confPass') is-invalid @enderror" id="confPass" placeholder="Confirm password ..." name='confPass' >
                  </div>
                </div>
                @error('confPass')
                <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <button type="submit" class="btn btn-gradient-primary mr-2">Modifier</button>
                  <button type="reset" class="btn btn-light">Cancel</button>

        </div>
      </div>
    </div>
    </div>
  </div>

    
    
</div>
</div>


@endsection