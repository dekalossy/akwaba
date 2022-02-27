@extends('layouts.app')

@section('title')
<title>Ecommerce |Panier</title>
@endsection

@section('contenu')
    
    <!-- END nav -------------------------------------------------------->

    <div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>Panier</span></p>
            <h1 class="mb-0 bread">Mon panier</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
						
						@if (Session::has('cart'))


	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Désignation article</th>
						        <th>Prix HT</th>
						        <th>Quantité</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>

							
									

									@foreach ($panier->items as $item)
									
										
									<tr class="text-center">
										<td class="product-remove"><a href="{{url('enlever_du_panier/'.$item['id_produit'])}}"><span class="ion-ios-close"></span></a></td>
										
										<td class="image-prod"><div class="img " style="background-image:url({{asset('storage/images_articles/'.$item['image'])}}); border-radius:50px"></div></td>
										
										<td class="product-name">
											<h3>{{$item['nom_produit']}}</h3>
											<p>Far far away, behind the word mountains</p>
										</td>
										
										<td class="price">${{$item['prix_produit']}}</td>

										<form method="post" action="{{url('modifier_quantite/'.$item['id_produit'])}}" enctype="multipart/form-data">
											@csrf
										<td class="quantity">
											<div class="input-group mb-3">
											<input type="number" name="quantite" class="quantity form-control input-number" value="{{$item['qte']}}" min="1" max="100">
											</div>
											<button type="submit" class="btn btn-primary py-3 px-4">Modifier</button>
										</td>

											
										</form>
										
										<td class="total">${{$item['prix_produit'] * $item['qte']}}</td>
									</tr><!-- END TR-->

							 		 @endforeach
							  

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimation livraison et taxes</h3>
    					<p>Indiquez la destination pour estimation</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Pays</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Etat/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Code Postal</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimation</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Total panier</h3>
    					<p class="d-flex">
    						<span>Total HT</span>
    						<span>$ {{Session::has('cart') ? $panier->totalPrix : 0}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Livraison</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Taxes</span>
    						<span>$ {{Session::has('cart') ? ($panier->totalPrix)*0.15 : 0}}</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>${{Session::has('cart') ? ($panier->totalPrix)*1.15 : 0}}</span>
    					</p>
    				</div>
    				<p><a href="{{url('/paiement')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>

			@else

				<div class=""> <p class="">Votre panier est vide ...</p> </div>
									
			@endif

			</div>
		</section>

@endsection


@section('script')

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
@endsection
    