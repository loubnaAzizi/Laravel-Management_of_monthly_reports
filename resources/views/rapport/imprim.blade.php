<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <style>
            .divTitre{
                display:flex;
                justify-content: center;
                font-family: 'Times New Roman', Times, serif;
                font-size: 22px;
                margin-left: 11%;
            }
            .divDate{
                display:flex;
                /* justify-content: center; */
                width: 100%;
                font-family: 'Times New Roman', Times, serif;
                font-size: 19px;
                margin-bottom: 10px;
         
            }
            span{
                background-color: yellow;
                padding: 2px;
                justify-content: center;
                margin-left: 35%;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                
            }
            td{
                padding: 5px;
            }
            table, th, td {
            border: 1px solid;
            
            }
            


        </style>
</head>
<body>
        <div >

            <div class="divTitre">
            <h1 id="titre">Rapport mensuel des activités</h1>
        </div>
            <div class="divDate">
            <span>Mois de {{now()->format('M')}} {{now()->format('Y')}}</span>
            </div>
            <div>Ce rapport dresse un bilan sur toutes les actions réalisées pendant un mois de travail. Aussi, il survole les contraintes et difficultés entravant la conduite des différentes activités. Enfin, il trace des perspectives, notamment de nature prioritaire, à mener dans le cours terme.</div>

            <h3>I.	Bilan des réalisations</h3>
            @if($conctActivite<1)
            <table>
                <thead>
                    <tr>
                        <th>Action réalisée</th>
                        <th>Personnes responsables ou service</th>
                        <th>Date de réalisation</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aucun Activités</td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>

            </table>
            @else
            <table >
                <thead>
                <tr>
                    <th>Action réalisée</th>
                    <th>Personnes responsables ou service</th>
                    <th>Date de réalisation</th>
                </tr>
                </thead>
                <tbody>
                  
                    
                   @foreach($activites as $activite)
                        <tr>

                        <td>{{$activite->intitulé}}</td>  
                        
                        <td>{{$user->nom}}</td>
                        <td>
                            {{$activite->date_D}}
                            ---
                            {{$activite->date_F}}
                       </td>
                        </tr>
                        @endforeach
                   
                </tbody>
            </table>
            @endif
            <h3>II.	Contraintes et difficultés entravant la conduite des activités</h3>

            @foreach($contraintes as $contrainte) 
            -{{$contrainte->sujet}}: {{$contrainte->description}}<br/>
            @endforeach
            


            <h3>III.	Actions prioritaires</h3>
            @if($countActions<1)
            <table>
                <thead>
                    <tr>
                        <th>Action à conduire prochainement</th>
                        <th>Personnes responsables de l’action</th>
                        <th>Deadline de traitement</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aucun actions</td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>

            </table>
            @else
            <table >
                <thead>
                <tr>
                    <th>Action à conduire prochainement</th>
                    <th>Personnes responsables de l’action</th>
                    <th>Deadline de traitement</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($actions as $action)
                        <tr>

                            <td>{{$action->titre}}</td>
                       
                        <td>{{$user->nom}}</td>

                        <td>  {{$action->date_D}}
                            ---
                            {{$action->date_F}}</td>
                        </tr>
                        @endforeach
                   
                </tbody>
            </table>
            @endif


            <h3>IV.	Propositions</h3>
            @foreach($propositions as $proposition)
            -{{$proposition->titre}}: {{$proposition->description}}<br/>
            @endforeach
            </div>
</body>
</html>



