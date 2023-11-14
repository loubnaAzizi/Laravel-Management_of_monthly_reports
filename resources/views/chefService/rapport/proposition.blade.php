@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidChef')
    <div class="container m-3">
        <div class="row  ">
            <div class="col col-md-6 ">
                <h1>Ajouter des propositions</h1>
            </div>
          </div>
        <div class="row card pt-4 ">

                <div class="col-md-12 register-right">
                    
                    <form method="POST" action="{{route('chef.storPropposition')}}">
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
                                <div class="form-navigation mb-3">
                                    <button type="submit" class="btn btn-success float-right ">Save</button>
                                    <button type="button" class="btn btn-primary mr-4 add_proposition_btn float-right">Add more</button>                                   
                                </div>                 
                    </form>
         
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
            $("#contraints_div").prepend('<div class="form "  id="contraints_div"><div class="row register-form "><div class="col-md-6"><div class="form-group"><label for="titreProppos" class="form-label">Titre</label><input type="text" class="form-control" name="titreProppos[]"  placeholder="Titre..." required/></div></div><div class="col-md-6"><div class="form-group"><label for="descriptionProppos" class="form-label">Déscription</label><textarea class="form-control mb-4" name="descriptionProppos[]"  placeholder="..." required></textarea><button type="button" class="btn btn-danger mr-4  remove_proposition_btn float-right">Remove</button></div></div></div></div>');
        })

        $(document).on('click','.remove_proposition_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent().parent();
            $(row_item).remove();
        });   
    });

  

</script>
<script>
    const selectBtn=document.querySelector(".select-btn"),
     //  items=document.querySelectorAll(".item")
      inputCheck=document.querySelectorAll(".inputCheck");
      

      selectBtn.addEventListener("click",()=>{
         selectBtn.classList.toggle("open");
      });

      inputCheck.forEach(item=>{
         item.addEventListener("click",()=>{
             item.classList.toggle("chicked");
             let checked=document.querySelectorAll('.chicked'),
                 btnText=document.querySelector(".btn-text");
                 
                 if(checked && checked.length>0) {
                     btnText.innerText=`${checked.length} Selected`

                 }else{
                     btnText.innerText="Select fonctionnaire"
                 }

         })
      })
      
</script>

@endsection


