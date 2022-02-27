@extends('adminlayouts.app')

@section('title')
<title>Ecommerce |Ajout Slider</title>
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
              <li class="breadcrumb-item active">Ajout slider</li>
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
              <h3 class="card-title">Nouveau slider <small>..............</small></h3>
            </div>
            <!-- /.card-header -->

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



            <!-- form start -->
            <form id="quickForm"  action="{{url('modifier_slider/'.$slider->id)}}" method="post" enctype="multipart/form-data" >
              @csrf
              
              <div class="card-body">
                <div class="form-group">
                  <label for="description1_slider">Description 1 slider</label>
                  <input type="text" name="description1_slider" class="form-control" value="{{$slider->DESCRIPTION_1}}" id="description1_slider" placeholder="Description slider....">
                </div>
                <div class="form-group">
                  <label for="description2_slider">Description 2 slider</label>
                  <input type="text" name="description2_slider" class="form-control" value="{{$slider->DESCRIPTION_2}}" id="description2_slider"   placeholder="Description slider....">
                </div> 

                <div class="form-group">
                  <label for="image">Ajout image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="imagearticle" >
                       <label class="custom-file-label" for="image">Choisir une image...</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" for="image" >Joindre</span>
                    </div>
                  </div>
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

<!-- Page specific script -->
<script>



$(function () {
  

  $('#quickForm').validate({
    rules: {
      description1_slider: {
        required: true,
        minlength: 15,
        maxlength:500
      },
      
      description2_slider: {
        required: true,
        minlength: 15,
        maxlength:500
      },
      image: {
        extension: "jpg|jpeg|png|gif"
     
      },   
    },
    messages: {
      description1_slider: {
        required: "Entrez une description",
        minlength: "Entrez un minimun de 15 caractères",
        maxlength: "Entrez un maximum de 500 caractères"
      },
      
      image: {
        extension: "Type de fichier non valide (jpg|jpeg|png|gif)",
      
        
      },
      description2_slider: {
        required: "Entrez une description",
        minlength: "Entrez un minimun de 15 caractères",
        maxlength: "Entrez un maximum de 500 caractères"

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