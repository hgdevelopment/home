<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
             <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Incentive Report</h1>
</div>

<div class="wrapper-md ng-scope" ng-controller="FlotChartDemoCtrl">
      <!-- stats -->
      
  

      

      <div class="row">
        <div class="col-md-12">

        <div class="panel panel-default">
    <div class="panel-heading">
      Monthly Report(<?php echo e($data->employeeType); ?>)
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Target(INR)</th>
                <th>Target Achieve</th>
                <th>Incentive (%)</th>
                <th>Incentive (Amount)</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
       
      
  </div>
  </div>
           
        </div>
      </div>

</div>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title member_id_header">Member</h4>
        </div>
        <div >
          <table class="table inner-table-modal">
    <thead>
      <tr>
        <th>Sl.No</th>
        <th>TCN</th>
        <th>Member Code</th>
        <th>Date</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Mode</th>
        <th>Mobile</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<?php $__env->stopSection(); ?>
<script src="<?php echo e(URL::asset('js/moment.min.js')); ?>"></script>
<?php $__env->startSection('jquery'); ?>
<script >
$(function(){

   var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(URL::to('/')); ?>/admin/report_incentive_inner/<?php echo e($id); ?>',
        columns: [
            { data: 'dsa_code', name: 'dsa_code' },
            { data: 'dsa_name', name: 'dsa_name' },
            { data: 'target_amount', name: 'target_amount' },
            { data: 'achieved_amount', name: 'achieved_amount' },
            { data: 'incentive_per', name: 'incentive_per' },
            { data: 'incentive_amount', name: 'incentive_amount' },
           { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
  // $('#generate_incentive').submit(function(e){
  //   e.preventDefault();
  //   $.post($(this).attr('action'),$(this).serialize(),function(o){
  //      if(o.result==true){
  //         console.log(o.result);
  //         table.ajax.reload();
  //      }else{
  //         console.log(o.message);

  //      }
  //   },'json');
  // });
  $(document).on('click','.report-btn-view',function(e){
     e.preventDefault();
    $.post('<?php echo e(URL::to('/')); ?>/admin/report_incentive_dsa',{'report_id':$(this).attr('data-id'),"_token": "<?php echo e(csrf_token()); ?>"},function(o){
      var data= JSON.parse(o.data);
      $('.member_id_header').html(data.dsa_code +' - '+data.dsa_name);
      var _html='';
      for (var i in data.member_details) {
        _html+=' <tr><td>'+(parseInt(i)+1)+'</td><td>'+data.member_details[i].data.tcn+'</td><td>'+data.member_details[i].data.member_code+'</td><td>'+moment(data.member_details[i].data.approval_date).format('DD/MM/YYYY')+'</td><td>'+data.member_details[i].data.member_name+'</td><td>'+data.member_details[i].data.amount+'</td><td>'+data.member_details[i].data.currency_type+'</td><td>'+data.member_details[i].data.mode+'</td><td>'+data.member_details[i].data.memeber_mobile+'</td></tr>';
      }
      $('.inner-table-modal tbody').html(_html);
     $('#myModal').modal();
    },'json');


     
  });

   $(document).on('click','.report-btn-excel',function(e){
     e.preventDefault();
     var baseURL="<?php echo e(URL::to('/')); ?>";
     window.location.href=baseURL+'/admin/report_incentive_dsa/downloadExcel/'+$(this).attr('data-id');
    
  });

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>