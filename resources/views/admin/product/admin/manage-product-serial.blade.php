@extends('layouts.app') @section('content')

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Manage Serial & Type</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Manage Serial & Type</a></li>
    </ul>
</div>
<div class="content-main-here">
    <div class="table-main-div" style="margin-top: 0px;">
        <div class=" table-header ">
            <h2><strong>Manage Serial & Type</strong> </h2>
        </div>
        @include('toast') @if($errors->has('file.*'))
        <span class="help-block">
        <strong>{{$errors->first('file')}}</strong>
    </span> @endif

        <div class="form-default ">

            <form class="manage-serial" method="post" action="{{route('admin.serial.create',$id)}}" enctype="multipart/form-data">

                @csrf
                <div class="option-section">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table option">
                                <table class="tbllOption table table-bordered">
                                    <thead>
                                        <th>Serial Number<span style="color: red"> *</span></th>
                                        <th>Product Type<span style="color: red"> *</span></th>
                                        <th> Status</th>
                                        <th> </th>
                                    </thead>
                                    <tbody>


                                             @if($product_serial_type->count() > 0)

                                                    @foreach($product_serial_type as $product_serial)
                                                        
                                                  
                                                   <tr class="clonemeOption">
                                            <td class="attribute-box">
                                                <div class="input-attribute">
                                                    <input type="text" name="serial_number[]" value="{{$product_serial->serial_number}}" readonly>
                                                </div>
                                            </td>
                                            <td class="test">

                                                <div class="select-value-table">
                                                    
													
													<select name="product_type[]" class="dynamic_option_value" required>
                                                              <option @if($product_serial->product_type == 1) selected @endif value="1">Sale</option>
                                      <option @if($product_serial->product_type == 0) selected @endif value="0">Rental</option>
                                                            </select>
                                                </div>

                                            </td>
                                            <td class="test">

                                                <div class="select-value-table">
                                                    <select name="status[]" class="dynamic_option_value"  >
                                                                
																
								@foreach(config('app.product_inventory_status') as $key=>$value)
											
									 
									  <option @if($key==$product_serial->status) selected @endif value="{{$key}}">{{$value}}</option>
									 
										
								@endforeach
																
																
																
																
																
																<option value="">Select Status</option>
                                                               
                                                                 <option @if($product_serial->status == 1) selected @endif value="1">Enabled</option>
                                      <option @if($product_serial->status == 0) selected @endif value="0">Disabled</option>
                                                            </select>
                                                </div>

                                            </td>


                                            <td width="80" align="right">
                                                <div class="minus-btn-table hide-me">
                                                    <div class="rmv-cloneOption">-</div>
                                                </div>
                                            </td>
                                        </tr>

                                         @endforeach

                                       @else


                                        <tr class="clonemeOption">
                                            <td class="attribute-box">
                                                <div class="input-attribute">

                                                    <input type="text" name="serial_number[]" placeholder="Enter Serial Number" required>
                                                </div>
                                            </td>
                                            <td class="test">

                                                <div class="select-value-table">
                                                    <select name="product_type[]" class="dynamic_option_value" required>
                                                                <option value="">Select Type</option>
                                                                <option value="1">Sale</option>
                                                                <option value="0">Rental</option>
                                                            </select>

                                                </div>

                                            </td>
                                            <td class="test">

                                                <div class="select-value-table">

                                                    <select name="status[]" class="dynamic_option_value" required>
                                                                <option value="">Select Status</option>
                                                                <option value="1">Enabled</option>
                                                                <option value="0">Disabled</option>

                                                            </select>
                                                </div>

                                            </td>


                                            <td align="right">
                                                <div class="minus-btn-table">
                                                    <div class="rmv-cloneOption">-</div>
                                                </div>
                                            </td>
                                        </tr>

                                     @endif


                                    </tbody>
                                </table>
                                <table class="table table-bordered">
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

                <div class="form-field-here text-center" style="margin-top: 20px">


                    <button type="submit" class="btn blue"> Update Product Serial</button>

                </div>
            </form>
        </div>
    </div>




    <script type="text/javascript">
        $(".addjobOption").click(function() {
            
			var $clone = $('table.tbllOption tr.clonemeOption:first').clone();
			$('table.tbllOption').append($clone);
			$('table.tbllOption tr.clonemeOption:last .minus-btn-table').removeClass("hide-me");
			$('table.tbllOption tr.clonemeOption:last').find('input').attr('readonly', false);
			
			//$('table.tbllOption tr.clonemeOption:last').find('select').attr('disabled', false);
			
			
			
        });

        $('.tbllOption').on('click', '.rmv-cloneOption', function() {

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




    @endsection