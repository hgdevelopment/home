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
<h1 class="m-n font-normal h3">TCN Application Form <?php if(isset($Edit)): ?> <?php echo e('Edit'); ?><?php endif; ?></h1>
</div>
<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
      	<?php if(Controller::UserAccessRights('TCN Request')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnRequest">Request</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Application Form')): ?>
        <li class="active"><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm">Application Form</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Document Verification')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/Document">Document Verification</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Payment Verification')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/Payment">Payment Verification</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Add To Physical Benefit')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/TCNPhysicalBenefitList">Add Physical Benefit</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Payment Edit')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/TCNPaymentEdit">Payment Edit</a></li>
        <?php endif; ?>

      </ul>
</div>

<?php  
	session_start();
	if(isset($Edit) && is_array($Edit) && trim($__env->yieldContent('edits')))
	{ $_SESSION["Edit"]=$Edit;}	
 ?>

<input type="hidden" id="edits" name="edits" value="<?php echo e((isset($Edit))?'1':'0'); ?>">
<input type="hidden" id="editAc" name="editAc" value="<?php echo e((isset($Edit))?$Edit['selectAccountNumber']:'0'); ?>">
<input type="hidden" name="editHAc" id="editHAc" value="<?php echo e((isset($Edit))?$Edit['heeraAccountId']:'0'); ?>">
<input type="hidden" name="editMC" id="editMC" value="<?php echo e((isset($Edit))?$Edit['code']:'0'); ?>">
<input type="hidden" name="nom1" id="nom1" value="<?php echo e((isset($Edit))?$Edit['nominee1']:'0'); ?>">
<input type="hidden" name="nom2" id="nom2" value="<?php echo e((isset($Edit))?$Edit['nominee2']:'0'); ?>">

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

	<?php if(trim($__env->yieldContent('edits'))): ?>
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($Edit['editId']); ?>" enctype="multipart/form-data" id="form" data-parsley-validate>
	<?php else: ?>
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm" enctype="multipart/form-data" id="form" data-parsley-validate>
	<?php endif; ?>
		<?php echo e(csrf_field()); ?>

		<?php $__env->startSection('edit'); ?>
		<?php echo $__env->yieldSection(); ?>
		<input type="hidden" name="tcnId" id="tcnId" value="<?php echo e((isset($Edit))?$Edit['id']:'0'); ?>">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN CODE ( Request Code )
				<?php if(!isset($Edit)): ?>
					<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show" class="btn btn-info btn-sm" style="float: right;">TCN APPLICATION LIST</a>
				<?php endif; ?>
				<?php if(isset($Edit)): ?>
					<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/show" class="btn btn-info btn-sm" style="float: right;">BACK</a>
				<?php endif; ?>
			</div>

			<div class="panel-body">
					<input type="hidden" name="memberCode" id="memberCode" value="">
				<div class="row">	
					<div class="form-group col-sm-3">
						<label>TCN Code<span style="font-size: 12px">(Request Code)</span><span style="color:red;">*</span></label>
							<input type="text" name="tcnCode" id="tcnCode" class="form-control"  required data-parsley-required-message="Enter TCN Code" value="<?php if(isset($Edit)): ?><?php echo e($Edit['tcnCode']); ?><?php endif; ?>" <?php if(isset($Edit)): ?><?php echo e('readonly'); ?><?php endif; ?>>
							
					</div>

					<div  class="form-group col-sm-3"><br>
						<?php if(!isset($Edit)): ?>
						<input type="button" onclick="getMembers()" class="btn btn-primary" value="Search">
						<?php endif; ?>
					</div>

					<div  class="form-group col-sm-3 text-success text-center h2 font-bold" id="tcnName"><br>


					</div>
				</div>	

				</div>
			</div>      
		<!---                    MEMBER  DETAILS           -->
		<div class="panel panel-default">
			<div class="panel-heading font-bold">MEMBER DETAILS</div>
			<div class="panel-body" id="getMemberDetails">
				<!--         get Member Details From Ajax- -->
			</div>
		</div>      
		<!---             HEERA PAYMENT  DETAILS           -->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">HEERA PAYMENT DETAILS</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">Currency Type
						<input type="text" name="currencyType" id="currencyType" value="" class="form-control" readonly="">
						</div> 

						<div class="col-sm-4">Payment Mode
						<input type="text-danger" name="paymentMode" id="paymentMode" class="form-control"  value="" readonly>

						</div>

						<div class="col-sm-4">Unit
						<input type="text" name="unit" id="unit" value="" class="form-control"  readonly>
						</div>
					</div>
				</div> <div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4" id="getCountrys">ApplyingFrom
							
							<input type="hidden" name="applyingFrom" id="applyingFrom"   value="">
							<input type="text" name="applyingFromName" id="applyingFromName" value="" class="form-control" readonly>
						<!--   get Countrys from ajax -->	
						</div>

						<div class="col-sm-4">Amount
							<input type="text" name="amount" id="amount" class="form-control"  value="<?php echo e(old('amount')); ?>" class="form-control" readonly />
						</div>

						<div class="col-sm-4 ">Transaction&nbsp;Number (DD/Cheque/UTR/Ref..)<span style="color:red;">*</span>
							<input type="text" name="transactionNumber" id="transactionNumber" value="<?php echo e(old('transactionNumber')); ?><?php if(isset($Edit)): ?><?php echo e($Edit['transactionNumber']); ?><?php endif; ?>" class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="(?:\s*[a-zA-Z0-9]\s*)*" data-parsley-pattern-message="Enter Valid Transaction Number" required data-parsley-required-message="Enter Transaction No."/>
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">Deposit Date<span style="color:red;">*</span>
							<input class="form-control"  data-date-end-date="0d" type="text" id="depositeDate" name="depositeDate" value="<?php echo e(old('depositeDate')); ?><?php if(isset($Edit)): ?><?php echo e(date('d-m-Y',strtotime($Edit['depositeDate']))); ?><?php endif; ?>" required data-parsley-required-message="Select Deposit Date" readonly>

						</div>

						<div class="col-sm-4" >HEERA'S ACCOUNT NO
							<input type="hidden" name="heeraAccountId" id="heeraAccountId" value=""> 
							<input type="text" class="form-control" name="HeeraAccountnumber" id="HeeraAccountnumber" value="" readonly> 

						</div>
						<div class="col-md-4">
						
						</div>
					</div>
				</div>			
			</div>
		</div>      

		<!---                   BENEFIT REMITTANCE           -->
		<div class="panel panel-default">
			<div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2 font-bold">Select Ac/No</div>
						<div class="col-sm-4" id="getAccount">
						<!--   get Account from ajax -->
						</div>
						<div class="col-sm-6"></div>
					</div>
				</div>       <div class="col-sm-12">&nbsp;</div>

				<!--          Account details from ajax -->

				<div id="getAccountDetails">
				</div>
			</div>
		</div>      

		<!---                   SUPPORTING DOCUMENTS           -->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4">
							<?php if(isset($Edit)): ?>
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc1']); ?>" style="height:200px;width:200px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc1']); ?>')">
							<?php endif; ?>
							<br>Doc 1<span style="color:red;">*</span>
							<input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc1" id="doc1"  <?php  
							if(!isset($Edit)) echo 'required data-parsley-required-message="Select Document 1"  accept="image/png,image/jpeg"';   ?> onchange="imageCheck(this)">
							(Upload passbook/cancelled cheque/bank statement.) 
							<span class="doc1 text-danger"></span> 
							<?php if($errors->has('doc1')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('doc1')); ?></span>
                			<?php endif; ?>
						</div>

						<div class="col-sm-4">
							<?php if(isset($Edit)): ?>
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc2']); ?>" style="height:200px;width:200px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc2']); ?>')">
							<?php endif; ?>
							<br>Doc 2<span style="color:red;">*</span>
							<input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc2" id="doc2" <?php  
							if(!isset($Edit)) echo 'required data-parsley-required-message="Select Document 2" data-parsley-max-file-size="50" ';   ?> onchange="imageCheck(this)">
							(Upload Transfer statement proof.) 
							<span class="doc2 text-danger"></span> 
							<?php if($errors->has('doc2')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('doc2')); ?></span>
                			<?php endif; ?>
						</div>

						<div class="col-sm-4">
							<?php if(isset($Edit)): ?>
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc3']); ?>" style="height:200px;width:200px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($Edit['doc3']); ?>')">
							<?php endif; ?>
							<br>Doc 3<span style="color:red;">*</span>
							<input class="form-control" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="doc3" id="doc3" <?php  
							if(!isset($Edit)) echo 'required data-parsley-required-message="Select Document 3" data-parsley-max-file-size="50"';   ?> onchange="imageCheck(this)">
							(Upload Transaction proof/cheque proof/online transfer screenshot.) 
							<span class="doc3 text-danger"></span> 
							<?php if($errors->has('doc3')): ?>
                  			<span class="help-inline "><?php echo e($errors->first('doc3')); ?></span>
                			<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>      


		<!---             NOMINEE DETAILS           -->

		<div class="panel panel-default">
			<div class="panel-heading font-bold">NOMINEE DETAILS</div>

			

			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2 font-bold">Select Nominee 1</div>
						<div class="col-sm-4" id="getNominee1">
							<!--   get Nominee from ajax -->
							<select class="form-control col-md-6 chosen-select" name="nominee1" id="nominee1"  data-parsley-notequalto="#nominee2" data-parsley-notequalto-message="Select Different Nominees" onchange="getNomineeDetails(1)"  required data-parsley-required-message="Select Nominee 1">
									
							</select>
						</div>
						<div class="col-sm-6"></div>
					</div>
				</div>      <div class="col-sm-12">&nbsp;</div>


				<div id="getNomineeDetails1">
				<!--   get Nominee Details from ajax -->
				</div>
			</div>

			


			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-2 font-bold">Select Nominee 2</div>
						<div class="col-sm-4" id="getNominee2">
							<!--   get Nominee from ajax -->
							<select class="form-control col-md-6 chosen-select" name="nominee2" id="nominee2" onchange="getNomineeDetails(2)"  required data-parsley-required-message="Select Nominee 2">
									
							</select>
						</div>
						<div class="col-sm-6"></div>
					</div>
				</div>      <div class="col-sm-12">&nbsp;</div>


				<div id="getNomineeDetails2">
				<!--   get Nominee Details from ajax -->
				</div>
				 <div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12 text-center">
				<input type="submit" value="<?php if(!isset($Edit)): ?><?php echo e('Add'); ?><?php else: ?><?php echo e('Save'); ?><?php endif; ?>" class="btn btn-success" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php if(!isset($Edit)): ?>
				<input type="reset" name="clear" value="Clear" class="btn btn-danger"/>
				<?php else: ?>
				<input type="button" name="clear" value="Cancel" onclick="window.history.back()" class="btn btn-danger"/>
				<?php endif; ?>
				</div>
			</div>
		</div>     
	</form>	
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

$( "#depositeDate").datepicker({format:'dd-mm-yyyy',autoclose: true});


$(".chosen-select").chosen({width:'100%'});

$("#nominee2").attr('required',false).trigger('chosen:updated');	
</script>




<script type="text/javascript">
//

getMembers();



function getMembers()
{

// var userCode=$('#memberCode').val().replace(/\s/g, '');
var tcnCode=$('#tcnCode').val().replace(/\s/g, '');
var edits=$('#edits').val();
	
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:1,edits:edits,tcnCode:tcnCode},
	success: function (data) {
		if(data['tcnCount']!=1 && tcnCode!='' && tcnCode!=null)
		{
		    sweetAlert("Check...","Incorrect TCN Code.." , "error");
		   $('#memberCode').val(' ');
		   $('.memberCode').html('Enter A Valid Member Code');
		}
		else if(data['memberCount']!=1 && tcnCode!='' && tcnCode!=null)
		{
		    sweetAlert("Check...","This Member is Not Active." , "error");
		   $('#tcnCode').val(' ');
		   $('.tcnCode').html('Enter A Valid Member Code');
		}
		$('#memberCode').val(data['memberCode']);

		getMemberDetails();

	}
	});
}

function getMemberDetails(check)
{

	var edits=$('#edits').val();

	var id=$('#memberCode').val();	

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:2,id:id,check:check,edits:edits},
	success: function (data) {
	$('#getMemberDetails').html(data);
		paymentDetails();

		getAccount();	
		getNominee();
	}
	});
}

function paymentDetails()
{
	var tcnCode=$('#tcnCode').val();
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:3,tcnCode:tcnCode},
	success: function (data) {
		 var tcnCode=$('#tcnCode').val().replace(/\s/g, '');

		 if(tcnCode!='' && tcnCode!=null)
		 {
		 $('#currencyType').val(data['currencyType']);
		 $('#paymentMode').val(data['paymentMode']);
		 $('#unit').val(data['unit']);
		 $('#applyingFrom').val(data['applyingFrom']);
		 $('#applyingFromName').val(data['applyingFromName']);

		 $('#amount').val(data['amount']);
		 $('#tcnId').val(data['tcnId']);
		 $('#heeraAccountId').val(data['heeraAccountId']);
		 $('#HeeraAccountnumber').val(data['HeeraAccountnumber']);
		 if(data['tcnName'])
		 $('#tcnName').html('<br>'+data['tcnName']);
		}
		else
			$('#tcnName').html('');	
	}
	});}


function getAccount()
{

var edits=$('#edits').val();
var id=$('#memberUserId').val();
var editAc=$('#editAc').val();	

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:4,id:id,edits:edits,editAc:editAc},
	success: function (data) {
	$('#getAccount').html(data);
	$(".chosen-select").chosen({width:'100%'});

	if(edits==1)
	getAccountDetails();  

	}
	});
}


function getAccountDetails(change)
{

var edits=$('#edits').val();
var editAc = $('#editAc').val();


	var id=$('#selectAccountNumber').val();		
	var memberName=$('#memberName').val();		
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:5,id:id,change:change,memberName:memberName,edits:edits,editAc:editAc},
	success: function (data) {
	$('#getAccountDetails').html(data);
	$(".chosen-select").chosen({width:'100%'});
	 	
	$("#getAccountDetails *").parsley(); 	
	}
	});
}



function getNominee()
{

var edits=$('#edits').val();

	var memberUserId = $('#memberUserId').val();

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:6,memberUserId:memberUserId,edits:edits},
	success: function (data) 
		{


		    $('#nominee1').html('').trigger("chosen:updated");  
		    if(edits!=1)
		    {
			$('#nominee1').append('<option value=" ">Select</option>').trigger("chosen:updated");
			$('#nominee1').append('<option value="Others1">Others</option>').trigger("chosen:updated");
			}   
			var nom1=$('#nom1').val();
			for (var i=0;i<data.length;i++)
			{
			$('#nominee1').append('<option value="'+data[i].id+'">'+data[i].name+'</option>').trigger("chosen:updated");    	
			}
			 <?php if(isset($Edit['nominee1'])): ?>
			 $('#nominee1').val(nom1).trigger("chosen:updated");   
			 <?php endif; ?>



		    $('#nominee2').html('').trigger("chosen:updated"); 
			$('#nominee2').append('<option value=" ">Select</option>').trigger("chosen:updated");
		    if(edits!=1)
		    {
			$('#nominee2').append('<option value="Others2">Others</option>').trigger("chosen:updated");
			}   
			var nom2=$('#nom2').val();


			for (var i=0;i<data.length;i++)
			{
			$('#nominee2').append('<option value="'+data[i].id+'" >'+data[i].name+'</option>').trigger("chosen:updated");    	
			}
			<?php if(isset($Edit['nominee2'])): ?>
			 $('#nominee2').val(nom2).trigger("chosen:updated");   
			 <?php endif; ?>


	$(".chosen-select").chosen({width:'100%'});

	var userCode=$('#memberCode').val().replace(/\s/g, '');
	if(userCode!='')
	getNomineeDetails(1);
	}
	});
}


function getNomineeDetails(n)
{

	var nominee=$('#nominee'+n).val();


	if(nominee==' ' || nominee==null)
	{
		$('#nomineePhotos'+n).css('display','none');
		$('#getNomineeDetails'+n).css('display','none');
		return ;
	}
	else
	{
		$('#nomineePhotos'+n).css('display','block');
		$('#getNomineeDetails'+n).css('display','block');
	}

	var edits=$('#edits').val();

	var id=$('#nominee'+n).val();	

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:7,id:id,nominee:nominee,edits:edits,n:n},
	success: function (data) {

	$('#getNomineeDetails'+n).html(data);


	$("#getNomineeDetails"+n+" *").parsley();


	$( "#dob"+n).datepicker({format:'dd-mm-yyyy',autoclose: true});





	if(n==1)
	{
	<?php  
	if(isset($Edit['nominee1'])){  ?>	var Nphoto=1;	<?php  } else
	{  ?>	var Nphoto=0;	<?php  	}  ?>

	if(id=='Others1'  && Nphoto!=1)
	$('#nomineePhotos1').css('display','block');

	if(id!='Others1' && Nphoto!=1)
	{
	$(".removeattr1").attr("required", false);	
	$('#nomineePhotos1').css('display','none');
	$('.nomineePhoto1').css("display","block");
	}


	if(id=='Others1'  && Nphoto==1)
	{
	$(".removeattr1").attr("required", true);
	}
	}


<<<<<<< .mine
	if(id=='Others'+n  && Nphoto!=1)
	document.getElementById('nomineePhotos'+n).style.display = 'block';
||||||| .r621
	if(id=='Others'+n  && Nphoto!=1)
		$('#nomineePhotos'+n).css('display','block');
	//document.getElementById('nomineePhotos'+n).style.display = 'block';
=======
>>>>>>> .r777

	if(n==2)
	{
<<<<<<< .mine
	$(".removeattr"+n).attr("required", false);	
	document.getElementById('nomineePhotos'+n).style.display = 'none';
	}
||||||| .r621
	$(".removeattr"+n).attr("required", false);	
	$('#nomineePhotos'+n).css('display','none');
	//document.getElementById('nomineePhotos'+n).style.display = 'none';
	}
=======
		<?php  
		if(isset($Edit['nominee2'])){  ?>	var Nphoto=1;	<?php  } else
		{  ?>	var Nphoto=0;	<?php  	}  ?>
>>>>>>> .r777

	if(n==2 && nominee==' ')
	{
	$("#nominee2").attr('required',false);	
	$("#getNomineeDetails2 *").find("select, input").attr('required',false);
	}

	if(n==2 && nominee!=' ')
	{

		if(id!='Others2'  && Nphoto==1)
		{
		$("#getNomineeDetails2 *").find("select, input").attr('required',true);
		$(".removeattr"+n).attr("required", false);
		$('#nomineePhotos2').css('display','block');
		}

		if(id!='Others2'  && Nphoto==1)
		{
		$('#nomineePhotos2').css('display','block');
		$(".removeattr"+n).attr("required", false);
		}

		if(id!='Others2'  && Nphoto!=1)
		{
		$('#nomineePhotos2').css('display','none');
		$(".removeattr"+n).attr("required", false);
		}		

		if(id=='Others2'  && Nphoto==1)
		{
		$(".removeattr"+n).attr("required", true);
		}
	}

	}
	}
	});
	if(n==1)
	getNomineeDetails(2);
}








function imageCheck(feild){

    var feildName  = feild.name;

    var FileName  = feild.value;

    var idxDot = FileName.lastIndexOf(".") + 1;
    var extFile = FileName.substr(idxDot, FileName.length).toLowerCase();

    var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
    var FileSize = feild.files[0].size;

     $("."+feildName).html(""); 

  	if(FileSize>204800)
	{
		$("."+feildName).html("Upload File size allowed is 200 Kb.");
		document.getElementById(feildName).value="";
		return;
	}
    else if(extFile!="jpg" && extFile!="jpeg" && extFile!="png")
    {
		$("."+feildName).html("Only jpg/jpeg and png  files are allowed!");
		document.getElementById(feildName).value='';
	 	 return;
    }
    else
    {
		$("."+feildName).html("");
    }   
}









$("form").submit(function() {

var tcnCode=$('#tcnCode').val().replace(/\s/g, '');
var edits=$('#edits').val();
	
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
	data:{opcode:1,edits:edits,tcnCode:tcnCode},
	success: function (data) {
		if(data['tcnCount']!=1 && tcnCode!='' && tcnCode!=null)
		{
		    sweetAlert("Check...","Incorrect TCN Code.." , "error");
		   $('#memberCode').val(' ');
		   $('.memberCode').html('Enter A Valid Member Code');
		   return;
		}
		else if(data['memberCount']!=1 && tcnCode!='' && tcnCode!=null)
		{
		    sweetAlert("Check...","This Member is Not Active." , "error");
		   $('#tcnCode').val(' ');
		   $('.tcnCode').html('Enter A Valid Member Code');
		   return;
		}

		}
   });
});


</script>
<?php  
if(isset($Edit)){  ?>
<script type="text/javascript">
calcAmount();	
</script>
<?php 
}
 ?>
<script src="<?php echo e(URL::asset('js/parsley-fields-comparison-validators.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>