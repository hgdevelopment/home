<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php  
use \App\Http\Controllers\Controller;
 ?>

<?php $__env->startSection('body'); ?>


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3"><?php echo e($Title); ?></h1>
</div>

<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal">Request</a></li>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/List">List</a></li>
        <li <?php if($id=='Applied'): ?><?php echo e('class=active'); ?><?php endif; ?>><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/Applied">Applied</a></li>
        <li <?php if($id=='Paid'): ?><?php echo e('class=active'); ?><?php endif; ?>><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/Paid">Approved</a></li>
        <li <?php if($id=='Cancelled'): ?><?php echo e('class=active'); ?><?php endif; ?>><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/Cancelled">Cancelled</a></li>
      </ul>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
		<?php if($id=='Paid'): ?>
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Select WithDrawal Requests</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-md-2">YEAR
						<?php 
						$a =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   
						$b =DB::table('logins')->select(DB::raw('YEAR(created_at) as year'))->groupBy('year')->get();   
						$year = $a->merge($b);
						$year=$year->unique();
						 ?>

						<select id="year" name="year" class="form-control chosen-select">
							<option value=" ">--select--</option>
							<?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option <?php if(date('Y')==$year->year): ?><?php echo e('selected'); ?><?php endif; ?> value="<?php echo e($year->year); ?>"><?php echo e($year->year); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>
						</div>
						<div class="col-md-2">MONTH
							<select name="month" id="month" class="form-control chosen-select">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							</div>
						<div class="col-md-2">TCN
						<?php 
							$tcn=DB::table('tcnmasters')->get();
						 ?>
							<select id="tcnType" name="tcnType" class="form-control chosen-select">
								<option value="All">All</option>
								<?php $__currentLoopData = $tcn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($tcn->id); ?>"><?php echo e($tcn->tcnType); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>

						<div class="col-md-3">TYPE
							<select id="type" name="type" class="form-control chosen-select">
								<option value="All">All</option>
								<option value="Normal Withdrawal">Normal Withdrawal</option>	
								<option value="Emergency Withdrawal">Emergency Withdrawal</option>	
							</select>
						</div>

						<div class="col-md-1"><br><button class="btn btn-primary" onclick="withDrawalPaidDetails('list')">Search</button></div>
						<div class="col-md-2"><br><a class="btn btn-danger" onclick="withDrawalPaidDetails('excel')">Export Excel</a></div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>	









		<div class="panel panel-default">
			<div class="panel-heading font-bold"><?php echo e($Title); ?> </div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row" id="result">
					<?php if($id!='Paid'): ?>
					<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				        <thead>
				          <tr>
							<th>S&nbsp;NO</th>
							<th>MEMBER CODE</th>
							<th>NAME</th>
							<th>AMOUNT</th>
							<th>APPLIED DATE</th>
							<th>TCN </th>
							<th>TYPE </th>
							<th>STATUS</th>
							<th>ACTION</th>
						  </tr>
				        </thead>
				        
				        <tbody>
							<?php $i=1;?>
							<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr data-expanded="true">
							<td align="center"><?php echo e($i); ?></td>
							<td><?php echo e($detail->code); ?></td>
							<td><?php echo e($detail->name); ?></td>
							<td><?php echo e($detail->amount); ?></td>
							<td><?php echo e(date('d-m-Y',strtotime($detail->created_at))); ?></td>
							<td><?php echo e($detail->tcn->tcnType); ?></td>
							<td><?php echo e($detail->type); ?></td>

							<td align="center" style="padding: 2px !important">
							<div style="color:black;background:<?php if($detail->status=='Applied'): ?><?php echo e('yellow'); ?><?php elseif($detail->status=='Paid'): ?><?php echo e('#63ce63'); ?><?php else: ?> <?php echo e('#f67979'); ?><?php endif; ?>">
							<?php echo e($detail->status); ?>


							</div>
							<?php echo e(date('d-m-Y h:i:A',strtotime($detail->approvalDate))); ?>

							</td>


							<td style="cursor:pointer">
								<div class="btn-group dropdown">
								  <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
								  <ul class="dropdown-menu  dropdown-menu-right">
								    <li>
										<a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/<?php echo e('view@@@'); ?><?php echo e($detail->withDrawId); ?>" >View</a>
								    </li>
								  	<?php if($detail->status=='Applied' &&  Controller::UserAccessRights('Full WithDrawal Approve')=='1' ): ?>
								    <li>
										<a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/<?php echo e($detail->withDrawId); ?>/edit">Paid</a>
								    </li>
								    <?php endif; ?>
								    <?php if($detail->status=='Applied' &&  Controller::UserAccessRights('Full WithDrawal Cancel')=='1' ): ?>
								    <li>
										<a onclick="CancelRequest('<?php echo e($detail->tcnId); ?>','<?php echo e($detail->withDrawId); ?>')">Cancel</a>
								    </li>
								    <?php endif; ?>
								  </ul>
								</div>
							</td>
							</tr>
							<?php $i++;?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        </tbody>
				    </table>
				    <?php endif; ?>
					</div>
				</div> 
			</div>
		</div> 
</div>
<form  id="form1" method="post" action="<?php echo e(url('/admin/tcnFullWithDrawalExcel')); ?>">
<?php echo e(csrf_field()); ?>

<input type="hidden" name="year1" id="year1" value="">
<input type="hidden" name="month1" id="month1" value="">
<input type="hidden" name="tcnType1" id="tcnType1" value="">
<input type="hidden" name="type1" id="type1" value="">
<input type="hidden" name="excel" id="excel" value="List">
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>



<script type="text/javascript">
$('.chosen-select').chosen();
$('#table').dataTable();


function CancelRequest(tcnId,withDrawId)
{
swal({
  title: "Cancel!",
  text: "Are You Sure, You Want to Cancel This Request",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to write remarks!");
    return false
  }

  $.ajax({
    type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/create",
    data: {process:'cancelRequest',remarks:inputValue,tcnId:tcnId,withDrawId:withDrawId},
    success: function (data) {
				      		swal("Done!", "The Request is succesfully Cancelled!", "success");
				      		window.location.reload();
				  			},
  		});   
});
}



function withDrawalPaidDetails(filter)
{

var year=$('#year').val();
var month=$('#month').val();
var tcnType=$('#tcnType').val();
var type=$('#type').val();

if(filter=='list')
{
  $.ajax({
    type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/create",
    data: {process:'withDrawalPaidDetails',year:year,month:month,tcnType:tcnType,type:type},
    success: function (data)
     {	
     	$('#result').html(data);
	 }
	 
  	});  
  	 $('#table').dataTable();
}
if(filter=='excel')
{
$('#year1').val($('#year').val());
$('#month1').val($('#month').val());
$('#tcnType1').val($('#tcnType').val());
$('#type1').val($('#type').val());
$('#form1').submit();
} 


}
</script>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: <?php echo Session::get('sweet_alert.timer'); ?>,
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
            <?php  
            Session::Forget('sweet_alert');  ?>
            // more options
        });
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>