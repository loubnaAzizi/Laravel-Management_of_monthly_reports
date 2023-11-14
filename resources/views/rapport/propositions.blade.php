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
                <h1>Ajouter des propositions</h1>
            </div>
          </div>
        <div class="row card p-3">
            
        
            <div class="container register">
                <div class="row card p-3">

                <div class="col-md-12 register-right">
                    
                <form method="POST" action="{{route('StorProposition')}}">
                    @csrf
                    
                    
                            <div class="form-section "  id="contraints_div">
                                <div class="row register-form ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titreProppos" class="form-label">Titre</label>
                                            <input type="text" name="titreProppos[]" class="form-control"  placeholder="Titre..." required/>
                                        </div>
                                                          
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descriptionProppos" class="form-label">Déscription</label>
                                            <textarea name="descriptionProppos[]" class="form-control"  placeholder="..." required></textarea> 
                                        </div>                                    
                                    </div>                                   
                                </div>
                            </div>

                            <div class="form-navigation m-3">
                                <button type="submit" class="btn btn-success float-right ">Save</button>
                                <button type="button" class="btn btn-primary mr-4 add_proposition_btn float-right">Add more</button>                                   
                            </div> 
                        </div>                           
                    </div>                                      
          </form>
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
        $('.add_proposition_btn').click(function(){
            ++i;
            $("#contraints_div").prepend(' <div class="form-section "  id="contraints_div"><div class="row register-form "><div class="col-md-6"><div class="form-group"><label for="titreProppos" class="form-label">Titre</label><input type="text" name="titreProppos[]" class="form-control"  placeholder="Titre..." required/></div></div><div class="col-md-6"><div class="form-group"><label for="descriptionProppos" class="form-label">Déscription</label><textarea name="descriptionProppos[]" class="form-control"  placeholder="..." required></textarea><button type="button" class="btn btn-danger mr-4 mt-3  remove_proposition_btn float-right">Remove</button></div></div><hr></div></div>');
        })

        $(document).on('click','.remove_proposition_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent().parent();
            $(row_item).remove();
            
        });   
    });

  

</script>

@endsection


