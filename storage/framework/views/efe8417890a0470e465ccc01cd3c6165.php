<script>
    $(document).ready(function () {
        var counter = 1;

        $('#addrow').on('click', function () {
            counter++;
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><select name="subject[]" class="select1 item-select">\n\
                        <option value="">Select Item</option>\n\
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n\
                        <option value="<?php echo e($val->id); ?>" ><?php echo e($val->subject_name); ?></option>\n\
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n\
                    </select>\n\
                </td>';
            cols += '<td><select name="instructor[]" class="select1 item-select">\n\
                        <option value="">Select Item</option>\n\
                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n\
                        <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->name); ?></option>\n\
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n\
                    </select>\n\
                </td>';
            cols += '<td>\n\<textarea name="description[]" cols="60" rows="1" class="form-control  item-details"></textarea>\n\
                    </td>';
      
            cols += '<td><button class="btn bg-gradient-danger deleteRow"><span class="fa fa-remove"></span></button></td>';
            newRow.append(cols);
            $('table.mytable').append(newRow);
            $(".select1").select2();
        });

 
        $(".mytable").on("click", "button.deleteRow", function (event) {
            $(this).closest("tr").remove();
            
        });

    });
</script>
<?php /**PATH I:\xampp\htdocs\ucc_coaching\resources\views/admin/course/scripts.blade.php ENDPATH**/ ?>