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