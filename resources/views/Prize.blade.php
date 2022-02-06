@extends('base')

@section('content')
    
    
<div class=" text-center mt-5 text-light">   
<h1>Alta de premio</h1>
</div>
<div class="row ">
<div class="col-lg-7 mx-auto ">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
            <div class="container">
                <form id="contact-form" role="form" method="post" action="{{ route('prize.store') }}">
                @csrf
                <div class="controls">     
                    <label for="Descripcion">Descripcion*</label> 
                    <input id="Descripcion" type="text" name="Descripcion" class="form-control"  required="required"> 
                    <label for="Puntos" id="Puntoslv" name="Puntoslv">Puntos</label> 
                    <input id="Puntos" type="number" name="Puntos" class="form-control"  required="required" value=''>  
                    </br> 
                    <div class=" d-md-flex justify-content-between">
                    <input type="submit" name="btn" class="btn btn-success btn-send" value="GUARDAR"> 
                    </div>
       
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /.8 -->
</div> <!-- /.row-->
</div>


@endsection

@section('custom-css-js')
<script src="{{asset('js/home.js')}}" type="text/javascript"></script>
@endsection