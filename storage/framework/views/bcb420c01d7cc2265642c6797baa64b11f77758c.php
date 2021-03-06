 <?php
  //$errors=session()->get('valiationErrors');
  ?>
<div class="row">
                            <div class="col-sm-4">
                           <div class="form-group">
                              <label>Type of proof</label>
                              <select  class="form-control" id="type_of_proof_two" name="type_of_proof_two" <?php echo e(isset($proof_two->proof->typeOfProof)?'readonly':''); ?> data-parsley-required-message="Type of proof is required" data-parsley-trigger="blur" required>
                              <option value="">Select</option>
                                    <?php $__currentLoopData = $listTypes['proof_type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proof_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($proof_type); ?>" <?php echo e((isset($proof_two->relationWithApplicant) && $proof_two->proof->typeOfProof==$proof_type)?'selected':''); ?> <?php echo e((old('type_of_proof_two')==$proof_type)?'selected':''); ?>><?php echo e(ucfirst($proof_type)); ?></option>
                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              
                           </div>
                           </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                              <label>ID Number</label>
                              <input type="text" class="form-control" placeholder="ID Number" id="proof_number_two" name="proof_number_two" value="<?php echo e(isset($proof_two->proof->proofNumber)?$proof_two->proof->proofNumber:''); ?><?php echo e(old('proof_number_two')); ?>" <?php echo e(isset($proof_two->proof->proofNumber)?'readonly':''); ?> data-parsley-required-message="ID Number is required" data-parsley-trigger="blur" >
                              
                           </div>
                           </div>
                           <div class="col-sm-4">
                          <div class="form-group">
                            <label>Upload Proof</label>
                           
                             <?php if(empty($proof_two->proof->file)): ?>
                              <input type="file" class="form-control" placeholder="Email"  data-parsley-extension="jpg,jpeg,png" name="nominee_proof_two" id="nominee_proof_two" data-parsley-max-file-size="200" data-parsley-required-message="Upload Proof is required" data-parsley-trigger="blur" required>
                             
                             <?php endif; ?>

                                  <?php if(isset($proof_two->proof->file)): ?>
                                      <img src="<?php echo e(URL::asset('/storage/img/proof/'.$proof_two->proof->file)); ?>" class="img-thumbnail" alt="" style="width: 150px;" />
                                  <?php endif; ?>
                          </div>
                            </div>
                           </div>
                         