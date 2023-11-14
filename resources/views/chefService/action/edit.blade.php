@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidChef')
    <div class="container m-3">
        <div class="row rowBack">      
          <div class="row card p-4">
            <div class="container register">
              
                <div class="row">
                    <div class="col-md-11 register-right">
                      <form class="forms-sample" action="{{route('regeterAction',[$actionsInfo->id,$user->id])}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                          @csrf
                          <div class="row register-form">
                            <div class="form-navigation m-3">
                              <button type="submit" class="btn btn-danger float-right ml-3">
                            
                              Regeter</button>

                              <a href="{{route('updateActions',[$actionsInfo->id,$user->id])}}" class="btn btn-success float-right"><i class="bx bx-check mr-1"></i>Valider</a>
                             
                              
                          </div>
                            <h3 class="text-primary titreValidActiv"><i>L'Action</i></h3>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><h6>Intitulé</h6></label>
                                    <input type="text" class="form-control @error('nomAction') is-invalid @enderror" name="nomAction"  value="{{$actionsInfo->titre}}" disabled/>
                                
                                    </div>
                                    @error('nomAction')
                                    <p class=" text-danger">{{ $message }}</p>
                                      @enderror
                                <div class="form-group">
                                    <label><h6>Date début</h6></label>
                                    <input type="date" class="form-control @error('dateDebutAction') is-invalid @enderror" name="dateDebutAction"  value="{{$date_Deb}}" disabled/>
                                </div>
                                @error('dateDebutAction')
                                <p class=" text-danger">{{ $message }}</p>
                                  @enderror
                                                    <div class="form-group">
                                                        <label><h6>Déscription</h6></label>
                                                        <textarea type="text" class="form-control @error('descriptionAction') is-invalid @enderror" name="descriptionAction"   disabled>{{$actionsInfo->description}}</textarea>
                                                    </div>
                                                
                                                    @error('descriptionAction')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                      @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><h6>Order de priority</h6></label>
                                                        <input type="text" class="form-control @error('order') is-invalid @enderror" name="order"  value="{{$actionsInfo->order_priority}}" disabled/>
                                                    </div>
                                                    @error('order')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                      @enderror
                                                    <div class="form-group">
                                                        <label><h6>Date fin</h6></label>
                                                        <input type="date" class="form-control @error('dateFinAction') is-invalid @enderror" name="dateFinAction"   value="{{$date_fin}}" disabled/>
                                                    </div>
                                                    @error('dateFinAction')
                                                    <p class=" text-danger">{{ $message }}</p>
                                                      @enderror
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