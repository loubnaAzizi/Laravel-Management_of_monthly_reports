@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidDirecteur')
  <div class="container m-3">
    <div class="row">
      <div class="col col-md-12">
        <h1>Liste des employés</h1>
      </div>
    </div>
    <div class="row rowCherch">
      <div class="col col-md-3">
        <p>Chercher par nom :</p>
      </div>

      
    </div>
    
     <div class="row  rowCherch">
      <div class="col col-md-3  search">
        <input type="search" name="search" id="myInputSearchNom" class="form-control" placeholder="Chercher..."/>          
      </div>  
 
     </div>
   
  
<div class="row mt-4 card">
  <div class="col col-md-12">
    <table class="table table-hover bg-with">
      <thead class="text-center">
        <tr>
          <th>
            N° SOM
          </th>
          <th>
            Fullname
          </th>
          <th>
            Service
          </th>
         
          <th>
            Consult
          </th>
        </tr>
      </thead>
      <tbody class="text-center alldata">
       
          @foreach ($employes as  $user)
          <tr>
                                  
            <td>{{$user->N_SOM}}</td>
            <td><a href="{{route('showEmploye',$user->id)}}">{{$user->nom}} {{$user->prenom}}</a></td>
            <td>{{$user->nomService}}</td>
           
           
            <td class="d-flex justify-content-center align-items-center">
                <a href="{{ route('directeurShowRapports', $user->id) }}"
                     class="btn btn-sm btn-primary mr-2">
                     <i class="mdi mdi-eye \f2fd"></i>  
                </a>
             
                <a href="{{route('imprimerPDF',$user->id)}}"
                  class="btn btn-sm btn-warning mr-2">
               
                  
                  <i class='bx bxs-download'></i>
                </a>
                
            </td>
        

        </tr>
          @endforeach
     
     
      

       
      </tbody>
      <tbody id="content" class="searchdata text-center"></tbody>
    </table>
    <div class="d-flex">
      {{ $employes->links() }}
  </div>
  </div>
  </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
            
 

  $('#myInputSearchNom').on('keyup',function() 
  {
    $value=$('#myInputSearchNom').val();
   
    
    if($value)
    {
      $('.alldata').hide();
      $('.searchdata').show();
    }else
    {
      $('.alldata').show();
      $('.searchdata').hide();
    }

    
    $.ajax({

      type:'get',
      url:'{{URL::to('searchD')}}',
      data:{'search':$value},

      success:function(data)
      {
        console.log(data);
        $('#content').html(data);
      }


    });
  })

  $('#myInputSearchService').on('keyup',function() 
  {
    $valuService=$('#myInputSearchService').val();
    if($valuService)
    {
      $('.alldata').hide();
      $('.searchdata').show();
    }else
    {
      $('.alldata').show();
      $('.searchdata').hide();
    }

    
    $.ajax({

      type:'get',
      url:'{{URL::to('searchService')}}',
      data:{'search':$valuService},

      success:function(data)
      {
        console.log(data);
        $('#content').html(data);
      }


    });
  })

</script>


@endsection