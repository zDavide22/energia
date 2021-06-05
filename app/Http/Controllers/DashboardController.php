<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        
        if(Auth::user()->hasRole('user')){
            $data=User::all(); 
            return view('user.user',['data'=>$data]);
        }elseif(Auth::user()->hasRole('admin')){
            $data=User::all(); 
            return view('admin.admin',['data'=>$data]);
        }
        elseif(Auth::user()->hasRole('imprese')){   
            $data=User::all(); 
            return view('imprese.impresa',['data'=>$data]);
        }
    }
}
