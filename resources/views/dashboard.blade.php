<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
<?php

$caisse = DB::table('cotisations')
                ->where('annee',Date('Y'))
                ->sum('montant');

$chef_Homme = DB::table('menages')
                ->where('Sexe','homme')
                ->count();

$chef_femme = DB::table('menages')
                ->where('Sexe','femme')
                ->count();

$desc_Homme = DB::table('descendents')
                ->where('Sexe','homme')
                ->count();

$desc_Femme = DB::table('descendents')
                ->where('Sexe','femme')
                ->count();
$desc_Homme_Mineur = DB::table('descendents')
    ->where('Sexe','homme')
    ->where('statut','mineur')
    ->count();
$desc_Femme_Mineur = DB::table('descendents')
    ->where('Sexe','femme')
    ->where('statut','mineur')
    ->count();


$Homme = $chef_Homme+$desc_Homme;
$Femme = $chef_femme+$desc_Femme;
?>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                
                <div class="row">
                <div class="col-md-6 col-xl-3 ">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-money bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Caisse</span>
                            <h4>{{ $caisse }} Ar</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Annuel
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-ui-user bg-c-green card1-icon"></i>
                            <span class="text-c-green f-w-600">Membre</span>
                            <h4>{{ $chef_Homme+$chef_femme+$desc_Homme+$desc_Femme }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-green f-16 icofont icofont-warning m-r-10"></i>Global
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-user-male bg-c-yellow card1-icon"></i>
                            <span class="text-c-yellow f-w-600">Homme</span>
                            <h4>{{ $desc_Homme_Mineur.' / '.$Homme }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-yellow f-16 icofont icofont-user-male m-r-10"></i>Mineur/Global
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="icofont icofont-user-female bg-c-pink card1-icon"></i>
                            <span class="text-c-pink f-w-600">Femme</span>
                            <h4>{{ $desc_Femme_Mineur.' / '.$Femme }}</h4>
                            <div>
                                <span class="f-left m-t-10 text-muted">
                                    <i class="text-c-pink f-16 icofont icofont-user-female m-r-10"></i>Mineure/Global
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
