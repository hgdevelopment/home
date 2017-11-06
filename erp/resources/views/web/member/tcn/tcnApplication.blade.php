@extends('web.layout.erp')

@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection

@section('sidebar')

@include('web.partial.header')
@include('web.partial.aside')

@endsection
<style type="text/css" media="screen">
  #parsley-id-25 {
    position: absolute;
    padding-top: 0px !important;
}
</style>
@section('body')
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">TCN Application</h1>
            </div>


<br/>
 <form id="tcn_application" action="{{URL::to('/') }}/web/tcnapplication" method="POST" enctype="multipart/form-data" data-parsley-validate="">
  {{csrf_field()}}

  <input type="hidden" name="added_by" id="added_by" value="MYSELF">
  
      <div class="col-sm-12">
      <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">TCN</div>
        <div class="panel-body">
        <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
              <label>Your ID</label>
              <input type="text" class="form-control" placeholder="Your ID" value="{{$userProfile->code}}" name="member_code" id="member_code" disabled="disabled">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label>Select TCN</label>
              <select name="tcn" id="tcn" class="form-control"    data-parsley-required-message="TCN is required" data-parsley-trigger="blur" required >
                <option value="">Select</option>
                @foreach ($tcntypes as $element)
                <option value="{{$element->id}}" {{ (old('tcn')==$element->id)?'selected':'' }}>{{$element->tcnType}}</option>
                @endforeach
              </select>
            </div>
            </div>
            </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading font-bold">NOMINEE DETAILS(1)</div>
        <div class="panel-body">
            <div class="form-group">
              <label>Select Nominee</label>
              <select name="select_nominee" id="select_nominee" class="form-control" data-parsley-required-message="Please select Nominee" required data-parsley-trigger="blur">
                <option value="" data-id="0">Select</option>
                @foreach ($nominee as $element)
                   <option value="{{$element->id}}" data-id="{{$element->userId}}" {{ (old('select_nominee')==$element->id)?'selected':'' }}>{{$element->name}}</option>
                @endforeach
                <option value="-1" data-id="-1" {{ (old('select_nominee')=='-1')?'selected':'' }}>New</option>
              </select>
            </div>
            <div id="nominee_details">
            <?=$nomineehtml; ?>
            
            </div>
            
        </div>
      </div>

        <div class="panel panel-default">
                        <div class="panel-heading font-bold">Nominee Proof(1)</div>
                        <div class="panel-body" id="nominee_proof">
                         <?=$proofhtml; ?>
                        </div>
                     </div>
                     <div class="panel panel-default">
        <div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
        <div class="panel-body">
           <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Document 1</label>
              <input type="file" class="form-control" data-parsley-trigger="blur" value="" name="doc1" id="doc1" data-parsley-extension="jpg,jpeg,png"  data-parsley-required-message="Document 1 is required" data-parsley-max-file-size="200" required>
              <span class="help-block m-b-none">(Upload passbook/cancelled cheque/bank statement.)</span>
              
            </div>
            </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Document 2</label>
              <input type="file" class="form-control"  name="doc2" id="doc2" data-parsley-extension="jpg,jpeg,png" data-parsley-required-message="Document 2 is required" data-parsley-max-file-size="200" required>
              <span class="help-block m-b-none">(Upload Transfer statement proof.)</span>
               
            </div>
            </div>
            </div>
            
            <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Document 3</label>
              <input type="file" class="form-control" value="" data-parsley-trigger="blur" name="doc3" id="doc3" data-parsley-extension="jpg,jpeg,png" data-parsley-required-message="Document 3 is required" data-parsley-max-file-size="200" required>
              <span class="help-block m-b-none">(Upload Transaction proof/cheque proof/online transfer screenshot.)</span>
               
            </div>
            </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
     <div class="panel panel-default">
        <div class="panel-heading font-bold">Heera Payment Details</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Currency</label>

              <select name="curency_type" id="curency_type" class="form-control" data-parsley-required-message="Please Select Currency Type" required data-parsley-trigger="blur">
                <option value="">Select</option>
                <option value="INR" {{ (old('curency_type')=='INR')?'selected':'' }}>INR</option>
                <option value="AED" {{ (old('curency_type')=='AED')?'selected':'' }}>AED</option>
                <option value="USD" {{ (old('curency_type')=='USD')?'selected':'' }}>USD</option>
                <option value="SAR" {{ (old('curency_type')=='SAR')?'selected':'' }}>SAR</option>
                <option value="CAD" {{ (old('curency_type')=='CAD')?'selected':'' }}>CAD</option>
              </select>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label>No of Units</label>
              <input type="text" class="form-control" placeholder="No of Units"  name="no_of_units" id="no_of_units" value="{{ old('no_of_units') }}" data-parsley-required-message="No of Units is required" data-parsley-trigger="blur" data-parsley-pattern="^[1-9][0-9]{0,2}$" required>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Amount</label>
              <input type="text" class="form-control" data-parsley-trigger="blur" placeholder="Amount"  name="amount" id="amount" value="" readonly data-parsley-required-message="Amount is required" required>
              
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Pay Mode</label>
              <select name="pay_mode" id="pay_mode" class="form-control" data-parsley-required-message="Pay Mode is required" data-parsley-trigger="blur" required>
              <option value="">Select</option>
                <option value="cheque" {{ (old('pay_mode')=='cheque')?'selected':'' }}>CHEQUE</option>
                <option value="DD" {{ (old('pay_mode')=='DD')?'selected':'' }}>DD</option>
                <option value="online" {{ (old('pay_mode')=='online')?'selected':'' }}>ONLINE TRANSFER</option>
                <option value="cash" {{ (old('pay_mode')=='cash')?'selected':'' }}>CASH</option>
                <option value="other" {{ (old('pay_mode')=='other')?'selected':'' }}>OTHERS</option>
              </select>
              
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Deposit Date</label>
              {{-- <input type="text" class="form-control" placeholder="Deposit Date"  name="deposite_date" id="deposite_date" value="{{ old('deposite_date') }}" data-parsley-required-message="Deposit Date is required" required> --}}

             <input class="form-control"  data-date-end-date="0d" type="text" placeholder="Deposit Date" id="deposite_date" name="deposite_date" value="{{ old('deposite_date') }}" required data-parsley-required-message="Deposit Date is required" readonly>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label>DD/Cheque/UTR/Ref.</label>
              <input type="text" class="form-control" placeholder="DD/Cheque/UTR/Ref." data-parsley-trigger="blur"  name="payment_type" id="payment_type" value="{{ old('payment_type') }}" data-parsley-required-message="Deposit Date is required" required>
              
            </div>
            </div>
            </div>
            <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Applying From</label>
              <select name="applying_from" id="applying_from" class="form-control" data-parsley-trigger="blur" data-parsley-required-message="Applying From is required" required>
              <option value="">Select</option>
                @foreach ($listTypes['country'] as $country)
                                    <option value="{{$country->id}}" {{ (old('applying_from')==$country->id)?'selected':'' }}>{{$country->countryName}}</option>
                                       {{-- expr --}}
                                    @endforeach
              </select>
              
            </div>
            </div>
             <div class="col-sm-6">
            <div class="form-group">
              <label>HEERA's ACCOUNT NO/IBAN No</label>
              {{-- <input type="hidden" name="hidden_heera_account" id="hidden_heera_account" value="{{ old('hidden_heera_account') }}"> --}}
             {{--  <input type="text" class="form-control" placeholder="HEERA's ACCOUNT NO/IBAN No"  name="heera_account" id="heera_account" value="{{ old('heera_account') }}" data-parsley-required-message="Heera Account No is required" required> --}}
              
              <select class="form-control"  name="heera_account" id="heera_account" data-parsley-trigger="blur" data-parsley-required-message="Heera Account No is required" required>
              </select>
            </div>
            </div>
        </div>
      </div>
</div>
      <div class="panel panel-default">
        <div class="panel-heading font-bold">NOMINEE DETAILS(2)</div>
        <div class="panel-body">
            <div class="form-group">
              <label>Select Nominee</label>
              <select name="select_nominee_two" id="select_nominee_two" class="form-control" data-parsley-required-message="Please select Nominee" required data-parsley-trigger="blur" data-parsley-notequalto="#select_nominee">
                <option value="" data-id="0">Select</option>
                @foreach ($nominee as $element)
                   <option value="{{$element->id}}" data-id="{{$element->userId}}" {{ (old('select_nominee_two')==$element->id)?'selected':'' }}>{{$element->name}}</option>
                @endforeach
                <option value="-2" data-id="-1" {{ (old('select_nominee_two')=='-1')?'selected':'' }}>New</option>
              </select>
            </div>
            <div id="nominee_details_two">
            <?=$nomineehtml_two; ?>
            
            </div>
            
        </div>
      </div>

       <div class="panel panel-default">
                        <div class="panel-heading font-bold">Nominee Proof(2)</div>
                        <div class="panel-body" id="nominee_proof_two">
                         <?=$proofhtml_two; ?>
                        </div>
                     </div>

      
      <div class="panel panel-default">
        <div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
        <div class="panel-body">
           <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Bank Account</label>
              <select name="benifit_account_bank" id="benifit_account_bank" class="form-control" data-parsley-trigger="blur" data-parsley-required-message="Bank Account is required"  required>
               <option value="" data-id="-1">Select</option>
               @foreach ($userProfile->bank as $element)
                  <option value="{{$element->id}}" data-id="{{$element->userId}}" {{ (old('benifit_account_bank')==$element->id)?'selected':'' }}>{{$element->bankName}}/{{$element->accountHolderName}}</option>
               @endforeach
                <option value="-1" data-id="-1" {{ (old('benifit_account_bank')=='-1')?'selected':'' }}>New</option>
              </select>
             
            </div>
            </div>
            </div>
           <div id="bank_account">
           <?=$benifitAccount; ?>
          </div>
              </div>
      </div>
       
    </div>


  </div>
  <div class="form-group col-sm-12">
          <div class="col-sm-4 col-sm-offset-5">
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{URL::to('/') }}/web/tcnapplication" class="btn btn-default">Cancel</a>
          </div>
        </div>
    </div>


             
</form>




@endsection

@section('jquery')
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script  type="text/javascript" >
  $(function(){
    $('#applying_from, #select_nominee, #select_nominee_two, #benifit_account_bank, #type_of_proof, #heera_account').chosen({width:'100%'});
    $('#expiry_date, #issued_date, #deposite_date, #dob_nominee').datepicker({'autoclose':true,format: 'dd/mm/yyyy'});
    var tcnData=null;
    $('#select_nominee').change(function(){
      // if((this).val()==""){
      //   return;
      // }
      $.post('{{ route('web.ajax.nominee') }}',{
       'userid':$('option:selected',this).attr('data-id'),
       'id':$(this).val(),
       '_token':'{{ csrf_token() }}'
      },function(o){
        $('#nominee_details').html(o);
            $('#expiry_date, #issued_date, #deposite_date, #dob_nominee').datepicker({'autoclose':true,format: 'dd/mm/yyyy'});
      });

      $.post('{{ route('web.ajax.proof') }}',{
       'userid':$('option:selected',this).attr('data-id'),
       'id':$(this).val(),
       '_token':'{{ csrf_token() }}'
      },function(o){
        $('#nominee_proof').html(o);
            $('#expiry_date, #issued_date, #deposite_date, #dob_nominee').datepicker({'autoclose':true,format: 'dd/mm/yyyy'});
      });

    });

    $('#select_nominee_two').change(function(){
      // if((this).val()==""){
      //   return;
      // }
      $.post('{{ route('web.ajax.nominee_two') }}',{
       'userid':$('option:selected',this).attr('data-id'),
       'id':$(this).val(),
       '_token':'{{ csrf_token() }}'
      },function(o){
        $('#nominee_details_two').html(o);
            $('#expiry_date_two, #issued_date_two, #deposite_date_two, #dob_nominee_two').datepicker({'autoclose':true,format: 'dd/mm/yyyy'});
      });

      $.post('{{ route('web.ajax.proof_two') }}',{
       'userid':$('option:selected',this).attr('data-id'),
       'id':$(this).val(),
       '_token':'{{ csrf_token() }}'
      },function(o){
        $('#nominee_proof_two').html(o);
            $('#expiry_date_two, #issued_date_two, #deposite_date_two, #dob_nominee_two').datepicker({'autoclose':true,format: 'dd/mm/yyyy'});
      });
      
    });

    $('#benifit_account_bank').change(function(){

      $.post('{{ route('web.ajax.bank') }}',{
       'userid':$('option:selected',this).attr('data-id'),
       'id':$(this).val(),
       '_token':'{{ csrf_token() }}'
      },function(o){
        $('#bank_account').html(o);
            $('#expiry_date, #issued_date, #deposite_date, #dob_nominee').datepicker({'autoclose':true,format: 'dd/mm/yyyy'});

            
      });

      
    });

    $('#curency_type').change(function(){
      heeraaccount_allots();
       if(tcnData==null)
        return ;

        switch($(this).val()) {
          case 'INR':
              $('#amount').val(tcnData.inr);
              $('#amount').attr('data-amount',tcnData.inr);
              break;
          case 'AED':
              $('#amount').val(tcnData.aed);
              $('#amount').attr('data-amount',tcnData.aed);
              break;
          case 'USD':
              $('#amount').val(tcnData.usd);
              $('#amount').attr('data-amount',tcnData.usd);
              break;
          case 'SAR':
              $('#amount').val(tcnData.sar);
              $('#amount').attr('data-amount',tcnData.sar);
              break;
          case 'CAD':
              $('#amount').val(tcnData.cad);
              $('#amount').attr('data-amount',tcnData.cad);
              break;
          default:
              $('#amount').val(0);
      }
      $('#no_of_units').trigger('input');
      });

    $('#no_of_units').on('input', function (event) { 
        this.value = this.value.replace(/[^0-9]/g, '');
        if($('#amount').val()=='')
        return false;
        var amount = parseFloat($('#amount').attr('data-amount'))*parseFloat($(this).val());
        if(isNaN(amount)){
          $('#amount').val(0);
        }else{
        $('#amount').val(amount);
        }
    });

    $('#tcn').change(function(e){
      e.preventDefault();
      heeraaccount_allots();
      if($(this).val()=='')
        return false;

      $.post('{{ route('web.ajax.tcnmaster') }}',{
       'id':$(this).val(),
       '_token':'{{ csrf_token() }}'
      },function(o){
       tcnData=o.result;
      // if($('#no_of_units').val()===''){
      //   $('#no_of_units').val(0);
      // }
     //  if('old('curency_type')'!==''){
      $( "#curency_type" ).trigger( "change" );
      // }
      // if('old('no_of_units')--'!==''){
     // $( "#no_of_units" ).trigger( "input" );
      // }
      },'json');
    });
  
    // $('#heera_account').blur(function(e){
    //   e.preventDefault();
    //   if($(this).val()=='')
    //     return false;

    //   $.post('{{ route('web.ajax.heeraAccount') }}',{
    //    'valueAC':$(this).val(),
    //    '_token':'{{ csrf_token() }}',
    //    'tcn':$('tcn').val(),
    //    'currency_tp':$('#curency_type').val()
    //   },function(o){
    //     if(o.result){
    //      $('#hidden_heera_account').val(o.data.id);
    //     }else{
    //       sweetAlert("Oops...",o.message , "error");
    //       $('#heera_account').val('');
    //     }

    //   },'json');
    // });


    window.Parsley.addValidator('extension', {
                validateString: function(value,requirement) {
                    var fileExtension = value.split('.').pop();
                     var pasrseJSON = requirement.split(',');
                  return  $.inArray(fileExtension,pasrseJSON)>-1;
                },
                messages: {
                  en: 'Allowed extensions are %s',
                  fr: "Cette valeur n'est pas l'inverse d'elle même."
                }
              });
     window.ParsleyValidator.addValidator('notequalto', 
    function (value, requirement) {
        return value !== $(requirement).val();
    }, 32)
    .addMessage('en', 'notequalto', 'This value should not be the same.');

    window.Parsley.addValidator('maxFileSize', {
  validateString: function(_value, maxSize, parsleyInstance) {
    if (!window.FormData) {
      alert('You are making all developpers in the world cringe. Upgrade your browser!');
      return true;
    }
    var files = parsleyInstance.$element[0].files;
    return files.length != 1  || files[0].size <= maxSize * 1024;
  },
  requirementType: 'integer',
  messages: {
    en: 'This file should not be larger than %s Kb',
    fr: 'Ce fichier est plus grand que %s Kb.'
  }
  });

            $('#tcn_application').parsley().isValid();
    
    $('#tcn_application').submit(function(e){
       e.preventDefault();
       $('.btn-primary').attr('disabled','disabled');
        var url = $(this).attr('action'),
        post = $(this).attr('method'),
        data = new FormData(this);
        $.ajax({
            url: url,
            method: post,
            data: data,
            success: function(data){
                if(data.result){
                  swal({
                    title: "TCN!",
                    text: data.message,
                    type: "success"
                    }, function() {
                        window.location =  "{{ route('web.tcninfo') }}";
                    });
                }else{
                  sweetAlert("Oops...", "Something went wrong!", "error");
                }
            },
            error: function(xhr, status, error){
               // var errors = $.parseJSON(xhr.responseText);

               //  console.log(errors);

               //  $.each(errors, function(index, value) {
               //      $.gritter.add({
               //          title: 'Error',
               //          text: value
               //      });
               //  });
               // alert(xhr.responseText);
            },
            processData: false,
            contentType: false
        });
    });

function heeraaccount_allots(){
      $.post('{{ route('web.ajax.heeraAccount') }}',{
       '_token':'{{ csrf_token() }}',
       'tcn':$('#tcn').val(),
       'currency_tp':$('#curency_type').val()
      },function(o){
        if(o.result){
          $('#heera_account').html('');
         for(var i in o.data){
          if(i==0)
            $('#heera_account').append('<option value=" ">Select</option>')

            $('#heera_account').append('<option value="'+o.data[i].account_id+'">'+o.data[i].accountNumber+'</option>')
            $('#heera_account').trigger("chosen:updated");
         }
        }else{
          sweetAlert("Oops...",o.message , "error");
          $('#heera_account').val('');
        }

      },'json');
    }
    
  });

// $('#benifit_account_bank_holder').blur(function(e){
// var memberName=$('#memberName').val().replace(/\s/g, '');
// var accountHolderName=$('#benifit_account_bank_holder').val().replace(/\s/g, '');


//   if(accountHolderName!=null && memberName!=null && accountHolderName!='' && memberName!='')
//   {
  
//     if(accountHolderName!=memberName)
//     { 
//       //alert(memberName+accountHolderName);
//       $('#benifit_account_bank_holder').css('background','#F2DEDE');

//       setTimeout(function(){
//             $('#benifit_account_bank_holder').val('');
//           }, 2000);

//       $('.benifit_account_bank_holder').html('Account Holder Name Mismatched with Your Name');

//     }
//     else
//     {
//     $('.benifit_account_bank_holder').html('');
//     $('#benifit_account_bank_holder').css('background','#F2DEDE');  
//     }
//   }

// }  
// );
</script>
@endsection