@extends('layouts.app')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidChef')
    {{-- <div class="container">
        <div class="row">
          <form class="forms-sample" action="{{route('proposition.update',$proposition->id)}}" method="POST" enctype="multipart/form-data">
            @method('put')
              @csrf
            <div class="container register">
                <div class="row">
                
                    <div class="col-md-1 register-left">          
                    </div>
                    <div class="col-md-11 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Informations d'activité</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" class="form-control" name="nomProposition"  value="{{$proposition->titre}}" />
                                        </div>
                                        
                                       
                                       
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Déscription</label>
                                            <textarea type="text" class="form-control" name="descriptionProposition"   >{{$proposition->description}}</textarea>
                                        </div>
                                     
                                    </div>
                                  

                                    <input type="submit" class="btnRegister"  value="Valider"/>
                                </div>
                            </div>
                            
                        </div>
                   
                    </div>
                </div>
              </form>
            </div>
    </div> --}}



    <div class="container m-3">
        <div class="row rowBack">      
          <div class="row card p-4">
            <div class="container register">
              
                <div class="row">
                    <div class="col-md-12">
                      <form class="forms-sample" action="{{route('regeterProp',[$proposition->id,$user->id])}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                          @csrf
                        <div class="row register-form">
                            <div class="form-navigation m-3">
                              <button type="submit" class="btn btn-danger float-right ml-3">
                            
                              Regeter</button>

                              <a href="{{route('validerProp',[$proposition->id,$user->id])}}" class="btn btn-success  float-right"><i class='bx bx-check mr-1'></i>Valider</a>
                              
                            </div>
                            <h3 class="text-primary titreValidActiv"><i>La proposition</i></h3>  
                                <div class="col-md-5">
                                <label>Titre</label>
                                <input type="text" name="titreP" class="form-control" value="{{$proposition->titre}}" disabled/>               
                                </div>

                                <div class="col-md-6">
                                    <label>Déscription</label>
                                    <textarea type="text" name="titreP" class="form-control"  disabled>{{$proposition->description}}</textarea>               
                                    </div>
                        </div>
                    </form>           
                    </div>    
                </div>
                </div>    
            
</div>
@endsection