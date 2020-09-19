@extends('layouts.app') 
@section('content')

 <div class="content-area-main">
                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Material Option</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Edit Material Option</a></li>
                    </ul>
                    <!-- <div class="create-button">
                        <a title="Add New" href="#."><i class="fa fa-plus"></i></a>
                    </div> -->
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Edit Material Option</strong> </h2>
                        </div>
             @if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif 


             <div class="form-default ">
      
                               <form class="add-option-form" method="post" action="{{route('admin.material.option.edit',$option->id)}}" enctype="multipart/form-data">



                                    <div class="form-group row">
                                        <div class="form-group col-sm-6">

                                             <label for="email">Option Name
                                <span style="color: red">*</span>
                                 </label>  
<!-- Name -->
                                            <input type="text" value="{{$option->name}}" name="name" class="form-control" id="aname" placeholder="Option Name" required>
                                        </div>
                                        @csrf
                                    
									<div class="form-group col-sm-6">
<!-- Type -->                               
                                          
                                           <select class="form-control" name="type">
                                             <option>Select Type</option>
                                                <option @if($option->type == 'radio') selected @endif value="radio">Radio</option>
                                                <option @if($option->type == 'checkbox') selected @endif value="checkbox">Checkbox</option>
                                                <option @if($option->type == "select") selected @endif value="select">Select</option>
                                            </select>
                                        </div>
                                    </div> 

                                              <div class="form-group row">
                                         <div class="form-group col-sm-6">

                                             <label for="sort_order">Sort Order
                                
                                 </label>  
<!-- Sort Order -->
                                            <input type="text" name="sort_order" value="{{$option->sort_order}}" class="form-control" id="sort_order" placeholder="Sort Order">
                                        </div>

                                    
                                     
                                        <div class="form-group col-sm-6">


<!-- Status -->                               <label for="sort_order">Status
                                
                                 </label>  
                                           
                                            <select class="form-control" name="status">
                                              <option @if($option->status == 1) selected @endif value="1" >Enabled</option>
                                              <option @if($option->status == 0) selected @endif value="0">Disabled</option>
											  <option @if($option->status == 2) selected @endif value="2">Archived</option>
                                            </select>
                                        </div>
                                       
                                    </div>




                        <div class="row">
                            <div class="col-sm-12">
                                <!--<h2>Option Values</h2>-->
                            </div>
                            <div class="col-sm-12">
                            
                                <table class="tbllOpti table table-bordered">
                                    <thead>
                                                    <th><label for="name">Option Value Name</label></th>
                                                    <!-- <th><label for="image">Image</label></th> -->
                                                    <th> <label for="sort_order">Sort Order</label></th>
                                                </thead>
                                                <tbody>
                                                    
                                                   
                                                @if($option->getValues()->count() > 0)

                                                    @foreach($option->getValues as $optvalue)
                                                  
                                                    
                                                    <tr class="clonemeOpti">
                                                        <td>
                                                            <div class="field-inputs">
                                                            <input type="text" class="form-control" value="{{$optvalue->name}}" name="option_value_name[]">
                                                             <input type="hidden" class="form-control" value="{{$optvalue->id}}" name="option_value_id[]">
                                                            </div>
                                                        </td>
                                                       <!--  <td>


                                                            <div class="form-group">
        <div class="form-field-here upload-f for-sngle">
                             <label class="input-label">Upload Image Here 
                                </label>
                                


                                <div id="filediv">

                                    @if($optvalue->image)
                                    <div id='abcd' class='abcd'><img id='previewimg' src='{{url('/')}}/{{$optvalue->image}}'/><span id="delete-image"></span></div>
                                    
                                     @endif
                                    <input name="option_value_file[]" type="file" id="file" value="{{$optvalue->image}}" /></div>
                                   
                            </div>
                                                            </div>


                                                        </td> -->

                                                        <td>
                                                            <div class="form-group">                                          
                                                                <input type="text" class="form-control" value="{{$optvalue->sort_order}}" name="option_value_sort_order[]">
                                          
                                                            </div>
                                                        </td>
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneOpti">-</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                @else
                                                    <tr class="clonemeOpti">
                                                        <td>
                                                            <div class="field-inputs">
                                                            <input type="text" class="form-control" name="option_value_name[]">
                                                            </div>
                                                        </td>
                                                       <!--  <td>
                                                            <div class="form-group">
                                                    <input type="file" class="form-control" name="option_value_file[]">
                                                            </div>
                                                        </td> -->
                                                        <td>
                                                            <div class="form-group">                                          
                                                                <input type="text" placeholder='0' class="form-control" name="option_value_sort_order[]">
                                          
                                                            </div>
                                                        </td>
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneOpti">-</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                            <table class="table table-bordered" style="margin-top: -20px; border-top: none;">
                                                <tbody>
                                                    <tr align="right">
                                                        <td style="border-top: none;">
                                                            <div class="plus-btn-table">
                                                                <div class="addjobOpti">+</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                            
                             
                            </div>
                           
                        </div>
                                 
                                  
                                    <div class="form-group row">
                                        <div class="form-group form-check col-sm-12 text-center">
                      
                           <button type="submit" class="btn blue">Update Material Option</button>
                        </div>
                                    </div>
                                </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      
<!-- <script>
$(function() {
   
    $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $(this).closest('.controls').find('form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo('.clone'),
                regex = /^(.+?)(\d+)$/i,
                cloneIndex = $(".entry").length;

            newEntry.find('input').val('');

            // Change div id
            newEntry.attr("id", "entry" + cloneIndex);
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                // Not this one
                //.attr("id", "entry" +  cloneIndex)
                .find("*")
                .each(function() {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneIndex);
                    }
                })
                .html('<span class="fa fa-minus"></span> Remove');
        })

        .on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
});
</script> -->
   <!-- <script>
    var abc = 0; // Declaring and defining global increment variable.
    $(document).ready(function() {
        //  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
        $('#add_more').click(function() {
            $(this).before($("<div/>", {
                id: 'filediv'
            }).fadeIn('slow').append($("<input/>", {
                name: 'file[]',
                type: 'file',
                id: 'file'
            }), $("<br/><br/>")));
        });
        // Following function will executes on change event of file input to select different file.
        $('body').on('change', '#file', function() {
            if (this.files && this.files[0]) {
                abc += 1; // Incrementing global variable by 1.
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
                $("#abcd" + abc).append($("<span></span>", {
                    id: 'delete-image'
                }).click(function() {
                    $(this).parent().parent().remove();
                }));
            }
        });
        // To Preview Image
        function imageIsLoaded(e) {
            $('#previewimg' + abc).attr('src', e.target.result);
        };
        $('#upload').click(function(e) {
            var name = $(":file").val();
            if (!name) {
                alert("First Image Must Be Selected");
                e.preventDefault();
            }
        });
    });

    </script>-->
<script type="text/javascript">
    $(".addjobOpti").click(function () {
    var $clone = $('table.tbllOpti tr.clonemeOpti:first').clone();
    $clone.find('input').val('');
    console.log($clone);
    // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
    $('table.tbllOpti').append($clone);
});

$('.tbllOpti').on('click', '.rmv-cloneOpti', function () {
    // alert("Are You Sure?");
     $(this).closest('tr').remove();
});
</script> 
   
 
@endsection