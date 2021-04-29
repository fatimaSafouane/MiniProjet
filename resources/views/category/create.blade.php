
 @extends('layouts.app')

 @section('content')

 <div class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Ajouter Category</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
      
        <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data" >
          
          {{ csrf_field() }}
          
          <div class="form-group @if($errors->get('titre')) has-error  @endif">

            <label for="">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{old('titre')}}">
           
            @if(count($errors->get('titre')))
            
            @foreach($errors->get('titre') as $message)
            <li>{{ $message }}</li>
             @endforeach
              
           @endif
           </div>
     
            <div class="form-group @if($errors->get('presentation')) has-error  @endif" >
            <label for="">Presentation</label>
            <textarea type="text"  name="presentation" class="form-control" >{{old('presentation')}}</textarea> 
            
            @if(count($errors->get('presentation')))
            
            @foreach($errors->get('presentation') as $message)
            <li>{{ $message }}</li>
             @endforeach
            
             
           @endif
            </div>

            <div class="form-group">
            <label for="">Image</label>
            <br>
            <span class="btn btn-raised btn-round btn-primary btn-file">
            <span class="fileinput-new">Add Photo</span>
    
    	<input type="file" name="photo" /></span>

        
        

          
      

      </div>

            <div class="form-group  has-error" >
            
            <input type="submit"  class="form-control btn btn-primary" value="Enregistrer">
            
            </div>      
        </form>
        </div>
    </div>
    </div>
    </div>
</div>
</div>

 @endsection