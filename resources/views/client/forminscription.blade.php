@extends('layouts.app')

@section('title')
<title>Ecommerce |Inscription</title>
@endsection

@section('links')

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('frontend/formlogin/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/css/main.css')}}">
    <!--===============================================================================================-->
@endsection


@section('contenu')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id="quickForm" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					@csrf
					
					<span class="login100-form-title">
						Inscription
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Choisir un nom d'utilisateur">
						<input class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Entrez un email s'il vous plait.">
						<input class="input100" type="email" name="username" placeholder="Courriel">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Définir un mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirmer le mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Confirmation mot de passe">
						<span class="focus-input100"></span>
					</div>


					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Oublié
						</span>

						<a href="#" class="txt2">
							Courriel / Mot de passe?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							S'inscrire
						</button>
					</div>

					<div class="flex-col-c p-t-70 p-b-40">
						<span class="txt1 p-b-9">
							Déjà inscrit?
						</span>

						<a href="{{url('/formconnexion')}}" class="txt3">
							Se connecter
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection


@section('sript')
    <!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('frontend/formlogin/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('frontend/formlogin/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('frontend/formlogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('frontend/formlogin/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('frontend/formlogin/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('frontend/formlogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('frontend/formlogin/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('frontend/formlogin/js/main.js')}}"></script>

		<!-- Page specific script -->
<script>

								   
	
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
	
