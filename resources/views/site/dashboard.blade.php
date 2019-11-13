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
		
        @include('site.filter_section.aliexpress_filter')

        <div class="container-fluid">
            <div class="content-box row mb-4">
                @forelse($result as $val)

                 <!-- {{$val->product_image}} -->
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mt-2 mb-2 ">
                      <div class="product-grid8">
                          <div class="product-image8">
                              <a href="{{$val->product_link}}" target="_blank">
                                  <img class="img-responsive center-block pic-1" src="{{$val->product_image}}" alt="logo">
                              </a>
                              <ul class="social">
                                  <li>
                                    <?php if(!empty($val->product_link)) { ?>
                                      <a href="{{$val->product_link}}" class="fas fa-play-circle"></a>
                                    <?php } ?>
                                  </li>
                              </ul>

                          </div>
                          <div class="product-content">
                            <?php $text=$val->title;
                                $textv = substr($text, 0, 20); ?>
                              <h3 class="title"><a href="#">{{$textv}}...</a></h3>
                              <p> 1374 Recent Orders ... </p>
                              <p class="product-shipping">{{$val->price}} <span> 02/10/2019 </span> </p>
                              <img class="img-responsive" src="{{url('frontend-assets/images/graph-img.jpg')}}" alt="logo">
                              <div class="back">
                                  <div id="seemore_details" class="button_base b05_3d_roll"
                                  data-main="{{$val->maincategory_id}}"
                                  data-sub="{{$val->subcategory_id}}">
                                      <div>See all details</div>
                                      <div>See all details</div>
                                  </div>
                              </div>
                              <div class="add-fab"><a href="#"><i class="fas fa-heart"></i> Add to Favorite </a></div>
                          </div>
                      </div>
                  </div>
                @empty
                  <p> Data Not available </p>
                @endforelse
            </div>


            <div class="pagination-box mb-4 ">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                        <li class="page-item"><a class="page-link" href="#">9</a></li>
                        <li class="page-item"><a class="page-link" href="#">10</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i> </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="copy-right">
                <p>DrSpy.io © 2019 </p>
            </div>

        </div>

        <script src="{{url('frontend-assets/js/jquery-3.3.1.slim.min.js')}}"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });

                $(document).on('click', '#seemore_details', function(i, val) {
                  $main_category = $(this).attr('data-main');
                  $subcategory = $(this).attr('data-sub');
                  if($subcategory != '' && $main_category != '') {
                      window.location.href = '/user/detail-page/'+$subcategory+'/'+$main_category;
                  }

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
