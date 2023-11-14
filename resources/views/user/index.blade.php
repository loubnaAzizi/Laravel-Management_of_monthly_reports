
 @extends('layouts.app')
 @section('content')
 <div class="wrapper d-flex align-items-stretch">

  @include('layouts.testSid')
     <div class="container-fluid m-3">
 
 <div class="row headServc ">
  <div class="col col-md-12">

    <div class="divIndexUser">
      <div class="col col-md-4 divBtnSrv">     
        <h2 class="text-dark"><i>Liste des utilisateurs</i></h2>
      </div>
    <div class="mb-4">
      <a class="btn btn-primary" href="{{route('user.create')}}">Add new user</a>
     </div>
      
    </div>

  </div>
 

 </div>
 <div class="row">
 <div class="col col-lg-12 col-sm-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">

     
        <div class="row">
          <div class="col col-md-5">
            <p>Chercher par nom :</p>
          </div>
          
        </div>
        
         <div class="row">
          <div class="col col-md-4 mb-4 search">
            <input type="search" name="search" id="myInputSearch" class="form-control" placeholder="Chercher..."/>          
          </div>   
         </div>
       
        <hr>

         <table class="table table-striped">
           <thead class="text-center">
             <tr>
               <th>
                 N° SOM
               </th>
               <th>
                 Nom
               </th>
               <th>
                 Prenom
               </th>
               <th>
                 Statue
               </th>
             
               <th>
                 Options
               </th>
            
             </tr>
           </thead>
           <tbody class="text-center alldata">
             @foreach ($users as  $user)
             <tr>
                                     
               <td>{{$user->N_SOM}}</td>
               <td>{{$user->nom}}</td>
               <td>{{$user->prenom}}</td>
               <td>{{$user->statue}}</td>
              
               <td class="d-flex justify-content-center align-items-center">
                   <a href="{{ route('user.show', $user->id) }}"
                        class="btn btn-sm btn-primary mr-2">
                        <i class="mdi mdi-eye \f2fd"></i>  
                   </a>
         
                  
               <form action="{{ route('user.destroy', $user->id) }}" method="Post">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-sm btn-danger " value="{{$user->id}}" onclick="return confirm('are you sure you want to delete this data ?')"><i class='mdi mdi-account-remove
                     \f114'></i> </button>
               </form> 
                   
               </td>
           
 
           </tr>
             @endforeach
           </tbody>
           <tbody id="content" class="searchdata text-center"></tbody>
         </table>

         <div class="d-flex">
             {{ $users->links() }}
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
       
        $('#myInputSearch').on('keyup',function() 
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
            url:'{{URL::to('search')}}',
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






