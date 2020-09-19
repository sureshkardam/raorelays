@extends('layouts.app') @section('content')

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Create Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Create Product</a></li>
    </ul>
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Create Product</strong> </h2>
        </div>
        @include('toast')



@if($errors->has('file.*'))
    <span class="help-block">
        <strong>{{$errors->first('file')}}</strong>
    </span>
@endif
        <div class="form-group row">
            <div class="form-group col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#general">Main</a></li>
                    <li><a data-toggle="tab" href="#option">Sub Product</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="form-default ">
            <form class="add-patient-form" method="post" action="{{route('admin.product.create')}}" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <!-- General Part -->
                    <div id="general" class="tab-pane fade in active">
                        <div class="form-group row">

                           

                   
                            <div class="form-group col-sm-12">

                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Name') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif

                                <label for="first name" class="hello">Product Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Product Name" required>
                            </div>

                            

							
							 


                           
               
                           
                            <div class="form-group col-sm-6">

                                <label for="hsn_code" class="hello">HSN Code
                                     <span style="color: red">*</span>   
                                    </label> 
                                <!-- Dimension (L X W X H) -->
                                <input type="text" name="hsn_code" class="form-control" value="{{old('hsn_code')}}" placeholder="HSN Code" required>
                            </div>


                   
                         
                       
                            <div class="form-group col-sm-6">
                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Sku') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label for="first name" class="hello">Product Code
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- SKU -->
                                <input type="text" name="sku" class="form-control" id="name" value="{{old('sku')}}" placeholder="SKU" required>
                            </div>
                           
							
							
							    <div class="form-group col-sm-12">
                                @if(Session::has('ProducteditErrors')) @foreach(Session::get('ProducteditErrors')->get('Description') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                
								
								 <input type="text" name="description" class="form-control" value="{{old('description')}}"  placeholder="Description">
								
								
                            </div>
							
							
							
                          
                        
                     
                            <div class="form-group col-sm-6">
                                <!-- Status --><label for="first name" class="hello">Status
                                        <span style="color: red">*</span>
                                    </label>
                                <select class="form-control" name="status">
                                        <option value="1" selected>Enabled</option>
                                        <option value="0">Disabled</option>
										 <option value="2">Archived</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <!-- //option Start Here -->
                    <div id="option" class="tab-pane fade">
                        <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option">
                                        <table class="tbllOption table table-bordered">
                                            <thead>
                                                <th>Product Code<span style="color: red"> *</span></th>
												<th>Unit of Quantity<span style="color: red"> *</span></th>
                                                <th>Description<span style="color: red"> *</span></th>
                                                <th> </th>
                                            </thead>
                                            <tbody>
                                                <tr class="clonemeOption">
                                                    <td class="attribute-box">
                                                        <div class="input-attribute">
                                                          <input type="text" name="sub_product_code[]" required /> 
                                                        </div>
                                                    </td>
													
													 <td class="attribute-box">
                                                        <div class="input-attribute">
                                                          <input type="text" name="sub_product_quantity[]" required /> 
                                                        </div>
                                                    </td>
													
													
                                                    <td class="test">

                                                        <div class="select-value-table">
                                                            <input type="text" name="sub_product_description[]" required /> 
                                                        </div>

                                                    </td>
                                                    <td align="right">
                                                        <div class="minus-btn-table">
                                                            <div class="rmv-cloneOption">-</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="margin-top: -20px; border-top: none;">
                                            <tbody>
                                                <tr align="right">
                                                    <td style="border-top: none;">
                                                        <div class="plus-btn-table">
                                                            <div class="addjobOption">+</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            






                </div>
                <div class="form-field-here text-center" style="margin-top: 20px">
                   
                    <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Save Product</button>
                </div>
            </form>
        </div>
    </div>
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
                    url: "{{route('admin.get.option.value')}}?option_id=" + optionID,
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
    <!--<script>
        CKEDITOR.replace('description');
    </script>-->
   
  
    @endsection