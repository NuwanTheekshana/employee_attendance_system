@extends('layouts.apphome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Home</h1>


    <div style="margin-top: 30%">
                <center>
                
                    <img src="{{asset('img/logo.png')}}" alt="" style="width: 50%;height: 50%;">
                    <h1>Welcome</h1>
                </center>

        <center>
            <span id="success_reason" role="alert" style="color: green;display: none">
                <i class="fa fa-check-circle"></i> <strong id="success_reason_alert"></strong>
            </span>

            <span id="error_reason" role="alert" style="color: red;display: none">
                <i class="fa fa-check-circle"></i> <strong id="error_reason_alert"></strong>
            </span>
        </center>

            <div class="d-flex justify-content-center align-items-center">
                    <button type="button" id="check_in_btn" class="btn btn-success btn-lg mt-4" style="width: 50%">Check In</button>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="button" id="check_out_btn" class="btn btn-danger btn-lg mt-4" style="width: 50%">Check Out</button>
            </div>
     </div>

    </div>
</div>

<script>
    $('#check_in_btn').click(function () 
    {
        $('#error_reason').hide(1000);
        $('#success_reason').hide(1000);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'GET',
            url:'{{url("daily_attendance_checkin")}}',
            data:{},
            success:function(data){
                $('#success_reason').show(1000);
                $('#success_reason_alert').text(data.success);
            },
            error:function(data){
                $('#error_reason').show(1000);
                $('#error_reason_alert').text(data.success);
            }
        });
    });
</script>

<script>
    $('#check_out_btn').click(function () 
    {
        $('#error_reason').hide(1000);
        $('#success_reason').hide(1000);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'GET',
            url:'{{url("daily_attendance_checkout")}}',
            data:{},
            success:function(data){
              
                if (data.error) {
                    $('#error_reason').show(1000);
                    $('#error_reason_alert').text(data.error);
                }
                else
                {
                    $('#success_reason').show(1000);
                    $('#success_reason_alert').text(data.success);

                }
            },
            error:function(error){
                if (error) {
                    $('#error_reason').show(1000);
                    $('#error_reason_alert').text("Something wrong. Please try again..!");
                }
               
            }
        });
    });
</script>

@endsection
