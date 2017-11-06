<div class="wrapper-md" >
   <div class="row">
      <div class="col-sm-12">
         <div class="blog-post">
            <div class="col-sm-12">
               <div class="panel-default">
                  <div class="table-responsive" style="overflow-x: initial;" id="tcndetails">
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading" >
                              <input type="hidden" name="">
                              <center>Pending TCN</center>
                           </div>
                           <tr>
                              <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency</th>
                              <th>Received Date</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        @foreach ($tcn as $tcns)
                        <tbody>
                           <tr>
                              <td>{{$sl++}}</td>
                              <td>{{$tcns->tcnType}}</td>
                              <td>{{$tcns->unit}}</td>
                              <td>{{$tcns->amount}}</td>
                              <td>{{$tcns->currencyType}}</td>
                              <td>{{$tcns->addedDate}}</td>
                              <td><a href="{{ url('/admin/pending_tcn', $tcns->id) }}" class="btn btn-info" >View</a></td>
                           </tr>
                        </tbody>
                        @endforeach
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Active TCN</center>
                           </div>
                           <tr>
                              <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency	</th>
                              <th>Received Date</th>
                              <th>Approved Date</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        @foreach ($tcn1 as $tcns1)
                        <tbody>
                           <tr>
                              <td>{{$sl++}}</td>
                              <td>{{$tcns1->tcnType}}</td>
                              <td>{{$tcns1->unit}}</td>
                              <td>{{$tcns1->amount}}</td>
                              <td>{{$tcns1->currencyType}}</td>
                              <td>{{$tcns1->addedDate}}</td>
                              <td>{{date('d-m-Y',strtotime($tcns1->approvalDate))}}</td>
                              <td><a href="{{ url('/admin/pending_tcn', $tcns1->id) }}" class="btn btn-info" >View</a></td>
                           </tr>
                        </tbody>
                        @endforeach
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Withdrawn TCN</center>
                           </div>
                           <tr>
                               <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency	</th>
                              <th>Received Date</th>
                             
                           </tr>
                        </thead>
                        @foreach ($tcn2  as $tcns2)
                        <tbody>
                           <tr>
                              <td>{{$sl++}}</td>
                              <td>{{$tcns2->tcnType}}</td>
                              <td>{{$tcns2->unit}}</td>
                              <td>{{$tcns2->amount}}</td>
                              <td>{{$tcns2->currencyType}}</td>
                              <td>{{$tcns2->addedDate}}</td>
                           </tr>
                        </tbody>
                        @endforeach
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Partial Withdrawn TCN</center>
                           </div>
                           <tr>
                               <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency</th>
                              <th>Applied date</th>
                              <th>Status</th>
                        </tr>
                        </thead>
                        @foreach ($tcn3  as $tcns3)
                        <tbody>
                           <tr>
                              <td>{{$sl++}}</td>
                              <td>{{$tcns3->tcnType}}</td>
                              <td>{{$tcns3->unit}}</td>
                              <td>{{$tcns3->amount}}</td>
                              <td>{{$tcns3->currencyType}}</td>
                              <td>{{date('d-m-Y',strtotime($tcns3->appliedDate))}}</td>
                              <td>{{$tcns3->status}}</td>
                           </tr>
                        </tbody>
                        @endforeach
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Transferred TCN</center>
                           </div>
                           <tr>
                               <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency	</th>
                              <th>Received Date</th>
                              <th>View Details</th>
                           </tr>
                        </thead>
                        @foreach ($tcn4  as $tcns4)
                        <tbody>
                           <tr>
                              <td>{{$sl++}}</td>
                              <td>{{$tcns4->tcnType}}</td>
                              <td>{{$tcns4->unit}}</td>
                              <td>{{$tcns4->amount}}</td>
                              <td>{{$tcns4->currencyType}}</td>
                              <td>{{$tcns4->addedDate}}</td>
                              <td><a href="{{ url('/admin/pending_tcn', $tcns4->id) }}" class="btn btn-info" >View</a></td>
                           </tr>
                        </tbody>
                        @endforeach
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>