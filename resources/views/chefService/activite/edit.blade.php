@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidChef')
    <div class="container m-3">
        <div class="row rowBack">
  
        <div class="row card p-4">
            <div class="container register">
              
                <div class="row">
                   




                        <form class="forms-sample" action="{{route('regeterA',[$activitesInfo->id,$user->id])}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="form-section "  id="contraints_div">                                                                   
                              
                                <div class="row register-form">
                                    <div class="form-navigation m-3">
                                       <button type="submit" class="btn btn-danger float-right ml-3">
                                      
                                        Regeter</button>

                                        <a href="{{route('updateActiv',[$activitesInfo->id,$user->id])}}" class="btn btn-success  float-right"><i class='bx bx-check mr-1'></i>Valider</a>
                                        
                                    </div>
                                    <h3 class="text-primary titreValidActiv"><i>L'Activitée</i></h3>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><h6>Intitulé</h6></label>
                                            <input type="text" class="form-control @error('nomActivite') is-invalid @enderror" name="nomActivite"  value="{{$activitesInfo->intitulé}}" disabled/>
                                           
                                        </div>
                                        <hr>
                                   
                                        <div class="form-group">
                                            <label><h6>Date début</h6></label>
                                            <input type="date" class="form-control @error('dateDebutActivite') is-invalid @enderror" name="dateDebutActivite" placeholder="Last Name *" value="{{$date_Deb}}" disabled/>
                                         
                                        </div>
                                 
                                          <hr>
                                        <div class="form-group">
                                            <label><h6>Déscription</h6></label>
                                            <textarea type="text" class="form-control @error('descriptionActivite') is-invalid @enderror" name="descriptionActivite"   disabled>{{$activitesInfo->description}}</textarea>
                                          
                                        </div>
                                       
                               
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><h6>Type</h6></label>
                                            <input type="text" class="form-control @error('typeActivite') is-invalid @enderror" name="typeActivite"  value="{{$activitesInfo->type}}" disabled/>
                                         
                                        </div>
                                        <hr>
                                  
                                        <div class="form-group">
                                            <label><h6>Date fin</h6></label>
                                            <input type="date" class="form-control @error('dateFinActivite') is-invalid @enderror" name="dateFinActivite"   value="{{$date_fin}}" disabled/>
                                       
                                        </div>

                                        <hr>
                                 
                                    </div>
                                    <hr>
                                    @if( $countActivite>=1)
                                    <h3 class="text-primary titreValidContr"><i class="text-danger">Ses contraints</i></h3>
                                    @foreach($contraints as $contraint)
                                    
                                    <div class="row">
                                        <input type="number" name="idCont[]" value="{{$contraint->id}}" hidden/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label><h6>Intitulé</h6></label>
                                            <input type="text" class="form-control @error('sujetContV') is-invalid @enderror" name="sujetContV[]"  value="{{$contraint->sujet}}" disabled/>
                                         
                                        </div>   
                                        <hr>
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><h6>Description</h6></label>
                                            <textarea type="text" class="form-control @error('validDescripContraint') is-invalid @enderror" name="validDescripContraint[]"  disabled>{{$contraint->description}}</textarea>
                                        
                                        </div> 
                                        <hr>
                                    
                                    </div>
                                    @endforeach
                                    @endif
                                    
                            </div>
                        </form>
                        
                                   
                        </div>
                       
                    </div>
                </div>
                
            </div>
           
    </div>
</div>
@endsection

