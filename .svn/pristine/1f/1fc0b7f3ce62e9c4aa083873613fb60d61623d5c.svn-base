    <div class="panel panel-default">
      <div class="table-responsive" style="overflow-x: initial;padding: 7px;">
        <table class="table table-striped b-t" id="dsaRequest">
          <thead>
            <div class="panel-heading">
              Member Details 
            </div>
            <tr>
              <th>Sl No</th>
              <th>Name</th>
              <th>IBG No</th>
              <th>MobileNumber</th>
              <th>Email Id</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

          @foreach($memberDetails as $key => $memberDetailses)
          @if($key==0)
          <input type="hidden" name="dsaId" id="dsaId" value="{{$memberDetailses->addedById}}">
          @endif 
            <tr>
              <!-- <td>{{ $memberDetails}}</td> -->
             <td>{{  $key+1 }}</td>
             <td>{{ $memberDetailses->name }}</td>
             <td>{{ $memberDetailses->code }}</td>
             <td>{{ $memberDetailses->mobileNo}}</td>
             <td>{{ $memberDetailses->email}}</td>
             <td>{{ $memberDetailses->status}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>