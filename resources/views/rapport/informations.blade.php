@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sideBareFonctionnaire')
    <div class="container">
      <div class="row">
        <form action="{{route('informations.imprimer')}}" method="POST">
          @csrf
        <button type="submit">Imprimer</button>
      </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><i class="text-danger">Actions Table</i></h4>
                   
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Choix</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($activites as $activite)
                       
                        <tr>
                          <td>{{$activite->intitulé}}</td>  
                          <td><input class="form-check-input" type="checkbox" value="{{$activite->id}}" name="CheckActivite[{{$activite->id}}]"></td>                 
                        </tr>
                            
                        
                       @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><i class="text-danger">Actions Table</i></h4>
                   
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Choix</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($actions as $action)
                       
                        <tr>
                          <td>{{$action->titre}}</td>  
                          <td><input class="form-check-input" type="checkbox" value="{{$action->id}}" name="CheckAction[{{$action->id}}]"></td>                 
                        </tr>
                            
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            
             
            </div>
           
                        
     

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><i class="text-danger">Propositions Table</i></h4>
               
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Choix</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($propositions as $proposition)
                       
                    <tr>
                      <td>{{$proposition->titre}}</td>  
                      <td ><input class="form-check-input" type="checkbox" value="{{$proposition->id}}" name="CheckProposition[{{$proposition->id}}]"></td>                 
                    </tr>
                        
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><i class="text-danger">Contraints Table</i></h4>
                
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>Titre</th>
                        <th>Choix</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Jacob</td>
                        <td>Photoshop</td>
                        
                        </tr>
                        <tr>
                        <td>Messsy</td>
                        <td>Flash</td>
                        
                        </tr>
                        <tr>
                        <td>John</td>
                        <td>Premier</td>
                        
                        </tr>
                        <tr>
                        <td>Peter</td>
                        <td>After effects</td>
                        
                        </tr>
                        <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                    
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        
          </form>
    </div>
       
                    

    </div>
</div>
@endsection

