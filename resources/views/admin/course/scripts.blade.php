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
