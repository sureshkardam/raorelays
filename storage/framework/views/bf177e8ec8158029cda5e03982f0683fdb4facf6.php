 
<?php $__env->startSection('content'); ?>


                <div class="breadcumbs-area">
                    <ul>
                        <li class="title-main">
                            <h4>Create Option</h4>
                        </li>
                        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
                        <li class="link-home"><a href="#.">Home</a></li>
                        <li class="link-page"><a href="#.">Create Option</a></li>
                    </ul>
                   
                </div>
                <div class="content-main-here">
                    <div class="table-main-div" style="margin-top: 0px;">
                        <div class=" table-header ">
                            <h2><strong>Create Option</strong></h2>
                        </div>
                         <?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?> 


                       <div class="form-default ">
      
                               <form class="add-patient-form" enctype="multipart/form-data" method="post" action="">
                                    <div class="form-group row">
                                   <div class="form-group col-sm-6">

                                    <!--  <?php if(Session::has('OptionCreateErrors')): ?>
                          <?php $__currentLoopData = Session::get('OptionCreateErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>    -->
                             <label for="first name" class="hello">Name
                           <span style="color: red">*</span>
                            </label>
<!-- Name -->
                                            <input type="text" name="name" class="form-control" id="oname" placeholder="Option Name" required>
                                        </div>


                                        <?php echo csrf_field(); ?>
                                      <div class="form-group col-sm-6">
 <!-- Type -->                                 <label for="first name" class="hello"> Select Type
                           <span style="color: red">*</span>
                            </label>
                                          
                                            <select class="form-control" name="type">
                                                <option>Select Type</option>
                                                <optgroup label="Choose">
                                                <option value="radio">Radio</option>
                                                <option value="checkbox">Checkbox</option>
                                                <option value="select">Select</option>
                                                </optgroup>
                                                <optgroup label="Input">
                                                    <option value="text">Text</option>
                                                    <option value="textarea">Textarea</option>
                                                </optgroup>
                                                <optgroup label="File"> 
                                                    <option value="file">File</option>
                                                </optgroup>
                                                <optgroup label="Date"> 
                                                    <option value="date">Date</option>
                                                    <option value="time">Time</option>
                                                    <option value="datetime">Date & Time</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                         <div class="form-group col-sm-6">
                                            <label for="first name" class="hello">Sort Order
                           
                            </label>
<!-- Sort Order -->
                                            <input type="number" name="sort_order" class="form-control" id="sort_order" placeholder="Sort Order" required>
                                        </div>
                                        <div class="form-group col-sm-6">
<!-- Status -->
                                           <label for="first name" class="hello">Status
                          
                            </label>
                                            <select class="form-control" name="status">
                                              <option value="1" selected>Enable</option>
                                              <option value="0">Disable</option>
                                            </select>
                                        </div>
                                       
                                    </div>


                   <!-- option value -->


                                                  <div class="row">
                            <div class="col-sm-12">
                                <!--<h2>Option Values</h2>-->
                            </div>
                            <div class="col-sm-12">
                            
                                <table  class="tbllOpti table table-bordered">
                                    <thead>
                                                    <th><label for="email">Option Value Name</label></th>
                                                    <!-- <th><label for="email">Image</label></th> -->
                                                    <th> <label for="email">Sort Order</label></th>
                                                </thead>
                                                <tbody>
                                                    <tr class="clonemeOpti">
                                                        <td>
                                                            <div class="field-inputs">
                                                            <input type="text" class="form-control" name="option_value_name[]" >
                                                            </div>
                                                        </td>
                                                        <!-- <td>

                                                            <div class="form-group">
                                                                <div class="form-field-here upload-f for-sngle">
                             <label class="input-label">Upload Image Here 
                                </label>
                                <div id="filediv"><input name="option_value_file[]" type="file" id="file"/></div>
                              
                            </div>
                        </div>
                                  </td> -->
                                  <td>                
                                                            <div class="form-group">                                          
                                                                <input type="number" placeholder='0' class="form-control" name="option_value_sort_order[]">
                                          
                                                            </div>
                                                        </td>
                                                        
                                                        <td align="right">
                                                            <div class="minus-btn-table">
                                                                <div class="rmv-cloneOpti">-</div>
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
                           
                           <button type="submit" class="btn blue">
<i class="fa fa-plus-circle"></i> Create Option</button>
                        </div>
                   
 </div>
                                </form>
                            </div>
                        </div>
                 
   
 <script type="text/javascript">
    const $clone = $('table.tbllOpti tbody').html();
    $(".addjobOpti").click(function () {
    console.log($clone);
    // $clone.append("<td><div class='rmv-clone' >Remove</div></td>");
    $('table.tbllOpti tbody').append($clone);
});

$('.tbllOpti').on('click', '.rmv-cloneOpti', function () {
    // alert("Are You Sure?");
     $(this).closest('tr').remove();
});
</script>
<script>
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
                $(this).before("<div id='abcd' class='abcd'><img id='previewimg' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                //$(this).hide();
                $("#abcd" + abc).append($("<span></span>", {
                    id: 'delete-image'
                }).click(function() {     
                    $(this).parent().next('input').val('');
                    $(this).parent().remove();
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

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rao-relays\resources\views/admin/option/create.blade.php ENDPATH**/ ?>