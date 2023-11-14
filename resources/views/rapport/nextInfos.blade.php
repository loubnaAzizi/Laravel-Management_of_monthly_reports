@extends('layouts.app')

@vite(['resources/step.css'])
@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sideBareFonctionnaire')
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                 <h2>Remplir neuveau rapport </h2>

                <div class="nav nav-fill my-3">
                   
                    <label class="nav-link shadow-sm step1 border ml-2">Les contraints</label>
                    <label class="nav-link shadow-sm step2 border ml-2">Informations des actions</label>
                    <label class="nav-link shadow-sm step3 border ml-2">Propositions</label>
                </div>

                <form method="POST" action="{{route('StorRapport')}}" id="employee-form" class="employee-form">
                    @csrf
                             
                      
                 
                

                        <div class="form-section" id="contraints_div">
                            <label for="ActiviteContraint" class="form-label">nom d'activité</label>
                            <input name="ActiviteContraint" id="typeActivite" placeholder="Nom d'activité..."/>
                              
                          
         
                            <label for="typeContraint" class="form-label">Type de contraints</label>
                            <input type="text" name="typeContraint" id="typeContraint" placeholder="Type..." />
           
                            <label for="SujetC" class="form-label">Sujet de contraints</label>
                            <input type="text" name="SujetC" id="SujetC" placeholder="Sujet..." />
                            <label for="descriptionContraint" class="form-label">Déscription</label>
                            <textarea name="descriptionContraint" id="descriptionContraint" placeholder="..."></textarea>
                            <button type="button" class="btn btn-success add_contraint_btn">Add more</button>
                            
                            <div class="fieldset-footer">
                                <span>Step 2 of 4</span>
                            </div>
                            
                        </div>


                        <div class="form-section">
                            <label for="titreAction" class="form-label">Titre d'action</label>
                            <input type="text" name="titreAction[]" id="titreAction" placeholder="Titre..." />
                       
                                <label for="dedlin" class="form-label">Dédline</label>
                                <input type="date" name="dedlin[]" id="dedlin" />

                                <label for="descriptionAction" class="form-label">Déscription</label>
                                <textarea name="descriptionAction[]" id="descriptionAction" placeholder="..."></textarea>  
                                <div class="fieldset-footer">
                                    <span>Step 3 of 4</span>
                                </div>                              
                        </div>                      

                        <div class="form-section">
                            <label for="titreProppos" class="form-label">Titre</label>
                            <input type="text" name="titreProppos[]" id="titreProppos" placeholder="Titre..." />

                                <label for="descriptionProppos" class="form-label">Déscription</label>
                                <textarea name="descriptionProppos[]" id="descriptionProppos" placeholder="..."></textarea>                                

                            <div class="fieldset-footer">
                                <span>Step 4 of 4</span>
                            </div>
                        </div>


                <div class="form-navigation mt-3">
                    <button type="button" class="previous btn btn-primary float-left">&lt;Revinir</button>
                    <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </div>

           
                
                
            </div>
        </div>
       
    </form>
</div>            
</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        var $sections=$('.form-section');
        function navigatTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd=index>=$sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd); 
            
            const step=document.querySelector('.step'+index);
            step.style.backgroundColor="#17a2b8";
            step.style.color="white";
        }

        function curIndex(){
            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function(){
            navigatTo(curIndex() -1);
        });

        $('.form-navigation .next').click(function(){
            $('.employee-form').parsley().whenValidate({
                group:'block-'+curIndex()
            }).done(function(){
                navigatTo(curIndex()+1);
            });

            
        });
        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-'+index);

        });
        navigatTo(0);

        //ADD DIV ACTIVITIES
        var i=0;
        $('.add_item_btn').click(function(){
            ++i;
            $("#show-item").prepend('<div class="form mb-4"><label for="nomActivite" class="form-label">Nom activité</label><input type="text" name="nomActivite['+i+']" id="nomActivite" placeholder="Intitulé..." /><label for="typeActivite" class="form-label">Type activité</label><select name="typeActivite['+i+']" id="typeActivite" ><option value="">Type</option><option value="Principale">Principale</option><option value="Supplimentaire">Supplimentaire</option></select> <label for="descriptionActivite" class="form-label">Déscription</label><textarea name="descriptionActivite['+i+']" id="descriptionActivite" placeholder="..." ></textarea><label for="dateDebutActivite" class="form-label">Date début</label><input type="date" name="dateDebutActivite['+i+']" id="dateDebutActivite"  /><label for="dateFinActivite" class="form-label">Date fin</label><input type="date" name="dateFinActivite['+i+']" id="dateFinActivite"  /><button type="button" class="btn btn-danger remove_item_btn">Remove</button>')
        })

        $(document).on('click','.remove_item_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent();
            $(row_item).remove();
        });

        //ADD DIV CONTRAINTS
        var i=0;
        $('.add_contraint_btn').click(function(){
            ++i;
            $("#contraints_div").prepend('<div class="form mb-4"><label for="ActiviteContraint" class="form-label">Choisir activité</label><select name="ActiviteContraint['+i+']" id="typeActivite" ><option value=""></option><option value=""></option><option value=""></option></select><label for="typeContraint" class="form-label">Type de contraints</label><input type="text" name="typeContraint['+i+']" id="typeContraint" placeholder="Type..." /><label for="SujetC" class="form-label">Sujet de contraints</label><input type="text" name="SujetC['+i+']" id="SujetC" placeholder="Sujet..." /><label for="descriptionContraint" class="form-label">Déscription</label><textarea name="descriptionContraint['+i+']" id="descriptionContraint" placeholder="..."></textarea><button type="button" class="btn btn-danger remove_contraints_btn">Remove</button></div>');
        })

        $(document).on('click','.remove_contraints_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent();
            $(row_item).remove();
        });

        //ADD DIV ACTION

        


    });

  

</script>

@endsection