@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidChef')
    <div class="container m-3">
        <div class="row rowBack">
            
            <div class="col col-md-12">
                <h1>Ajouter les contraints</h1>
            </div>
         
        <div class="row card p-3">

                    <div class="col-md-11 container register">
                        <form method="POST" action="{{route('chef.storContraint')}}">
                            @csrf
                        
                        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ActiviteContraint" class="form-label">Choisis l'activitée</label>

                                                <select name="ActiviteContraint[]" id="ActiviteContraint" required class="form-control">
                                                    
                                                    <option class="hidden"  selected disabled >Choisie...</option>
                                                    @foreach($activites as $activite)                                   
                                                    <option value="{{$activite->id}}">{{$activite->intitulé}}</option>                                    
                                                    @endforeach
                                                </select>  
                                            </div>
                                            <div class="form-group">
                                                <label>Déscription</label>
                                                <textarea name="descriptionContraint[]" id="descriptionContraint" class="form-control"  ></textarea>
                                            </div>                    
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sujet</label>
                                                    <input type="text" name="SujetC[]" id="SujetC" placeholder="Sujet..." class="form-control"   />
                                                </div>     
                                            </div>                                   
                                    </div>
                                </div>

                                <div class="form-navigation m-3">
                                    <button type="submit" class="btn btn-success float-right ">Save</button>
                                    <button type="button" class="btn btn-primary mr-4 add_contraint_btn float-right">Add more</button>                                   
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
       

        // ADD DIV CONTRAINTS
        var i=0;
        $('.add_contraint_btn').click(function(){
            ++i;
            $("#contraints_div").prepend('<div class="form-section "  id="contraints_div"><div class="row register-form "><div class="col-md-6"><div class="form-group"><label for="ActiviteContraint" class="form-label">Choisissez une activitée</label><select name="ActiviteContraint[]" id="ActiviteContraint" required class="form-control"><option class="hidden"  selected disabled >Choisie...</option>@foreach($activites as $activite)<option value="{{$activite->id}}">{{$activite->intitulé}}</option>@endforeach</select></div><div class="form-group"><label>Déscription</label><textarea name="descriptionContraint[]" id="descriptionContraint" class="form-control"  ></textarea></div></div><div class="col-md-6"><div class="form-group"><label>Sujet</label><input type="text" name="SujetC[]" id="SujetC" placeholder="Sujet..." class="form-control"   /><hr><button type="button" class="btn btn-danger mr-4  remove_contraints_btn float-right">Remove</button></div></div></div></div>')
        })
            
            $(document).on('click','.remove_contraints_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent().parent();
            $(row_item).remove();
        });   
    });

  

</script>


<script>
    const selectBtn=document.querySelector(".select-btn"),

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