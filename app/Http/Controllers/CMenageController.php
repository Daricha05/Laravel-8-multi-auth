<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Menage;
use Illuminate\Http\Request;

class CMenageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Menage::latest()->paginate(25);
        return view('chef.index',compact('chefs'));
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
            'Noms'      => 'required',
            'Sexe'      => 'required',
            'Prenoms'   => 'required',
            'DateN'     => 'required',
            'Origine'   => 'required',
            'Fonction'  => 'required',
        ]);

        Menage::create($request->all());

        return redirect()->route('ChefM.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CMenage  $cMenage
     * @return \Illuminate\Http\Response
     */
    public function show(CMenage $cMenage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CMenage  $cMenage
     * @return \Illuminate\Http\Response
     */
    public function edit(CMenage $cMenage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CMenage  $cMenage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CMenage $cMenage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CMenage  $cMenage
     * @return \Illuminate\Http\Response
     */
    public function liste($id)
    {
        $menages = DB::table('menages')
                    ->where('id','=',$id)
                    ->get();

        $descendents =  DB::table('descendents')
                            ->where('ChefM_id','=',$id)
                            ->get();

        return view('chef.liste',compact('menages','descendents'));
    }
    public function destroy($id)
    {
      Menage::where('id',$id)->delete();
      return back();  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CMenage  $cMenage
     */
    public function modifier(Request $request)
    {
       
       $request->validate([
            'ChefM_id'  => 'required',
            'Noms'      => 'required',
            'Prenoms'   => 'required',
            'Sexe'      => 'required',
            'DateN'     => 'required',
            'Origine'   => 'required',
            'Fonction'  => 'required',
        ]);
        
        $datasave =[
            'Noms'      => $request->Noms,
            'Prenoms'   => $request->Prenoms,
            'Sexe'      => $request->Sexe,
            'DateN'     => $request->DateN,
            'Origine'   => $request->Origine,
            'Fonction'  => $request->Fonction,
        ];
        $id = $request->ChefM_id;

        Menage::where('id',$id)->update($datasave);

        return back();
        
    }

    public function chercher(Request $request)
    {
        $mot_cle = $request->chefM_chercher;
        $chefs = Menage::where('Noms','LIKE',"%".$mot_cle."%")
                        ->paginate(25);
        return view('chef.index',compact('chefs'));

    }
}
