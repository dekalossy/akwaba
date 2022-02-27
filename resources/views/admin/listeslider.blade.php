@extends('adminlayouts.app')

@section('title')
<title>Ecommerce |Liste sliders</title>
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
              <li class="breadcrumb-item active">Liste sliders</li>
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
              <h3 class="card-title">Table des sliders</h3>
            </div>
            <!-- /.card-header -->

                <!----------------------------- Messages de succès OU ERREUR--------------------------------->

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

<!-----------------------------fIN  Messages de succès ERREUR---------------------------------->











            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Num. slider</th>
                  <th>Image</th>
                  <th>Description 1</th>
                  <th>Description 2</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ( $sliders as $slider )

                        <tr>
                          <td>{{$slider->id}}</td>
                          <td><img src="{{asset('storage/images_sliders/'.$slider->IMAGE_SLIDER)}}" style="height: 50px; width:50px" class="img-circle elevation-2"></td>
                          <td>{{$slider->DESCRIPTION_1}}</td>
                          <td>{{$slider->DESCRIPTION_2}}</td>
                          <td>
                            @if ($slider->STATUS != 0)
                                <a href="{{url('desactivationslider/'.$slider->id)}}" class="btn btn-sm  btn-outline-success">Active</a>    
                            @else
                                <a href="{{url('activationslider/'.$slider->id)}}" class="btn btn-sm  btn-outline-danger">Desactive</a>  
                              
                            @endif

                            <a href="{{url('editer_slider/'.$slider->id)}}" class="btn btn-sm btn-outline-primary"><i class="nav-icon fas fa-edit"></i></a>
                      
                            <a href=""  class="btn btn-sm btn-outline-danger" data-toggle="modal" 
                            data-target="#modal{{$slider->id}}"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a></td>

                          </td>
                        </tr>
                        
                                   <!----- Modal de confirmation de suppression----->
                        <div class="modal fade" id="modal{{$slider->id}}" >
                          <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                              <div class="modal-header">
                                <h4 class="modal-title">Confirmation de suppression </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Voulez-vous supprimer le slider <b>{{$slider->id}}&hellip;</b>?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                                <a href="{{url('supprimer_slider/'.$slider->id)}}" class="btn btn-outline-light swalDefaultSuccess"> Supprimer</a>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!----- Modal ----->





                    @endforeach


                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td>A</td>
                </tr>
                
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr>
            
                
                </tbody>
                <tfoot>
                <tr>
                    <th>#Num. slider</th>
                    <th>Image</th>
                    <th>Description 1</th>
                    <th>Description 2</th>
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