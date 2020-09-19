@extends('layouts.app') @section('content')

<div class="breadcumbs-area">
    <ul>
        <li class="title-main">
            <h4>Product</h4>
        </li>
        <li class="link-home"><a href="#."><i class="fa fa-home"></i></a></li>
        <li class="link-home"><a href="#.">Home</a></li>
        <li class="link-page"><a href="#.">Tracking Product</a></li>
    </ul>
</div>
<div class="content-main-here">

    <div class="table-main-div" style="margin-top: 0px;">
        @include('toast')
        <div class=" table-header ">
            <h2>Tracking Product</h2>
        </div>

        <div class="tracking-page-main">
            <div class="heading-arriving">
                <h3>Order Summery</h3>
            </div>
            <div class="track-process">
                <ul>
                    <li class="active">
                        <div class="left-process-bar">
                            <div class="checklist">
                                <span id="milestoneBar"></span>
                                <span id="checkpoint"></span>
                            </div>
                        </div>
                        <div class="right-process-detail-bar">
                            <h5>Order Monday, 13 January</h5>
                        </div>
                    </li>
                    <li class="active">
                        <div class="left-process-bar">
                            <div class="checklist">
                                <span id="milestoneBar"></span>
                                <span id="checkpoint"></span>
                            </div>
                        </div>
                        <div class="right-process-detail-bar">
                            <h5><b>Shipped Tuesday, 14 January</b></h5>
                            <p>Package Has Left on Healfaster at Canada 12:34 PM wednesday 15 January</p>
                            <a href="#.">See All Updates</a>
                        </div>
                    </li>
                    <li class="">
                        <div class="left-process-bar">
                            <div class="checklist">
                                <span id="milestoneBar"></span>
                                <span id="checkpoint"></span>
                            </div>
                        </div>
                        <div class="right-process-detail-bar">
                            <h5><b>Out For Delivery</b></h5>
                            <p>Package Has Left on Healfaster at Canada 02:34 PM 16 January</p>
                            <a href="#.">See All Updates</a>
                        </div>
                    </li>
                    <li class="">
                        <div class="left-process-bar">
                            <div class="checklist">
                                <span id="milestoneBar"></span>
                                <span id="checkpoint"></span>
                            </div>
                        </div>
                        <div class="right-process-detail-bar">
                            <h5>Arriving Today</h5>
                            <p>Package Out for Delivery Soon</p>

                        </div>
                    </li>
                </ul>
            </div>
        </div>



    </div>


    @endsection