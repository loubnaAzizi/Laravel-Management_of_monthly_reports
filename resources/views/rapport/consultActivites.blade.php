@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidFonct')
  <div class="container m-3">
            <div class="row rowTitre">
                <div class="col col-md-6">
                <h2><i class="text-dark">Mes activités</i></h2>
                </div>
            </div>
            <form method="GET" action="/filtrer">
            <div class="row">
              <div class="col col-md-5">
                <p>Filtrer par date de création:</p>
              </div>
              
            </div>
            <div class="row">
              <div class="col col-md-4 mb-4 search">
                From:
                <input type="date" name="from" id="myInputSearch" class="form-control" placeholder="Filtrer..."/>          
              </div>

              <div class="col col-md-4 mb-4 search">
                To:
                <input type="date" name="to" id="myInputSearch" class="form-control" placeholder="Filtrer..."/>          
              </div>
              <div class="col col-md-2 mb-4 search">
                <button type="submit" class="btn btn-primary">search</button>
              </div>
             
              
             </div>
            </form>
            <div class="row">
                <div class="col-md-12 stretch-card grid-margin">
                  <div class="card">
                    <div class="card-body">
                   
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Date de création</th>
                          <th>Etat</th>
                          <th>Option</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($activites as $activite)
                       
                        <tr>
                            
                          <td>{{$activite->intitulé}}</td>  
                          <td>{{$activite->created_at}}</td> 
                          @if($activite->etat=='Valider')
                          <td>
                          <span class="badge bg-success">{{$activite->etat}}</span>
                          </td>
                          @elseif($activite->etat=='Regeter')
                          <td>
                          <span class="badge bg-warning text-dark">{{$activite->etat}}</span>
                          <a href='{{route('modifier.activite',$activite->id)}}'
                            class="btn btn-sm btn-warning ">
                            <i class="mdi mdi-pen "></i>  
                          </a>
                          </td>
                          @else

                          <td>
                            <span class="badge bg-danger">{{$activite->etat}}</span>
                          </td>
                          @endif
                          <td><a href='{{route('showActivite',$activite->id)}}'
                            class="btn btn-sm btn-primary">
                            <i class="mdi mdi-eye \f2fd"></i>  
                       </a>
                      
                      </td>                
                        </tr>
                            
                       @endforeach
                        
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
            </div>
            <div class="d-flex">
              {{ $activites->links() }}
          </div>
</div>
</div>
@endsection

@section('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



@endsection