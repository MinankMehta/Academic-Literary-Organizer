$(document).ready(function() {
    // Submit form to add task
    $('#addTaskForm').submit(function(e) {
        e.preventDefault();
        var info = $('#info').val();
        var date = $('#date').val();
        var title = $('#title').val();

        $.ajax({
            type: "POST",
            url: "todo_backend.php",
            data: {
                action: 'addTask',
                info: info,
                date: date,
                title: title
            },
            success: function(response) {
                if (response === 'success') {
                    fetchTasks(); // Refresh tasks after adding
                    $('#info').val('');
                    $('#date').val('');
                    $('#title').val('');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    });

    // Function to fetch tasks
    function fetchTasks() {
        $.ajax({
            type: "GET",
            url: "fetch_tasks.php",
            success: function(response) {
                $('#todoList').html(response);
                makeDraggable();
            },
            error: function(xhr, status, error) {
                console.error("Fetch Tasks Error:", status, error);
            }
        });
    }

    // Make tasks draggable
    function makeDraggable() {
        $(".draggable").draggable({
            revert: true
        });
    }

    // Initial fetch of tasks on page load
    fetchTasks();
});
