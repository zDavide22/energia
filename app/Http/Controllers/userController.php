<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\contrattoModel;
use App\Models\contatoreModel;
use App\Models\bolletteModel;
use App\Models\letturaModel;
use Illuminate\Support\Facades\Auth;
use PDF;
class userController extends Controller
{
    public function luce()
    {
        $contratto = contrattoModel::where([
            ['tipo','=','Luce'],
            ['categoria','=','Clienti']
        ])->whereNull(['idCliente'])->get();
        return view('user.luce',['contratti'=>$contratto]);
    }

    public function attiva(Request $req)
    {
        $user = Auth::user()->email;
        $id = User::where('email','=',$user)->get();
        $contratto = contrattoModel::where('id','=',$req->id)->get();
        return view('user.attivati',['contratto'=>$contratto,'idCliente'=>$id]);
    }

    public function gas()
    {
        $contratto = contrattoModel::where([
            ['tipo','=','Gas'],
            ['categoria','=','Clienti']
        ])->whereNull(['idCliente'])->get();
        return view('user.gas',['contratti'=>$contratto]);
    }

    public function removeContratto(Request $req)
    {
        $idContratto = $req->id;
        $row = contrattoModel::where('id',$idContratto);
        $con = contrattoModel::where('id',$idContratto)->first();
        $idContatore = $con->idC;
        $contatore = contatoreModel::where('id','=',$idContatore);
        $letture = letturaModel::where('idCont','=',$idContatore)->get();
        if(!is_null($row)){
            $row->delete();
        }
        $bollette = bolletteModel::where('idContatore',$idContatore)->get();
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
        $contatore->delete();
        $user = Auth::user()->email;
        $id = User::where('email','=',$user)->get();
        $data=contrattoModel::where([
            ['idCliente','=',$id[0]['id']]
        ])->get();
        $idCliente=$id[0]['id'];
        $contratto = contrattoModel::where([['idCliente',$idCliente]])->first();
        if (!empty($contratto)) {
            $contatore = $contratto->idC;
            $letture = letturaModel::select('vLetto')->where([['idCont','=',$contatore],['tipo','=','Luce']])->pluck('vLetto')->toArray();
            $date = letturaModel::select('data')->where([['idCont','=',$contatore],['tipo','=','Luce']])->pluck('data')->toArray();
            $lettureG = letturaModel::select('vLetto')->where([['idCont','=',$contatore],['tipo','=','Gas']])->pluck('vLetto')->toArray();
            $dateG = letturaModel::select('data')->where([['idCont','=',$contatore],['tipo','=','Gas']])->pluck('data')->toArray();
        }else{
            $letture=0;
            $lettureG=0;
            $date="";
            $dateG="";
        }
        return view('user.contratti',['data'=>$data,'letture'=>$letture,'date'=>$date,'lettureG'=>$lettureG,'dateG'=>$dateG]);
    }
    public function bolletta(Request $req)
    {
        $insert = new bolletteModel();
        $id = $req->id;
        $contratto = contrattoModel::where('id','=',$id)->first();
        $idCont=$contratto->idC;
        $idCliente=$contratto->idCliente;
        if($req->mese==0)
        {
            $mese='Gennaio';
            $date=$req->anno."-01-31";
        }
        if($req->mese==1)
        {
            $mese='Febbraio';
            $date=$req->anno."-02-28";
        }
        if($req->mese==2)
        {
            $mese='Marzo';
            $date=$req->anno."-03-31";
        }
        if($req->mese==3)
        {
            $mese='Aprile';
            $date=$req->anno."-04-30";
        }
        if($req->mese==4)
        {
            $mese='Maggio';
            $date=$req->anno."-05-31";
        }
        if($req->mese==5)
        {
            $mese='Giugno';
            $date=$req->anno."-06-30";
        }
        if($req->mese==6)
        {
            $mese='Luglio';
            $date=$req->anno."-07-31";  
        }
        if($req->mese==7)
        {
            $mese='Agosto';
            $date=$req->anno."-08-31";
        }
        if($req->mese==8)
        {
            $mese='Settembre';
            $date=$req->anno."-09-30";
        }
        if($req->mese==9)
        {
            $mese='Ottobre';
            $date=$req->anno."-10-31";
        }
        if($req->mese==10)
        {
            $mese='Novembre';
            $date=$req->anno."-11-30";
        }
        if($req->mese==11)
        {
            $mese='Dicembre';
            $date=$req->anno."-12-31";
        }
        $controllo = bolletteModel::where([['idContatore','=',$idCont],['idCliente','=',$idCliente],['mese','=',$mese],['data','=',$date]])->get();
        $giorno = $req->data;
        if (count($controllo)==0 && $giorno==$date) {
            $lettura = letturaModel::where('idCont','=',$idCont)->get();
        $insert->mese=$mese;
        $consumo=1;
        if (!empty($lettura[0]['vLetto'])) {
            foreach ($lettura as $item) {
                $consumo += $item->vLetto;
            }
            if (!is_null($consumo)) {
                $insert->consumo=$consumo;
            }
        }else {
            $insert->consumo=1;
        }
        $insert->quotafissa=20;
        $insert->quotavariabile=$contratto->prezzoKw*$consumo;
        $insert->spesatrasporto=25;
        $insert->totale=($contratto->prezzoKw*$consumo)+20+25;
        if ($req->tipo=='Gas') {
            $insert->data=$req->data;
        }else {
            $insert->data=$req->data;
        }
        $insert->pagato=false;
        $insert->tipo=$req->tipo;
        $insert->idContatore=$idCont;
        $insert->idCliente=$idCliente;
        $insert->save();
        if (!empty($lettura[0]['vLetto'])) {
            $lettura = letturaModel::where('idCont','=',$idCont);
            if ($lettura->count()>0) {
                $lettura->delete();
            }
        }
        }
        $data=bolletteModel::where('idCliente','=',$idCliente)->orderBy('pagato', 'asc')->get();
        return view('user.bolletta',['data'=>$data]);
    }

    public function bollettaPag(Request $req)
    {
        $data = bolletteModel::where('id','=',$req->id)->first();
        $idCliente = $data->idCliente;
        $idContatore = $data->idContatore;
        $cliente = User::where('id','=',$idCliente)->first();
        $contatore= contatoreModel::where('id','=',$idContatore)->first();
        $contratto= contrattoModel::where('idC','=',$idContatore)->first();
        return view('user.pagamento',['data'=>$data,'cliente'=>$cliente,'contatore'=>$contatore,'contratto'=>$contratto]);
    }

    public function vedi(Request $req)
    {
        $data = bolletteModel::where('id','=',$req->id)->first();
        $idCliente = $data->idCliente;
        $idContatore = $data->idContatore;
        $cliente = User::where('id','=',$idCliente)->first();
        $contatore= contatoreModel::where('id','=',$idContatore)->first();
        $contratto= contrattoModel::where('idC','=',$idContatore)->first();
        return view('user.vedi',['data'=>$data,'cliente'=>$cliente,'contatore'=>$contatore,'contratto'=>$contratto]);
    }

    public function contratti(Request $req)
    {
        $cliente = contrattoModel::find($req->idContratto);
        $controllo=contrattoModel::where([
            ['indirizzo','=',$req->indirizzo],
            ['tipo','=',$cliente->tipo]
        ])->first();
        if(is_null($controllo))
        {
            $row = new contrattoModel();
            if(!is_null($cliente->kwmassimi)){
                $row->kwmassimi = $cliente->kwmassimi;
            }
            if(!is_null($cliente->mcgas)){
                $row->mcgas = $cliente->mcgas;
            }
            if(!is_null($cliente->prezzo)){
                $row->prezzo = $cliente->prezzo;
            }
            if(!is_null($cliente->prezzoKw)){
                $row->prezzoKw = $cliente->prezzoKw;
            }
            if(!is_null($cliente->tipo)){
                $row->tipo = $cliente->tipo;
                if ($cliente->tipo=='Luce') {
                    $insert = new contatoreModel();
                    $insert->POD = generateRandomString($cliente->tipo);
                    $insert->Modello = 'Modello '.$req->idContratto;
                    $insert->Tipo = $cliente->tipo;
                }else {
                    $insert = new contatoreModel();
                    $insert->PDR = generateRandomString($cliente->tipo);;
                    $insert->Modello = 'Modello '.$req->idContratto;
                    $insert->Tipo = $cliente->tipo;
                }
                $insert->save();
                $idCont = contatoreModel::max('id');
            }
            if(!is_null($idCont)){
                $row->idC = $idCont;
            }
            if(!is_null($cliente->categoria)){
                $row->categoria = $cliente->categoria;
            }
            if(!is_null($req->idCliente)){
                $row->idCliente = $req->idCliente;
            }
            $row->indirizzo = $req->indirizzo;
            if(!is_null($req->citta)){
                $row->citta = $req->citta;
            }
            if(!is_null($req->cap)){
                $row->cap = $req->cap;
            }
            if(!is_null($req->data)){
                $row->dataAttivazione = $req->data;
            }
            $row->save();
        }else{
            if ($cliente->tipo=='Luce') {
                return redirect()->route('luce')->with('error', 'Esiste già un servizio attivo associato a quel indirizzo');
            }else {
                return redirect()->route('gas')->with('error', 'Esiste già un servizio attivo associato a quel indirizzo');
            }
        }
        $data=contrattoModel::where([
            ['idCliente','=',$req->idCliente]
        ])->get();
        $contratto = contrattoModel::where([['idCliente',$req->idCliente]])->first();
        $contatore = $contratto->idC;
        if($contratto->tipo == 'Luce')
        {
            $letture = letturaModel::select('vLetto')->where([['idCont','=',$contatore],['tipo','=','Luce']])->pluck('vLetto')->toArray();
            $date = letturaModel::select('data')->where([['idCont','=',$contatore],['tipo','=','Luce']])->pluck('data')->toArray();
            $conGas = contrattoModel::select('idC')->where([['idCliente','=',$req->idCliente],['tipo','=','Gas']])->first();
            if (!empty($conGas)) {
                $idCont = $conGas->idC;
                $lettureG = letturaModel::select('vLetto')->where([['idCont','=',$idCont],['tipo','=','Gas']])->pluck('vLetto')->toArray();
                $dateG = letturaModel::select('data')->where([['idCont','=',$idCont],['tipo','=','Gas']])->pluck('data')->toArray();
            } else {
                $lettureG =0;
                $dateG=0;
            }
        }else{
            $lettureG = letturaModel::select('vLetto')->where([['idCont','=',$contatore],['tipo','=','Gas']])->pluck('vLetto')->toArray();
            $dateG = letturaModel::select('data')->where([['idCont','=',$contatore],['tipo','=','Gas']])->pluck('data')->toArray();
            $conLuce = contrattoModel::select('idC')->where([['idCliente','=',$req->idCliente],['tipo','=','Gas']])->first();
            if (!empty($conLuce)) {
                $idCont = $conLuce->idC;
                $letture = letturaModel::select('vLetto')->where([['idCont','=',$idCont],['tipo','=','Luce']])->pluck('vLetto')->toArray();
                $date = letturaModel::select('data')->where([['idCont','=',$idCont],['tipo','=','Luce']])->pluck('data')->toArray();
            } else {
                $letture =0;
                $date=0;
            }
        }
        return view('user.contratti',['data'=>$data,'letture'=>$letture,'date'=>$date,'lettureG'=>$lettureG,'dateG'=>$dateG]);
    }

    public function contrattiview()
    {
        $user = Auth::user()->email;
        $id = User::where('email','=',$user)->get();
        $data=contrattoModel::where([
            ['idCliente','=',$id[0]['id']]
        ])->get();
        $idCliente=$id[0]['id'];
        $contratto = contrattoModel::where([['idCliente',$idCliente]])->first();
        if (!empty($contratto->idC)) {
            $contatore = $contratto->idC;
            if($contratto->tipo == 'Luce')
            {
                $letture = letturaModel::select('vLetto')->where([['idCont','=',$contatore],['tipo','=','Luce']])->pluck('vLetto')->toArray();
                $date = letturaModel::select('data')->where([['idCont','=',$contatore],['tipo','=','Luce']])->pluck('data')->toArray();
                $conGas = contrattoModel::select('idC')->where([['idCliente','=',$idCliente],['tipo','=','Gas']])->first();
                if (!empty($conGas)) {
                    $idCont = $conGas->idC;
                    $lettureG = letturaModel::select('vLetto')->where([['idCont','=',$idCont],['tipo','=','Gas']])->pluck('vLetto')->toArray();
                    $dateG = letturaModel::select('data')->where([['idCont','=',$idCont],['tipo','=','Gas']])->pluck('data')->toArray();
                } else {
                    $lettureG =0;
                    $dateG=0;
                }
            }else{
                $lettureG = letturaModel::select('vLetto')->where([['idCont','=',$contatore],['tipo','=','Gas']])->pluck('vLetto')->toArray();
                $dateG = letturaModel::select('data')->where([['idCont','=',$contatore],['tipo','=','Gas']])->pluck('data')->toArray();
                $conLuce = contrattoModel::select('idC')->where([['idCliente','=',$idCliente],['tipo','=','Gas']])->first();
                if (!empty($conLuce)) {
                    $idCont = $conLuce->idC;
                    $letture = letturaModel::select('vLetto')->where([['idCont','=',$idCont],['tipo','=','Luce']])->pluck('vLetto')->toArray();
                    $date = letturaModel::select('data')->where([['idCont','=',$idCont],['tipo','=','Luce']])->pluck('data')->toArray();
                } else {
                    $letture =0;
                    $date=0;
                }
            }
        } else {
            $letture = 0;
            $date = "";
            $lettureG = 0;
            $dateG = "";
        }
        
        return view('user.contratti',['data'=>$data,'letture'=>$letture,'date'=>$date,'lettureG'=>$lettureG,'dateG'=>$dateG]);
    }

    public function paga(Request $req){
        $bolletta = bolletteModel::find($req->id);
        $bolletta->pagato=true;
        $bolletta->save();
        $user = Auth::user()->email;
        $id = User::where('email','=',$user)->get();
        $idu = $id[0]['id'];
        $data=bolletteModel::where([['idCliente','=',$idu]])->get();
        return view('user.bolletta',['data'=>$data]);
    }

    public function indietro(Request $req)
    {
        $user = Auth::user()->email;
        $id = User::where('email','=',$user)->get();
        $idu = $id[0]['id'];
        $data=bolletteModel::where([['idCliente','=',$idu]])->orderBy('pagato', 'asc')->get();
        return view('user.bolletta',['data'=>$data]);
    }

    public function letturaGrafico(Request $req)
    {
        if (!empty($req->dataG)) {
            $data = $req->dataG;
        } else {
            $data = $req->dataGas;
        }
        
        if (!empty($req->idC)) {
            $idContatore=$req->idC;
            $controllo = letturaModel::where([['idCont','=',$idContatore],['data','=',$data]])->get();
            if (count($controllo)==0&& $req->tipo=='Luce') {
                if (!empty($idContatore)) {
                    $insert = new letturaModel();
                    $insert->vLetto=rand(20,40);
                    $insert->tipo=$req->tipo;
                    $insert->data = $req->dataG;
                    $insert->idCont = $req->idC;
                    $insert->save();
                }
            }
            if (count($controllo)==0&& $req->tipo=='Gas') {
                if(!empty($req->mcgas))
                {
                    $insert = new letturaModel();
                    $insert->vLetto = $req->mcgas;
                    $insert->tipo=$req->tipo;
                    $insert->data = $req->dataGas;
                    $insert->idCont = $req->idC;
                    $insert->save();
                }else {
                    $insert = new letturaModel();
                    $insert->vLetto = rand(5000,7100)/1000;
                    $insert->tipo=$req->tipo;
                    $insert->data = $req->dataGas;
                    $insert->idCont = $req->idC;
                    $insert->save();
                }
            }
            else {
                if (!empty($req->mcgas)) {
                    return redirect()->route('myContratti')->with('error', 'Limite di letture giornaliere raggiunto');
                }
            }
            $letture = letturaModel::select('vLetto')->where([['idCont','=',$idContatore],['tipo','=','Luce']])->pluck('vLetto')->toArray();
            $date = letturaModel::select('data')->where([['idCont','=',$idContatore],['tipo','=','Luce']])->pluck('data')->toArray();
            $lettureG = letturaModel::select('vLetto')->where([['idCont','=',$idContatore],['tipo','=','Gas']])->pluck('vLetto')->toArray();
            $dateG = letturaModel::select('data')->where([['idCont','=',$idContatore],['tipo','=','Gas']])->pluck('data')->toArray();
        }else {
            $letture = "";
            $date="";
            $lettureG="";
            $dateG="";
        }
        $user = Auth::user()->email;
            $id = User::where('email','=',$user)->get();
            $data=contrattoModel::where([
                ['idCliente','=',$id[0]['id']]
            ])->get();
        return view('user.contratti',['data'=>$data,'letture'=>$letture,'date'=>$date,'lettureG'=>$lettureG,'dateG'=>$dateG]);
    }

    public function scarica(Request $req)
    {
        $data = bolletteModel::where('id','=',$req->id)->first();
        $idCliente = $data->idCliente;
        $idContatore = $data->idContatore;
        $cliente = User::where('id','=',$idCliente)->first();
        $contatore= contatoreModel::where('id','=',$idContatore)->first();
        $contratto= contrattoModel::where('idC','=',$idContatore)->first();
        $dataI = [
            'data'=>$data,
            'cliente'=>$cliente,
            'contatore'=>$contatore,
            'contratto'=>$contratto
        ];
          
        view()->share('dataI',$dataI);
        	// pass view file
            $pdf = PDF::loadView('pdf'); 
            // download pdf
            return $pdf->download('bolletta '.$data->data.'.pdf');
    }
}

function generateRandomString($tipo) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    if ($tipo=='Luce') {
        $randomString = 'IT001E';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    }
    else {
        $randomString = '';
        for ($i = 0; $i < 14; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    }
    return $randomString;
}
