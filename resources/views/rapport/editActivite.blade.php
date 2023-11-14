@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3">
    
        <div class="row card p-4">
            <div class="container register">
              
                <div class="row">
                   




                        <form class="forms-sample" action="{{route('edit.activite',$activitesInfo->id)}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="form-section "  id="contraints_div">                                                                   
                              
                                <div class="row register-form">
                                 
                                    <h3 class="text-primary titreValidActiv"><i>L'Activitée</i></h3>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><h6>Intitulé</h6></label>
                                            <input type="text" class="form-control @error('nomActivite') is-invalid @enderror" name="nomActivite"  value="{{$activitesInfo->intitulé}}" />
                                          
                                        </div>
                                        
                                        @error('nomActivite')
                                        <p class=" text-danger">{{ $message }}</p>
                                          @enderror
                                        <div class="form-group">
                                            <label><h6>Date début</h6></label>
                                            <input type="date" class="form-control @error('dateDebutActivite') is-invalid @enderror" name="dateDebutActivite" placeholder="Last Name *" value="{{$date_Deb}}"/>
                                          
                                        </div>
                                        @error('dateDebutActivite')
                                        <p class=" text-danger">{{ $message }}</p>
                                          @enderror
                                          
                                        <div class="form-group">
                                            <label><h6>Déscription</h6></label>
                                            <textarea type="text" class="form-control @error('descriptionActivite') is-invalid @enderror" name="descriptionActivite"   >{{$activitesInfo->description}}</textarea>
                                          
                                        </div>
                                       
                                        @error('descriptionActivite')
                                        <p class=" text-danger">{{ $message }}</p>
                                          @enderror
                                      
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><h6>Type</h6></label>
                                            <input type="text" class="form-control @error('typeActivite') is-invalid @enderror" name="typeActivite"  value="{{$activitesInfo->type}}" />
                                          
                                        </div>
                                        
                                        @error('typeActivite')
                                        <p class=" text-danger">{{ $message }}</p>
                                          @enderror
                                        <div class="form-group">
                                            <label><h6>Date fin</h6></label>
                                            <input type="date" class="form-control @error('dateFinActivite') is-invalid @enderror" name="dateFinActivite"   value="{{$date_fin}}" />
                                        
                                        </div>

                                        
                                        @error('dateFinActivite')
                                        <p class=" text-danger">{{ $message }}</p>
                                          @enderror
                                    </div>
                                    
                                    @if( $countActivite>=1)
                                    <h3 class="text-primary titreValidContr"><i class="text-danger">Ses contraints</i></h3>
                                    @foreach($contraints as $contraint)
                                    
                                    <div class="row">
                                        <input type="number" name="idCont[]" value="{{$contraint->id}}" hidden/>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <label><h6>Intitulé</h6></label>
                                            <input type="text" class="form-control @error('sujetContV') is-invalid @enderror" name="sujetContV[]"  value="{{$contraint->sujet}}" />
                                         
                                        </div>   
                                        
                                        @error('sujetContV[]')
                                        <p class=" text-danger">{{ $message }}</p>
                                          @enderror                          
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><h6>Description</h6></label>
                                            <textarea type="text" class="form-control @error('validDescripContraint') is-invalid @enderror" name="validDescripContraint[]"  >{{$contraint->description}}</textarea>
                                          
                                        </div> 
                                       
                                        @error('validDescripContraint[]')
                                      
                                          @enderror                             
                                    </div>
                                    @endforeach
                                    @endif
                                    
                            </div>
                            <div class="form-navigation m-3">
                                <button type="submit" class="btn btn-success float-right ml-3">
                               
                                 Modifier</button>

                             </div>
                        </form>
                        
                                   
                        </div>
                       
                    </div>
                </div>
                
            </div>
           
    </div>
</div>
@endsection

