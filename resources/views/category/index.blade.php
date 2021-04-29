@extends('layouts.app')

@section('content')

<div class="content">
        <div class="container-fluid">
          
    <div class="row">
        <div class="col-md-12">

        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">la liste des category</h4>
                  <p class="card-category"></p>
                  <div class=" text-right">
        <a href="{{url('categories/create')}}" class="btn btn-success">Nouveau category</a>
        </div>
                </div>
                <div class="card-body">
         
       
       
       


 <br>
<div class="row">

@foreach($categories as $category)
   <div class="col-sm-6 col-md-4">
   <div class="thumbnail">
   <img src="{{asset('storage/'.$category->photo)}}" alt="...">
    <div class="caption">
      <h3>{{$category->titre}}</h3>
      <p>...</p>
      <p>

      <form action="{{url('categories/'.$category->id)}}" method="post">
                   
                
                  

       <a  href="{{url('categories/'.$category->id)}}" class="btn btn-success" role="button">Show </a>



      
       <a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-primary" role="button">Editer</a>
      
       <!-- <button type="submit" href="" class="btn btn-danger">Supprimer</button>
      -->
       </form>


      </p>
    </div>
    </div>
   </div>
   @endforeach
</div>
 


        </div>
    </div>
    </div>
    </div>
</div>
</div>
@endsection