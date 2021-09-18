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

<div class="container">
    <div class="row justify-content-center">
        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Shifts</h1>



        <div class="row col-md-3 col-sm-3 col-lg-12 mr-2">

        <!-- Progress bar 1 -->
          
        <div class="col-4">
          <center><p>Current Week</p></center>
        <div class="progress mx-auto mt-2" data-value='{{number_format($current_week_perantage, 2)}}'>
          <span class="progress-left">
                          <span class="progress-bar border-success"></span>
            </span>
            <span class="progress-right">
                          <span class="progress-bar border-success"></span>
            </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
              <div class="font-weight-bold" style="font-size: 15px">{{number_format($current_week_perantage, 2)}}%</div>
            </div>
          </div>
        </div>
        
          <!-- END -->

          <!-- Progress bar 2 -->
        <div class="col-4">
          <center><p>Current Week</p></center>
            <div class="progress mx-auto mt-2" data-value='{{number_format($last_week_perantage, 2)}}'>
                <span class="progress-left">
                              <span class="progress-bar border-danger"></span>
                </span>
                <span class="progress-right">
                              <span class="progress-bar border-danger"></span>
                </span>
                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                  <div class="font-weight-bold" style="font-size: 15px">{{number_format($last_week_perantage, 2)}}%</div>
                </div>
              </div>
        </div>
          <!-- END -->

          <!-- Progress bar 3 -->
          <div class="col-4">
            <center><p>Current Week</p></center>
        <div class="progress mx-auto mt-2" data-value='{{number_format($last_month_perantage, 2)}}'>
            <span class="progress-left">
                          <span class="progress-bar border-primary"></span>
            </span>
            <span class="progress-right">
                          <span class="progress-bar border-primary"></span>
            </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
              <div class="font-weight-bold" style="font-size: 15px">{{number_format($last_month_perantage, 2)}}%</div>
            </div>
          </div>
        </div>
          <!-- END -->





          <div class="form-group mt-5">

            <center>
              <b>
                Find Attendance Summery
              </b>
            </center>

            <div class='input-group date mt-2' id='CalendarDateTime'>
            <input type='date' class="form-control" name="attendance_date" id="attendance_date" />
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>

       

        <div class="card border-success mt-3" id="card_attend_suceess" style="display: none">
          <div class="card-body">
            <p id="attend_date_sum_date"></p>
            <p id="attend_date_sum_time"></p>
          </div>
        </div>


        <div class="card border-danger mt-3" id="card_attend_none" style="display: none">
          <div class="card-body">
            No record found..!
          </div>
        </div>


        </div>

        

    </div>
</div>






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
  $('#attendance_date').change(function () 
  {
    $('#card_attend_none').hide();
    $('#card_attend_suceess').hide();

      var date = $('#attendance_date').val();
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'get',
        url:'{{url("/find_attend_summery")}}',
        data:{date:date},
        success:function(data){
          if (data.attend_count > 0) {
            $('#attend_date_sum_date').text(data.attend_in_date);
            $('#attend_date_sum_time').text(data.attend_in_time+" - "+data.attend_out_time);
            $('#card_attend_suceess').show(1000);
          }
          else
          {
            $('#card_attend_none').show(1000);
          }
         
        }
    });



  });
</script>


@endsection
