@extends('adminlayouts.app')

@section('title')
<title>Ecommerce |Liste catégories</title>
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
              <li class="breadcrumb-item active">Liste catégories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">

    <!----------------================== CONTENU ICI ==========================-------------------->
    <div class="row">

        
        <div class="col-12">
        
    

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table des catégories</h3>
            </div>


<!----------------------------- Messages de succès---->
@if(Session::has('succes'))
<div class="alert alert-success">   
    
    {!!Session::get('succes')!!} 
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
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Num. catégories</th>
                  <th>Nom catégorie</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
              
                  @foreach ($categories as $categorie )
                    <tr>
                      <td>{{$categorie->ID_CATEGORIE}}</td>
                      <td>{{$categorie->NOM_CATEGORIE}}</td>
                      <td>
                        <a href="#" class="btn btn-sm btn-outline-success">Active</a>
                        <a href="{{url('editer_categorie/'.$categorie->ID_CATEGORIE)}}" class="btn btn-sm btn-outline-primary"><i class="nav-icon fas fa-edit"></i></a>
                        
                        <a href=""  class="btn btn-sm btn-outline-danger" data-toggle="modal" 
                        data-target="#modal{{$categorie->ID_CATEGORIE}}"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a>
                      </td>
                    </tr>


                            <!----- Modal de confirmation de suppression----->
                                <div class="modal fade" id="modal{{$categorie->ID_CATEGORIE}}" >
                                  <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Confirmation de suppression </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Voulez-vous supprimer la catégorie <b>{{$categorie->NOM_CATEGORIE}}&hellip;</b>?</p>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                                        <a href="{{url('supprimer_categorie/'.$categorie->ID_CATEGORIE)}}" class="btn btn-outline-light swalDefaultSuccess"> Supprimer</a>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!----- Modal ----->
                  @endforeach
               
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#Num. catégories</th>
                  <th>Nom catégorie</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->




</section>


@endsection






@section('script')
<!---------------- scripts ICI -------------------->
<!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
    
@endsection