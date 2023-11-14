@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3">
        <div class="row rowBack">      
          <div class="row card p-4">
            <div class="container register">
              
                <div class="row">
                    <div class="col-md-11 register-right">
                      <form class="forms-sample" action="{{route('updateAction',$action->id)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                          @csrf
                          <div class="row register-form">
                            <div class="form-navigation m-3">
                             

                              
                              
                          </div>
                            <h3 class="text-primary titreValidActiv"><i>L'Action</i></h3>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><h6>Intitulé</h6></label>
                                    <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre"  value="{{$action->titre}}" />
                                
                                    </div>
                                    @error('titre')
                                    <p class=" text-danger">{{ $message }}</p>
                                      @enderror
                                <div class="form-group">
                                    <label><h6>Date début</h6></label>
                                    <input type="date" class="form-control @error('dateDebutAction') is-invalid @enderror" name="dateDebutAction"  value="{{$date_Deb}}" />
                                </div>
                                @error('dateDebutAction')
                                <p class=" text-danger">{{ $message }}</p>
                                  @enderror
                                                    <div class="form-group">
                                                        <label><h6>Déscription</h6></label>
                                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"   >{{$action->description}}</textarea>
                                                    </div>
                                                
                                                    @error('description')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><h6>Order de priority</h6></label>
                                                        <input type="text" class="form-control @error('priorite_ord') is-invalid @enderror" name="priorite_ord"  value="{{$action->order_priority}}" />
                                                    </div>
                                                    @error('priorite_ord')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                      @enderror
                                                    <div class="form-group">
                                                        <label><h6>Date fin</h6></label>
                                                        <input type="date" class="form-control @error('dateFinAction') is-invalid @enderror" name="dateFinAction"   value="{{$date_fin}}" />
                                                    </div>
                                                    @error('dateFinAction')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                              
                                                <div class="form-navigation m-3">
                                                    <button type="submit" class="btn btn-success float-right ml-3">
                                                   
                                                     Modifier</button>
                    
                                                 </div>
                                          
                                            </div>
                                        </div>
                                        
                                    </div>
                              
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
@endsection

@section('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@endsection