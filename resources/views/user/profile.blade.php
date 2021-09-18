@extends('layouts.apphome')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <h1 class="mt-3" style="font-weight: bold;font-size: 30px;">Profile</h1>
{{-- 
        <form action="{{url('update_profile')}}" method="POST">
            @csrf --}}
            <div class="col-10">
            <form id="update_profile_form">

            <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id}}">
        <div class="form-group row mt-5">
            <label for="epfno" style="color: #F54F5B;font-weight: bold;">EPF Number</label>
                <input id="epfno" type="text" class="form-control @error('epfno') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="epfno" value="{{ Auth::user()->epf_no }}" required placeholder="Your EPF number" autocomplete="epfno" readonly>

                <span id="error_epfno" role="alert" style="color: red;display: none">
                    <i class="fa fa-info-circle "></i> <strong id="error_epfno_alert"></strong>
                </span>
      
        </div>

        <div class="form-group row">
            <label for="fname" style="color: #F54F5B;font-weight: bold;">First Name</label>
            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="fname" value="{{ Auth::user()->f_name }}" required placeholder="Your first name" autocomplete="fname" autofocus>
    
            <span id="error_fname" role="alert" style="color: red;display: none">
                <i class="fa fa-info-circle "></i> <strong id="error_fname_alert"></strong>
            </span>
        </div>

        <div class="form-group row">
            <label for="lname" style="color: #F54F5B;font-weight: bold;">Last Name</label>
            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="lname" value="{{ Auth::user()->l_name }}" required placeholder="Your last name" autocomplete="lname" autofocus>

            <span id="error_lname" role="alert" style="color: red;display: none">
                <i class="fa fa-info-circle "></i> <strong id="error_lname_alert"></strong>
            </span>
        </div>

        <div class="form-group row">
            <label for="address" style="color: #F54F5B;font-weight: bold;">Address</label>
            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="address" value="{{ Auth::user()->address }}" required placeholder="Your address" autocomplete="address">

            <span id="error_address" role="alert" style="color: red;display: none">
                <i class="fa fa-info-circle "></i> <strong id="error_address_alert"></strong>
            </span>
    
    </div>

        <div class="form-group row">
            <label for="email" style="color: #F54F5B;font-weight: bold;">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-right-0 border-left-0 shadow-none" style="background-color: transparent;border-radius: 0%" name="email" value="{{ Auth::user()->email }}" required placeholder="Your email address" autocomplete="email">
              

                <span id="error_email" role="alert" style="color: red;display: none">
                    <i class="fa fa-info-circle "></i> <strong id="error_email_alert"></strong>
                </span>
        
        </div>

        
        <center>

            <span id="success_reason" role="alert" style="color: green;display: none">
                <i class="fa fa-check-circle"></i> <strong id="success_reason_alert"></strong>
            </span>
           
        </center>

        <center>
            <button type="button" id="update_profile_btn" class="btn btn-danger mt-3 mb-3" style="background-color: #F54F5B;width: 50%">
                {{ __('Update Profile') }}
            </button>
        </center>
        

    </form>
</div>
    </div>
</div>



<script>
    $('#update_profile_btn').click(function () 
    {

        $('#error_epfno').hide(1000);
        $('#error_fname').hide(1000);
        $('#error_lname').hide(1000);
        $('#error_address').hide(1000);
        $('#error_email').hide(1000);

        var profile_form = $('#update_profile_form').serialize();
        var epfno = $('#epfno').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var address = $('#address').val();
        var email = $('#email').val();

        if (epfno == "") {
            $('#error_epfno').show(1000);
            $('#epfno').css("border-bottom-color", "red");
            $('#error_epfno_alert').text('EPF No is required..!');
        }

        if (fname == "") {
            $('#error_fname').show(1000);
            $('#fname').css("border-bottom-color", "red");
            $('#error_fname_alert').text('First name is required..!');
        }

        if (lname == "") {
            $('#error_lname').show(1000);
            $('#lname').css("border-bottom-color", "red");
            $('#error_lname_alert').text('Last name is required..!');
        }

        if (address == "") {
            $('#error_address').show(1000);
            $('#address').css("border-bottom-color", "red");
            $('#error_address_alert').text('Address is required..!');
        }

        if (email == "") {
            $('#error_email').show(1000);
            $('#email').css("border-bottom-color", "red");
            $('#error_email_alert').text('Address is required..!');
        }

        if (epfno == "" || fname == "" || email == "" || lname == "" || address == "") {
            return false;
        }

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'{{url("/update_profile")}}',
            data:profile_form,
            success:function(data){
            
                $('#success_reason').show(1000);
                $('#success_reason_alert').text(data.success);
            
            },
            error:function(error)
            {
                console.log(error);
            }
        }); 
    });
</script>




@endsection
