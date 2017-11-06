

{{-- 
__________________________________________USER LIST_________________________________

__________________________________________VS USER TYPE _________________________________

--}}




@if($request->process=='userNames' && $request->userType=='MEM')
<label>USER NAME</label>
<select class="form-control col-md-6 chosen-select" name="userId" id="userId" onchange="getAccess()">
@foreach($table as $users)
<option value="{{$users->id}}" @if(isset($request->userId) && $request->userId==$users->id){{'selected'}}@endif>{{$users->code}} - {{$users->name}}</option>
@endforeach
</select>
@endif



@if($request->process=='userNames' && $request->userType=='DSA')
<label>USER NAME</label>
<select class="form-control col-md-6 chosen-select" name="userId" id="userId" onchange="getAccess()">
@foreach($table as $users)
<option value="{{$users->id}}" @if(isset($request->userId) && $request->userId==$users->id){{'selected'}}@endif>{{$users->code}} - {{$users->name}}</option>
@endforeach
</select>
@endif


@if($request->process=='userNames' && $request->userType=='EMP')
<label>USER NAME</label>
<select class="form-control col-md-6 chosen-select" name="userId" id="userId" onchange="getAccess()">
@foreach($table as $users)
<option value="{{$users->id}}" @if(isset($request->userId) && $request->userId==$users->id){{'selected'}}@endif>{{$users->code}} - {{$users->name}}</option>
@endforeach
</select>
@endif

@if($request->process=='userNames' && $request->userType=='OI' || $request->process=='userNames' && $request->userType=='ME')
  <label>USER NAME</label>
  <select class="form-control col-md-6 chosen-select" name="userId" id="userId" onchange="getAccess()">
    @foreach($table as $users)
      <option value="{{$users->id}}">{{$users->code}} - {{$users->name}}</option>
    @endforeach
  </select>
@endif






{{-- 
__________________________________________USER ACCESS RIGHTS DETAILS_________________________________

__________________________________________USER WISE ACCESS RIGHTS SET _________________________________

--}}

@if($request->process=='accessRights')

@foreach($main as $mains)
  <div class="" id="Div{{$mains->id}}">

    <div class="col-md-12"  style="background: bisque;"><div class="row">&nbsp;</div>
    <div class="checkbox text-black">
    <label class="i-checks">
    <input type="checkbox" name="check{{$mains->id}}" id="check{{$mains->id}}" class="" {{-- onchange="setCheckBox({{$mains->id}})" --}}  @if(isset($accessIds) && in_array($mains->id,$accessIds)){{'checked'}}@endif /><i class="font-bold"></i>

    {{strtoupper($mains->menu_name)}} {{-- Main Menu  --}}

    </label>
    </div>
    </div>

    @foreach($parent as $parents)
      <div class="" id="Div{{$parents->id}}"> 
        @if($mains->id==$parents->main_id)

        <div class="col-md-12 "><div class="row">&nbsp;</div>
        <div class="checkbox text-black">
        <label class="i-checks font-bold h5 text-primary ">
        <input type="checkbox" name="check{{$parents->id}}" id="check{{$parents->id}}" class="" onchange="setCheckBox({{$parents->id}})"  @if(isset($accessIds) && in_array($parents->id,$accessIds)){{'checked'}}@endif /><i class="font-bold"></i>

        {{strtoupper($parents->menu_name)}} {{-- Sub Menu  --}}

        </label>
        </div>
        </div>




        <div class="col-md-12" id="Div{{$parents->id}}">  
        @foreach($child as $childs)
        @if($parents->id==$childs->parent_id)
        <div class="col-md-3 text-black">
        <input type="checkbox" name="check{{$childs->id}}" onchange="setCheckBoxParent({{$parents->id}})" id="check{{$childs->id}}" @if(isset($accessIds) && in_array($childs->id,$accessIds)){{'checked'}}@endif  />

        {{$childs->menu_name}} {{-- Child Menu  --}}

        </div>
        @endif
        @endforeach
        </div>

        @endif
      </div>
    @endforeach 

  </div>
@endforeach 

@endif


