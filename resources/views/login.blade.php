@extends('base')

@section('content')
    
    
<div class=" text-center mt-5 text-light">   
<h1>ingrese la clave de acceso</h1>
</div>
<div class="row ">
<div class="col-lg-7 mx-auto ">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
            <div class="container">
                <form id="contact-form" role="form" method="post" action="{{ url('/login') }}">
                @csrf
                <div class="controls">     
                    <label for="pass" id="passlv" name="passlv">Clave:</label> 
                    <input id="pass" type="password" name="pass" class="form-control"  required="required" value=''>  
                    </br> 
                    <div class=" d-md-flex justify-content-between">
                    <input type="submit" name="btn" class="btn btn-success btn-send" value="ACCEDER"> 
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
@endsection