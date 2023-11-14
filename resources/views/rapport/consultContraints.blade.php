@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidFonct')
  <div class="container m-3">
            <div class="row rowTitre">
                <div class="col col-md-6">
                <h2><i class="text-dark">Mes contraintes</i></h2>
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
                        @foreach($contraintes as $contr)
                       
                        <tr>
                            
                          <td>{{$contr->sujet}}</td>  
                          <td>{{$contr->created_at}}</td> 
                          @if($contr->etat=='valider')
                          <td>
                          <span class="badge bg-success">{{$contr->etat}}</span>
                          </td>
                          @else
                          <td>
                          <span class="badge bg-danger">{{$contr->etat}}</span>
                        
                          </td>
                          @endif
                          <td><a href='#'
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
              {{ $contraintes->links() }}
          </div>
</div>
</div>
@endsection
