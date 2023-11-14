@extends('layouts.app')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3">
       
        
              <div class="row card p-4  mt-4">
                <div class="container register">
                  
                    <div class="row">
                          <form class="forms-sample" action="{{route('proposition.update',$propositionInfo->id)}}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre"  value="{{$propositionInfo->titre}}" />
                                        </div>                                                         
                                    </div>
                                    @error('titre')
                                    <p class=" text-danger">{{ $message }}</p>
                                      @enderror
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Déscription</label>
                                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"   >{{$propositionInfo->description}}</textarea>
                                        </div>
                                     
                                    </div>
                                    @error('description')
                                    <p class=" text-danger">{{ $message }}</p>
                                      @enderror
                                  
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



@endsection