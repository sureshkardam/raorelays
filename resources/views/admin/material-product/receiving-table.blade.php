<table class="table" id="myTable">
        <thead>
            <tr>
			  
			   <th>Name</th>
               <th>Quantity</th>
            </tr>
        </thead>
		 <tbody>
		
		@foreach($products as $product) 
		<tr>
		 
		 <td>{{App\MaterialProduct::getName($product->id)}}</td>
		 <td>{{$product->qty}}</td>
		  
		 </tr>
		
		 @endforeach
		
		 </tbody>