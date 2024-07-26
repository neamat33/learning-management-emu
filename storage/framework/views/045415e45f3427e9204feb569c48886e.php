









































































































































































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Rows</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .add-btn, .save-btn, .add-lesson-btn {
            padding: 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }

        .add-btn {
            background-color: #6c5ce7;
            color: white;
        }

        .save-btn {
            background-color: #00cec9;
            color: white;
            float: right;
        }

        .add-lesson-btn {
            background-color: #6c5ce7;
            color: white;
        }

        .add-lesson-btn.delete {
            background-color: #d63031;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f9f9f9;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="<?php echo e(route('courses.store')); ?>" method="POST" enctype='multipart/form-data'>
        <?php echo csrf_field(); ?>
        <button type="button" id="addRowBtn" class="add-btn">Add</button>
        <table>
            <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            <tr class="parent-row">
                <td>
                    <select name="subjects[0][name]">
                        <option>Select Item</option>
                        <option value="Math">Math</option>
                        <option value="Science">Science</option>
                        <!-- Add other options here -->
                    </select>
                </td>
                <td><input type="text" name="subjects[0][description]" placeholder="Description"></td>
                <td>
                    <button type="button" class="add-lesson-btn">Add Lesson</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button type="submit" class="save-btn">Save</button>
    </form>
</div>
<script src="script.js"></script>
<script>
    document.getElementById('addRowBtn').addEventListener('click', addRow);
    document.getElementById('tableBody').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-lesson-btn')) {
            addLessonRow(e.target);
        } else if (e.target && e.target.classList.contains('delete-btn')) {
            deleteRow(e.target);
        }
    });

    let subjectIndex = 1;

    function addRow() {
        const tableBody = document.getElementById('tableBody');
        const newRow = document.createElement('tr');
        newRow.classList.add('parent-row');
        newRow.innerHTML = `
        <td>
            <select name="subjects[${subjectIndex}][name]">
                <option>Select Item</option>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
            </select>
        </td>
        <td><input type="text" name="subjects[${subjectIndex}][description]" placeholder="Description"></td>
        <td>
            <button type="button" class="add-lesson-btn">Add Lesson</button>
            <button type="button" class="delete-btn">Delete</button>
        </td>
    `;
        tableBody.appendChild(newRow);
        subjectIndex++;
    }

    function addLessonRow(button) {
        const parentRow = button.closest('tr');
        const parentIndex = Array.from(document.querySelectorAll('.parent-row')).indexOf(parentRow);
        const lessonIndex = parentRow.querySelectorAll('.lesson-row').length;
        const lessonRow = document.createElement('tr');
        lessonRow.classList.add('lesson-row');
        lessonRow.innerHTML = `
        <td></td>
        <td><input type="text" name="subjects[${parentIndex}][lessons][]" placeholder="Lesson Description"></td>
        <td>
            <button type="button" class="delete-btn">Delete</button>
        </td>
    `;
        parentRow.insertAdjacentElement('afterend', lessonRow);
    }

    function deleteRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>
</body>
</html>



<?php /**PATH E:\xampp8.2\htdocs\learning-management-emu\resources\views/admin/course/create.blade.php ENDPATH**/ ?>