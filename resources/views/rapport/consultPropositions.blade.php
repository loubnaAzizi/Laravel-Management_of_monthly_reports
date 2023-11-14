@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidFonct')
  <div class="container m-3">
    
    <div class="row rowTitre">
      <div class="col col-md-6">
      <h2><i class="text-dark">Mes propositions</i></h2>
      </div>
  </div>
  <div class="row">
    <div class="col col-md-5">
      <p>Filtrer par date de création:</p>
    </div>
    
  </div>
  <div class="row">
    <div class="col col-md-4 mb-4 search">
      <input type="search" name="search" id="myInputSearch" class="form-control" placeholder="Filtrer..."/>          
    </div>
   
    
   </div>
  <div class="row">
      <div class="col-md-12 stretch-card grid-margin">
        <div class="card">
                   
                   
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Titre</th>
                            <th>Date de création</th>
                            <th>Etat</th>
                            <th>Choix</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($propositions as $proposition)
                             
                          <tr>
                            <td>{{$proposition->titre}}</td> 
                            <td>{{$proposition->created_at}}</td>  
                            @if($proposition->etat=='Valider')
                            <td>
                            <span class="badge bg-success">{{$proposition->etat}}</span>
                            </td>

                              @elseif($proposition->etat=='Regeter')
                            <td>
                            <span class="badge bg-warning text-dark">{{$proposition->etat}}</span>
                            <a href='{{route('modifier.proposition',$proposition->id)}}'
                              class="btn btn-sm btn-warning ">
                              <i class="mdi mdi-pen "></i>  
                            </a>
                            </td>
                            @else

                            <td>
                              <span class="badge bg-danger">{{$proposition->etat}}</span>
                            </td>
                            @endif
                            <td><a href='{{route('showProposition',$proposition->id)}}'
                                class="btn btn-sm btn-primary">
                                <i class="mdi mdi-eye \f2fd"></i>  
                           </a></td>
                          </tr>
                              
                         @endforeach
                        </tbody>
                      </table>
                   
                </div>
            </div>
            <div class="d-flex">
              {{ $propositions->links() }}
          </div>
</div>
</div>
@endsection



@section('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



@endsection