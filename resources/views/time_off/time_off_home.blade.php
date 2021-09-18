@extends('layouts.apphome')

@section('content')

<style>
    .progress {
  width: 100px;
  height: 100px;
  background: none;
  position: relative;
}

.progress::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #eee;
  position: absolute;
  top: 5;
  left: 0;
}

.progress>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 10;
  z-index: 1;
}

.progress .progress-left {
  left: 0;
}

.progress .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}

.progress .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}

.progress .progress-right {
  right: 0;
}

.progress .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}

.progress .progress-value {
  position: absolute;
  top: 20;
  left: 0;
}

</style>

<div class="container" id="main_div">
    <div class="row justify-content-center">
        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Time Off</h1>

        <div class="row col-md-3 col-sm-3 col-lg-12 mr-2">

        <!-- Progress bar 1 -->
          
        <div class="col-4">
          <center><p>{{$last_year}}</p></center>
        <div class="progress mx-auto mt-2" data-value='{{number_format($last_year_perantage, 2)}}'>
          <span class="progress-left">
                          <span class="progress-bar border-success"></span>
            </span>
            <span class="progress-right">
                          <span class="progress-bar border-success"></span>
            </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
              <div class="font-weight-bold" style="font-size: 15px">{{number_format($last_year_perantage, 2)}}%</div>
            </div>
          </div>
        </div>
        
          <!-- END -->

          <!-- Progress bar 2 -->
        <div class="col-4">
          <center><p>{{$current_year}}</p></center>
            <div class="progress mx-auto mt-2" data-value='{{number_format($current_year_perantage, 2)}}'>
                <span class="progress-left">
                              <span class="progress-bar border-danger"></span>
                </span>
                <span class="progress-right">
                              <span class="progress-bar border-danger"></span>
                </span>
                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                  <div class="font-weight-bold" style="font-size: 15px">{{number_format($current_year_perantage, 2)}}%</div>
                </div>
              </div>
        </div>
          <!-- END -->

          <!-- Progress bar 3 -->
          <div class="col-4">
            <center><p>{{$next_year}}</p></center>
        <div class="progress mx-auto mt-2" data-value='{{number_format($next_year_perantage, 2)}}'>
            <span class="progress-left">
                          <span class="progress-bar border-primary"></span>
            </span>
            <span class="progress-right">
                          <span class="progress-bar border-primary"></span>
            </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
              <div class="font-weight-bold" style="font-size: 15px">{{number_format($next_year_perantage, 2)}}%</div>
            </div>
          </div>
        </div>
          <!-- END -->

    </div>


    
    <div class="row mt-4">
        <div class="col-6">
            <Button class="btn btn-success mt-3" id="seek_btn" style="width: 100%">Seek Leave</Button>
        </div>
        <div class="col-6"> 
            <Button class="btn btn-danger mt-3" id="annual_btn" style="width: 100%">Annual Leave</Button>
        </div>
    </div>


</div>

</div>

<div class="container" id="pageseek" style="display: none">
    <div class="row justify-content-center">
        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Seek Leave</h1>

        <div class="form-group col-8 mt-5" id="seek_leave_form" style="display: none">

            <center>
              <b>
                <p style="color: #F54F5B;">Apply Leave</p>   
              </b>
            </center>
            <form id="seek_leave_from">
            <div class="form-group row mt-3">
                <label for="lev_date" style="font-weight: bold;">Leave Date</label>
                <input id="lev_date" type="date" class="form-control @error('lev_date') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="lev_date" value="{{ old('lev_date') }}" required autocomplete="lev_date" autofocus>
         
                <span id="error_date" role="alert" style="color: red;display: none">
                    <i class="fa fa-info-circle "></i> <strong id="error_date_alert"></strong>
                </span>
                   
           
            </div>

            <div class="form-group row">
                <label for="lev_reason" style="font-weight: bold;">Leave Reason</label>
                <input id="lev_reason" type="text" class="form-control @error('lev_reason') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="lev_reason" value="{{ old('lev_reason') }}" required placeholder="Enter your reason" autocomplete="lev_reason" autofocus>
                
                <span id="error_reason" role="alert" style="color: red;display: none">
                    <i class="fa fa-info-circle "></i> <strong id="error_reason_alert"></strong>
                </span>
            </div>

            <span id="success_reason" role="alert" style="color: green;display: none">
                <i class="fa fa-check-circle"></i> <strong id="success_reason_alert"></strong>
            </span>

            <center>
                <button type="button" class="btn btn-success mt-3 mb-4" id="submit_seek_btn" style="width: 50%;display: none">Apply Leave</button>
               </center>
            </form>
        </div>




       <center>
        <button class="btn btn-success mt-3 mb-4" id="apply_seek_btn" style="width: 50%">Apply Leave</button>
       </center>



       

                <center>
                    <b>
                        <p style="color: #F54F5B;">Leave Summery</p>  
                    </b>
                </center>

                @if (count($current_year_seek_leave) == 0)
                <div class="card border-danger mt-3" id="card_attend_none">
                    <div class="card-body">
                      No record found..!
                    </div>
                  </div>

                  @else

                  <div class="col-10">
                    @foreach ($current_year_seek_leave as $current_year_seek_leave)
                    <div class="card border-success mt-2" id="card_attend_suceess">
                        <div class="card-body">
                            <p>{{$current_year_seek_leave->leave_date}}</p>
                            <p>{{$current_year_seek_leave->leave_reason}}</p>
                        </div>
                    </div>
                    @endforeach

                @endif
            

               
            </div>

           


    </div>
</div>

{{-- annual leave --}}

<div class="container" id="pageannual" style="display: none">
    <div class="row justify-content-center">
        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Annual Leave</h1>

        <div class="form-group col-8 mt-5" id="annual_leave_form" style="display: none">

            <center>
              <b>
                <p style="color: #F54F5B;">Apply Leave</p>   
              </b>
            </center>
            <form id="anual_leave_from">

            <div class="form-group row mt-3">
                <label for="lev_date_annual" style="font-weight: bold;">Leave Date</label>
                <input id="lev_date_annual" type="date" class="form-control @error('lev_date_annual') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="lev_date_annual" value="{{ old('lev_date_annual') }}" required autocomplete="lev_date_annual" autofocus>
         
                <span id="error_date_anual" role="alert" style="color: red;display: none">
                    <i class="fa fa-info-circle "></i> <strong id="error_date_anual_alert"></strong>
                </span>
            
            </div>

            <div class="form-group row">
                <label for="lev_reason_annual" style="font-weight: bold;">Leave Reason</label>
                <input id="lev_reason_annual" type="text" class="form-control @error('lev_reason_annual') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="lev_reason_annual" value="{{ old('lev_reason_annual') }}" required placeholder="Enter your reason" autocomplete="lev_reason_annual" autofocus>
                
                <span id="error_reason_annual" role="alert" style="color: red;display: none">
                    <i class="fa fa-info-circle "></i> <strong id="error_reason_annual_alert"></strong>
                </span>
            </div>

            <span id="success_reason_annual" role="alert" style="color: green;display: none">
                <i class="fa fa-check-circle"></i> <strong id="success_reason_alert_annual"></strong>
            </span>

            <center>
                <button type="button" class="btn btn-success mt-3 mb-4" id="submit_annual_btn" style="width: 50%;display: none">Apply Leave</button>
               </center>
            </form>
        </div>




       <center>
        <button class="btn btn-success mt-3 mb-4" id="apply_annual_btn" style="width: 50%">Apply Leave</button>
       </center>



       

                <center>
                    <b>
                        <p style="color: #F54F5B;">Leave Summery</p>  
                    </b>
                </center>

                @if (count($current_year_annual_leave) == 0)
                <div class="col-10">
                    <div class="card border-danger mt-3" id="card_attend_none">
                        <div class="card-body">
                        No record found..!
                        </div>
                    </div>
                </div>
                  @else

                  <div class="col-10">
                    @foreach ($current_year_annual_leave as $current_year_annual_leave)
                    <div class="card border-success mt-2" id="card_attend_suceess">
                        <div class="card-body">
                            <p>{{$current_year_annual_leave->leave_date}}</p>
                            <p>{{$current_year_annual_leave->leave_reason}}</p>
                        </div>
                    </div>
                    @endforeach

                @endif
            

               
            </div>

           


    </div>
</div>




<script>
    $('#seek_btn').click(function () 
    {
        $("#main_div").hide(1000);
        $("#pageannual").hide(1000);
        $("#pageseek").slideToggle();
    });

    $('#apply_seek_btn').click(function () 
    {
        $("#apply_seek_btn").hide(100);
        $("#submit_seek_btn").slideToggle('slow');
        $('#seek_leave_form').slideToggle('slow');
    });
</script>

<script>
    $('#annual_btn').click(function () 
    {
        $("#main_div").hide(1000);
        $("#pageseek").hide(1000);
        $("#pageannual").slideToggle();
    });

    $('#apply_annual_btn').click(function () 
    {
        $("#apply_annual_btn").hide(100);
        $("#submit_annual_btn").slideToggle('slow');
        $('#annual_leave_form').slideToggle('slow');
    });
  
</script>

<script>
    $(function() {

$(".progress").each(function() {

  var value = $(this).attr('data-value');
  var left = $(this).find('.progress-left .progress-bar');
  var right = $(this).find('.progress-right .progress-bar');

  if (value > 0) {
    if (value <= 50) {
      right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
    } else {
      right.css('transform', 'rotate(180deg)')
      left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
    }
  }

})

function percentageToDegrees(percentage) {

  return percentage / 100 * 360

}

});
</script>

<script>
    $('#submit_seek_btn').click(function () 
    {
        $('#success_reason').hide();
        $('#error_date').hide();
        $('#error_reason').hide();
        var seek_form = $('#seek_leave_from').serialize();

        var lev_date = $('#lev_date').val();
        var lev_reason = $('#lev_reason').val();
        
        if (lev_date == "") {
            $('#error_reason').show(1000);
            $('#lev_date').css("border-bottom-color", "red");
            $('#error_reason_alert').text('Leave reason is required..!');
        }

        if (lev_reason == "") {
            $('#error_date').show(1000);
            $('#lev_reason').css("border-bottom-color", "red");
            $('#error_date_alert').text('Leave date is required..!');
        }

        if (lev_date == "" || lev_reason == "") {
            return false;
        }


            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'{{url("/submit_seek_leave")}}',
            data:seek_form,
            success:function(data){
            
                $('#success_reason').show(1000);
                $('#success_reason_alert').text(data.success);
            
            }
        }); 
    });
</script>




<script>
    $('#submit_annual_btn').click(function () 
    {
        $('#success_reason_annual').hide();
        $('#error_date_anual').hide();
        $('#error_reason_annual').hide();
        var annual_form = $('#anual_leave_from').serialize();

        var lev_date = $('#lev_date_annual').val();
        var lev_reason = $('#lev_reason_annual').val();

        console.log(annual_form);
        
        if (lev_date == "") {
            $('#error_date_anual').show(1000);
            $('#lev_date_annual').css("border-bottom-color", "red");
            $('#error_date_anual_alert').text('Leave reason is required..!');
        }

        if (lev_reason == "") {
            $('#error_reason_annual').show(1000);
            $('#lev_reason_annual').css("border-bottom-color", "red");
            $('#error_reason_annual_alert').text('Leave date is required..!');
        }

        if (lev_date == "" || lev_reason == "") {
            return false;
        }


            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'{{url("/submit_annual_leave")}}',
            data:annual_form,
            success:function(data){
            
                $('#success_reason_annual').show(1000);
                $('#success_reason_alert_annual').text(data.success);
            
            }
        }); 
    });
</script>



@endsection
