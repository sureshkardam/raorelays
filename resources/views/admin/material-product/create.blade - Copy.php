@extends('layouts.app') @section('content')

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Create Raw Material</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Create Raw Material</a></li>
    </ul>
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Create Raw Material</strong> </h2>
        </div>
        @include('toast')



@if($errors->has('file.*'))
    <span class="help-block">
        <strong>{{$errors->first('file')}}</strong>
    </span>
@endif
      
        <div class="form-default ">
            <form class="add-patient-form" method="post" action="{{route('admin.material.product.create')}}" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <!-- General Part -->
                    <div id="general" class="tab-pane fade in active">
                        <div class="form-group row">

                           

                   
                            <div class="form-group col-sm-6">

                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Name') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif

                                <label for="first name" class="hello">Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Product Name" required>
                            </div>

                            

							
							  <div class="form-group col-sm-6">
                                  <label for="unit" class="unit">Unit
                                   <span style="color: red">*</span>
								   </label>
                               
                               								
								 <select name="unit" class="form-control" required>
                                    <option value="0">Select Unit</option>
									<option value="1">Meter</option>
                                    <option value="2">Gram</option>
									
                                </select>
								
								
                            </div>


                            <div class="form-group col-sm-6">
                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Quantity') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label for="quantity" class="hello">Quantity
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Quantity -->
                                <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}" id="name" placeholder="Quantity" required>
                            </div>
               
                           
               
                          
							<div class="form-group col-sm-6">
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
									<option value="2">Archived</option>
                                </select>
                            </div>
          
                         
                     
                        </div>
                    </div>
              

                </div>
                <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Raw Material</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(".addjobAtt").click(function() {
            var $clone = $('table.tbllAtt tr.clonemeAtt:first').clone();
            console.log($clone);
            // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
            $('table.tbllAtt').append($clone);
        });

        $('.tbllAtt').on('click', '.rmv-cloneAtt', function() {
            // alert("Are You Sure?");

            cloneIndex = $(".clonemeAtt").length;

            if (cloneIndex > 1) {


                $(this).closest('tr').remove();
            } else

            {

                alert('At Least one block is required');
            }

            e.preventDefault();
            return false;
        });
    </script>
    <script type="text/javascript">
        $(".addjobOption").click(function() {
            var $clone = $('table.tbllOption tr.clonemeOption:first').clone();
            console.log($clone);
            // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
            $('table.tbllOption').append($clone);
        });

        $('.tbllOption').on('click', '.rmv-cloneOption', function() {
            // alert("Are You Sure?");

            cloneIndex = $(".clonemeOption").length;

            if (cloneIndex > 1) {


                $(this).closest('tr').remove();
            } else

            {

                alert('At Least one block is required');
            }

            e.preventDefault();
            return false;
        });
    </script>
    <script type="text/javascript">
        $('.tbllOption').on('change', '.option_list', function() {
            var optionID = $(this).val();
            var relTd = $(this).closest('td').next('td');
            if (optionID) {
                $.ajax({
                    type: "GET",
                    url: "{{route('admin.material.get.option.value')}}?option_id=" + optionID,
                    success: function(data) {

                        $(relTd).find(".dynamic_option_value").empty();
                        $.each(data, function(key, value) {

                            $(relTd).find(".dynamic_option_value").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    }
                });
            } else {
                $(relTd).find(".dynamic_option_value").empty();

            }
        });
    </script>




    <script type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
   
  
    @endsection