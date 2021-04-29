var app = new Vue({ 
    el:'#app',
 
    data:{

      todos:[], 
      tods:[], 

        newtodo:'',
        newtod:'',


      formuls:[{
        textarea:'',
        p:'',

      }],
        produits:[],
       
        msg:null,
        msgMulti:null,
       
       is_admin:false,
        open: {
         produit:false,
         table:false,
         form:false,
          
        },
        produit:{
            id:0,
            category_id:window.Laravel.idProduit,
            name:'',
            description:'',
            price:'',

        },
      
        


    
   
        edit: {

          produit:false,
         
          
        }

    },
    methods:{
      
       getData :function(){
          axios.get(window.Laravel.url+'/getdata/'+ window.Laravel.idProduit)
          .then( response => {
              console.log( response.data);
              this.produits = response.data.produits;
              

            
          })
          .catch(error=> {

            console.log('errors :' , error);
          })
       },
      
       addProduit:function(){
        axios.post(window.Laravel.url+'/addproduit',this.produit)
        .then( response => {
          console.log(  this.open.produit);
           
            
              if(response.data.etat){
                
                  this.open.produit=false;
                
                  this.produit.id = response.data.id;
                  this.produits.unshift(this.produit);

                  this.produit={
                                    id:0,
                                   category_id:window.Laravel.idProduit,
                                   name:'',
                                   produit:'',
                                 };
              }
              
          })
          .catch(error=> {
            console.log('errors :' , error)
         
          })
       },
       editProduit: function(produit){
             this.open.produit=true;
             this.edit.produit=true;
             this.produit = produit;
       },
       deleteTodo :function(index) {
    this.todos.splice(index,1);
  // var position = this.todos.indexOf(todo);
   //this.todos.splice(position,1);
     // this.todos =this.todos.filter(i => i !== todo)
       
      
  },
  deleteTod :function(index) {
   this.tods.splice(index,1);
    //  this.todos =this.todos.filter(i => i !== todo)
       
      
  },
       addTodo :function() {
       
        this.todos.push({
            completed: false,
            name: this.newtodo,
           
        });   
        this.newtodo=''
        this.todos.completed= true
    },
    addTod :function() {
       
      this.tods.push({
          completed: false,
          name: this.newtod,
         
      });   
      this.newtod=''
      this.tods.completed= true
  },
    
  vareity:function() {
    // Get the checkbox
    var checkBox = document.getElementById("1");
    // Get the output text
    var text = document.getElementById("text");
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  },
       
       updateProduit: function(){
        axios.put(window.Laravel.url+'/updateproduit',this.produit)
        .then( response => {
           
              if(response.data.etat){
                  this.open.produit=false;
                
                  this.produit={
                                    id:0,
                                    category_id:window.Laravel.idProduit,
                                    name:'',
                                    produit:'',
                                  };
              }
              this.edit.produit=false;
             
          })
          .catch(error=> {
            console.log('errors :' , error)
          })
       },
       deleteProduit: function(produit){

        swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then( ()=> {

  axios.delete(window.Laravel.url+'/deleteproduit/'+produit.id)
        .then( response => {
            
              if(response.data.etat){
                  
                var position = this.produits.indexOf(produit);
                this.produits.splice(position,1);
                
              }
            
             
          })
          .catch(error=> {
            console.log('errors :' , error)
          })



  
    swal(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  
})

        
       },

     
       validateForm(scope) {
        this.$validator.validateAll(scope).then((result)=>{
            if (result){
       
        }
        });
      }
      
            
    },
    
  
    created: function(){
        this.getData();
        //this.getData1();
    }
}); 


