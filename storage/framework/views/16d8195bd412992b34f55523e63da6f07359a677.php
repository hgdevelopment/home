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
  <h1 class="m-n font-normal h3">TCN Mebership</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">SELECT TCN MEMBERSHIP</div>
		<div class="panel-body">
			<div class="col-sm-12" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
				<div class="row">
					<div class="col-sm-7">
						<div class="col-sm-12"><br>
							<div class="row">
								<div class="col-sm-1"  style=" padding:2px 3px"><label>RECEIVED DATE</label>
				                  	<div class=" checkbox text-black" style="margin: 0 !important">
				                  	<label class="i-checks">
				                    <input type="checkbox" name="checkDate" id="checkDate" checked="checked"  /><i class="font-bold"></i>
				                  	</label>
				                  	</div>
								</div>
								<div class="col-sm-3 text-center"  style=" padding:2px 3px">
									<label>FROM</label>
									<input class="form-control"  data-date-end-date="0d" type="text" id="fDate" name="fDate" value="<?php echo e(date('d-m-Y', strtotime("-30 days"))); ?>" readonly style="padding: 5px 7px !important">
								</div>
								<div class="col-sm-3" style=" padding:2px 3PX">	
									<label>TO</label>
									<input class="form-control" data-date-end-date="0d" type="text" id="tDate" name="tDate" value="<?php echo e(date('d-m-Y')); ?>" readonly style="padding: 5px 7px !important">
								</div>
								<div class="col-sm-2"  style=" padding:2px 3px">
									<label>TCN TYPE</label>
									<select class="form-control chosen-select" name="tcnType" id="tcnType">
									<option value="All">All</option>
									<?php 
										$tcntypes=DB::table('tcnmasters')->get();	
									 ?>
									<?php $__currentLoopData = $tcntypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcntype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($tcntype->id); ?>"><?php echo e($tcntype->tcnType); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<div class="col-sm-3" style=" padding:2px 3px">
									<label>CURRENCY TYPE </label>
									<select class="form-control chosen-select" name="currencyType" id="currencyType">
									<option value="All">All</option>
									<option value="INR">INR</option>	
									<option value="USD">USD</option>	
									<option value="AED">AED</option>	
									<option value="SAR">SAR</option>	
			 						<option value="CAD">CAD</option>	
									</select>
								</div>
							</div>						
						</div><br>
					</div>

					<div class="col-sm-5" style="padding-left: 0px !important">
						<div class="col-sm-12"><br>
							<div class="row">
								<div class="col-sm-5">
								  <label>SEARCH BY</label>
								  <select class="form-control chosen-select"  style=" padding:0 3px;" onchange="searchBy(this.value)" id="searchBy" name="searchBy">
								  	<option value="0">Select</option>
									<option value="Member Code">Member Code</option>	
									<option value="Member Name">Member Name</option>	
									<option value="Mobile Number">Mobile Number</option>	
									<option value="OI Code">OI</option>	
									<option value="ME Code">ME</option>	
									<option value="DSA Code">DSA</option>	
									<option value="Transaction ID">Payment Mode</option>	
								  </select>
								</div>
								<div class="col-sm-7"  id="searchValueDiv">
									<label class="searchValue"></label>
									<input class="form-control" type="text" name="searchValue" id="searchValue">
								</div>
							</div>	
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 pull-right">
					<button class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="showTCN()">Search</button>
					</div>
				</div>
			</div>
		</div> 
	</div>	


	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN MEMBERSHIP LIST</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="table-responsive">
						<div  id="showTCN">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(function() {
    $( "#fDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
    $( "#tDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
});	
$(".chosen-select").chosen({width:'100%'});

function showTCN()
{
if(document.getElementById('checkDate').checked==true)
var checkDate = true;
else
var checkDate = false;

var fDate = $('#fDate').val();	
var tDate = $('#tDate').val();
var tcnType = $('#tcnType').val();	
var currencyType = $('#currencyType').val();	
var searchBy = $('#searchBy').val();

if(searchBy!='0')	
var searchValue = $('#searchValue').val();	
else
var searchValue ='0';	

$.ajax({
     type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnmembership/create",
     data:{checkDate:checkDate,fDate:fDate,tDate:tDate,tcnType:tcnType,currencyType:currencyType,searchBy:searchBy,searchValue:searchValue},
     success: function (data) {

 		$('#showTCN').html(data);
 		$('#table').dataTable();
 		$('#table.dataTable thead th, table.dataTable thead td').css('padding','10px 1px');
     }
 });
}



function searchBy(searchBy)
{
	if(searchBy=='0')
		$('#searchValueDiv').hide();
	else
	{
		$('#searchValueDiv').show();
		$('.searchValue').html(searchBy);
	}
}
$('#searchBy').val('0');
$('#searchBy').trigger('chosen:updated');
searchBy('0');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>