<script>
    $(document).ready(function () {
        var counter = 1;

        $('#addrow').on('click', function () {
            counter++;
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><select name="subject[]" class="select1 item-select">\n\
                        <option value="">Select Item</option>\n\
                        @foreach ($subjects as $val)\n\
                        <option value="{{ $val->id }}" >{{ $val->subject_name }}</option>\n\
                        @endforeach\n\
                    </select>\n\
                </td>';
            cols += '<td><select name="instructor[]" class="select1 item-select">\n\
                        <option value="">Select Item</option>\n\
                        @foreach ($instructors as $instructor)\n\
                        <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>\n\
                        @endforeach\n\
                    </select>\n\
                </td>';
            cols += '<td>\n\<div class="form-group sizes"><div class="row">\n\
                        <div class="col-8">\n\
                            <input type="text" name="size[]" class="form-control mt-1">\n\
                        </div>\n\
                        <div class="col-1"></div></div></div><a href="" class="btn btn-sm btn-success mt-1 add_input" style=""><i class="fa fa-plus"> Add</i></a>\n\
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

    //add description
    $(".add_input").click(function(event){
            // alert("hello");
            event.preventDefault();
            $(".sizes").append(`<div class="row">
                  <div class="col-8">
                      <input type="text" name="size[]" class="form-control mt-1">
                  </div>
                  <div class="col-1">
                      <a href="" class="btn btn-danger remove_parent" style="">X</a>
                  </div>
                </div>`);
        });

        $(document).on('click', '.remove_parent',function(){
            event.preventDefault();
            $(this).parent().parent().remove();
        });
</script>
