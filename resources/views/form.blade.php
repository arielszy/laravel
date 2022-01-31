@extends('base')

@section('content')
    

<div class=" text-center mt-5 text-light">   
<h1>{{@$tt}}</h1>
</div>
<div class="row ">
<div class="col-lg-7 mx-auto ">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
            <div class="container">
                @if (isset($user))
                    <form id="contact-form" role="form" method="post" action="{{ route('user.update', $user) }}" onsubmit="enable(this);" >
                        @method('PUT')
                @else
                    <form id="contact-form" role="form" method="post" action="{{ route('user.store') }}" >
                @endif            
                @csrf
                <div class="controls">     
                                <label for="name">Nombre *</label> 
                                <input id="name" type="text" name="name" class="form-control"  required="required" value="{{old('name') ?? @$user['name']}}" > 
                                <label for="lastname">Apellido *</label> 
                                <input id="lastname" type="text" name="surname" class="form-control"  required="required" value="{{old('surname') ?? @$user['surname']}}"> 
                                <label for="email">Email *</label>
                                <input id="email" type="email" name="email" class="form-control"  required="required"  value="{{old('email') ?? @$user['email']}}">
                                <label for="address">Domicilio *</label> 
                                <input id="address" type="text" name="address" class="form-control"  required="required" value="{{old('address') ?? @$user['address']}}"> 
                                <label for="DNI">DNI *</label> 
                                <input id="DNI" type="number" name="DNI" class="form-control"  required="required" @if (isset($user)) disabled="true" @endif value="{{old('DNI') ?? @$user['DNI'] ?? @$_GET['DNI']}}"> 
                                <label for="phone">Telefono *</label> 
                                <input id="phone" type="number" name="phone" class="form-control"  required="required" value="{{old('phone') ?? @$user['phone']}}">  
                                </br> 
                                <div class=" d-md-flex justify-content-between">
                            @if (isset($user))
                                <input type="submit" name="btn" class="btn btn-success btn-send" value="guardar cambios"> 
                            @else
                                <input type="submit" name="btn" class="btn btn-success btn-send" value="Crear cliente"> 
                            @endif    
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