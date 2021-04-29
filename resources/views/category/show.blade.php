@extends('layouts.app')

@section('content')
<div class="content" id="app" >
        <div class="container-fluid">


    <div class="row">
        <div class=" col-md-8  mx-auto   ">



        <div class="card">
                <div class="card-header card-header-primary">
                
                  <h4 class="card-title">les produits</h4>
                  <p class="card-category"></p>
                  <div class="text-right">
                 
                
                
                 <button  class="btn btn-primary " @click="open.produit =true">Ajouter</button>
              
                 </div>
                </div>
                <div class="card-body">






            
            <div  v-if="open.produit">
          
            <form v-on:submit.prevent="validateForm('formEx')" data-vu-scope="formEx">
           

                <div class="form-group">
                <label for="" class="bmd-label-floating">Titre</label>
                <input type="text"  v-validate="'required'" name="titre" class="form-control"v-model="produit.titre">
                <span v-show="errors.has('titre')">@{{ errors.first('titre') }}</span>
            </div>

            <div class="form-group">
               <label for="">description</label>
               <textarea   v-validate="'required|min:2'" name="description" class="form-control" v-model="produit.description"></textarea>
               <span v-show="errors.has('description')">@{{ errors.first('description') }}</span>

            </div>

            <div class="form-group">
               <label for="">price</label>
               <input v-validate="'required|min:2'" name="price" class="form-control" v-model="produit.price">
               <span v-show="errors.has('price')">@{{ errors.first('price') }}</span>

            </div>
            Variantes
          
            <br>
            <br>
            <div >

            <input type="checkbox" @click="vareity"  id="1" >
            <label for="1" > This product has multiple options, like different sizes or colors</label><br>
              <div id="text" style="display:none" >
             
              <div class="row"  >
             
              <!-- v-for="(formul, k) in formuls" :key="k"     v-model="formul.p"  v-model="formul.textarea "-->
              <div class="col-md-12" >
                        <div class="form-group" >
                        <label> Options:</label>
                        </div>
                        </div>
                       <div class="col-md-4" >
                        <div class="form-group" >
                    
                        <input  class="form-control" style="  border: 1px solid #ccc;">
        
                        </div>
                      </div>
                      <div class="col-md-8">
                     
                        <div class="form-group" >
                        <input v-model="newtodo"      @keyup.enter="addTodo"  class="form-control" v-validate="'required'" style="  border: 1px solid #ccc;">
                          <li  v-for="(todo, index) in todos" :key="index"  class="form-control"    style="block: red;">@{{todo.name}}
                          <i  class="fas fa-times  pull-right " @click="deleteTodo(index)"></i> 
                         </li>
                         
                        </div>
                      </div>
                     

                    </div>
               


               
                    <div class="row" v-if="open.form" >

                    
                       <div class="col-md-4"   >
                       
                        <div class="form-group" >
                      
                     <input  class="form-control" style="  border: 1px solid #ccc;">
        
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                        

                        <input v-model="newtod"      @keyup.enter="addTod"  v-validate="'required:false'" class="form-control" style="  border: 1px solid #ccc;">
                      
                        <li  v-for="(tod, index) in tods" :key="index"  class="form-control"    style="block: red;">@{{tod.name}}
                          <a  class="fas fa-times  " @click="deleteTod(index)"></a> 
                         </li>
                           
                        </div>
                      </div>
                     
                    </div>
                 
                    <button   class="btn btn-danger btn-default " @click="open.form=true">Add Option</button>  
                <button  v-if="open.form" class="btn btn-danger btn-default " @click="open.form=false">remove</button>  
                <button class="btn btn-danger btn-default " @click="open.table = true">generer</button> 
                <br><br>

<div class="form-group" v-if="open.table" >
                        <label> Preview:</label>
                        </div>



  <table class="table table-hover" v-if="open.table" >
 
  <thead>

    <tr>
     
     
      <th scope="col">produit</th>
      <th scope="col">price</th>
      <th scope="col">Quantite</th>
    
      <th scope="col">SKU</th>
      
    </tr>
  </thead>
  <tbody v-for="todo in todos" >
    
    <tr v-for="tod in tods"  >
    
      <td>  @{{todo.name}}/ @{{tod.name}} </td>
   
   
      <td>   <input  placeholder="  MAD    00.0" class="form-control" style="  border: 2px solid #ccc;"></td>

      <td> <input type="number" placeholder="0"  class="  border: 1px solid #ccc;"
       min="1" max="100"> </td>
      <td>   <input   class="form-control" style="  border: 2px solid #000;"></td>
      
      
      
     
    </tr>
   
  </tbody>
</table>
   
                    </div>









            </div>

         

            
               <button v-if="edit.produit " class="btn btn-danger btn-block " @click="updateProduit">modifier</button>     

               <button  type="submit" v-else class="btn btn-info btn-block" @click="addProduit">Ajouter</button>  
               <button   class="btn btn-default" @click="open.produit = false">Fermer</button>    

           </div>
           
           </div>
            

              <ul class="list-group">
                 
                  <li class="list-group-item" v-for="produit in produits">
                  <div class="pull-right text-right">
                
                  <button class="btn btn-warning" @click="editProduit(produit)">Editer</button>
              
                  <button class="btn btn-danger  " @click="deleteProduit(produit)">Supprimer</button>
               
                  </div>
                
                  <h4>@{{ produit.titre }}</h4>
                  <p>@{{ produit.description }}</p>
                  <h3> <small>prix : </small>@{{ produit.price }}</h3>
              
                  </li>
              </ul>

            </div>
            </div>
            </div>
           
         
 
  
      


            <script src="{{ asset('js/ll.js') }}"></script>
<script src="{{ asset('js/vue.js') }}" ></script>
<script src="{{ asset('js/veevalidate.js') }}" ></script>
<script src="{{ asset('js/axios.js') }}" ></script> 
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script src="{{ asset('js/sweetalert.js') }}" ></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/
sweetalert2.all.min.js"></script> -->



<script>

      Vue.use(VeeValidate);

          window.Laravel = {!! json_encode ([
         'csrfToken' => csrf_token(),
         'idProduit' => $id,
         'url'          => url('/')
    ])!!};
    
   
    </script>

<script  src="{{ asset('js/script.js') }}">







</script>
@endsection
 