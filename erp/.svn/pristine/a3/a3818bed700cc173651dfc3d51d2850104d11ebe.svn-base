<?php $__env->startSection('sidebar'); ?>

<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<?php echo $__env->make('web.partial.profileheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/web/tcnwithDrawal">
  <?php echo e(csrf_field()); ?>

  <div class="row">
    <div class="col-md-12">
      <div class="row row-sm text-center">
        <div class="col-xs-6">
          <a href="#" class="block panel padder-v bg-primary item">
            <span class="text-white font-thin h1 block"><?php echo e($tcnDetails->tcn->tcnType); ?></span>
            <span class="text-muted text-xs">TCN</span>
            <span class="bottom text-right w-full">
              <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
            </span>
          </a>
        </div>
        <div class="col-xs-6">
          <a href="#" class="block panel padder-v bg-info item">
            <span class="text-white font-thin h1 block"><?php echo e($tcnDetails->status); ?></span>
            <span class="text-muted text-xs">Status</span>
            <span class="top">
              <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">TCN DETAILS</div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>   
            <td>Member Code</td>
              <th>
               <?php echo e($userProfile->code); ?>

              </th>
           
              <td>Currency</td>
              <th>
                <?php echo e($tcnDetails->currencyType); ?>

              </th>
            </tr>
            <tr>   
            <td>No of Units</td>
              <th>
                 <?php echo e($tcnDetails->unit); ?>

              </th> 
              <td>Amount</td>
              <th>
                <?php echo e($tcnDetails->amount); ?>

              </th>
            </tr>
            <tr>   
            <td>Pay Mode</td>
              <th>
                <?php echo e($tcnDetails->paymentMode); ?>

              </th> 
              <td>Deposit Date</td>
              <th>
                <?php echo e($tcnDetails->depositeDate); ?>

              </th>
            </tr>
            <tr>   
            <td>DD/Cheque/UTR/Ref.</td>
              <th>
                <?php echo e($tcnDetails->transactionNumber); ?>

              </th> 
              <td>Applying From</td>
              <th>
               <?php echo e($country->countryName); ?>

              </th>
            </tr>
          </tbody>
        </table>
          
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">ACCOUNT DETAILS FOR PAYMENT </div>
         
        <table class="table table-striped m-b-none" style="background: #f3f3f3;">
          <tbody>
            <tr>  
           
              <td>Name of Bank</td>
              <th>
                <?php echo e($bank->bankName); ?>

              </th>
              <td>Bank Account No.</td>
              <th>
                 <?php echo e($bank->accountNumber); ?>

              </th>
            </tr>
            <tr>   
            <td>Branch</td>
              <th>
                 <?php echo e($bank->branchName); ?>

              </th> 
              <td>IFSC</td>
              <th>
                <?php echo e($bank->ifsc); ?>

              </th>
            </tr>
            <tr>   
            <td>Account Holder Name</td>
              <th>
                <?php echo e($bank->accountHolderName); ?>

              </th> 
              <td></td>
              <th>
                
              </th> 
            </tr>
          </tbody>
        </table>      
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-danger text-center">
        <div class="panel-heading">
        <input type="hidden" name="tcnId" value="<?php echo e($tcnDetails->id); ?>">
        <input type="hidden" name="userId" value="<?php echo e($tcnDetails->userId); ?>">
        <input type="hidden" name="unit" value="<?php echo e($tcnDetails->unit); ?>">
        <input type="hidden" name="amount" value="<?php echo e($tcnDetails->amount); ?>">

        <input type="submit" value="Send With Draw Request" class="btn btn-primary">
        </div>
      </div>
    </div>
  </div>

</form>
<?php echo $__env->make('web.partial.profilefooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             





<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>