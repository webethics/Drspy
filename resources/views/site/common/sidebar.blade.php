<nav id="sidebar">
    <div class="sidebar-header">
        <div class="logo"><a href="/user/dashboard"> <img class="img-responsive center-block" src="{{url('frontend-assets/images/web-logo.png')}}" alt="logo"> </a> </div>
    </div>
  	<?php
        $get_subcategory_data =  get_sidebar_categories();
        // pr($get_subcategory_data, 1);
        $main_category_array = array();
        if(!empty($get_subcategory_data)) {
          foreach($get_subcategory_data as $value) {
            $main_category_array[$value->category_name][] = array('category_id'=>$value->category_id, 'main_category_id'=>$value->maincategory_id, 'subcategory_id'=>$value->id, 'sub_cat_name'=> $value->subcat_name);
          }
        }
  	?>
	<ul class="list-unstyled components">

        <li class="d-block d-md-none">
            <a href="#navbarSupportedContent" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img class="img-responsive center-block" src="{{url('frontend-assets/images/user-img.png')}}" alt="logo"> Bob Hyden</a>
            <ul class="collapse list-unstyled" id="navbarSupportedContent">
                <li>
                    <a href="#">Account Settings</a>
                </li>
                <li>
                    <a href="{{url('/logout')}}">Signout</a>
                </li>
            </ul>
        </li>

        <li class="hwp">
            <a href="/user/dashboard">Dashboard<span class="highlight">Hunt & Spy on Wining Product, Stores & Ads </span></a>
        </li>
        <li>
            <a href="#id1" data-toggle="collapse" aria-expanded="false"
            class="dropdown-toggle">Dropship Zone <span class="highlight">Hunt & Spy Wining Product</span></a>

            <ul class="collapse list-unstyled show" id="id1">
                <li>
                    <a href="#top-seller" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle collapsed">
                    AliExpress Top Best Sellers <span class="highlight"> 5656895+ </span></a>
                    <ul class="collapse list-unstyled" id="top-seller">

                        @foreach($main_category_array as $key=>$value)
                            <li class="dropdown mega-dropdown">
                              <a href="#" class="dropdown-toggle collapsed" data-toggle="dropdown"
                               aria-expanded="false">{{$key}} <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                              <ul class="dropdown-menu mega-dropdown-menu row">
                                  @foreach($value as $res)
                                    <li class="col-sm-6 col-lg-4">
                                        <ul>
                                            <li><a href="/listing-details/{{$res['subcategory_id']}}/{{$res['main_category_id']}}">{{$res['sub_cat_name']}}</a></li>
                                        </ul>
                                    </li>
                                  @endforeach
                              </ul>
                          </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="#tmw" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">AliExpress Top Most Wished<span class="highlight">95000+</span></a>
                    <ul class="collapse list-unstyled" id="tmw">
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                    </ul>
                </li>
                <li>
                  <a href="#tdp">AliExpress Top Dropship Products<span class="highlight">95000+</span></a>
                </li>
				<li>
					<a href="#dctp">DrSpy's Choice Top Products<span class="highlight">8009+</span></a>
				</li>
				<li>
					<a href="#wbs">Wish.com Best Sellers<span class="highlight">9999+</span></a>
				</li>


				<li>
					<a href="#ntp">New & Trending Products<span class="highlight">Spying Stores</span></a>
				</li>


                <li>
                    <a href="#ptb" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle collapsed">Products Treasure Box</a>
                    <ul class="collapse list-unstyled" id="ptb">
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                        <li>
                            <a href="#">submenu link 1</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </li>

        <li class="cc"><a href="#cust-care" data-toggle="collapse" aria-expanded="false"
          class="dropdown-toggle collapsed">Customer Care</a>
            <ul class="collapse list-unstyled" id="cust-care">
                <li>
                    <a href="#id8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Training</a>
                    <ul class="collapse list-unstyled" id="id8">
                        <li>
                            <a href="#">Training Menu 1</a>
                        </li>
                        <li>
                            <a href="#">Training Menu 2</a>
                        </li>
                        <li>
                            <a href="#">Training Menu 3</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#id9" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Affiliates</a>
                    <ul class="collapse list-unstyled" id="id9">
                        <li>
                            <a href="#">Affiliates Menu 1</a>
                        </li>
                        <li>
                            <a href="#">Affiliates Menu 2</a>
                        </li>
                        <li>
                            <a href="#">ffiliates Menu 3</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#id10" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">Billing</a>
                    <ul class="collapse list-unstyled" id="id10">
                        <li>
                            <a href="#">Billing Menu 1</a>
                        </li>
                        <li>
                            <a href="#">Billing Menu 1</a>
                        </li>
                        <li>
                            <a href="#">Billing Menu 1</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>

</nav>
