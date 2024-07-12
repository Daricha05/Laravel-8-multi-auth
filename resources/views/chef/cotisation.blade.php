<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-100 mx-auto mt-2">
                        <div class="col-lg-12 col-xl-12">
                            <div class="sub-title">Cotisations de cet année</div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs  tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#liste" role="tab">Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#nouvel" role="tab">Nouvel</a>
                                </li>
                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs card-block">
                                <div class="tab-pane active" id="liste" role="tabpanel">
                                    <div class="w-100 mx-auto">
                                        <div class="pcoded-search col-sm-4 p-0">
                                            <span class="searchbar-toggle">  </span>
                                            <div class="pcoded-search-box ">
                                                <form action="{{ route('chef_cotisation.chercher') }}" method="post">
                                                    @csrf
                                                    <div class="form-row">
                                                       
                                                        <div class="col-xs-3 col-sm-6 col-md-4 col-lg-3 mt-1">
                                                            <input type="text" class="form-control p-2 text-center" name="annee" id="" value="{{ Date('Y') }}" required>
                                                        </div>

                                                        <div class="col mt-1">
                                                            <div class="form-group">
                                                                <input type="text" name="chef_cotisation" placeholder="Rechercher par nom" required>
                                                                <button type="submit" class="search-icon"><i class="ti-search"></i></button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-100 mx-auto table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-inverse">
                                                <tr>
                                                    <th class="align-middle" rowspan="2">Noms et prénoms</th>
                                                    <th class="text-center" colspan="3">COTISATIONS</th>
                                                </tr>
                                                <tr>
                                                    <th>Mois</th>
                                                    <th>Somme payée</th>
                                                    <th>Date de paiement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $Gsomme = 0; ?>
                                                @foreach($menages as $menage)
                                                <?php $somme="0"; ?>
                                                    <tr>
                                                        <td class="align-middle font-weight-bold">
                                                            - {{ $menage->Noms." ".$menage->Prenoms }}
                                                        </td>
                                                        <td>
                                                            @foreach($cotisations as $cotisation)
                                                                @if($cotisation->id_chef == $menage->id)
                                                                    - {{ $cotisation->mois }} <br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($cotisations as $cotisation)
                                                                @if($cotisation->id_chef == $menage->id)
                                                                    {{ $cotisation->montant." Ar" }} <br>
                                                                    <?php $somme += $cotisation->montant ; ?>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($cotisations as $cotisation)
                                                                @if($cotisation->id_chef == $menage->id)
                                                                    {{ $cotisation->date_de_paiement }} <br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php $Gsomme += $somme; ?>
                                                @endforeach
                                                    <tr>
                                                        <td class="borderless"></td>
                                                        <td class="borderless"></td>
                                                        <th>{{ $Gsomme }} Ar</th>
                                                        <td class="borderless"></td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--pagination-->
                                    <div class="d-flex justify-content-center pagination-sm">
                                            {!!$menages->links('pagination::bootstrap-4')!!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="nouvel" role="tabpanel">
                                    <form action="{{ route('Cotisation.store') }}" method="post">
                                    @csrf
                                    <!--id_chef-->
                                        <div class="form-group">
                                            <select name="id_chef" id="" class="form-control" required>
                                                <option value="">Sélectionnez un chéf de ménage</option>
                                                @foreach($menages as $menage) 
                                                    <option value="{{ $menage->id }}">{{ $menage->Noms." ".$menage->Prenoms }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!--Mois-->
                                        <div class="form-group">
                                            <select name="mois[]" id="" class="form-control" required>
                                                <option value=""> <span class="text-muted">Mois</span> </option>
                                                <option value="Janvier">Janvier</option>
                                                <option value="Fevrier">Février</option>
                                                <option value="Mars">Mars</option>
                                                <option value="Avril">Avril</option>
                                                <option value="Mai">Mai</option>
                                                <option value="Juin">Juin</option>
                                                <option value="Juillet">Juillet</option>
                                                <option value="Aout">Août</option>
                                                <option value="Septembre">Septembre</option>
                                                <option value="Octobre">Octobre</option>
                                                <option value="Novembre">Novembre</option>
                                                <option value="Decembre">Décembre</option>
                                            </select>
                                        </div>

                                        <!--Année-->
                                            <input type="hidden" name="annee[]" value="{{ Date('Y') }}">
                                        <!--Montant-->
                                            <div class="form-group">
                                                <input type="text" name="montant[]" id="" class="form-control" placeholder="Montant" required>
                                            </div>
                                        <!--Date de paiement-->
                                            <div class="form-group">
                                                <input type="date" name="date_de_paiement[]" id="" class="form-control" required>
                                            </div>
                                        <!--Bouton de soumision-->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Enregister</button>
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
</x-app-layout>