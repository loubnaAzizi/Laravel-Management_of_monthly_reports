@extends('./layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch">
  @include('layouts.testSid')
  <div class="container-fluid m-3">
    

      {{-- <div class="row ">
        <div class="col-4 grid-margin ">
            <button type="button" class="btn btn-gradient-info btn-icon-text mt-4" >
              <a class="nav-link" href="{{route('user.index')}}">
                <span class="menu-title"><- Back</span>
              </a>
            </button>
        </div>
      </div> --}}
      <div class="row rowBack">
        <div>
          <div class="text text-center">Hover over the arrow</div>
          <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('user.index')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
        </div>
      </div>
      <div class="row">
        <div class="col col-md-2">
          <div class="col-md-7 ">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">New user</span><span> </span></div>
        </div>
        </div>
        <div class="col col-md-9">
            <div class="row">
              <div class=" col col-md-12">
                  <h2>Informations personnel</h2>
              </div>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin ">
              <div class="">
              <div class="card-body">
                
            <form class="forms-sample" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">           
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"  placeholder="Nom..." name='nom' value="{{ old('nom') }}" >
                      @error('nom')
                      <p class=" text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                  </div>
                 
              </div>
            

                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Prénom</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('prenom') is-invalid @enderror" id="Prenom"  placeholder="prenom..." name='prenom' value="{{ old('prenom') }}" />
                      @error('prenom')
                      <p class=" text-danger">{{ $message }}</p>
                     @enderror
                    </div>
                  </div>
                 
                </div>
             
               
             
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">CIN</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('CIN') is-invalid @enderror" id="CIN"  placeholder="CIN..." name='CIN' value="{{ old('CIN') }}" />
                        @error('CIN')
                        <p class=" text-danger">{{ $message }}</p>
                         @enderror
                      </div>
                    </div>
                   
                  </div>
                  
      
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('emailPrson') is-invalid @enderror" id="emailPrson"  placeholder="Email..." name='emailPrson' value="{{ old('emailPrson') }}"  />
                        @error('emailPrson')
                        <p class=" text-danger">{{ $message }}</p>
                          @enderror
                      </div>
                    </div>
                    
                  </div>
                 
                  
              </div>
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Grade</label>
                      <div class="col-sm-9">
                          <select class="form-select select @error('grade') is-invalid @enderror" id="grade"  name='grade'>
                            <option class="hidden"  selected disabled >Choisie...</option>
                            <option value="supper" {{ "supper" === old('grade') ? 'selected' : '' }}>supper</option>
                          </select>
                          @error('grade')
                          <p class=" text-danger">{{ $message }}</p>
                          @enderror
                      </div>
                  </div>
                     
                  </div>
                    
            
                
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Télephon</label>
                    <div class="col-sm-9">
                      <input type="" class="form-control @error('telephon') is-invalid @enderror" id="telephon"  placeholder="Telephon..." name='telephon' value="{{ old('telephon') }}" />
                      @error('telephon')
                      <p class=" text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                   
                </div>
                </div>
             
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">N° SOM</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control  @error('N_SOM') is-invalid @enderror" id="N_SOM"  placeholder="N_SOM..." name='N_SOM' value="{{ old('N_SOM') }}" />
                        @error('N_SOM')
                        <p class=" text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                   
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Statue</label>
                        <div class="col-sm-9">
                            <select class="form-select select @error('statue') is-invalid @enderror" id="statue"  name='statue' >
                              <option class="hidden"  selected disabled >Choisie...</option>
                              <option value="Chef service" {{ "Chef service" === old('statue') ? 'selected' : '' }}>Chef service</option>
                              <option value="fonctionnaire" {{ "fonctionnaire" === old('statue') ? 'selected' : '' }}>fonctionnaire</option>
                            </select>
                            @error('statue')
                            <p class=" text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                  </div>
              </div>
      
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Service</label>
                      <div class="col-sm-9">
                          <select class="form-select select @error('service') is-invalid @enderror" id="service"   name='service' >
                            <option class="hidden"  selected disabled >Choisie...</option>
                            @foreach($services as $service)
                         
                            <option value="{{$service->id}}" >{{$service->nomService}}</option>
                            @endforeach
                          </select>
                          @error('service')
                          <p class=" text-danger">{{ $message }}</p>
                          @enderror
                      </div>
                  </div>
                     
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row ">
                      <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                          <select class="form-select select @error('role') is-invalid @enderror" id="role"   name='role' >
                              <option class="hidden"  selected disabled >Choisie...</option>
                              <option value="2" {{ "2" === old('role') ? 'selected' : '' }}>Directeur</option>
                              <option value="3" {{ "3" === old('role') ? 'selected' : '' }}>ChefService</option>
                              <option value="4" {{ "4" === old('role') ? 'selected' : '' }}>Fonctionnaire</option>
                          
                          </select>
                          @error('role')
                          <p class=" text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                 
              </div>

              {{-- <div class="row"> --}}
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email d'authentification</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name='email' value="{{ old('email') }}">
                          @error('email')
                          <p class=" text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                   
                </div>
              <div class="col-md-6">
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name='password' >
                  @error('password')
                  <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
              </div>
             
            </div>
              {{-- </div> --}}

             
            
              
           
              
              <div class="row">
                <div class="col-md-6">
        
                  <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save </button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
              </div>
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

{{-- <div class="container ">
  <div class="row">
   
      <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">New user</span><span> </span></div>
      </div>
      <div class="col-md-5 border-right">
          <div class="p-3 py-5">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Informations personel</h4>
              </div>
              <form class="forms-sample" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">           
                @csrf
              <div class="row mt-2">
                  <div class="col-md-6"><label class="labels">Nom</label><input type="text"class="form-control @error('nom') is-invalid @enderror" id="nom"  placeholder="Nom..." name='nom' value="{{ old('nom') }}"><div> @error('nom')
                   <p class="text text-danger">{{ $message }}</p>
                      @enderror</div></div>
                  <div class="col-md-6"><label class="labels">Prenom</label><input type="text" class="form-control  @error('prenom') is-invalid @enderror" id="Prenom"  placeholder="prenom..." name='prenom' value="{{ old('prenom') }}" /><div>@error('prenom')
                   <p class="text text-danger">{{ $message }}</p>
                    @enderror</div></div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6"><label class="labels">CIN</label><input type="text"class="form-control @error('CIN') is-invalid @enderror" id="CIN"  placeholder="CIN..." name='CIN' value="{{ old('CIN') }}" />
                  <div> @error('CIN')
                 <p class="text text-danger">{{ $message }}</p>
                    @enderror</div></div>
                <div class="col-md-6"><label class="labels">Telephon</label><input type="text" class="form-control  @error('telephon') is-invalid @enderror" id="telephon"  placeholder="telephon..." name='telephon' value="{{ old('telephon') }}" />
                  <div>@error('telephon')
                 <p class="text text-danger">{{ $message }}</p>
                  @enderror</div></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6"><label class="labels">N° SOM</label><input type="text"class="form-control @error('N_SOM') is-invalid @enderror" id="N_SOM"  placeholder="N° SOM..." name='N_SOM' value="{{ old('N_SOM') }}">
                <div> @error('N_SOM')
               <p class="text text-danger">{{ $message }}</p>
                  @enderror</div></div>
              <div class="col-md-6"><label class="labels">Grade</label> <select class="form-select select @error('grade') is-invalid @enderror" id="grade"  name='grade' value="{{ old('grade') }}">
                <option class="hidden"  selected disabled >Choisie...</option>
                <option>supper</option>
              </select><div>@error('grade')
               <p class="text text-danger">{{ $message }}</p>
                @enderror</div></div>
            </div>
              <div class="row mt-3">
                  <div class="col-md-12"><label class="labels">Email personel</label><input type="text" class="form-control @error('emailPrson') is-invalid @enderror" id="emailPrson"  placeholder="Email..." name='emailPrson' value="{{ old('emailPrson') }}"  />
                    <div>@error('emailPrson')
                      <p class="text text-danger">{{ $message }}</p>
                      @enderror</div>
              </div>
              <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Service</label>
                  <select class="form-select select @error('service') is-invalid @enderror" id="service"   name='service' value="{{ old('service') }}">
                    <option class="hidden"  selected disabled >Choisie...</option>
                    @foreach($services as $service)        
                    <option value="{{$service->id}}">{{$service->nomService}}</option>
                    @endforeach
                  </select>
                  <div> @error('service')
                    <p class="text text-danger">{{ $message }}</p>
                    @enderror</div>
                  </div>
                <div class="col-md-6"><label class="labels">Role</label> 
                  <select class="form-select select @error('role') is-invalid @enderror" id="role"   name='role' >
                    <option class="hidden"  selected disabled >Choisie...</option>
                    <option value="2">Directeur</option>
                    <option value="3">ChefService</option>
                    <option value="4">Fonctionnaire</option>
              
                  </select>
                  <div>@error('role')
                  <p class="text text-danger">{{ $message }}</p>
                  @enderror</div>
                </div>
              </div>
                  
                  
              </div>

             
          </div>
      </div>
      <div class="col-md-4">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profil</h4>
          </div>
              <div class="col-md-12"><div class="col-md-12"><label class="labels">Email d'authetification</label><input type="text" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="Email..." name='email' value="{{ old('email') }}"  />
                <div>@error('email')
                  <p class="text text-danger">{{ $message }}</p>
                  @enderror</div></div> <br>
                  <div class="col-md-12"><div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  placeholder="Password..." name='password' value="{{ old('password') }}"  />
                    <div>@error('password')
                      <p class="text text-danger">{{ $message }}</p>
                      @enderror</div></div> <br>
          </div>
          
      </div>
      <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save </button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
    </form>
  </div>
</div> --}}

{{-- </div>
</div>
</div> --}}


@endsection