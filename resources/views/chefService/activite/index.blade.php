@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
  @include('layouts.sidChef')
  <div class="container m-3">
    

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table des fonctionnaires</h4>
                    <div class="card">
                      <div class="card-body">
               
                  
                       <div class="row">
                         <div class="col col-md-5">
                           <p>Chercher par nom :</p>
                         </div>
                         
                       </div>
                       
                        <div class="row">
                         <div class="col col-md-4 mb-4 search">
                           <input type="search" name="search" id="InputSearchFonctionnair" class="form-control" placeholder="Chercher..."/>          
                         </div>
                        
                         
                        </div>
                    
                    <table class="table table-striped">
                      <thead class="text-center">
                        <tr>
                          <th>
                            N° SOM
                          </th>
                          <th>
                            Nom & Prenom
                          </th>
                                               
                          <th>
                            Option
                          </th>
                        </tr>
                      </thead>
                    
                      
                          <tbody class="text-center alldata">
                            <tr>
                            @foreach($fonctionnaires as $fonctionnaire)
                            <td>
                                {{ $fonctionnaire->N_SOM }}
                            </td>
                            <td>
                                {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}
                                
                            </td>
                           
                            <td>
                                
                                <a href='{{route('InformationSaisies',$fonctionnaire->id)}}'
                                    class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-eye \f2fd"></i>  
                               </a>
                            </td>
                        </tr>
                            @endforeach

                      </tbody>
                      <tbody id="content" class="searchdata text-center"></tbody>
                    </table>
                  </div>
                  <div class="d-flex">
                    {{ $fonctionnaires->links() }}
                </div>
                </div>
              </div>
        </div>

    </div>
   
</div>
@endsection

@section('scripts')

     <script type="text/javascript">

        $('#InputSearchFonctionnair').on('keyup',function() 
        {
          $value=$(this).val();
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
            url:'{{URL::to('searchFonc')}}',
            data:{'search':$value},

            success:function(data)
            {
              console.log(data);
              $('#content').html(data);
            }


          });
        })

      </script>

 
 @endsection

