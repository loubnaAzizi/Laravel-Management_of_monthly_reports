

@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidChef')
  <div class="container m-3">
      
    

        <div class="row">

         <div class="col-md-12 grid-margin stretch-card colTables">

                <div class="card p-3">
                  <div class="card row  text-center bg-light p-2 mb-3">
                    <div class="col col-md-12 ">
                      <h5 class="text-black ">Fullname: <i class="text-danger">{{$user->prenom}} {{$user->nom}}</i></h5>
                    </div>
                  </div>
              
                    <input type="search" name="search" id="recordID" hidden  value="{{$user->id}}"/>
                    <div class="divTable mb-2">
                      <div class="row ">
                        <h4 class="text-dark titreValidActiv"><i class="text-primary">Table des activités & difficultés:</i></h4>
                      </div>    
                     
                      <div class="row">
                        <div class="col col-md-5">
                          <p>Filtrer par type :</p>
                        </div>   
                      </div>
                      
                       <div class="row">
                        <div class="col col-md-4 mb-2 search">
                        
                          <input type="search" name="search" id="SearchActivite" class="form-control" placeholder="Chercher..."/>          
                        </div>   
                       </div>
                     
                      {{-- <hr>              --}}
                      @if($countActivite<1)
                        <table class="table table-hover table-bordered tb1" >
                          <thead class="text-center theadActivites tHead">
                            <tr >                         
                              <th class="col col-md-6">Nom d'activité</th>
                              <th class="col col-md-6">Etat</th>
                              <th>Option</th>
                              
                            </tr>
                          </thead>
                          <tbody class="alldata">
                        <tr>
                          <td id="tdCss" colspan="3">No result</td>
                        </tr>
                          </tbody>
                        </table>

                      @else
                      <table class="table table-hover table-bordered" >
                        <thead class="text-center theadActivites tHead">
                          <tr >                         
                            <th class="col col-md-6">Nom d'activité</th>
                            <th class="col col-md-6">Etat</th>
                            <th>Option</th>
                            
                          </tr>
                        </thead>
                        <tbody class="alldata">
                                @foreach($activites as $activite)
                               
                                <tr>                           
                                    <td>{{$activite->intitulé}}</td>                                                          
                                    <td class="text-center"> 
                                      @if($activite->etat=='Valider')
                                      <span class="badge bg-success">{{$activite->etat}}</span>
                                      @else
                                      <span class="badge bg-danger">{{$activite->etat}}</span>
                                      @endif</td>  
                                                               
                                  <td ><a href="{{route('validerA',[$activite->id,$user->id])}}" 
                                    class="btn btn-sm btn-warning mx-2">
                            
                                    <i class="mdi mdi-border-color
                                    \f1bf"></i> 
                                        </a> </td>
                                </tr>
                               
                              
                              @endforeach
                            

                      
                            
                    
                        </tbody>
                        <tbody id="content" class="searchdata "></tbody>
                       
                      </table>
                      @endif
                      <div class="d-flex">
                        {{ $activites->links() }}
                      </div>
                      <hr>
                  </div>
                 
                    
                    
                      <div class="divTable mb-4">
                        <div class="row mb-2">
                          <h4 class="text-dark titreValidActiv"><i class="text-success">Table des actions</i></h4>
                        </div> 
                        <div class="row">
                          <div class="col col-md-5">
                            <p>Filtrer par type :</p>
                          </div>   
                        </div>
                        
                         <div class="row">
                          <div class="col col-md-4 mb-2 search">
                          
                            <input type="search"  id="SearchAction" class="form-control" placeholder="Chercher..."/>          
                          </div>   
                         </div>

                         @if($countActions<1)
                        <table class="table table-bordered table-bordered tb1" >
                          <thead class="text-center theadActions tHead">
                            <tr >                         
                              <th class="col col-md-6">Nom d'action</th>
                              <th class="col col-md-6">Etat</th>
                              <th>Option</th>
                              
                            </tr>
                          </thead>
                          <tbody class="alldata">
                        <tr>
                          <td id="tdCss" colspan="3">No result</td>
                        </tr>
                          </tbody>
                        </table>

                      @else
                        <table class="table table-hover table-bordered" >
                          <thead class="text-center theadActions tHead">
                            <tr >
                            
                              <th class="col col-md-6">Nom d'action</th>
                              <th class="col col-md-6">Etat</th>
                              <th>Option</th>
                              
                            </tr>
                            </thead>
                            <tbody class="alldataAction">
                             
                                      @foreach($actions as $action)
                                    <tr>                           
                                        <td>{{$action->titre}}</td>                                                          
                                        <td class="text-center"> @if($action->etat=='Valider')
                                          <span class="badge bg-success">{{$action->etat}}</span>
                                          @else
                                          <span class="badge bg-danger">{{$action->etat}}</span>
                                          @endif</td>                          
                                      <td ><a href="{{route('validerActionIn', [$action->id,$user->id])}}" 
                                        class="btn btn-sm btn-warning mx-2">
                            
                                        <i class="mdi mdi-border-color
                                        \f1bf"></i>  
                                            </a> </td>
                                    </tr>
                              
                                      @endforeach

                            </tbody>
                         
                         
                          <tbody id="contentAction" class="searchdataAction"></tbody>
                         
                        </table>
                        @endif
                        <div class="d-flex">
                          {{ $actions->links() }}
                        </div>
                        
                        <hr>
                    </div>

                    
                    <div class="divTable">
                      <div class="row ">
                        <h4 class="text-dark titreValidActiv"><i class="titreProp">Table des propositions</i></h4>
                      </div> 
                      <div class="row">
                        <div class="col col-md-5">
                          <p>Filtrer par type :</p>
                        </div>   
                      </div>
                      
                       <div class="row">
                        <div class="col col-md-4 mb-2 search">
                        
                          <input type="search"  id="SearchProposition" class="form-control" placeholder="Chercher..."/>          
                        </div>   
                       </div>
                      
                        @if($countPropositions<1)
                        <table class="table table-bordered table-hover tb1" >
                          <thead class="text-center theadPropo tHead">
                            <tr >                         
                              <th class="col col-md-6">Titre de proposition</th>
                              <th class="col col-md-6">Etat</th>
                              <th>Option</th>
                            
                              
                            </tr>
                          </thead>
                          <tbody class="alldata">
                        <tr>
                          <td id="tdCss" colspan="3">No result</td>
                        </tr>
                          </tbody>
                        </table>

                      @else
                      <table class="table table-bordered table-hover">
                        <thead class="text-center theadPropo tHead">
                          <tr >
                          
                            <th class="col col-md-6">Titre de proposition</th>
                            <th class="col col-md-6">Etat</th>
                            <th>Option</th>
                            
                          </tr>
                          </thead>
                          <tbody class="alldataProposition">
                           
                                @foreach($propositions as $proposition)
                                <tr>                           
                                    <td>{{$proposition->titre}}</td>  
                                                                                            
                                    <td class="text-center"> @if($proposition->etat=='Valider')
                                      <span class="badge bg-success">{{$proposition->etat}}</span>
                                      @else
                                      <span class="badge bg-danger">{{$proposition->etat}}</span>
                                      @endif</td>                           
                                  <td ><a href="{{route('editProp', [$proposition->id,$user->id])}}" 
                                    class="btn btn-sm btn-warning mx-2">
                        
                                <i class="mdi mdi-border-color
                                \f1bf"></i> 
                                        </a> </td>
                                </tr>
                          
                              @endforeach
                          
                         
                          </tbody>
                      
                          <tbody id="contentProposition" class="searchdataProposition"></tbody>
                      </table>
                      @endif
                      <div class="d-flex">
                        {{ $propositions->links() }}
                    </div>
                  </div>

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

     <script type="text/javascript">


        $('#SearchActivite').on('keyup',function() 
        {
          $value=$('#SearchActivite').val();
          if($value)
          {
            $('.alldata').hide();
            $('.searchdata').show();
          }else
          {
            $('.alldata').show();
            $('.searchdata').hide();
          }

          var id = $('#recordID').val();
   
          $.ajax({
            type:'get',
            url:'{{URL::to('searchActivite')}}',
            data:{'search':$value,'id':id},

            success:function(data)
            {             
              $('#content').html(data);
            }

          });
        })

     </script>
     <script>
        //INPUT SEARCH ACTION
        $('#SearchAction').on('keyup',function() 
        {
          $valueAction=$('#SearchAction').val();

          if($valueAction)
          {
            $('.alldataAction').hide();
            $('.searchdataAction').show();
          }else
          {
            $('.alldataAction').show();
            $('.searchdataAction').hide();
          }

          var id = $('#recordID').val();
   
          $.ajax({
            type:'get',
            url:'{{URL::to('searchAction')}}',
            
            data:{'searchAc':$valueAction,'id':id},

            success:function(data)
            {             
              $('#contentAction').html(data);
            }

          });
        })

      </script>


<script>
  //INPUT SEARCH ACTION
  $('#SearchProposition').on('keyup',function() 
  {
    $valueProposition=$('#SearchProposition').val();

    if($valueProposition)
    {
      $('.alldataProposition').hide();
      $('.searchdataProposition').show();
    }else
    {
      $('.alldataProposition').show();
      $('.searchdataProposition').hide();
    }

    var id = $('#recordID').val();

    $.ajax({
      type:'get',
      url:'{{URL::to('SearchPropposition')}}',
      
      data:{'searchPr':$valueProposition,'id':id},

      success:function(data)
      {             
        $('#contentProposition').html(data);
      }

    });
  })

</script>

 
 @endsection