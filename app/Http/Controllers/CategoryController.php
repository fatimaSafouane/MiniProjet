<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;

use Illuminate\Http\Request;
use App\Category;
use App\Produit;
use App\Http\Requests\categoryRequest;
use Auth;

class CategoryController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth');
    }
      
    //Lister les categories
    public function index(){
           $listcategory = Category::all();
      
        
        


        return view('category.index',['categories'=>$listcategory]);
    }

    public function dashboard(){
    
 
   
   


   return view('dashboard');
}


    //Afficher le formulaire de creation des category
    public function create(){
     
         return view("category.create");
        
    }
    //Enregistrer un category
    public function store(categoryRequest $request){
        $category=new category();
        $category->titre= $request->input('titre');
        $category->presentation= $request->input('presentation');
      //  $category->user_id=Auth::user()->id;
        
        if($request->hasFile('photo')){
            //$category->photo =  $request->input('photo')->store('image');
          $category->photo = $request->photo->store('image');
        }

        
       $category->save();

      session()->flash('success','le category a etait bien enregistrer ');

       return redirect('categories');
    }
    //permet de recuperer un category et le mettre dans le formulaire
    public function edit($id){
        $category= category::find($id);
      //  $this->authorize('update', $category);


        return view('category.edit', ['category' => $category]);
        
    }
    //permet de modifier un category
    public function update(categoryRequest $request,$id){
        $category= category::find($id);
      //  $this->authorize('update', $category);

        $category->titre= $request->input('titre');
        $category->presentation= $request->input('presentation');

        if($request->hasFile('photo')){
          $category->photo = $request->photo->store('image');
        }
       $category->save();
       session()->flash('modifier','le category a etait bien modifier ');
       return redirect('categories');
    }

    public function show($id){
      
       
        return view('category.show',['id' => $id]);
     }


    //permet de supprimer une category 
    public function destroy(Request $request,$id){
      
       $category= category::find($id);
      // $this->authorize('delete', $category);
       $category->delete();
       return redirect('categories');
    }

//Produits
    
public function getData($id){
  $category = Category::find($id);
   $produits = $category->produits()->orderBy('updated_at','desc')->get();   
  
   return Response()->json([
           'produits' =>  $produits,
         
    
          
      

   ]);

}
public function addProduit(Request $request){
  
  $Produit= new Produit;
  $Produit->titre = $request->titre;
  $Produit->category_id = $request->category_id;
  $Produit->description = $request->description;
  $Produit->price = $request->price;

  $Produit->save();
  return Response()->json(['etat'=> true, 'id'=>$Produit->id]);

   
}

public function updateProduit(Request $request){
  $Produit= Produit::find($request->id);
  
  $Produit->titre = $request->titre;
  $Produit->category_id= $request->category_id;
  $Produit->description = $request->description;
  $Produit->price = $request->price;

  $Produit->save();
  return Response()->json(['etat'=> true]);

   
}

public function deleteProduit( $id){
  $Produit = Produit::find($id);
  
  $Produit->delete();
  return Response()->json(['etat'=> true]);

   
}


}
