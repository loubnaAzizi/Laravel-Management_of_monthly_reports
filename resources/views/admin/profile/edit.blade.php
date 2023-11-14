@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.testSid')
  <div class="container m-3">
   
    <div class="card">
        <div class="card-body">
                        <form method="POST" action="{{route('admin.profil.update')}}">
                            @csrf        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row">
                                        <div class="col col-md-6"><h2>Modifier l'Email</h2></div>           
                                    </div>
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" id="SujetC"  class="form-control @error('email') is-invalid @enderror"   value="{{$admin->email}}"/>
                                            </div>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                                            
                                        </div>
                                                                       
                                    </div>
                                </div>

                                <div class="form-navigation ">
                                    <button type="submit" class="btn btn-success float-right ">Modifier</button>    
                                </div> 
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.password.update')}}">
                            @csrf        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row">
                                        <div class="col col-md-6"><h2>Modifier Password</h2></div>           
                                    </div>
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current password</label>
                                                <input type="password" name="oldPassword"   class="form-control @error('oldPassword') is-invalid @enderror" />
                                            </div>
                                            @error('oldPassword')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror 
                                              
                                              <div class="form-group">
                                                <label>New password</label>
                                                <input type="password" name="password"   class="form-control @error('password') is-invalid @enderror" />
                                            </div>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Confirm password</label>
                                                <input type="password" name="password_confirmation"   class="form-control @error('password_confirmation') is-invalid @enderror" />
                                            </div>
                                            @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                     
                               

                                <div >
                                    <button type="submit" class="btn btn-success float-right form-navigation">Modifier</button>    
                                </div> 
                        </form>
                    </div>
                </div>
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
