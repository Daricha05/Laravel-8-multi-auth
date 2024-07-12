<?php

namespace App\Http\Controllers;

use App\Models\Cotisation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menages = DB::table('menages')
                        ->paginate(5);

        $cotisations = Cotisation::where('annee',Date('Y'))
                                    ->get();

        return view('chef.cotisation',compact('menages','cotisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_chef'           => 'required',
            'mois'              => 'required',
            'annee'             => 'required',
            'montant'           => 'required',
            'date_de_paiement'  => 'required',
        ]);

        $id_chef            = $request->id_chef ;
        $mois               = $request->mois ;
        $annee              = $request->annee ;
        $montant            = $request->montant ;
        $date_de_paiement   = $request->date_de_paiement ;

        for($i = 0; $i < count($mois) ;$i++)
        {
            $datasave = [
                'id_chef' => $id_chef ,
                'mois' => $mois[$i] ,
                'annee' => $annee[$i] ,
                'montant' => str_replace(['.',',',' '],['','',''],$montant[$i]),
                'date_de_paiement' => $date_de_paiement[$i] ,
            ];

            Cotisation::create($datasave);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function show(Cotisation $cotisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotisation $cotisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotisation $cotisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotisation $cotisation)
    {
        //
    }

    public function chercher(Request $request)
    {
        $annee = $request->annee ;
        $mot_cle = $request->chef_cotisation ;

        $menages = DB::table('menages')
                    ->where('Noms','LIKE',"%".$mot_cle."%")
                    ->paginate(5);

        $cotisations = Cotisation::where('annee',$annee)
                            ->get();

        return view('chef.cotisation',compact('menages','cotisations'));
    }
}
