@extends('adminlayouts.app')

@section('title')
<title>Ecommerce |Modification Catégorie</title>
@endsection
    
@section('contenu')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Modifier Catégorie</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">

    <!----------------================== CONTENU ICI ==========================-------------------->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Modification <small>de catégorie </small></h3>
            </div>
 <!----------------------------- Messages de succès---->
 @if(Session::has('succes'))
 <div class="alert alert-success">   
     
     {{Session::get('succes')}} 
     {{Session::put('succes', null)}} 
 </div>  
@endif
<!--------------- Validation des champs obligatoires---->
@if(count($errors)>0)
 <div class="alert alert-danger">   
     <ul>
         @foreach ($errors->all() as $erreur)
         <li>{{$erreur}}</li>
         @endforeach
     </ul>
 </div> 
@endif
<!--------------- Fin  Validation des champs obligatoires---->


            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{url('modifier_categorie/'.$categorie->ID_CATEGORIE)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

             {{--  {!!Form::open(['action'=>'App\Http\Controllers\AdminController@creerCategorie', 'method'=>'POST', 'enctype' => 'multipart/form-data', 'role'=>'form', 'id'=>'quickForm']) !!}} --}}

           
              <div class="card-body">
                <div class="form-group">
                  <label for="nom_categorie">Catégorie</label>
                  <input type="text" name="nom_categorie" class="form-control" id="nom_categorie" value="{{$categorie->NOM_CATEGORIE}}" placeholder="Entrer le nouveau nom de la catégorie">
                
                {{--    {{Form::label('categorie', 'Catégorie')}}
                  {{Form::text('categorie', '', ['placeholder'=>'Entrer la nouvelle catégorie', 'class'=>'form-control', 'required' => 'required'] )}}
                  Explication => {{Form::type('name', 'affichage', ['attribut'=>'valeur'])}}
              
              --}} 
                
                
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

 <!----------------================== CONTENU fin ==========================-------------------->
</div><!-- /.content-wrapper-->

</section>

@endsection


@section('script')
<!---------------- scripts ICI -------------------->

<script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- AdminLTE App -->

<script>
$(function () {
  /*
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  }); */


  $('#quickForm').validate({
    rules: {
      nom_categorie: {
        required: true,
        minlength: 5,
        maxlength: 30
      
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      nom_categorie: {
        required: "Entrez une catégorie s'il vous plait",
        minlength: "Entrez un minimun de 5 caractères",
        maxlength: "Entrez un maximum de 30 caractères"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
    
@endsection