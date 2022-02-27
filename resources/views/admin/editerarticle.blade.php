@extends('adminlayouts.app')

@section('title')
<title>Ecommerce |Modification Article</title>
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
              <li class="breadcrumb-item active">Modifier article</li>
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
              <h3 class="card-title">Modification <small> article...</small></h3>
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




            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{url('modifier_article/'.$article->ID_ARTICLE)}}" method="post" enctype="multipart/form-data" >
              @csrf
              
              <div class="card-body">
                <div class="form-group">

                  <label class="label" for="categorie_article">Catégories d'article</label>
                  <div class="select">
                      <select name="categorie_article" class="form-control">

                        <option value="{{ $article->CATEGORIE_ARTICLE }}">{{$article->CATEGORIE_ARTICLE}}</option>
            
                        @foreach ($categories as $categorie)

                            @if ($categorie->NOM_CATEGORIE != $article->CATEGORIE_ARTICLE)
                            <option value="{{ $categorie->NOM_CATEGORIE }}">{{$categorie->NOM_CATEGORIE}}</option>
                            @endif
                        
                        @endforeach
                              
                      
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nom_article">Nom de l'article</label>
                  <input type="text" name="nom_article" class="form-control"  value="{{$article->NOM_ARTICLE}}" id="nom_article" oninput="reference();"  placeholder="Entrer un nom pour l'article">
                </div>
                <div class="form-group">
                  <label for="ref_article">Référence de l'article</label>
                  <input disabled type="text" name="ref_article" class="form-control" id="ref_article"  placeholder="Reférence">
                </div>
                <div class="form-group">
                  <label for="prix_ht_article">Prix hors taxes de l'article</label>
                  <input type="number" name="prix_ht_article" class="form-control" value="{{$article->PRIX_HT_ARTICLE}}" id="prix_ht_article" placeholder="Entrer le prix HT">
                </div>
                <div class="form-group">
                  <label for="description_article">Description de l'article</label>
                  <textarea name="description_article" class="form-control"  id="description_article" placeholder="Entrer les détails concernant le produit....">{{$article->DESCRIPTION}}</textarea>
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

function reference(){
  var ref = Math.floor(Math.random() * 10000);
  var nom_article = document.getElementById('nom_article').value;
  var ref_article = document.getElementById('ref_article');
  ref_article.value = (nom_article.substring(0,3)).toUpperCase()+'_'+ref;
}
                               


$(function () {
  
  $('#quickForm').validate({
    rules: {
      nom_article: {
        required: true,
        minlength: 3,
        maxlength:30
      },
      prix_ht_article: {
        required: true,
      },
      description_article: {
        required: true,
        minlength: 30,
        maxlength:1000
      },
      image: {
        extension: "jpg|jpeg|png|gif"
     
      },   
    },
    messages: {
      nom_article: {
        required: "Entrez un nom pour l'article",
        minlength: "Entrez un minimun de 3 caractères",
        maxlength: "Entrez un maximum de 30 caractères"
      },
      prix_ht_article: {
        required: "Entrez un prix  pour l'article",
        
      },
      image: {
        extension: "Type de fichier non valide (jpg|jpeg|png|gif)",
        maxsize:"trop lourd"
        
      },
      description_article: {
        required: "Entrez une description  pour l'article",
        minlength: "Entrez un minimun de 10 caractères",
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