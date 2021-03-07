<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Activity List</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
             
    
    
                    <div class="ibox-content">

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Activity</th>
                        <?php if($this->session->userdata('user_type')=='1'){ ?>
                        <th>User</th>
                        <?php } ?>
                        <th>Accessibility</th>
                        <th>Participants</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($activities as $row) {?>
                    <tr>
                        <td><?php echo $row['activity_name']; ?></td>
                        <?php if($this->session->userdata('user_type')=='1'){ ?>
                        <td><?php echo $row['name']; ?></td>
                        <?php } ?>
                        <td><?php echo $row['accessibility']; ?></td>
                        <td><?php echo $row['participants']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['activity_type']; ?></td>
                        <td>
                        <?php if($this->session->userdata('user_type')=='2'){ ?>
                        <a data-toggle="modal" href="#modal-form" data-id="<?php echo $row['activity_id']; ?>" title="Edit"><span class="label label-info"><i class="fa fa-edit" ></i></span></a>
                        <?php } ?>
                        <?php if($this->session->userdata('user_type')=='1'){ ?>
                        <a onclick="DeleteActivity(<?php echo $row['activity_id']; ?>)" title="Delete"><span class="label label-danger"><i class="fa fa-times" ></i></span></a>
                        <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </tfoot>
                    </table>
                    </div>  
                    <?php if($this->session->userdata('user_type')=='2'){ ?>   
                    <div>
                        <button type="button" class="btn btn-sm btn-info float-right m-t-n-xs" onclick="FetchNewActivity()" > Fetch Activity</button>
                    </div>
                    <?php } ?>
                    </div>



                </div>
            </div>
        </div>
    </div>


    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit</h3>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 b-r">
                            <p>Edit Activity details here.</p>

                            <form role="form">
                                <input type="hidden" name="txtActivityID" id="txtActivityID">
                                <div class="form-group"><label>Activity</label> 
                                    <input type="text" placeholder="Activity" name="txtActivity" id="txtActivity" class="form-control">
                                </div>
                                <div class="form-group"><label>Accessibility</label> 
                                    <input type="number" placeholder="Accessibility" name="txtAccessibility" id="txtAccessibility" class="form-control">
                                </div>
                                <div class="form-group"><label>Participants</label> 
                                    <input type="number" placeholder="Participants" name="txtParticipants" id="txtParticipants" class="form-control">
                                </div>
                                <div class="form-group"><label>Price</label> 
                                    <input type="number" placeholder="Price" name="txtPrice" id="txtPrice" class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-info float-right m-t-n-xs" type="button" onclick="updateActivity()"><strong>Update</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


