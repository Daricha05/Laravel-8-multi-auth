<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#myModal" >Nouveau descendant</button>
                    @foreach($menages as $menage)
                        <h3 style="">Chef: {{$menage->Noms}} {{$menage->Prenoms}}</h3>
                        
                    
                    <div class="row">
                        <table class="table table-hover mt-5">
                            <thead>
                                <tr class="table-inverse">
                                    <th>Noms et Prénoms</th>
                                    <th>Date de naissance</th>
                                    <th>Sexe</th>
                                    <th>Lien familial</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($descendents as $descendent)
                                <tr>
                                    <td class="align-middle">{{ $descendent->Noms." ".$descendent->Prenoms }} </td>
                                    <td class="align-middle">{{ $descendent->DateN }}</td>
                                    <td class="align-middle">{{ ucfirst($descendent->Sexe) }}</td>
                                    <td class="align-middle">{{ ucfirst($descendent->Type) }}</td>
                                    <td>
                                        <form action="{{  route('Descendent.destroy',$descendent->id) }}" method="POST">
                                            <a class="btn btn-info" onclick='editM({{ $descendent->id }},"{{ $descendent->Noms }}","{{ $descendent->Prenoms }}","{{ $descendent->DateN }}","{{ $descendent->Sexe }}","{{ $descendent->Type }}");' data-toggle="modal" data-target="#modifier">Modifier</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href="">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Nouveaux</h4>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('Descendent.store') }}" method="post" >                             
                                    @csrf 
                                    <input type="hidden" name="ChefM_id" value="{{$menage->id}}">
                                        <div class="form-group">
                                            <input type="tex" class="form-control" placeholder="Noms" name="Noms[]" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tex" class="form-control" placeholder="Prénoms" name="Prenoms[]">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="DateN[]" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="Sexe[]" id="" class="form-control" required>
                                                <option value="" selected>Sexe</option>
                                                <option value="homme">Homme</option>
                                                <option value="femme">Femme</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <select name="Type[]" id="" class="form-control" required>
                                            <option value="" selected>Lien familiale</option>
                                            <option value="marie">Marie</option>
                                            <option value="femme">Femme</option>
                                            <option value="enfant">Enfant</option>
                                            <option value="autre">Autres</option>
                                        </select>
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
                    <div id="modifier" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modifier</h4>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('Descendent.modifier') }}" method="post" >                             
                                    @csrf 
                                    <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <input type="tex" class="form-control" placeholder="Noms" id="Noms" name="Noms" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="tex" class="form-control" placeholder="Prénoms" id="Prenoms" name="Prenoms" value="">
                                        </div>

                                        <div class="form-group">
                                            <input type="date" class="form-control" id="DateN" name="DateN" value="">
                                        </div>
                                        <div class="form-group">
                                            <select name="Sexe" id="Sexe" class="form-control" required>
                                                <option value="" selected>Sexe</option>
                                                <option value="homme">Homme</option>
                                                <option value="femme">Femme</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <select name="Type" id="Type" class="form-control" required>
                                            <option value="" selected>Lien familiale</option>
                                            <option value="marie">Marie</option>
                                            <option value="femme">Femme</option>
                                            <option value="enfant">Enfant</option>
                                            <option value="autre">Autres</option>
                                        </select>
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
        </div>  
    </div>
    @endforeach
    <script>
    function editM(id,Noms,Prenoms,DateN,Sexe,Type)
        {
            document.getElementById('id').value = id;
            document.getElementById('Noms').value = Noms;
            document.getElementById('Prenoms').value = Prenoms;
            document.getElementById('Sexe').value = Sexe;
            document.getElementById('DateN').value = DateN;
            document.getElementById('Type').value = Type;
            
        }
    </script>
</x-app-layout>