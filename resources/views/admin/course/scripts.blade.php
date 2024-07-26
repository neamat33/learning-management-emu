<script>
    document.getElementById('addRowBtn').addEventListener('click', addRow);
    document.getElementById('tableBody').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-lesson-btn')) {
            addLessonRow(e.target);
        } else if (e.target && e.target.classList.contains('delete-btn')) {
            deleteRow(e.target);
        }
    });

    function addRow() {
        const tableBody = document.getElementById('tableBody');
        const newRow = document.createElement('tr');
        newRow.classList.add('parent-row');
        newRow.innerHTML = `
        <td>
              <select name="details[subject]" id="" class="select1 form-control"
                                                style="min-width: 100px" required>
                                                <option value="" selected disabled>Select Item</option>

        <option value="bangla">Bangla</option>
        <option value="english">English</option>
        <option value="arabic">Arabic</option>
        </select>
</td>
<td>
    <textarea name="details[description]" id="item_details" cols="60" rows="1" class="form-control item-details"
                                                style="min-width: 150px" required></textarea>
</td>
<td>
<button type="button" class="add-lesson-btn btn btn-sm btn-primary mb-1">Add Lesson</button>
<button class="delete-btn btn btn-sm btn-danger mb-1"">Delete</button>
</td>
`;
        tableBody.appendChild(newRow);
    }

    function addLessonRow(button) {
        const parentRow = button.closest('tr');
        const lessonRow = document.createElement('tr');
        lessonRow.classList.add('lesson-row');
        lessonRow.innerHTML = `
        <td></td>
        <td><input type="text" name="details[lesson]" class="form-control" placeholder="Lesson title"></td>
        <td>
            <span class="delete-btn btn btn-sm btn-danger">Delete</span>
        </td>
    `;
        parentRow.insertAdjacentElement('afterend', lessonRow);
    }

    function deleteRow(button) {
        const row = button.closest('tr');
        row.remove();
    }

</script>
