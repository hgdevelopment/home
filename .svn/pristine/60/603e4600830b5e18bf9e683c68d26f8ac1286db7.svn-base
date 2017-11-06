<?php $__env->startSection('sidebar'); ?>

<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php 
use \App\Http\Controllers\Controller;
 ?>
<?php $__env->startSection('body'); ?>

<?php echo $__env->make('web.partial.profileheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/web/tcnwithDrawal" id="form" data-parsley-validate>
<?php echo e(csrf_field()); ?>

    <input type="hidden" id="tcnId" name="tcnId" value="<?php echo e($tcn->id); ?>">
    <input type="hidden" id="userId" name="userId" value="<?php echo e($tcn->userId); ?>">
    <input type="hidden" id="unit" name="unit" value="<?php echo e($availUnit); ?>">
    <input type="hidden" id="currencyType" name="currencyType" value="<?php echo e($availUnit); ?>">

    <input type="hidden" id="amount" name="amount" value="<?php echo e($availAmount); ?>">
    <input type="hidden" id="inrAmount" name="inrAmount" value="<?php if($tcn->currencyType!='INR'): ?><?php echo e(Controller::currencyConverter($tcn->currencyType,'INR',$availAmount)); ?><?php else: ?><?php echo e($availAmount); ?><?php endif; ?>">



      <div class="panel panel-warning">
    <div class="panel-heading font-bold">PERSONAL DETAILS</div>
    <div class="panel-body">

      <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab"><?php echo e($members->name); ?></b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Member Code<b class="data-lab"> <?php echo e($members->code); ?></b></div>
      <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab"><?php echo e($tcn->benefit->accountHolderName); ?></b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($tcn->benefit->bankName); ?></b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Branch<b class="data-lab"><?php echo e($tcn->benefit->branchName); ?></b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab"><?php echo e($tcn->benefit->accountNumber); ?></b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab"><?php echo e($tcn->benefit->ifsc); ?></b></div> 
    </div>
    </div>


    <div class="panel panel-warning">
      <div class="panel-heading font-bold">TCN PAYMENT DETAILS</div>
      <div class="panel-body">
                <div class="col-md-6 col-xs-12 divTableCell">TCN<b class="data-lab"><?php echo e($tcn->tcn->tcnType); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">TCN Code<b class="data-lab"><?php echo e($tcn->tcnCode); ?></b></div> 

                <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Unit<b class="data-lab"><?php echo e($tcn->unit); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Amount <b>( <?php echo e($tcn->currencyType); ?> )</b><b class="data-lab"><?php echo e($tcn->amount); ?></b></div> 

                   <div class="col-md-6 col-xs-12 divTableCell">Eligible Unit<b class="data-lab"><?php echo e($availUnit); ?></b></div>
                     <div class="col-md-6 col-xs-12 divTableCell">Eligible&nbsp;Amount<b>( <?php echo e($tcn->currencyType); ?> )</b><b class="data-lab"><?php echo e($availAmount); ?></b></div>  


                   <div class="col-md-6 col-xs-12 divTableCell">Currency Type<b class="data-lab"><?php echo e($tcn->currencyType); ?></b></div>
                     <div class="col-md-6 col-xs-12 divTableCell">Convert INR Amount<b class="data-lab"><?php echo e($tcn->inrAmount); ?></b></div>  

                      <div class="col-md-6 col-xs-12 divTableCell">Deposit Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcn->depositeDate))); ?></b></div>
                      <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcn->paymentReceivedDate))); ?></b></div>

                      <div class="col-md-12 col-xs-12 divTableCell"><b class="data-lab">&nbsp;</b></div>


                      <div class="col-md-6 col-xs-12 divTableCell"  style="background: #b2ec79;">Debit Heera Account<b class="data-lab"><?php echo e($tcn->heeraaccount->accountNumber); ?></b></div>
                      <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($tcn->heeraaccount->bankName); ?></b></div>

                      <div class="col-md-6 col-xs-12 divTableCell">Branch Name<b class="data-lab"><?php echo e($tcn->heeraaccount->branchName); ?></b></div>
                      <div class="col-md-6 col-xs-12 divTableCell">IFSC<b class="data-lab"><?php echo e($tcn->heeraaccount->ifsc); ?></b></div>
                      <div class="col-md-1 col-xs-12 divTableCell"><span class="font-bold text-danger h3">Type</span>
                      </div>
                      <div class="col-md-3 col-xs-12 divTableCell">
                      <select class="chosen-select form-control" id="type" name="type" required data-parsley-required-message="Select Withdrawal type" >
                      <option value=" ">--Select--</option>
                      <option value="Normal Withdrawal">Normal Withdrawal</option>
                      <option value="Emergency Withdrawal">Emergency Withdrawal</option></select>
                      </div>
                      <div class="col-md-3 col-xs-12 divTableCell">
                       <input type="submit" value="Send WithDrawal Request" class="btn btn-danger">
                       </div>
      </div>
    </div>
  </form> 

<?php echo $__env->make('web.partial.profilefooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             





<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
  $('chosen-select').chosen();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>