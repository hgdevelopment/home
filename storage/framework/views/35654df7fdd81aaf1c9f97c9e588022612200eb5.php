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
  <h1 class="m-n font-thin h3">Generate Incentive</h1>
</div>

<div class="wrapper-md ng-scope" ng-controller="FlotChartDemoCtrl">
      <!-- stats -->
      <div class="row">
        <div class="col-md-12">
          <div class="row row-sm text-center">
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block"><?php echo e($currency['INR']); ?></span>
                <span class="text-muted text-xs">INR</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block"><?php echo e($currency['AED']); ?></span>
                <span class="text-muted text-xs">AED</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block"><?php echo e($currency['USD']); ?></span>
                <span class="text-muted text-xs">USD</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block"><?php echo e($currency['SAR']); ?></span>
                <span class="text-muted text-xs">SAR</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block"><?php echo e($currency['CAD']); ?></span>
                <span class="text-muted text-xs">CAD</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            
          </div>
        </div>
      </div>


      <div class="row">
      	<div class="col-md-12">
      		<div class="panel panel-default">
    <div class="panel-heading font-bold">                  
      Declare Incentive
    </div>
    <div class="panel-body">
      <form  role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/generate_incentive" id="generate_incentive" data-parsley-validate="">
      <?php echo e(csrf_field()); ?>

        <div class="form-group col-sm-4">
          <label  for="month_year"> Select Month: </label>
          <input type="text" class="form-control" id="month_year" name="month_year" placeholder="mm/yyyy" required>
        </div>
        
        <div class="form-group col-sm-4">
         <br/>
        <button type="submit" class="btn btn-default">Generate</button>
        </div>
      </form>
    </div>
  </div>
      	</div>
      </div>

      <div class="row">
        <div class="col-md-12">

        <div class="panel panel-default">
    <div class="panel-heading">
      Monthly Report
    </div>
    <div class="table-responsive" style="padding: 7px;">
      <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Generated Month</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
       
      
  </div>
  </div>
           
        </div>
      </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script >
$(function(){
	$('#month_year').datepicker({
    format: "mm/yyyy",
    viewMode: "months", 
    minViewMode: "months",
    autoclose:true
});

   var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo route('generate_incentive.datatbale'); ?>',
        columns: [
            { data: 'created_date', name: 'created_date' },
            { data: 'employeeType', name: 'employeeType' },
            { data: 'created_at_re', name: 'created_at_re' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
  $('#generate_incentive').submit(function(e){
    e.preventDefault();
    $.post($(this).attr('action'),$(this).serialize(),function(o){
       if(o.result==true){
          sweetAlert("Good Job!", o.message, "success");
          table.ajax.reload();
       }else{
          sweetAlert("Oops...", o.message, "error");

       }
    },'json');
  });
  //DSA
  $(document).on('click','.report-btn-view',function(e){
     e.preventDefault();
     var baseURL="<?php echo e(URL::to('/')); ?>";
     window.location.href=baseURL+'/admin/report_incentive/'+$(this).attr('data-id');
  });
  //DSA
  $(document).on('click','.report-btn-excel-dsa',function(e){
     e.preventDefault();
     var baseURL="<?php echo e(URL::to('/')); ?>";
     window.location.href=baseURL+'/admin/report_incentive_dsa_all/downloadExcel/'+$(this).attr('data-id');
  });
  //ME
  $(document).on('click','.report-btn-excel-me',function(e){
     e.preventDefault();
     var baseURL="<?php echo e(URL::to('/')); ?>";
     window.location.href=baseURL+'/admin/report_incentive_me_all/downloadExcel/'+$(this).attr('data-id');
  });
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>