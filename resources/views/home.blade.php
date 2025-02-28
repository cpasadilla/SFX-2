@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@if (Auth::user()->position == 'Staff')
    <script>window.location = "{{route('customer')}}";</script>
@elseif (Auth::user()-> position == 'Engineer')
    <script>window.location = "{{route('p.view')}}";</script>
@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('DASHBOARD') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$prog}}</h3>
                        <p>PAID BL</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('p.view')}}" class="small-box-footer">More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$comp}}</h3>
                        <p>UNPAID BL</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('p.view')}}" class="small-box-footer">More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$id}}</h3>
                        <p>STAFF</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/users" class="small-box-footer">More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$staff}}</h3>
                        <p>CUSTOMER</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('customer')}}" class="small-box-footer">More info 
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-12  min-vh-500">
                <div class="box">
                    <div class="col-sm-12 text-center">
                        <h1 class="m-0">{{ __('MV EVERWIN STAR') }}</h1>
                        <img src="{{ asset('images/line_5.png') }}" id="line_5">
                    </div>    
                    <canvas id="mvEverwinStarPieChart" style="width:100%; height:400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="box">
            <div class="col-sm-12 text-center logo-heading-container">
                <img src="{{ asset('images/stfrancislogo.png') }}" id="stfrancislogo">
                <h1 class="m-0 small-heading">{{ __('ST. FRANCIS XAVIER STAR SHIPPING LINES INC.') }}</h1>
            </div>
            <img src="{{ asset('images/line_5.png') }}" id="line_5">
 

            <div class="row">
                <div class="col-md-6">
                    <div id="about_us" style="margin: 20px auto; text-align: center;">ABOUT US</div>
                    <div id="vision" style="margin: 20px auto; text-align: center;">VISION</div>
                    <div id="it_is_our_goal_to_be_the_best_logistic_solution_provider_in_the_philippines_" style="margin: 20px auto; text-align: center;" >It is our goal to be the best logistic solution provider in the Philippines.</div>
                    <div id="mission" style="margin: 20px auto; text-align: center;">MISSION</div>
                    <div id="to_provide_efficient_shipping_service_through_safe_and_effective_transportation_while_fulfilling_our_promise_of_sustainable_financial_return_to_all_our_shareholders_" style="margin: 20px auto; text-align: center;">To provide efficient shipping service through safe and effective transportation while fulfilling our promise of sustainable financial return to all our shareholders.</div>
                </div>
                <div class="col-md-4">
                    <div id="tondo__manila_branch" style="margin: 20px auto; text-align: center;" >TONDO, MANILA BRANCH</div>
                    
                    <div id="address__pier_18_vitas_tondo__manila" style="display: flex; align-items: center; margin: 10px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_location_icon_ek1.png') }}" id="tondo_location_icon_ek1"  />
                        <span style="white-space: nowrap;">Address: Pier 18 Vitas Tondo, Manila</span>
                    </div>
                    
                    <div id="contact_numbers___63_999_889_5848_____63_908_815_9300" style="display: flex; align-items: center; margin: 10px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_phone_icon_ek1.png') }}" id="tondo_phone_icon_ek1" />
                        <span style="white-space: nowrap;">Contact Numbers: +63-999-889-5848 || +63-908-815-9300</span>
                    </div>

                    <div id="e_mail__fxavier_2015_yahoo_com_ph" style="display: flex; align-items: center; margin: 10px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_email_icon_ek1.png') }}" id="tondo_email_icon_ek1" />
                        <span style="white-space: nowrap;">E-mail: <a href="mailto:fxavier_2015@yahoo.com" target="_blank">fxavier_2015@yahoo.com.ph</a></span>
                    </div>

                    <div id="facebook__st__francis_xavier_star_shipping_lines_inc_" style="display: flex; align-items: center; margin: 10px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_facebook_icon_ek1.png') }}" id="tondo_facebook_icon_ek1" />
                        <span style="white-space: nowrap;">Facebook: St. Francis Xavier Star Shipping Lines Inc.</span>
                    </div>

                    <div id="basco__batanes_branch" style="margin: 20px auto; text-align: center;" >BASCO, BATANES BRANCH</div>

                    <div id="address__national_rd__brgy__kaychanaryanan__basco__batanes" style="display: flex; align-items: center; margin: 5px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_location_icon_ek1.png') }}" id="tondo_location_icon_ek1" />
                        <span style="white-space: nowrap;">Address: National Rd. Brgy. Kaychanaryanan, Basco, Batanes</span>
                    </div>

                    <div id="contact_numbers___63_999_889_5849_____63_999_889_5851" style="display: flex; align-items: center; margin: 5px auto; width: fit-content;" >
                        <img src="{{ asset ('images/tondo_phone_icon_ek1.png') }}" id="tondo_phone_icon_ek1" />
                        <span style="white-space: nowrap;">Contact Numbers: +63-999-889-5849 || +63-999-889-5851</span>
                    </div>

                    <div id="e_mail__stfrancisbasco_gmail_com" style="display: flex; align-items: center; margin: 5px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_email_icon_ek1.png') }} " id="tondo_email_icon_ek1" />
                        <span style="white-space: nowrap;">E-mail: <a href="mailto:stfrancisbasco@gmail.com" target="_blank">stfrancisbasco@gmail.com</a></span>
                    </div>

                    <div id="facebook__sfxssli_batanes" style="display: flex; align-items: center; margin: 5px auto; width: fit-content;">
                        <img src="{{ asset ('images/tondo_facebook_icon.png') }}" id="tondo_facebook_icon" />
                        <span style="white-space: nowrap;">Facebook: Sfxssli Batanes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Data for the pie chart
    const data = {
        labels: ['MV EVERWIN STAR I', 'MV EVERWIN STAR II', 'MV EVERWIN STAR III', 'MV EVERWIN STAR IV'],
        datasets: [{
            label: 'MV EVERWIN STAR Breakdown',
            data: [{{$progt}}, {{$compt}}, {{$idt}}, {{$stafft}}], // Data from your PHP variables
            backgroundColor: ['#17a2b8', '#28a745', '#ffc107', '#dc3545'], // Color for each section
            borderColor: ['#ffffff', '#ffffff', '#ffffff', '#ffffff'], // Border color for each section
            borderWidth: 1
        }]
    };

    // Pie chart configuration
    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    };

    // Create the pie chart
    const mvEverwinStarPieChart = new Chart(document.getElementById('mvEverwinStarPieChart'), config);
</script>
<style>
    .box {
        width: 100%;
        height: 100px;
        background: white;
        margin: 20px auto;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        padding: 20px;
        text-align: center; /* This centers the content inside the box */
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

<style>
    .small-heading {
        font-size: 25px; /* Adjust this value as necessary */
    }
    .logo-heading-container {
        display: flex;
        align-items: center; /* Vertically centers the items */
        justify-content: center; /* Horizontally centers the items */
    }
    
    #stfrancislogo {
        margin-right: 10px; /* Adds space between the logo and the heading */
    }
    
    .box {
        width: 96.5%;
        height: 600px;
        background: white;
        margin: 10px auto;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    #line_5 {
        position: left;
        top: 66px;
        left: 1px;
        width: 100%;
        height: 1px;
        background-color: gray;
    }

    #about_us {
        top: 100px;
        left: 151px;
        width: 173px;
        height: 32.5px;
        overflow: hidden;
        font-family: Inter;
        font-size: 17px;
        font-weight: bold;
        text-align: center;
        color:#78BF65;
    }

    #stfrancislogo {
        padding-left: 15px;
        padding-top: 10px;
    }

    #vision {
        top: 134px;
        left: 148px;
        width: 172px;
        height: 20px;
        overflow: hidden;
        font-family: Inter;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        color:#000000;
    }

    #it_is_our_goal_to_be_the_best_logistic_solution_provider_in_the_philippines_ {
	    top: 159px;
        left: 73px;
        width: 321px;
	    height: 58.5px;
	    overflow: hidden;
	    font-family: Inter;
	    font-size: 13px;
	    text-align: center;
	    color:#000000;
    }

    #mission {
        top: 215px;
        left: 147px;
        width: 172px;
        height: 20px;
        overflow: hidden;
        font-family: Inter;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        color:#000000;
    }

    #to_provide_efficient_shipping_service_through_safe_and_effective_transportation_while_fulfilling_our_promise_of_sustainable_financial_return_to_all_our_shareholders_ {
        top: 228px;
        ft: 61px;
        width: 347px;
        height: 106.5px;
        overflow: hidden;
        font-family: Inter;
        font-size: 13px;
        text-align: center;
        color:#000000;
    }

    #tondo__manila_branch {
        top: 94px;
        left: 652px;
        width: 235px;
        height: 21.27px;
        overflow: hidden;
        font-family: Inter;
        font-size: 13px;
        font-weight: bold;
        text-align: center;
        color:#000000;
    }

    #tondo_location_icon_ek1 {
        top: 261px;
        left: 633px;
        width: 21px;
        height: 21px;
    }

    #address__pier_18_vitas_tondo__manila {
        top: 117px;
        left: 657px;
        width: 221px;
        height: 17.96px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #tondo_email_icon {
        top: 170px;
        left: 633px;
        width: 20.71px;
        height: 19.92px;
    }

    #contact_numbers___63_999_889_5848_____63_908_815_9300 {
        top: 138px;
        left: 653px;
        width: 253px;
        height: 35.16px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #e_mail__fxavier_2015_yahoo_com_ph {
        top: 173px;
        left: 655px;
        width: 220px;
        height: 22.49px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #facebook__st__francis_xavier_star_shipping_lines_inc_ {
        top: 201px;
        left: 649px;
        width: 268px;
        height: 39.69px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #basco__batanes_branch {
        top: 241px;
        left: 677px;
        width: 188px;
        height: 21.27px;
        overflow: hidden;
        font-family: Inter;
        font-size: 13px;
        font-weight: bold;
        text-align: center;
        color:#000000;
    }

    #address__national_rd__brgy__kaychanaryanan__basco__batanes {
        top: 261px;
        left: 655px;
        width: 269px;
        height: 36px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #contact_numbers___63_999_889_5849_____63_999_889_5851 {
        top: 301px;
        left: 655px;
        width: 244px;
        height: 35px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #e_mail__stfrancisbasco_gmail_com {
        top: 333px;
        left: 655px;
        width: 206px;
        height: 22px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    #facebook__sfxssli_batanes {
        top: 364px;
        left: 655px;
        width: 160px;
        height: 25px;
        overflow: hidden;
        font-family: Inter;
        font-size: 12px;
        text-align: center;
        color:#000000;
    }

    span.home-link {
        display: inline-block;
        vertical-align: middle;
        white-space: nowrap;
        font-size: 18px;
        padding-top: 20px;
        padding-left: 10px;
        text-align: center;
    }

    #mvEverwinStarPieChart {
        max-width: 500px;
        max-height: 505px;
        margin: 0 auto;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


@endsection