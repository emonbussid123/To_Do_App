  <!-- /.content-wrapper -->
  <footer>
    <!-- Vendor JS -->
    <script src="../js/jquery-3.6.0.min.js"></script>
	


  <script>
$(document).ready(function() {
   $('#updateTaskForm').on('submit', function(e) {
    e.preventDefault();

  $.ajax({
    url: 'update_task.php',
    type: 'POST',
    data: $(this).serialize() + '&edit_tasks=1',
    dataType: 'json',
    success: function(response) {
        if(response.status === 'success'){
            $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
        } else {
            let errorsHtml = '';
            $.each(response.message, function(key, val){
                errorsHtml += '<p class="text-white">' + val + '</p>';
            });
            $('#message').html('<div class="alert alert-danger">' + errorsHtml + '</div>');
        }
    }
});

});

});
</script>

      

	


  </footer>


</body>
</html>

