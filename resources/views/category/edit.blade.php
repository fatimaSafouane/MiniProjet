@extends('layouts.app')



@section('content')


<div class="content">
        <div class="container-fluid">

   <div class="row">
       <div class="col-md-12">
       <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Category</h4>
                  <p class="card-category">Completer</p>
                </div>
                <div class="card-body">
       <form action="{{ url('categories/'.$category->id) }}" method="post" enctype="multipart/form-data">
       <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         
         <div class="form-group @if($errors->get('titre')) has-error  @endif">
           <label for="">Titre</label>
           <input type="text" name="titre" class="form-control" value="{{$category->titre}}">
           @if(count($errors->get('titre')))
            
            @foreach($errors->get('titre') as $message)
            <li>{{ $message }}</li>
             @endforeach
            
             
           @endif
             
           </div>

           <div class="form-group @if($errors->get('presentation')) has-error  @endif">
           <label for="">Presentation</label>
           <textarea type="text"  name="presentation" class="form-control" >{{$category->presentation}}</textarea> 
           
           @if(count($errors->get('presentation')))
            
            @foreach($errors->get('presentation') as $message)
            <li>{{ $message }}</li>
             @endforeach
            
             
           @endif
           </div>

          

           <div class="form-group">
            <label for="">Image</label>
            <br>
            <span class="btn btn-raised btn-round btn-danger btn-file">
            <span class="fileinput-new">Add Photo</span>
    
    	<input type="file" name="photo" /></span>

        
        

          
      

      </div>

           <div class="form-group">
           
           <input type="submit"  class="form-control btn btn-danger" value="Modifier">
           </div>

           
       </form>
       </div>
       </div>
   </div>
</div>
</div>
</div>

@endsection