@extends('layouts.app')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidDirecteur')
  <div class="container m-3">

   
    <div class="container bootstrap snippets bootdey">
    <div class="row">
      <div class="profile-nav col-md-3 ">
          <div class="panel ">
              <div class="user-heading round">
                  <a href="#">
                      <img src="{{url('/images/imgF.png')}}" alt="">
                  </a>
                  <h1>{{$user->nom}}</h1>
                 
              </div>
            
          </div>
         
      </div>
     
      <div class="profile-info col-md-9">
       
          <div class="panel">
              <div class="bio-graph-heading mb-3">
                <h1>Bio Graph</h1>
              </div>
              <div class="panel-body bio-graph-info">
                 
                  <div class="row">
                    <div class="col col-md-3">
                      <div class="bio-row">
                          <p><span class="text-primary">Nom </span> {{$user->nom}}</p>
                      </div>
                    </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                          <p><span class="text-primary">Prenom </span> {{$user->prenom}}</p>
                      </div>
                    </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                          <p><span class="text-primary">CIN </span> {{$user->CIN}}</p>
                      </div>
                    </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                          <p><span class="text-primary">Statue</span> {{$user->statue}}</p>
                      </div>
                     
                    </div>
                    <div class="col col-md-3">
    
                      <div class="bio-row">
                          <p><span class="text-primary">N° SOM </span> {{$user->N_SOM}}</p>
                      </div>
                    </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                          <p><span class="text-primary">Telephon </span> {{$user->telephon}}</p>
                      </div>
                    </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                          <p><span class="text-primary">Service </span> {{$service->nomService}}</p>
                      </div>
                      </div>
    
                      <div class="col col-md-3">
                        <div class="bio-row">
                          <p><span class="text-primary">Grade </span> {{$user->grade}}</p>
                      </div>
                      </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                        <p><span class="text-primary">Email personnel </span> {{$user->emailPrson}}</p>
                    </div>
                    </div>
                    <div class="col col-md-3">
                      <div class="bio-row">
                        <p><span class="text-primary">Email compt </span> {{$user->email}}</p>
                      </div>
                    </div>
              
               
                </div>
                  </div>
              </div>
          </div>
          <div>
     
          </div>
      </div>
  </div>
</div>