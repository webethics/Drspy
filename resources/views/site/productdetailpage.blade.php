@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'Forgot page')
@section('content')
<div class="wrapper">
    <!-- Sidebar  -->
        @include('site.common.sidebar')

    <!-- Page Content  -->
    <div id="content">
      @include('site.common_frontend.header')

      @foreach($result as $value)
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-12">
                    <div class="pro-boy">
                        <!-- <img class="img-responsive center-block" src="{{url('frontend-assets/images/boy-img.jpg')}}" alt="logo"> -->
                        <img class="img-responsive center-block" src="{{$value->product_image}}" alt="logo">
                    </div>
                </div>

                <div class="col-xl-7 col-12">
                    <div class="pro-text">
                        <h6>{{$value->title}}.</h6>

                        <ul>
                          <?php
                              $starNumber = $value->rating;
                              // echo $starNumber;
                              // $starNumber = 4.2;
                                for($x=1;$x<=round($starNumber);$x++) {
                                    echo '<li id="colorstar"><i class="fas fa-star"></i></li>';
                                }
                                // if (strpos($starNumber,'.')) {
                                //     echo '<li><i class="fas fa-star"></i></li>';
                                //     $x++;
                                // }
                                // while ($x<=5) {
                                //     echo '<li><i class="fas fa-star"></i></li>';
                                //     $x++;
                                // }
                            ?>

                            <!-- <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li> -->
                            <li>
                                <p> {{$value->reviews}} reviews {{$value->orders}} orders </p>
                            </li>
                        </ul>
                        <h4> <a href="#"> {{$value->price}} </a></h4>
                        <hr>
                        <br>
                        <div class="d-flex flex-row filter ">
                            <p> Suppliers </p>
                            <a href="#"> AliExpress (7) </a> <a href="#"> AliBaBa (2) </a>
                        </div>
                        <br>
                        <div class="d-flex flex-row filter ">
                            <p> Competitors </p>

                            <a href="#"> Shopify (10)</a> <a href="#"> Amazon (2) </a>
                            <a href="#"> Ebay (4) </a>

                        </div>
                        <br>
                        <div class="add-fab"><a href="#"><i class="fas fa-heart"></i> Add to Favorite </a>
                        </div>

                        <div class="assis-text">
                            <a href="#" class="blue"> <i class="far fa-eye"></i> View Product </a>
                            <a href="#"> <i class="far fa-heart"></i> 67850 </a>
                        </div>

                        <div class="grap">
                            <img class="img-responsive center-block"
                            src="{{url('frontend-assets/images/graph.png')}}" alt="logo">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section class="cont-table">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-left">Title</th>
                                        <th class="text-left">Information</th>
                                    </tr>
                                </thead>
                                <tbody class="table-hover">
                                    <tr>
                                        <td class="text-left"><i class="fas fa-link"></i> Product Link </td>
                                        <td class="text-left"><a href="#"> {{$value->product_link}} </a> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Video</td>
                                        <?php if($value->video != 'NO') { ?>
                                          <td class="text-left"><a href="#" class="anchor">
                                            <i class="fas fa-check"></i> </a>
                                          </td>
                                        <?php } else { ?>
                                          <td class="text-left"><a href="#" class="anchor">
                                             <i class="fas fa-times"></i></a>
                                          </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Ship From Country</td>
                                        <td class="text-left">{{$value->ship_from_country}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">ePacket</td>
                                        <td class="text-left">{{$value->epacket}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">ePacket Delivery</td>
                                        <td class="text-left"> {{$value->epacketdelivery}} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Orders</td>
                                        <td class="text-left">{{$value->orders}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Rating</td>
                                        <td class="text-left">{{$value->rating}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Reviews</td>
                                        <td class="text-left">{{$value->reviews}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Store Name</td>
                                        <td class="text-left">ABC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Wishes</td>
                                        <td class="text-left">{{$value->wishes}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Store Link</td>
                                        <td class="text-left"><a href="#"> {{$value->product_link}} </a> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Top Brand</td>
                                        <td class="text-left">{{$value->brand_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Store Feedback %</td>
                                        <td class="text-left">{{$value->store_feedback}} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Store Positive Ratings</td>
                                        <td class="text-left">{{$value->store_positive_rating}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Store Age</td>
                                        <td class="text-left">{{$value->store_age}} Year</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Store Followers</td>
                                        <td class="text-left">{{$value->store_followers}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Stock</td>
                                        <td class="text-left">10 / to update</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Cashback</td>
                                        <td class="text-left">$ {{$value->cashback}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Estimated Monthly Sales</td>
                                        <td class="text-left">{{$value->estimated_monthly_sales}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Potential Monthly Revenue</td>
                                        <td class="text-left">98,000 / to check</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="get-start-section">
            <div class="container">
                <div class="row">
                    <div class="get-start-text">
                        <h1> Spy On Your Competitors Ads </h1>
                        <p> Unlimited templates, unlimited signatures, 3 signed
                            <br> contracts, 3 stored contracts. </p>
                        <div class="newsletter-sm">
                            <div class="newsletter-sm-bot">

                                <button class="newsletter-button-sm" type="submit">Spy On Ads</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cs-section">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="cs-cont">
                            <h2> Competitors </h2>
                            <div class="list-text">
                                <a href="#" class="c-log"><img class="img-responsive fb-add-cont" src="{{url('frontend-assets/images/shopify-logo.jpg')}}" alt="logo"></a>
                                <ul>
                                    <li> <a href="#">1.  In the 1960s, the text suddenly  <span>$97</span></a></li>
                                    <li> <a href="#">2.  It was used for Letraset sheets   <span>$97</span></a></li>
                                    <li> <a href="#">3.  programmes such as PageMaker   <span>$97</span></a></li>
                                    <li> <a href="#">4.  programmes such as PageMaker    <span>$97</span></a></li>
                                </ul>
                                <div class="circle-no">
                                    <span> 4 </span>
                                </div>
                            </div>

                            <div class="list-text">
                                <a href="#" class="c-log"><img class="img-responsive fb-add-cont" src="{{url('frontend-assets/images/amazone-logo.jpg')}}" alt="logo"></a>
                                <ul>
                                    <li> <a href="#">1.  In the 1960s, the text suddenly  <span>$97</span></a></li>
                                    <li> <a href="#">2.  It was used for Letraset sheets   <span>$97</span></a></li>
                                    <li> <a href="#">3.  programmes such as PageMaker   <span>$97</span></a></li>
                                    <li> <a href="#">4.  programmes such as PageMaker    <span>$97</span></a></li>
                                    <li> <a href="#">5.  programmes such as PageMaker    <span>$97</span></a></li>
                                </ul>
                                <div class="circle-no">
                                    <span> 5 </span>
                                </div>
                            </div>

                            <div class="list-text">
                                <a href="#" class="c-log"><img class="img-responsive fb-add-cont" src="{{url('frontend-assets/images/ebay-logo.jpg')}}" alt="logo"></a>
                                <ul>
                                    <li> <a href="#">1.  In the 1960s, the text suddenly  <span>$97</span></a></li>
                                    <li> <a href="#">2.  It was used for Letraset sheets   <span>$97</span></a></li>
                                    <li> <a href="#">3.  programmes such as PageMaker   <span>$97</span></a></li>
                                    <li> <a href="#">4.  programmes such as PageMaker    <span>$97</span></a></li>
                                </ul>
                                <div class="circle-no">
                                    <span> 4 </span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="cs-cont">
                            <h2> Suppliers </h2>
                            <div class="list-text">
                                <a href="#" class="c-log"><img class="img-responsive fb-add-cont" src="{{url('frontend-assets/images/aliexpress-logo.jpg')}}" alt="logo"></a>
                                <ul>
                                    <li> <a href="#">1.  In the 1960s, the text suddenly  <span>$97</span></a></li>
                                    <li> <a href="#">2.  It was used for Letraset sheets   <span>$97</span></a></li>
                                    <li> <a href="#">3.  programmes such as PageMaker   <span>$97</span></a></li>
                                    <li> <a href="#">4.  programmes such as PageMaker    <span>$97</span></a></li>
                                </ul>
                                <div class="circle-no">
                                    <span> 4 </span>
                                </div>
                            </div>

                            <div class="list-text">
                                <a href="#" class="c-log"><img class="img-responsive fb-add-cont" src="{{url('frontend-assets/images/alibaba-logo.jpg')}}" alt="logo"></a>
                                <ul>
                                    <li> <a href="#">1.  In the 1960s, the text suddenly  <span>$97</span></a></li>
                                    <li> <a href="#">2.  It was used for Letraset sheets   <span>$97</span></a></li>
                                    <li> <a href="#">3.  programmes such as PageMaker   <span>$97</span></a></li>
                                    <li> <a href="#">4.  programmes such as PageMaker    <span>$97</span></a></li>
                                    <li> <a href="#">5.  programmes such as PageMaker    <span>$97</span></a></li>
                                </ul>
                                <div class="circle-no">
                                    <span> 5 </span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endforeach
        <div class="container-fluid">
            <div class="copy-right">
                <p>DrSpy.io © 2019 </p>
            </div>
        </div>

        <script src="{{url('frontend-assets/js/jquery-3.3.1.slim.min.js')}}"></script>
<!--
        <script src="js/bootstrap.bundle.min.js"></script>
-->
<!--
        <script src="js/app.js"></script>
-->
<!--
        <script src="js/bootstrap-select.min.js"></script>
-->

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });

            //

            (function() {
                'use strict'

                if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                    var msViewportStyle = document.createElement('style')
                    msViewportStyle.appendChild(
                        document.createTextNode(
                            '@-ms-viewport{width:auto!important}'
                        )
                    )
                    document.head.appendChild(msViewportStyle)
                }

            }())

            //
            //$("#id1").addClass('show');

            $('#sidebar a.dropdown-toggle').click(function(e) {
                e.preventDefault();

                var getid = $(this).attr('href');

                if ($(this).parents('.collapse').hasClass('collapse')) {
                    $('.collapse .dropdown-toggle').addClass('collapsed');
                    parentid = $(this).parents('.collapse').attr('id');

                    if ($(getid).hasClass('show')) {
                        $('ul.collapse').removeClass('show');
                        $(getid).addClass('show');
                    } else {
                        $('ul.collapse').removeClass('show');
                        $(getid).removeClass('show');
                    }
                    $('#' + parentid).addClass('show');

                } else {

                    if ($(getid).hasClass('show')) {
                        $('ul.collapse').removeClass('show');
                        $(getid).addClass('show');
                    } else {
                        $('.dropdown-toggle').addClass('collapsed');
                        $('ul.collapse').removeClass('show');
                        $(getid).removeClass('show');
                    }
                }

            });

            //
        </script>
@stop
