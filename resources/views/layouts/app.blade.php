<html lang="en" class="chrome" style="">

<head>
    <meta charset="utf-8">
	<link href="{{ asset('favicon.png') }}" rel="icon" />
	<title>Rao relays</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
 
     <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
		
		
		<script src="{{asset('js/sweetalert.min.js')}}" type="text/javascript"></script>
	 <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" rel="stylesheet">	
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

<script src="{{asset('admin/js/select2.min.js')}}" type="text/javascript"></script>
 <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">

</head>

<body>
  
    <div class="main-wrapper">

@include('layouts.sidebar')

@include('layouts.header')

 <div class="content-area-main">
@yield('content')
</div>


          
</div>

<script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#selUser").select2();

        });
        </script>

 <script>

    $(document).ready(function() {
        $('#myTable,#myTable1,#myTable2,.myTable').DataTable({
           
        });
    });



          $('.menu-here > .nav li.active').each(function(){
            $(this).closest('li.dropdown').addClass('active-parent-main');
			
			
			
        });
    </script>


    <script type="text/javascript">
   $(document).ready(function() {
    $("button#btn-menu-toggle").click(function() {
        $("body").toggleClass("size-layout");
    });
});


$(document).ready(function(){

$(".left-sidebar-logo").click(function(){
    $("body.size-layout").toggleClass("size-layout");
});

});

    </script>
	 <script>
    $(document).ready(function() {
        $("a.filter-button").click(function() {
            $(".filter-blocks").toggleClass('open-filter');
        });
    });
</script>

<script>
   

        $(".date-picker").datepicker({
            format: "mm/dd/yyyy",
            viewMode: "months",
            autoclose: true
			
        });
		$(".start-date").datepicker({
            format: "mm/dd/yyyy",
            viewMode: "months",
            autoclose: true,
			startDate : '-0d'
        });
		$(".end-date").datepicker({
            format: "mm/dd/yyyy",
            viewMode: "months",
            autoclose: true,
			startDate : '+14d'
        });
    </script>
	
	


<script>
$('.processing-btn').on('click', function(){
var that = $(this);
var htm = $(this).html();
$(this).html('<img src="https://thumbs.gfycat.com/DelayedGlamorousArchaeocete.webp" height="25" width="25"> Processing');
setTimeout(function(){
that.html(htm);
}, 1000);
});
</script>


<script type="text/javascript">
	
	function deleteConfirm(type,id,email){
		//alert(email);
		//alert(id);
		swal({
  title: "Are you sure?",
  text: "You will not be able to retrieve the record once deleted",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  
  
  if(type && id){
			$.ajax({
           type: "GET",
           url:"{{route('delete.record')}}?type="+type+"&id="+id,
           success:function(data){      
				
            	 
               
               if(data.success==1){
                            swal("Deleted!", data.msg, "success");
							location.reload();
		  						}else
									
									{
							swal("Error!", data.msg, "error");			
										
									}
                    
        
           }
        });
			}
  
  
  
  
  
  
});
}
    
</script>

</body>

</html>