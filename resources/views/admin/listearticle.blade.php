@extends('adminlayouts.app')

@section('title')
<title>Ecommerce |Liste articles</title>
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
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Accueil</a></li>
              <li class="breadcrumb-item active">Liste articles</li>
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
              <h3 class="card-title">Table des articles</h3>
            </div>



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

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Réf. article</th>
                  <th>Nom article</th>
                  <th>Catégorie</th>
                  <th>Image</th>
                  <th>Prix HT en $ CAN</th>
                  <th>description</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($articles as $article)

                  <tr>
                    <td>{{$article->REF_ARTICLE}}</td>
                    <td>{{$article->NOM_ARTICLE}}</td>
                    <td>{{$article->CATEGORIE_ARTICLE}}</td>
                    <td><img src="{{asset('storage/images_articles/'.$article->IMAGE)}}" style="height: 50px; width:50px" class="img-circle elevation-2"></td>
                    <td>{{$article->PRIX_HT_ARTICLE}}</td>
                    <td>{{$article->DESCRIPTION}}</td>
                    <td>
           {{--           @if ($article->STATUS != 0)
                          <a href="{{url('desactivation/'.$article->ID_ARTICLE)}}" class="btn btn-sm  btn-outline-success">Active</a>    
                        @else
                          <a href="{{url('activation/'.$article->ID_ARTICLE)}}" class="btn btn-sm  btn-outline-danger">Desactive</a>  
                            
                      @endif

                      Remplacé par les lignes qui suivent
                      
            --}}      
                   @if ($article->STATUS != 0)
                          <a href="{{url('article/desactiver/'.$article->ID_ARTICLE)}}" class="btn btn-sm  btn-outline-success">Active</a>    
                        @else
                          <a href="{{url('article/activer/'.$article->ID_ARTICLE)}}" class="btn btn-sm  btn-outline-danger">Desactive</a>  
                            
                      @endif
            



                      
                      <a href="{{url('editer_article/'.$article->ID_ARTICLE)}}" class="btn btn-sm btn-outline-primary"><i class="nav-icon fas fa-edit"></i></a>
                      
                      <a href=""  class="btn btn-sm btn-outline-danger" data-toggle="modal" 
                      data-target="#modal{{$article->ID_ARTICLE}}"><i class="nav-icon fas fa-trash" aria-hidden="true"></i></a></td>
                  </tr>


                        <!----- Modal de confirmation de suppression----->
                        <div class="modal fade" id="modal{{$article->ID_ARTICLE}}" >
                          <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                              <div class="modal-header">
                                <h4 class="modal-title">Confirmation de suppression </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Voulez-vous supprimer l'article <b>{{$article->NOM_ARTICLE}}&hellip;</b>?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                                <a href="{{url('supprimer_article/'.$article->ID_ARTICLE)}}" class="btn btn-outline-light swalDefaultSuccess"> Supprimer</a>
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
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.1</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.1</td>
                  <td>A</td><td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.2</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.2</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                
                <tr>
                  <td>Presto</td>
                  <td>Opera 8.5</td>
                  <td>Win 95+ / OSX.2+</td>
                  <td>-</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Presto</td>
                  <td>Opera 9.0</td>
                  <td>Win 95+ / OSX.3+</td>
                  <td>-</td>
                  <td>A</td><td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Presto</td>
                  <td>Opera 9.2</td>
                  <td>Win 88+ / OSX.3+</td>
                  <td>-</td>
                  <td>A</td><td> 4</td>
                  <td>X</td>
                </tr>
                
                  <td>KHTML</td>
                  <td>Konqureror 3.1</td>
                  <td>KDE 3.1</td>
                  <td>3.1</td>
                  <td>C</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>KHTML</td>
                  <td>Konqureror 3.3</td>
                  <td>KDE 3.3</td>
                  <td>3.3</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>KHTML</td>
                  <td>Konqureror 3.5</td>
                  <td>KDE 3.5</td>
                  <td>3.5</td>
                  <td>A</td><td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Tasman</td>
                  <td>Internet Explorer 4.5</td>
                  <td>Mac OS 8-9</td>
                  <td>-</td>
                  <td>X</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Tasman</td>
                  <td>Internet Explorer 5.1</td>
                  <td>Mac OS 7.6-9</td>
                  <td>1</td>
                  <td>C</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Tasman</td>
                  <td>Internet Explorer 5.2</td>
                  <td>Mac OS 8-X</td>
                  <td>1</td>
                  <td>C</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>NetFront 3.1</td>
                  <td>Embedded devices</td>
                  <td>-</td>
                  <td>C</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>NetFront 3.4</td>
                  <td>Embedded devices</td>
                  <td>-</td>
                  <td>A</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>Dillo 0.8</td>
                  <td>Embedded devices</td>
                  <td>-</td>
                  <td>X</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Misc</td>
                  <td>Links</td>
                  <td>Text only</td>
                  <td>-</td>
                  <td>X</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#Réf. article</th>
                  <th>Nom article</th>
                  <th>Catégorie</th>
                  <th>Image</th>
                  <th>Prix HT</th>
                  <th>description</th>
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