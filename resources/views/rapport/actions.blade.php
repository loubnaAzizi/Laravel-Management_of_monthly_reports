@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3">
        <div class="row rowBack">
            <div class="col col-md-3">
              <div class="text text-center">Hover over the arrow</div>
              <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('fonctionnaireDash')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
            </div>
            <div class="col col-md-6 titrAddAct">
                <h1>Ajouter une nouvelle action</h1>
            </div>
          </div>
        <div class="row card p-3">

            <div class="container register">
                <div class="row">
                
                    <div class="col-md-1 register-left">          
                    </div>
                    <div class="col-md-11 register-right">
                        <form method="POST" action="{{route('StorAction')}}" >
                            @csrf
                        
                        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="titreAction" class="form-label">Titre d'action</label>
                                                <input type="text" name="titreAction" id="titreAction" placeholder="Titre..." class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="dedlin" class="form-label"  >Date début</label>
                                                <input type="date" name="dateDebAction" id="dedlin" class="form-control" required/>
                                            </div>   
                                            <div class="form-group">
                                                <label for="descriptionAction" class="form-label">Déscription</label>
                                                <textarea name="descriptionAction" id="descriptionAction" placeholder="..." class="form-control" required></textarea>
                                            </div>                 
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="priorite_ord" class="form-label">Order de préoritée</label>
                                                    <select name="priorite_ord" id="typeActivite" required class="form-control" >
                                                        <option class="hidden"  selected disabled >Choisie...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="dateFinActivite" class="form-label"  >Date fin</label>
                                                    <input type="date" name="dateFinAction" id="dateFinActivite"  class="form-control" required/>
                                                </div>                                    
                                            </div>                                   
                                    </div>
                                </div>

                                <div class="form-navigation m-3">
                                    <button type="submit" class="btn btn-success float-right ">Save</button>
                                                                 
                                </div> 
                        </form>

                        
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
<script>
    $(function() {
       
        var i=0;
        $('.add_action_btn').click(function(){
            ++i;
            $("#div-action").prepend('<div class="form-section border shadow-sm mb-3" id="div-action"><label for="titreAction" class="form-label">Titre action</label><input type="text" name="titreAction" id="titreAction" placeholder="Titre..." /><label for="descriptionAction" class="form-label">Déscription</label><textarea name="descriptionAction" id="descriptionAction" placeholder="..."></textarea><label for="dedlin" class="form-label">Date début</label><input type="date" name="dateDebAction[]" id="dedlin" /><label for="dateFinActivite" class="form-label">Date fin</label><input type="date" name="dateFinAction[]" id="dateFinActivite"  /><button type="button" class="btn btn-danger remove_action_btn">Remove</button></div>')
        })

        $(document).on('click','.remove_action_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent();
            $(row_item).remove();
        });


    });

  

</script>

@endsection