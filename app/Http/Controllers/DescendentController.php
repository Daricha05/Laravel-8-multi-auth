<?php

namespace App\Http\Controllers;

use App\Models\Descendent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescendentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'ChefM_id'  => 'required',
            'Noms'      => 'required',
            'Type'      => 'required',
            'Sexe'      => 'required',
            'DateN'     => 'required',
       ]);

       $ChefM_id    = $request->ChefM_id;
       $Noms        = $request->Noms;
       $Prenoms     = $request->Prenoms;
       $Type        = $request->Type;
       $Sexe        = $request->Sexe;
       $DateN       = $request->DateN;

       for($i = 0 ; $i< count($Noms);$i++)
        {
            $date = Date('Ymd');
            $dateN = str_replace('-','',$DateN[$i]);

            $value = $date - $dateN;
            
            if($value >= 180000)
            {
                $statut = 'majeur';
            }else{
                $statut = 'mineur';
            }

           $datasave = [
            'ChefM_id'  => $ChefM_id,
            'Noms'      => $Noms[$i],
            'Prenoms'   => $Prenoms[$i],
            'Type'      => $Type[$i],
            'Sexe'      => $Sexe[$i],
            'DateN'     => $DateN[$i],
            'statut'    => $statut,
           ];

            Descendent::create($datasave);
       }
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Descendent  $descendent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Descendent  $descendent
     * @return \Illuminate\Http\Response
     */
    public function edit(Descendent $descendent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Descendent  $descendent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }
    public function modifier(Request $request)
    {
        $request->validate([
            'id'        => 'required',
            'Noms'      => 'required',
            'Type'      => 'required',
            'Sexe'      => 'required',
            'DateN'     => 'required',
        ]);
        
        $datasave =[
            'Noms'      => $request->Noms,
            'Prenoms'   => $request->Prenoms,
            'Sexe'      => $request->Sexe,
            'DateN'     => $request->DateN,
            'Type'      => $request->Type,
        ];

        $id = $request->id;

        Descendent::where('id',$id)->update($datasave);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Descendent  $descendent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Descendent::where('id',$id)->delete();
      return back(); 
    }

    public function dmajeur()
    {
        $descendents = Descendent::all();

        $notifications = DB::table('notifications')
                            ->where('etat','pas_encore_vue')
                            ->get();       
        

        return view('chef.dmajeur',compact('descendents','notifications'));

        
    }
}
