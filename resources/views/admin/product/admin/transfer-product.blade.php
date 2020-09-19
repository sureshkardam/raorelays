@extends('layouts.app')
@section('content')

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Transfer Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Transfer Product</a></li>
    </ul>
</div>
<div class="content-main-here">
    <div class="filter-blocks">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-here">
                    <h3>Transfer Product</h3>
                    <div class="row">
                        <div class="input-filter col-sm-4">
                            <select id="type" name="product_type_id" class="form-control">
                                <option value="">Select Product Type</option>
                                <option value="1">Sale</option>
                                <option value="0">Rental</option>
                            </select>
                        </div>
                        <div class="input-filter submit col-sm-2">
                            <button title="Click To Submit">
                                    <i class="fa fa-filter"></i>
                                    <input type="submit" id="transfer" value="Transfer">
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-main-div" style="margin-top: 30px;">
        @include('toast')
        <div class=" table-header ">
            <h2>Transfer Product</h2>
        </div>


        <div class="tableBody">
            <div class="table-responsive">
                 <span id="ajax-success"></span> 

                <table class="table myTable">
                    <thead>
                        <tr>
                             <th></th>


                          
                            <th>Product Name</th>
                            <th>Serial Number</th>
                            <th>Product Type</th>
                            <th>Status</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                              
                            @foreach($product_serials as $product_serial)
                        <tr>
                            <td>

                                <div class="blank_a">
                                    
                                    <input type="checkbox" class="single" name="single" value="{{$product_serial->id}}">
                                </div>
                            </td>
                            <td>{{\App\Product::getName($product_serial->product_id)}}</td>
                            <td>{{$product_serial->serial_number}}</td>
                            <td>{{$product_serial->product_type ? 'Sale' : 'Rental' }}</td>
                             <td>{{$product_serial->status ? 'Enabled' : 'Disabled' }}</td>
                          







                        </tr>
                           @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

       

       
        <script type="text/javascript">
            $(document).ready(function() {
                $("#transfer").click(function(event) {


                    event.preventDefault();
                    

                    var e = document.getElementById("type");
                    var type = e.options[e.selectedIndex].value;



                    var data = [];
                    $.each($("input[name='single']:checked"), function() {
                        data.push($(this).val());
                    });
                    //alert("My checked inputs are : " + favorite.join(", "));
                    //alert(data);
                    data = data.join(",");
                    //ajax
                    
                    if (data && type) {

                        $.ajax({
                            type: "GET",

                            url: "{{route('bulkProductTransfer')}}?data=" + data + "&type=" + type,
                            success: function(data) {
                                $("#ajax-success").empty();
                                $('#ajax-success').addClass('status_select-msg');
                                $('#ajax-success').text('Process Complete , Product Transfer Completed!');
                                location.reload();
                            }
                        });
                    }




                });
            });
        </script>

    @endsection