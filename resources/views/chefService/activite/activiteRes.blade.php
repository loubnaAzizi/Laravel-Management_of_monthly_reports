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