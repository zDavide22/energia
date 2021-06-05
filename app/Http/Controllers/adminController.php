<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contrattoModel;
use App\Models\letturaModel;
use App\Models\contatoreModel;
use App\Models\bolletteModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class adminController extends Controller
{
    public function table(Request $req)
    {
        if(($req->table)=='clienti'){
            $data = User::all();
            return view('admin.admin',['data'=>$data]);
        }elseif ($req->table=='contratti') {
            $data = contrattoModel::whereNull('idCliente')->paginate(5);
            $data2 = contrattoModel::whereNotNull('idCliente')->paginate(5);
            return view('admin.contrattiad',['data'=>$data,'data2'=>$data2]);
        }elseif ($req->table=='contatore') {
            $data = contatoreModel::paginate(5);
            $letture = letturaModel::select('*')->where('tipo','=','Luce')->paginate(5);
            $lettureG = letturaModel::select('*')->where('tipo','=','Gas')->paginate(5);
            return view('admin.contatoread',['data'=>$data,'letture'=>$letture,'lettureG'=>$lettureG]);
        }elseif ($req->table=='bollette') {
            $data = bolletteModel::paginate(5);
            return view('admin.bollettead',['data'=>$data]);
        }
    }

    public function removeCliente(Request $req)
    {
        $row = User::find($req->id);

        if(!is_null($row)){
            $row->delete();
        }
        return redirect()->route('tabella',['table'=>'clienti']);
    }

    public function updateCliente(Request $req)
    {
        $row = User::find($req->id);
        
        if(!is_null($req->name)){
            $row->name = $req->name;
        }
        if(!is_null($req->cognome)){
            $row->cognome = $req->cognome;
        }
        if(!is_null($req->email)){
            $controllo = User::where([['email','=',$req->email]])->first();
            $utente=User::where([['id','=',$req->id]])->first();
            if (empty($controllo)||$utente->email==$req->email) {
                $row->email = $req->email;
            }else {
                return redirect()->route('tabella',['table'=>'clienti'])->with('error', 'Esiste già un cliente associato a quel indirizzo');
            }
        }
        if(!is_null($req->password)){
            $row->password = Hash::make($req->password);
        }
        if(!is_null($req->telefono)){
            $row->telefono = $req->dataUscita;
        }
        $row->save();
        return redirect()->route('tabella',['table'=>'clienti']);
    }

    //Contratto

    public function removeContratto(Request $req)
    {
        $row = contrattoModel::find($req->id);
        if(!empty($row->idCliente))
        {
            $idC = $row->idC;
            $contatore = contatoreModel::where('id','=',$idC)->get();
            $id= $contatore[0]['id'];
            $cont = contatoreModel::find($id);
            $letture = letturaModel::where('idCont','=',$id)->get();
            if(!is_null($row)){
                $row->delete();
            }
            $bollette = bolletteModel::where('idContatore',$id)->get();
            if (!is_null($bollette)) {
                foreach($bollette as $item)
                {
                    $idB = $item->id;
                    $bol = bolletteModel::find($idB);
                    $bol->delete();
                }
            }
            if (!is_null($letture)) {
                foreach($letture as $item)
                {
                    $idL = $item->id;
                    $let = letturaModel::find($idL);
                    $let->delete();
                }
            }
            $cont->delete();
        }else
        {
            if(!is_null($row)){
                $row->delete();
            }
        }

        return redirect()->route('tabella',['table'=>'contratti']);
    }

    public function updateContratto(Request $req)
    {
        $row = contrattoModel::find($req->id);
        $controllo = contrattoModel::where([['id','=',$req->id]])->get();
        if ($req->tipo=='Gas'&&$controllo[0]['tipo']=='Gas') {
            if(!is_null($req->prezzo)){
                $row->prezzo = $req->prezzo;
            }
            if(!is_null($req->tipo)){
                $row->tipo = $req->tipo;
            }
            if(!is_null($req->categoria)){
                $row->categoria = $req->categoria;
            }
            $row->save();
        }
        elseif ($req->tipo=='Gas'&&$controllo[0]['tipo']=='Luce') {
            $row->kwmassimi = null;
            $row->mcgas = 1;
            if(!is_null($req->prezzo)){
                $row->prezzo = $req->prezzo;
            }
            if(!is_null($req->tipo)){
                $row->tipo = $req->tipo;
            }
            if(!is_null($req->categoria)){
                $row->categoria = $req->categoria;
            }
            $row->save();
        }
        elseif ($req->tipo=='Luce'&&$controllo[0]['tipo']=='Luce') {
            if(!is_null($req->kwmassimi)){
                $row->kwmassimi = $req->kwmassimi;
            }
            if(!is_null($req->prezzo)){
                $row->prezzo = $req->prezzo;
            }
            if(!is_null($req->tipo)){
                $row->tipo = $req->tipo;
            }
            if(!is_null($req->categoria)){
                $row->categoria = $req->categoria;
            }
            $row->save();
        }
        elseif ($req->tipo=='Luce'&&$controllo[0]['tipo']=='Gas') {
            if(!is_null($req->kwmassimi)){
                $row->kwmassimi = $req->kwmassimi;
                $row->mcgas=null;
                if(!is_null($req->prezzo)){
                    $row->prezzo = $req->prezzo;
                }
                if(!is_null($req->tipo)){
                    $row->tipo = $req->tipo;
                }
                if(!is_null($req->categoria)){
                    $row->categoria = $req->categoria;
                }
                $row->save();
            }else {
                return redirect()->route('tabella',['table'=>'contratti'])->with('error', 'Valore kw massimi non inserito');
            }
        }
        else {
            return redirect()->route('tabella',['table'=>'contratti'])->with('error', 'Valori inseriti errati');
        }
        return redirect()->route('tabella',['table'=>'contratti']);
    }

    public function insertContratto(Request $req)
    {
        $insert = new contrattoModel();

        if (!empty($req->prezzo)&&(!empty($req->kwmassimi)||!empty($req->mcgas))) {
            if (($req->tipo=='Luce')&&!is_null($req->kwmassimi)) {
                $insert->kwmassimi = $req->kwmassimi;
                $insert->prezzoKw=$req->prezzo/$req->kwmassimi;
                $insert->prezzo = $req->prezzo;
                $insert->tipo = $req->tipo;
                $insert->categoria = $req->categoria;
                $insert->dataAttivazione = $req->DataAttivazione;
                $insert->save();
            }
            elseif(($req->tipo=='Gas')&&(!is_null($req->mcgas))){
                $insert->mcgas = $req->mcgas;
                $insert->prezzoKw=$req->prezzo/$req->mcgas;
                $insert->prezzo = $req->prezzo;
                $insert->tipo = $req->tipo;
                $insert->categoria = $req->categoria;
                $insert->dataAttivazione = $req->DataAttivazione;
                $insert->save();
            }else {
                return redirect()->route('tabella',['table'=>'contratti'])->with('error', 'Campo errato o non inserito');
            }
        }else {
            return redirect()->route('tabella',['table'=>'contratti'])->with('error', 'Valori mancanti');
        }
        return redirect()->route('tabella',['table'=>'contratti']);
    }

    //Bolletta

    public function removeBolletta(Request $req)
    {
        $row = bolletteModel::find($req->id);

        if(!is_null($row)){
            $row->delete();
        }
        return redirect()->route('tabella',['table'=>'bollette']);
    }

    public function updateBolletta(Request $req)
    {
        $row = bolletteModel::find($req->id);
        
        if(!is_null($req->consumo)){
            $row->consumo = $req->consumo;
        }
        if(!is_null($req->quotavariabile)){
            $row->quotavariabile = $req->quotavariabile;
        }
        if(!is_null($req->data)){
            $row->data = $req->data;
        }
        if(!is_null($req->pagatp)){
            $row->pagato = $req->pagato;
        }
        if(!is_null($req->idContatore)){
            $row->idContatore = $req->idContatore;
        }
        $row->save();
        return redirect()->route('tabella',['table'=>'bollette']);
    }

    public function insertBolletta(Request $req)
    {
        $insert = new bolletteModel();

        $insert->consumo = $req->consumo;
        $insert->quotafissa = $req->quotafissa;
        $insert->quotavariabile = $req->quotavariabile;
        $insert->spesatrasporto = $req->spesatrasporto;
        $insert->pagato = $req->pagato;
        $insert->idContatore = $req->idContatore;
        $insert->save();
        return redirect()->route('tabella',['table'=>'bollette']);
    }

    //Contatore

    public function letturaLuce(Request $req){
        $controllo = letturaModel::where([
            ['idCont','=',$req->idContLuce],
            ['tipo','=','Luce'],
            ['data','=',$req->dataL]
        ])->first();
        if (empty($controllo->data)) {
            if (!empty($req->kw)) {
                $insert = new letturaModel();
                $insert->data=$req->dataL;
                $insert->tipo='Luce';
                $insert->idCont=$req->idContLuce;
                $insert->vLetto=$req->kw;
                $insert->save();
            }
        }else {
            return redirect()->route('tabella',['table'=>'contatore'])->with('error', 'Limite di letture luce sul contatore raggiunto');
        }
        return redirect()->route('tabella',['table'=>'contatore']);
    }

    public function removeLettura(Request $req)
    {
        $row = letturaModel::find($req->id);

        if(!is_null($row)){
            $row->delete();
        }
        return redirect()->route('tabella',['table'=>'contatore']);
    }

    public function lettura(Request $req)
    {
        $controllo = letturaModel::where([
            ['idCont','=',$req->idContGas],
            ['tipo','=','Gas'],
            ['data','=',$req->data]
        ])->first();
        if (empty($controllo->data)) {
            if (!empty($req->gas)) {
                $insert = new letturaModel();
                $insert->data=$req->data;
                $insert->tipo='Gas';
                $insert->idCont=$req->idContGas;
                $insert->vLetto=$req->gas;
                $insert->save();
            }
        }else {
            return redirect()->route('tabella',['table'=>'contatore'])->with('error', 'Limite di letture gas sul contatore raggiunto');
        }
        return redirect()->route('tabella',['table'=>'contatore']);
    }
}