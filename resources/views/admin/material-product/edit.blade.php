@extends('layouts.app') @section('content')


<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Edit Material Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Edit Material Product</a></li>
    </ul>
    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Edit Material Product</strong> </h2>
        </div>

        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif




            

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif


        <div class="form-group row">
            <div class="form-group col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#general">General</a></li>
                    <li><a data-toggle="tab" href="#option">Option</a></li>
                   
                </ul>
            </div>
        </div>
        <div class="form-default ">
            <form action="" id="popForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <!-- General Part -->
                           <div id="general" class="tab-pane fade in active">
                        <div class="form-group row">

                           

                   
                            <div class="form-group col-sm-6">

                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Name') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif

                                <label for="first name" class="hello">Product Name
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Product Name -->
                                <input type="text" name="name" class="form-control" value="{{$product->name}}" id="name" placeholder="Product Name" required>
                            </div>

                            

							
							  <div class="form-group col-sm-6">
                                  <label for="minimum_purchase" class="hello">Minimum Quantity
                                   <span style="color: red">*</span>
								   </label>
                               
                                <input type="text" name="minimum_purchase" class="form-control" value="{{$product->minimum_purchase}}" id="name" placeholder="Minimum Quantity" required>
                            </div>


                            <div class="form-group col-sm-6">
                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Quantity') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label for="quantity" class="hello">Quantity
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- Quantity -->
                                <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}" id="name" placeholder="Quantity" required>
                            </div>
               
                            <div class="form-group col-sm-6">

                                <label for="tax_rate" class="hello">Tax Rate
                                     <span style="color: red">*</span>   
                                    </label> 
                                <!-- Dimension (L X W X H) -->
                                <input type="text" name="tax_rate" class="form-control" value="{{$product->tax_rate}}" placeholder="Tax Rate" required>
                            </div>
                            <div class="form-group col-sm-6">

                                <label for="hsn_code" class="hello">HSN Code
                                     <span style="color: red">*</span>   
                                    </label> 
                                <!-- Dimension (L X W X H) -->
                                <input type="text" name="hsn_code" class="form-control" value="{{$product->hsn_code}}" placeholder="HSN Code" required>
                            </div>


                   
                            <div class="form-group col-sm-6">

                                <label for="weight" class="hello">Weight
                                      <span style="color: red">*</span>  
                                    </label>
                               
                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Weight') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <input type="text" name="weight" class="form-control" value="{{$product->weight}}" placeholder="" required>
                            </div>
                       
                            <div class="form-group col-sm-6">
                                @if(Session::has('ProductcreateErrors')) @foreach(Session::get('ProductcreateErrors')->get('Sku') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label for="first name" class="hello">SKU
                                        <span style="color: red">*</span>
                                    </label>
                                <!-- SKU -->
                                <input type="text" name="sku" class="form-control" id="name" value="{{$product->sku}}" placeholder="SKU" required>
                            </div>
                            <div class="form-group col-sm-6">


                                <label for="first name" class="hello">Sort Order
                                       
                                    </label>
                                <!-- Sort Order -->
                                <input type="text" name="sort_order" class="form-control" value="{{$product->sort_order}}"  placeholder="Sort Order">
                            </div>
               
                           <div class="form-group col-sm-12">
                                @if(Session::has('ProducteditErrors')) @foreach(Session::get('ProducteditErrors')->get('Categories') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label class="input-label">Product Categories<span style="color: red">*</span></label>
                                <select class="form-control select-form height-set-select" name="category_id[]" multiple required>
                                        @foreach($categories as $category)
                                        <option value="{{$category->category_id}}" @if(in_array($category->category_id,$product_cats)) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
          
                            <div class="form-group col-sm-12">
                                @if(Session::has('ProducteditErrors')) @foreach(Session::get('ProducteditErrors')->get('Description') as $errorMessage)
                                <span class="label label-danger">{{$errorMessage}}</span> @endforeach @endif
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <textarea rows="4" id="description" cols="50" class="form-control" name="description" required>{{$product->description}}</textarea>
                            </div>
                     
                            <div class="form-group col-sm-12">
                                <!-- Status --><label for="first name" class="hello">Status
                                        <span style="color: red">*</span>
                                    </label>
                               <select name="status" class="form-control select-form">
                                        <option @if($product->status == 1) selected @endif value="1">Enabled</option>
                                        <option @if($product->status == 0) selected @endif value="0">Disabled</option>
										<option @if($product->status == 2) selected @endif value="2">Archived</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <!-- option editing starting here -->
                    <div id="option" class="tab-pane fade">
                        <div class="option-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table option">
                                        @if($product->getOptionValues->count() > '0')
                                        <table class="tbllOption table table-bordered has-option">
                                            <thead>
                                               <th>Select Option<span style="color: red"> *</span></th>
                                                <th>Select Option values<span style="color: red"> *</span></th>
                                                <th> </th>
                                            </thead>
                                            <tbody>
                                                @foreach($product->getOptionValues as $editOption)
                                                <tr class="clonemeOption">
                                                    <td class="attribute-box">
                                                        <div class="input-attribute">
                                                            <select name="option[]" class="option_list">
                                                                    <option value="">Select Option</option>
                                                                    @foreach($options as $option)
                                                                    <option @if($editOption->option_id == $option->id) selected @endif value="{{$option->id}}">{{$option->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </td>
                                                    <td class="test">


                                                        <div class="select-value-table">
                                                            <select name="option_value[]" class="dynamic_option_value">
                                                                                        @foreach($master_option_values as $master_option_value)
                                                                                        @if($editOption->option_value_id == $master_option_value->id)
                                                                                        <option selected value="{{$master_option_value->id}}">{{$master_option_value->name}}</option>
                                                                                        @endif
                                                                                        @endforeach
                                                                                    </select>
                                                        </div>
                                                    </td>



                                                    </td>
                                                    <td align="right">
                                                        <div class="minus-btn-table">
                                                            <div class="rmv-cloneOption">-</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <table class="tbllOption table table-bordered no-option">
                                            <thead>
                                                <th>Select Option</th>
                                                <th>Select option values</th>
                                                <th> </th>
                                            </thead>
                                            <tbody>
                                                <tr class="clonemeOption">
                                                    <td class="attribute-box">
                                                        <div class="input-attribute">
                                                            <select name="option[]" class="option_list">
                                                                    @foreach($options as $option)
                                                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </td>
                                                    <td class="test">
                                                        <div class="table-textarea">
                                                            <!-- change -->
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Value</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="120px">
                                                                            <div class="select-value-table">
                                                                                <select name="option_value[]" class="dynamic_option_value">
                                                                                        <option value="">Select Value</option>
                                                                                    </select>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                                        @endif
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
      

                    <section class="submit">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-field-here text-center" style="margin-top: 20px">
                                    
                                        <button type="submit" class="btn blue">Update Material Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </form>
            </div>
        </div>
    </div>
    
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script> -->
    
     <script type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
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

    <script>
        function editreadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(input).prev('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $("#banner-icon").change(function() {
            editreadURL(this);
        });
    </script>

    <style type="text/css">
        .store-logo.manufac {
            position: relative;
        }
        
        .form-field-here input.edit-manufacture-icon {
            position: absolute;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            bottom: 5px;
            left: 5px;
            cursor: pointer;
        }
        
        .form-field-here input.edit-manufacture-icon:focus {
            outline: none;
        }
        
        .form-field-here input.edit-manufacture-icon:before {
            content: "";
            background: green;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
        }
        
        .form-field-here input.edit-manufacture-icon:after {
            content: "\f040";
            font-family: FontAwesome;
            color: #fff;
            top: 0;
            left: 0;
            position: absolute;
            line-height: 30px;
            text-align: center;
            width: 100%;
        }
    </style>

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
    @endsection