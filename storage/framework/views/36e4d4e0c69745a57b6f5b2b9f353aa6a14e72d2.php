<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
             <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<style type="text/css" media="screen">
  .modal-lg {
    width: 100% !important;
}
</style>
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
    <div class="table-responsive" style="padding: 7px;">
      <?php if($data->employeeType=="DSA"): ?>
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
    <?php elseif($data->employeeType=="ME"): ?>
     <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Target</th>
                <th>Achieve(ME)</th>
                <th>Achieve(DSA)</th>
                <th>Incentive (DSA-0.5%)</th>
                <th>Incentive (ME-%)</th>
                <th>Incentive (ME-Amt)</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <?php endif; ?>
      
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
      <?php if($data->employeeType=="DSA"): ?>
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
      <?php elseif($data->employeeType=="ME"): ?>
       <th>Sl.No</th>
        <th>TCN</th>
        <th>Member Code</th>
        <th>Date</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Mode</th>
        <th>Mobile</th>
        <th>DSA</th>
        <th>Intro(0.5%)</th>
      <?php endif; ?>
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
<?php if($data->employeeType=="DSA"): ?>
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
      $('.member_id_header').html(data.code +' - '+data.name);
      var _html='';
      for (var i in data.members) {
        _html+=' <tr><td>'+(parseInt(i)+1)+'</td><td>'+data.members[i].tcn+'</td><td>'+data.members[i].member_code+'</td><td>'+moment(data.members[i].approval_date).format('DD/MM/YYYY')+'</td><td>'+data.members[i].member_name+'</td><td>'+data.members[i].amount+'</td><td>'+data.members[i].currency_type+'</td><td>'+data.members[i].mode+'</td><td>'+data.members[i].memeber_mobile+'</td></tr>';
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
<?php endif; ?>
<?php if($data->employeeType=="ME"): ?>
<script>
$(function(){
  var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(URL::to('/')); ?>/admin/report_incentive_inner_me/<?php echo e($id); ?>',
        columns: [
            { data: 'me_code', name: 'me_code' , orderable: false, searchable: false},
            { data: 'me_name', name: 'me_name' , orderable: false, searchable: false},
            { data: 'target', name: 'target', orderable: false, searchable: false },
            { data: 'achieved_me', name: 'achieved_me', orderable: false, searchable: false },
            { data: 'achieved_dsa', name: 'achieved_dsa', orderable: false, searchable: false },
            { data: 'incentive_per_dsa', name: 'incentive_per_dsa', orderable: false, searchable: false },
            { data: 'incentive_per_me', name: 'incentive_per_me', orderable: false, searchable: false },
            { data: 'incentive_me_amt', name: 'incentive_me_amt', orderable: false, searchable: false },
            { data: 'salary', name: 'salary' , orderable: false, searchable: false},
           { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

  $(document).on('click','.report-btn-view',function(e){
     e.preventDefault();
    $.post('<?php echo e(URL::to('/')); ?>/admin/report_incentive_me',{
      'report_id':$(this).attr('data-id'),
      '_gen':$(this).attr('data-gen'),
      '_u':$(this).attr('data-u'),
      '_token': '<?php echo e(csrf_token()); ?>'
       },function(o){
      $('.member_id_header').html(o.name);
      var _html='';
      for (var i in o.data) {
        // <th>Sl.No</th>
        // <th>TCN</th>
        // <th>Member Code</th>
        // <th>Date</th>
        // <th>Name</th>
        // <th>Amount</th>
        // <th>Currency</th>
        // <th>Mode</th>
        // <th>Mobile</th>
        // <th>DSA</th>
        // <th>Intro(0.5)</th>
        _html+=' <tr><td>'+(parseInt(i)+1)+'</td><td>'+o.data[i].tcn+'</td><td>'+o.data[i].member_code+'</td><td>'+moment(o.data[i].date).format('DD/MM/YYYY')+'</td><td>'+o.data[i].member_name+'</td><td>'+o.data[i].amount+'</td><td>'+o.data[i].currenncy+'</td><td>'+o.data[i].mode+'</td><td>'+o.data[i].mobile+'</td><td>'+o.data[i].dsa+'</td><td>'+o.data[i].intro+'</td></tr>';
      }
      _html+=' <tr><td colspan="9"></td><td>Achieve(ME)</td><td >'+o.achieve_me+'</td></tr>';
      _html+=' <tr><td colspan="9"></td><td>Achieve(DSA)</td><td >'+o.achive_dsa+'</td></tr>';
      _html+=' <tr><td colspan="9"></td><td>Incentive(ME-'+o.target_per+'%)</td><td >'+o.me_incentive+'</td></tr>';
      _html+=' <tr><td colspan="9"></td><td>Incentive(DSA-0.5%)</td><td >'+o.dsa_incentive+'</td></tr>';
      _html+=' <tr><td colspan="9"></td><td>Salary(ME)</td><td >'+o.salary+'</td></tr>';
      _html+=' <tr><td colspan="9"></td><td>Total(Amt)</td><td >'+o.total+'</td></tr>';
      $('.inner-table-modal tbody').html(_html);
     $('#myModal').modal();
    },'json');


     
  });

  $(document).on('click','.report-btn-excel',function(e){
     e.preventDefault();
     var baseURL="<?php echo e(URL::to('/')); ?>";
     window.location.href=baseURL+'/admin/report_incentive_me/downloadExcel/'+$(this).attr('data-id')+'/'+$(this).attr('data-u')+'/'+$(this).attr('data-gen');
    
  });
  
})
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>