@extends('site.layouts.masterlogin')
@section('pageTitle', 'drspy')
@section('pageDescription', 'Forgot page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('frontend-assets/css/slick/slick.css')}}" />
<link rel="stylesheet" type="text/css" href="{{url('frontend-assets/css/slick/slick-theme.css')}}" />
<section class="nav-cont">
    @include('site.common_frontend.inner-page-header')
</section>

<section class="pricing-cont mb-5">
    <div class="container-fluid pricing-table-sec">
        <div class="row pricing-box">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center mb-5 mt-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-monthly-tab" data-toggle="pill" href="#pills-monthly" role="tab" aria-controls="pills-home" aria-selected="true">Monthly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-weekly-tab" data-toggle="pill" href="#pills-weekly" role="tab" aria-controls="pills-profile" aria-selected="false">Weekly</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-annually-tab" data-toggle="pill" href="#pills-annually" role="tab" aria-controls="pills-profile" aria-selected="false">Annually</a>
                    </li>

                </ul>
            </div>

            <div class="col-12">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-monthly" role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="card-deck mb-3 text-center">
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle"></span>
                                            <h3> Startup</h3></div>
                                        <h2><sup>$</sup>0 <br> <sub>  <i class="fas fa-check green-tick"></i> 1 User / Grow With US!</sub></h2>
                                        <h4>Kickstart your business with a free account!</h4>
                                        <a href="#" data-txt="0" data-id="9" class="trial_selection"> Free Days Trial</a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources</span></li>
                                            <li><span><i class="fas fa-times"></i>  Spy On Top & Trending Stores </span></li>
                                            <li><span><i class="fas fa-times"></i> Spy On Trending Social Media Ads</span></li>
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-times"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-times"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-times"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											
											<li><span><i class="fas fa-times"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-times"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-times"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-times"></i> No Access to Stores Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-times"></i> Facebook Daily Post Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-times"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Ads</span></li>
											<li><span><i class="fas fa-times"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i>  Limited Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-times"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-times"></i> 100+ Extra Conversion Boosting Features</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle"></span>
                                            <h3> Coming Soon </h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-times"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-times"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> BUSINESS</h3></div>
                                        <h2><sup>$</sup> 49.95 <br> <sub><i class="fas fa-check green-tick"></i> 1 User / Per user, Per month</sub></h2>
                                        <h4>Find Winning Products</h4>
                                        <a href="#" data-txt="5" data-id="8" class="blue trial_selection"> Start 7 Days Full Access Trial For $7</a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-times"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 50 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-times"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-times"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/5 Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-times"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>
                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon</h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-times"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-times"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> CORPORATE</h3></div>
                                        <h2><sup>$</sup>99.95 <br> <sub><i class="fas fa-check green-tick"></i> 1 User / Per user, Per month</sub></h2>
                                        <h4>Grow Your Brand</h4>
                                          <a href="#" data-txt="10" data-id="5"  class="light-blue trial_selection"> Start 7 Days Full Access Trial For $7 </a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 500 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-check"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-check"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/7 Chat & Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-check"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon </h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-check"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-check"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> GURU</h3></div>
                                        <h2><sup>$</sup>299.95 <br> <sub><i class="fas fa-check green-tick"></i> 5 User / 5 accounts, Per month</sub></h2>
                                        <h4>Build 7-figure Stores</h4>
                                        <a href="#" data-txt="20" data-id="1" class="trial_selection">Start 7 Days Full Access Trial For $7 </a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 500 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-check"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-check"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/7 Chat & Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-check"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3>  Coming Soon</h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-check"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-check"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade show " id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">

                        <div class="card-deck mb-3 text-center">
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle"></span>
                                            <h3> Startup</h3></div>
                                        <h2><sup>$</sup>0 <br> <sub>  <i class="fas fa-check green-tick"></i> 1 User / Grow With US!</sub></h2>
                                        <h4>Kickstart your business with a free account!</h4>
                                        <a href="#" data-txt="0" data-id="9" class="trial_selection"> Free Days Trial</a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources</span></li>
                                            <li><span><i class="fas fa-times"></i>  Spy On Top & Trending Stores </span></li>
                                            <li><span><i class="fas fa-times"></i> Spy On Trending Social Media Ads</span></li>
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-times"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-times"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-times"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											
											<li><span><i class="fas fa-times"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-times"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-times"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-times"></i> No Access to Stores Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-times"></i> Facebook Daily Post Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-times"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Ads</span></li>
											<li><span><i class="fas fa-times"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i>  Limited Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-times"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-times"></i> 100+ Extra Conversion Boosting Features</span></li>
                                        </ul>
                                    </div>
                                </div>
								<div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle"></span>
                                            <h3> Coming Soon </h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-times"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-times"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> BUSINESS</h3></div>
                                        <h2><sup>$</sup> 29.95 <br> <sub><i class="fas fa-check green-tick"></i> 1 User / Per user, Per month</sub></h2>
                                        <h4>Find Winning Products</h4>
                                        <a href="#" data-txt="5" data-id="7" class="blue trial_selection"> Start 7 Days Full Access Trial For $7</a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-times"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 50 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-times"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-times"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/5 Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-times"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>
                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon</h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-times"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-times"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> CORPORATE</h3></div>
                                        <h2><sup>$</sup>49.95 <br> <sub><i class="fas fa-check green-tick"></i> 1 User / Per user, Per month</sub></h2>
                                        <h4>Grow Your Brand</h4>
                                          <a href="#" data-txt="10" data-id="4"  class="light-blue trial_selection"> Start 7 Days Full Access Trial For $7 </a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 500 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-check"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-check"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/7 Chat & Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-check"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon </h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-check"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-check"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> GURU</h3></div>
                                        <h2><sup>$</sup>49.95 <br> <sub><i class="fas fa-check green-tick"></i> 5 User / 5 accounts, Per month</sub></h2>
                                        <h4>Build 7-figure Stores</h4>
                                        <a href="#" data-txt="20" class="trial_selection">Start 7 Days Full Access Trial For $7 </a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 500 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-check"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-check"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/7 Chat & Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-check"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon</h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-check"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-check"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show " id="pills-annually" role="tabpanel" aria-labelledby="pills-annually-tab">
                        <div class="card-deck mb-3 text-center">
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle"></span>
                                            <h3> Startup</h3></div>
                                        <h2><sup>$</sup>0 <br> <sub>  <i class="fas fa-check green-tick"></i> 1 User / Grow With US!</sub></h2>
                                        <h4>Kickstart your business with a free account!</h4>
                                        <a href="#" data-txt="0" data-id="9" class="trial_selection"> Free Days Trial</a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources</span></li>
                                            <li><span><i class="fas fa-times"></i>  Spy On Top & Trending Stores </span></li>
                                            <li><span><i class="fas fa-times"></i> Spy On Trending Social Media Ads</span></li>
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-times"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-times"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-times"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											
											<li><span><i class="fas fa-times"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-times"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-times"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-times"></i> No Access to Stores Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-times"></i> Facebook Daily Post Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-times"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Ads</span></li>
											<li><span><i class="fas fa-times"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i>  Limited Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-times"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-times"></i> 100+ Extra Conversion Boosting Features</span></li>
                                        </ul>
                                    </div>
                                </div>

								<div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle"></span>
                                            <h3> Coming Soon </h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-times"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-times"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> BUSINESS</h3></div>
                                        <h2><sup>$</sup> 499.50 <br> <sub><i class="fas fa-check green-tick"></i> 1 User / Per user, Per month</sub></h2>
                                        <h4>Find Winning Products</h4>
                                        <a href="#" data-txt="5" data-id="6" class="blue trial_selection"> Start 7 Days Full Access Trial For $7</a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-times"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 50 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-times"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-times"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-times"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/5 Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-times"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>
                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon "><span class="circle square"></span>
                                            <h3> Coming Soon</h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-times"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-times"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-times"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> CORPORATE</h3></div>
                                        <h2><sup>$</sup>999.50 <br> <sub><i class="fas fa-check green-tick"></i> 1 User / Per user, Per month</sub></h2>
                                        <h4>Grow Your Brand</h4>
                                          <a href="#" data-txt="10" data-id="3"  class="light-blue trial_selection"> Start 7 Days Full Access Trial For $7 </a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 500 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-check"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-check"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/7 Chat & Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-check"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon </h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-check"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-check"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="removepadding col-xl-3 col-md-6 col-12">
                                <div class="OurPrices-style2-card">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl"><span class="circle square"></span>
                                            <h3> GURU</h3></div>
                                        <h2><sup>$</sup>2499.50 <br> <sub><i class="fas fa-check green-tick"></i> 5 User / 5 accounts, Per month</sub></h2>
                                        <h4>Build 7-figure Stores</h4>
                                        <a href="#" data-txt="20" data-id="2" class="trial_selection">Start 7 Days Full Access Trial For $7 </a>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
                                            <li><span><i class="fas fa-check"></i> Spy On Dropshipping Sources </span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Top & Trending Stores</span></li>
                                            <li><span><i class="fas fa-check"></i> Spy On Trending Social Media Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Access 1,500,000+ Winning Products </span></li>
											<li><span><i class="fas fa-check"></i> Access AliExpress Top Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Dropship Products</span></li>
											<li><span><i class="fas fa-check"></i> AliExpress Top Most Wished</span></li>
											<li><span><i class="fas fa-check"></i> Picked by DrSpy (Exclusive)</span></li>
											<li><span><i class="fas fa-check"></i> Wish.com Best Sellers</span></li>
											<li><span><i class="fas fa-check"></i> New Trending Products Daily</span></li>
											<li><span><i class="fas fa-check"></i> Aliexpress Insights</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Intelligence</span></li>
											<li><span><i class="fas fa-check"></i> Competitor Ad Campaigns</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Products</span></li>
											<li><span><i class="fas fa-check"></i> Top selling & trending stores</span></li>
											<li><span><i class="fas fa-check"></i> Up to 500 Stores for Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Stores</span></li>
											<li><span><i class="fas fa-check"></i> Facebook Daily Post Tracking</span></li>
											
											<li><span><i class="fas fa-check"></i> Facebook Winning Ads Trends</span></li>
											<li><span><i class="fas fa-check"></i> Active Ads Tracking</span></li>
											<li><span><i class="fas fa-check"></i> Access Saved Ads</span></li>
											
											<li><span><i class="fas fa-check"></i> Filter Metrics</span></li>
											<li><span><i class="fas fa-check"></i> 24/7 Chat & Email Support (Mon - Fri)</span></li>
											<li><span><i class="fas fa-check"></i> Dropshipping & Marketing Training</span></li>
											<li><span><i class="fas fa-check"></i> 100+ Extra Conversion Boosting Features</span></li>
											
                                        </ul>
                                    </div>
                                </div>

                                <div class="OurPrices-style2-card around-border content-hide">
                                    <div class="OurPrices-style2-card-head">
                                        <div class="h-crl csoon"><span class="circle square"></span>
                                            <h3> Coming Soon</h3></div>
                                    </div>
                                    <div class="OurPrices-style2-card-content">
                                        <ul>
											<li><span><i class="fas fa-check"></i> Bulk Product Video Finder</span></li>
											<li><span><i class="fas fa-check"></i> Deep Shopify Store Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Deep Product Analyzer</span></li>
											<li><span><i class="fas fa-check"></i> Best Product Research Chrome Extension</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="hide-all"><span class="hideshow active"> Hide All Features <i class="fa fa-angle-up icon"></i></span></div>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="perks">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="drspy-heading"> More <span>DRSPY</span> Perks </h1></div>

            <div class="col-md-6">
                <div class="perks-box">
                    <i class="far fa-comments"></i>
                    <h1>24/5 Customer Support</h1>
                    <p> Have a question, concern or feedback for us? Our support team is always a quick chat or email away - 24 hours a day , from Mon to Fri. </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="perks-box">
                    <i class="fas fa-rocket"></i>
                    <h1>New features released regularly</h1>
                    <p> Our development cycle is fast. We frequently update existing tool and release new features - many of which are heavily influenced by requests from our customers. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testi-txt">
                    <img class="img-responsive center-block" src="{{url('frontend-assets/images/testi-icon.png')}}">
                    <h1> Our Testimonial </h1>
                </div>
            </div>

            <div class="col-md-12">
                <div class="test-cont">
                    <div class="img-text-tsti">
                        <div class="img-column">
                            <img class="circular-square img-responsive center-block" src="{{url('frontend-assets/images/woman.png')}}">
                        </div>
                        <div class="txt-column">
                            <h6> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</h6>
                            <p> Casper Bak
                                <br> Owner @ Soho | Business Plan </p>
                        </div>
                    </div>

                    <div class="img-text-tsti">
                        <div class="img-column">
                            <img class="circular-square img-responsive center-block" src="{{url('frontend-assets/images/barack-obama.png')}}">
                        </div>
                        <div class="txt-column">
                            <h6> " Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  "</h6>
                            <p> Casper Bak
                                <br> Owner @ Soho | Business Plan </p>
                        </div>
                    </div>

                    <div class="img-text-tsti">
                        <div class="img-column">
                            <img class="circular-square img-responsive center-block" src="{{url('frontend-assets/images/woman.png')}}">
                        </div>
                        <div class="txt-column">
                            <h6> " Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  "</h6>
                            <p> Casper Bak
                                <br> Owner @ Soho | Business Plan </p>
                        </div>
                    </div>

                    <div class="img-text-tsti">
                        <div class="img-column">
                            <img class="circular-square img-responsive center-block" src="{{url('frontend-assets/images/barack-obama.png')}}">
                        </div>
                        <div class="txt-column">
                            <h6> " Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  "</h6>
                            <p> Casper Bak
                                <br> Owner @ Soho | Business Plan </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="FAQ">
    <div class="container">
        <div class="row">
            <div class="faq-icon">
                <img class="img-responsive center-block" src="{{url('frontend-assets/images/faq.png')}}" alt="logo">
            </div>
            <div class="col-md-12">
                <h1 class="drspy-heading"> Frequently <span>Asked</span> Questions </h1></div>
            <div class="col-md-12">
                <div id="accordion" class="myaccordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
		<button class="d-flex align-items-center justify-content-between btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		 Dummy Content won't install...
		  <span class="fa-stack fa-sm">
			<i class="fas fa-circle fa-stack-2x"></i>
			<i class="fas fa-minus fa-stack-1x fa-inverse"></i>
		  </span>
		</button>
	  </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <p>If you have problems installing Dummy Content, please try the manual installation process as described here: <a href="#">docs.joomla.org/Installing_an_extension</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
								<button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  How can I uninstall Dummy Content?
								  <span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-plus fa-stack-1x fa-inverse"></i>
								  </span>
								</button>
							</h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="card-body">
                                    <p>

                                        You can either uninstall Dummy Content by using the core extension manager available in the Joomla! Administrator Control Panel, or by using the powerful Regular Labs Extension Manager.
                                    </p>
                                    <p> If you no longer use any Regular Labs extensions, you can also uninstall the Regular Labs Library plugin by using the Joomla! core extension manager.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
							<button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							 What are the minimum requirements?
							  <span class="fa-stack fa-2x">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fas fa-plus fa-stack-1x fa-inverse"></i>
							  </span>
							</button>
						  </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <div class="card-body">
                                    <p>Dummy Content will only work correctly if your setup meets these requirements:</p>
                                    <ul>
                                        <li>meet the above requirements;</li>
                                        <li>do not have extension files or Joomla! core files which have been altered in any way.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingfour">
                            <h2 class="mb-0">
								<button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
								 Where can I download earlier versions?
								  <span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-plus fa-stack-1x fa-inverse"></i>
								  </span>
								</button>
							</h2>
                        </div>
                        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                            <div class="card-body">
                                <div class="card-body">
                                    <p>Dummy Content will only work correctly if your setup meets these requirements:</p>
                                    <p> If you have a subscription to an extension, you can also download any previous pro version of that extension. </p>
                                    <p>If you do not have a valid subscription, you can download any pro version that is older than 1 year.You can find old versions in the changelog.</p>
                                    <ul>
                                        <li>meet the above requirements;</li>
                                        <li>do not have extension files or Joomla! core files which have been altered in any way.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingfive">
                            <h2 class="mb-0">
								<button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
								 Under what license are Regular Labs extensions released?
								<span class="fa-stack fa-2x">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-plus fa-stack-1x fa-inverse"></i>
								</span>
								</button>
							</h2>
                        </div>
                        <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                            <div class="card-body">
                                <div class="card-body">
                                    <p>Dummy Content will only work correctly if your setup meets these requirements:</p>
                                    <ul>
                                        <li>meet the above requirements;</li>
                                        <li>do not have extension files or Joomla! core files which have been altered in any way.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="assistance-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="assis-text">
                    <h1> assistance </h1>
                    <p>If you're hesitating, don't worry - we're here to explain thoroughly
                        <br> everything you might want to know. Let us help!</p>
                    <a href="#" class="blue"> Contact us Now </a>
                    <a href="#"> Book a Demo </a>
                </div>
            </div>

            <div class="assit-cont">
                <div class="assit-box">
                    <div class="assi-icon-txt"><i class="far fa-user-circle"></i>
                        <h3> Meet us or schedule a call </h3></div>
                    <p> We will listen to your needs and help you make the decision </p>
                </div>
                <div class="assit-box">
                    <div class="assi-icon-txt"><i class="fas fa-cog"></i>
                        <h3> Set-up </h3></div>
                    <p> We will listen to your needs and help you make the decision </p>
                </div>
                <div class="assit-box">
                    <div class="assi-icon-txt"><i class="far fa-file-alt"></i>
                        <h3> Existing <br> Contracts </h3></div>
                    <p> We will listen to your needs and help you make the decision </p>
                </div>
                <div class="assit-box">
                    <div class="assi-icon-txt"><i class="fas fa-clipboard-check"></i>
                        <h3> Efficient Legal <br> check </h3></div>
                    <p> We will listen to your needs and help you make the decision </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="get-start-section">
    <div class="container">
        <div class="row">
            <div class="get-start-text">
                <h1> Still not convinced ? </h1>
                <h1> Start free account and test for yourself! </h1>
                <p> Unlimited templates, unlimited signatures, 3 signed
                    <br> contracts, 3 stored contracts. </p>
                <div class="newsletter-sm">
                    <div class="newsletter-sm-bot">
                        <input class="newsletter-input-sm" name="email" placeholder="Enter Your Email" type="text">
                        <button class="newsletter-button-sm" type="submit">Get Started Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('site.common_frontend.footer')

<script src="{{url('frontend-assets/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="js/bootstrap.bundle.min.js"></script>-->
<script src="{{url('frontend-assets/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend-assets/js/slick/slick.min.js')}}"></script>
<!-- <script src="{{url('frontend-assets/js/app.js')}}"></script> -->

<script>
    $(document).ready(function() {
        $('.test-cont').slick({
            dots: true,
            autoplay: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });

    });

    //

    $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target)
            .prev()
            .find("i:last-child")
            .toggleClass("fa-minus fa-plus");
    });

    //
    $(document).ready(function() {
        $(".hideshow").click(function() {
            $(this).html('Show All Features <i class="fa fa-angle-up icon"></i>');
            $(".content-hide").slideToggle();

            $(".hideshow").toggleClass("active");

        });
        $('.hideshow.active').click(function() {
            $('html, body').animate({
                scrollTop: $("#pills-tabContent").offset().top
            }, 1000)
            $(".hideshow.active").html('Hide All Features <i class="fa fa-angle-up icon"></i>');
        });

        $(document).on('click', '.trial_selection', function(e) {
			var price = $(this).attr('data-id');
			if(price != undefined && price != 'undefined') {
				window.location.href = '/user/account-page/'+price;
			} else {
				alert('OOps! Plan is not available in this category.');
				return false;
			}
        });
    });
</script>
@stop
