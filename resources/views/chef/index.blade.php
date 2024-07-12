<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="w-100 mx-auto">
                    <h2 class="float-left">Liste de chéfs de ménage</h2>
                    <button data-toggle="modal" data-target="#myModal" class="btn btn-outline-info pb-2 float-right">Nouveau chéf de ménage</button>
                </div>
                <div class="w-100 mx-auto">
                    <div class="pcoded-search col-sm-4 p-0">
                        <span class="searchbar-toggle">  </span>
                        <div class="pcoded-search-box ">
                            <form action="{{ route('ChefM.chercher') }}" method="post">
                                @csrf 
                                    <div class="form-group">
                                        <input type="text" name="chefM_chercher" placeholder="Rechercher par nom" required>
                                        <button type="submit" class="search-icon"><i class="ti-search"></i></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-100 table-responsive">
                <table class="table table-hover table-bordered mt-4">
                    <thead>
                        <tr class="table-inverse">
                            <th>Noms</th>
                            <th>Prénoms</th>
                            <th>Né le</th>
                            <th>Origine</th>
                            <th>Fonction</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chefs as $chef)
                        <tr >
                            <td class="align-middle">{{$chef->Noms}}</td>
                            <td class="align-middle">{{$chef->Prenoms}}</td>
                            <td class="align-middle">{{$chef->DateN}}</td>
                            <td class="align-middle">{{$chef->Origine}}</td>
                            <td class="align-middle">{{$chef->Fonction}}</td>
                            <td class="align-middle">
                                <form action="{{  route('ChefM.destroy',$chef->id) }}" method="POST">
                                    <a href="{{ route('Liste',$chef->id)}}" type="button" class="btn btn-inverse">Descendants</a>
                                    <button type="button" onclick='ajoutD({{ $chef->id }},"{{ $chef->Noms }}");' data-toggle="modal" data-target="#multiple" class="btn btn-info" >Ajout de descendant</button>
                                    <button type="button" onclick='editM({{ $chef->id }},"{{ $chef->Noms }}","{{ $chef->Prenoms }}","{{ $chef->Sexe }}","{{ $chef->DateN }}","{{ $chef->Origine }}","{{ $chef->Fonction }}");' data-toggle="modal" data-target="#modifier" class="btn btn-primary" >Modifier</Button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                 <!--pagination-->
                <div class="d-flex justify-content-center pagination-sm">
                    {!!$chefs->links('pagination::bootstrap-4')!!}
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Nouveau</h4>
                            </div>
                        <div class="modal-body">
                        <form action="{{route('ChefM.store')}}" method="post" >                             
                        @csrf 
                            <div class="form-group">
                                <input type="tex" class="form-control" placeholder="Noms" name="Noms">
                            </div>
                            <div class="form-group">
                                <input type="tex" class="form-control" placeholder="Prenoms" name="Prenoms">
                            </div>
                            <div class="form-group">
                                <select name="Sexe" id="" class="form-control" required>
                                    <option value="" selected>Sexe</option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="DateN">
                            </div>
                            <div class="form-group">
                                <input type="tex" class="form-control" placeholder="Origine" name="Origine">
                            </div>
                            <div class="form-group">
                                <input type="tex" class="form-control" placeholder="Proffession" name="Fonction">
                            </div>
                            
                        
                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                        </div>

                    </div>
                  </div>  
                </div>
            </div>
        </div>
    </div>



    <div id="multiple" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="tittle">Nouveaux</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('Descendent.store')}}" method="post" >                             
                    @csrf 
                       <div class="w-100" id="container_form">
                            <div class="form-row p-2 border border-info  ">
                                <div class="col-sm-12 mb-2">
                                    <button type="button" style="font-size:20px;" class="float-right btn-sm btn btn-inverse m-0 mb-2">X</button>
                                </div>
                                <input type="hidden" name="ChefM_id" id="ChefM_id" value="">
                                <div class="form-group col-sm-6">
                                    <input type="tex" class="form-control" placeholder="Noms" name="Noms[]" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="tex" class="form-control" placeholder="Prénoms" name="Prenoms[]">
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="Sexe[]" id="" class="form-control" required>
                                        <option value="" selected>Sexe</option>
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <input type="date" class="form-control p-2" placeholder="Date de naissance" name="DateN[]" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <select name="Type[]" id="" class="form-control" required>
                                        <option value="" selected>Lien familiale</option>
                                        <option value="marie">Marie</option>
                                        <option value="femme">Femme</option>
                                        <option value="enfant">Enfant</option>
                                        <option value="autre">Autres</option>
                                    </select>
                                </div>
                            </div>
                       
                       </div>
                        <div class="w-100 mx-auto p-0">
                            <a class="btn  btn-info mt-2" style="color:white;margin-left:-5px;" id="addForm">+</a>
                        </div>
                                        
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-info">Enregistrer</button>
                </div>
                </form>
            </div>

        </div>
    </div> 


<!--ChefM modification-->
<div id="modifier" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modifier</h4>
        </div>
        <div class="modal-body">
        <form action="{{ route('ChefM.modifier') }}" method="post" >                             
            @csrf 
            <input type="hidden" name="ChefM_id" id="Chefid" value="">
            <div class="form-group">
                <input type="tex" class="form-control" placeholder="Noms" name="Noms" id="Noms" value="">
            </div>
            <div class="form-group">
                <input type="tex" class="form-control" placeholder="Prenoms" name="Prenoms" id="Prenoms" value="">
            </div>
            <div class="form-group">
                <select name="Sexe" id="Sexe" class="form-control"  required>
                    <option value="" selected>Sexe</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="DateN" id="DateN">
            </div>
            <div class="form-group">
                <input type="tex" class="form-control" placeholder="Origine" name="Origine" id="Origine" value="">
            </div>
            <div class="form-group">
                <input type="tex" class="form-control" placeholder="Fonction" name="Fonction" id="Fonction" value="">
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
        </div>

    </div>
    </div>  
</div>

    <script type="text/javascript">

        function ajoutD(id,Noms)
        {
            document.getElementById('ChefM_id').value = id;
            document.getElementById('tittle').innerHTML=Noms;
        }

        function editM(id,Noms,Prenoms,Sexe,DateN,Origine,Fonction)
        {
            document.getElementById('Chefid').value= id;
            document.getElementById('Noms').value= Noms;
            document.getElementById('Prenoms').value= Prenoms;
            document.getElementById('Sexe').value= Sexe;
            document.getElementById('DateN').value= DateN;
            document.getElementById('Origine').value= Origine;
            document.getElementById('Fonction').value= Fonction;
        }

        
    </script>
</x-app-layout>