 <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/inspinia.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/sweetalert/sweetalert.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 3,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    $('#modal-form').on('show.bs.modal', function(e) {  
        var activity_id = $(e.relatedTarget).data('id');
        $.ajax({
              url:'<?php echo base_url('ActivityList/getActivityByID');?>',
              type:'POST',
              data:{
                activity_id: activity_id 
              },
              success:function(data){
                var result = JSON.parse(data);
                $("#txtActivityID").val(activity_id);
                $("#txtActivity").val(result.activity_name);
                $("#txtAccessibility").val(result.accessibility);
                $("#txtParticipants").val(result.participants);
                $("#txtPrice").val(result.price);
              }
            
        });
    });


    function updateActivity(){
        var activity_id = $("#txtActivityID").val();
        var activity_name = $("#txtActivity").val();
        var accessibility = $("#txtAccessibility").val();
        var participants = $("#txtParticipants").val();
        var price = $("#txtPrice").val();
        $.ajax({
              url:'<?php echo base_url('ActivityList/updateActivity');?>',
              type:'POST',
              data:{
                activity_id: activity_id,
                activity_name: activity_name,
                accessibility: accessibility,
                participants: participants,
                price: price
              },
              success:function(data){
                swal("Updated!", "Successfully updated!", "success");
                window.location.reload();
              }
            
        });
    }

    function FetchNewActivity(){
        $.ajax({
              url:'<?php echo base_url('ActivityList/FetchNewActivity');?>',
              success:function(data){
                if(data == 10){
                    swal("Success!", "new activity added!", "success");
                    window.location.reload();
                }else if(data == 5){
                    swal("Failed", "Failed to fetch. No more activities available. Contact Admin and delete some to fetch again", "error");
                    //for some activity types only few activities are available - handling that
                }else{
                    swal("Failed", "Failed to fetch. Daily limit of 2 activities is reached.", "error");
                }
                
                
              }
            
        });
    }

    function DeleteActivity(activity_id){
      swal({
        title               :   "Are you sure?",
        text                :   "Are you sure you want to delete?!",
        type                :   "warning",
        showCancelButton    :   true,
        confirmButtonColor  :   "#DD6B55",
        confirmButtonText   :   "Yes!",
        cancelButtonText    :   "No!",
        closeOnConfirm      :   false,
        closeOnCancel       :   true },
        function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                  url:'<?php echo base_url('ActivityList/DeleteActivity');?>',
                  type:'POST',
                  data:{
                    activity_id: activity_id
                  },
                  success:function(data){
                    swal("Deleted!", "Successfully deleted!", "success");
                    window.location.reload();
                  }
                
            });
        }
        }
      );
    }

    </script>


  <div class="footer">
            <div>
                <strong>Developed by</strong> <a href="mailto:vinayakrishnanv@gmail.com" target="_blank">Vinayakrishnan</a> &copy; <?php echo date('Y'); ?>
            </div>
        </div>
        </div>
        
    </div>