<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Food;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user() 
    {
        $data=user::all();
        return view("admin.users",compact("data") );
    }
    
    public function destroy($id)
    {
        echo "ID de l'utilisateur à supprimer : " . $id;
        $data = user::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back();
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            // Par exemple, afficher un message d'erreur ou rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
    }

    public function foodmenu()
    {
        return view("admin.foodmenu");
    }
    public function uploadfood( Request $request)
    {
        $data=new food;
        $image=$request->image;
        $imagename =time(). '.'.$image->getClientOriginalExtension();
         $request->image->move('foodimage',$imagename);
         $data->image=$imagename;
         $data->title=$request->title;
         $data->price=$request->price;
         $data->description=$request->description;
         $data->save();
         return redirect()->back();

    }
   
}
