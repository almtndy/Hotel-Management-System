@extends('frontlayout')
@section('content')

<body>
   <!-- header section start -->
   <div class="header_section layout_padding">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top border border-1">
            <a class="navbar-brand" href="{{url('/')}}">
               <h1 class="text-white" style="font-family: Georgia, serif;">Dream Luxury Hotel</h1>
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="#home">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#services">services</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#about">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#gallery">Gallery</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#contact">Contact</a>
                  </li>

                  @if(Session::has('customerlogin'))
                  <li class="nav-item">
                     <a class="nav-link button btn-warning " style="border-radius:20px" href="{{url('booking')}}">Booking</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <div class="search_icon">
                     <ul>
                        <li><a href="{{url('logout')}}">LOGOUT</a></li>
                        @else
                        <form class="form-inline my-2 my-lg-0">
                           <div class="search_icon">
                              <ul>
                                 <li><a href="{{url('frontlogin')}}">LOGIN</a></li>
                                 <li><a href="{{url('register')}}">REGISTER</a></li>
                                 @endif
                              </ul>
                           </div>
                        </form>
                     </ul>
                  </div>
               </form>
            </div>
         </nav>


         <!-- banner section start -->
         <div id="home" class="banner_section layout_padding">
            <div class="container">
               <div id="costum_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <h1 class="furniture_text">Your Dream Hotel</h1>
                        <p class="there_text">Welcome to Dream Luxury Hotel, your home away from home. We are a luxurious hotel located in the heart of Butuan City. We offer a variety of amenities and services to make your stay as comfortable and enjoyable as possible.</p>
                        <!-- <a class="contact_bt_main contact_bt" href="contact.html">Contact Us</a> -->
                        <div class="contact_bt_main">
                           <div class="contact_bt"><a href="contact.html">Contact Us</a></div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <h1 class="furniture_text">Relaxing Room</h1>
                        <!-- <p class="there_text">We offer a variety of amenities and services to make your stay as comfortable and enjoyable as possible.</p> -->
                        <div class="bed_img bed-images">
                           <img src="{{ asset ('images1/single.png') }}" alt="Single Bed">
                           <img src="{{ asset ('images1/twin.png') }}" alt="Twin Bed">
                           <img src="{{ asset ('images1/double.png') }}" alt="Double Bed">
                        </div>
                        <!-- <div class="contact_bt_main">
                        <div class="contact_bt"><a href="contact.html">Contact Us</a></div>
                     </div> -->
                     </div>
                     <!-- <div class="carousel-item">
                        <h1 class="furniture_text">FURNITURE</h1>
                        <p class="there_text">Welcome to Dream Luxury Hotel, your home away from home. We are a luxurious hotel located in the heart of Butuan City. We offer a variety of amenities and services to make your stay as comfortable and enjoyable as possible.</p>
                        <div class="contact_bt_main">
                           <div class="contact_bt"><a href="contact.html">Contact Us</a></div>
                        </div>
                     </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#costum_slider" role="button" data-slide="prev">
                     <i class=""><img src="{{ asset ('images1/left-arrow.png')}}"></i>
                  </a>
                  <a class="carousel-control-next" href="#costum_slider" role="button" data-slide="next">
                     <i class=""><img src="{{ asset ('images1/right-arrow.png') }}"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>

      <!-- header section end -->
      <!-- services section start -->
      <div id="services" class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital font-weight-bold">our services</h1>
            <p class="many_taital">Our commitment to excellence is reflected in our impeccable service. From the moment you arrive, our dedicated staff is devoted to ensuring your every need is met. Whether it's personalized concierge assistance, exquisite dining experiences, or rejuvenating spa treatments, we pride ourselves on delivering exceptional service tailored to exceed your expectations.</p>
            <div id="services_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  @php
                  $servicesCount = count($services); // Count of all services
                  $servicesPerSlide = 4; // Number of services per carousel item
                  $slideCount = ceil($servicesCount / $servicesPerSlide); // Calculate the number of carousel items
                  $currentService = 0; // Initialize the service index
                  @endphp

                  @for ($i = 0; $i < $slideCount; $i++) <div class="carousel-item @if($i === 0) active @endif">
                     <div class="services_section2 layout_padding">
                        <div class="row">
                           @for ($j = 0; $j < $servicesPerSlide; $j++) @if ($currentService < $servicesCount) <div class="col-lg-3 col-sm-6">
                              <div class="icon_1"><img class="img-fluid" width="100%" src="{{ Storage::url($services[$currentService]->photo) }}" style="height: 200px"></div>
                              <h2 class="furnitures_text">{{$services[$currentService]->title}}</h2>
                              <p class="dummy_text">{{$services[$currentService]->small_desc}}</p>
                              <div class="read_bt_main">
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                        </div>
                        @php
                        $currentService++; // Move to the next service
                        @endphp
                        @endif
                        @endfor
                     </div>
               </div>
            </div>
            @endfor
         </div>
         <a class="carousel-control-prev" href="#services_slider" role="button" data-slide="prev">
            <i><img src="{{ asset('images1/left-arrow.png') }}" alt="Previous"></i>
         </a>
         <a class="carousel-control-next" href="#services_slider" role="button" data-slide="next">
            <i><img src="{{ asset('images1/right-arrow.png') }}" alt="Next"></i>
         </a>

      </div>
   </div>
   </div>

   <!-- services section end -->
   <!-- about section start -->
   <div id="about" class="about_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <h1 class="about_text font-weight-bold">About Us</h1>
               <p>Our hotel is family-owned and operated. We pride ourselves on providing our guests with a warm and welcoming atmosphere. We are committed to making your stay enjoyable and memorable.</p>
               <div class="read_bt1"><a href="#about">Read More</a></div>
            </div>
            <div class="col-md-6">
               <div class="image_1"><img src="{{ asset ('images1/about-us.png')}}" height="400" width="400"></div>
            </div>
         </div>
      </div>
   </div>
   <!-- about section end -->
   <!-- furnitures section start -->
   <!-- <div class="furnitures_section layout_padding">
      <div class="container">
         <h1 class="our_text font-weight-bold">OUR furnitures</h1>
         <p class="text-white">We are proud to offer our guests the finest in hotel furniture. Our pieces are made from high-quality materials and are designed to provide comfort and style.</p>
         <div class="furnitures_section2 layout_padding">
            <div class="row">
               <div class="col-md-6">
                  <div class="container_main">
                     <img src="{{ asset ('images1/img-2.png')}}" alt="Avatar" class="image">
                     <div class="overlay">
                        <a href="#" class="icon" title="User Profile">
                           <i class="fa fa-search"></i>
                        </a>
                     </div>
                  </div>
                  <h3 class="temper_text">Tempor incididunt ut labore et dolore</h3>
                  <p class="dololr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
               </div>
               <div class="col-md-6">
                  <div class="container_main">
                     <img src="{{ asset ('images1/img-3.png')}}" alt="Avatar" class="image">
                     <div class="overlay">
                        <a href="#" class="icon" title="User Profile">
                           <i class="fa fa-search"></i>
                        </a>
                     </div>
                  </div>
                  <h3 class="temper_text">Tempor incididunt ut labore et dolore</h3>
                  <p class="dololr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <!-- furnitures section end -->
   <!-- who section start -->

   <!-- who section end -->
   <!-- projects section start -->
   <div id="gallery" class="projects_section layout_padding">
      <div class="container">
         <h1 class="our_text font-weight-bold">Our Gallery</h1>
         <p class="ipsum_text">Take a virtual tour of our hotel and see our beautiful accommodations, amenities, and surroundings.</p>
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               @php
               $roomTypesCount = count($roomTypes); // Count of all room types
               $itemsPerSlide = 4; // Number of room types per carousel item
               $slideCount = ceil($roomTypesCount / $itemsPerSlide); // Calculate the number of carousel items
               $currentRoomType = 0; // Initialize the room type index
               @endphp

               @for ($i = 0; $i < $slideCount; $i++) <div class="carousel-item @if($i === 0) active @endif">
                  <div class="projects_section2">
                     <div class="container_main2">
                        <div class="row">
                           @for ($j = 0; $j < $itemsPerSlide; $j++) @if ($currentRoomType < $roomTypesCount) <div class="col-lg-3 col-md-4 col-sm-6">
                              <div class="container_main1">
                                 <div class="text-center">
                                    <h1 class="text-light card-header">{{$roomTypes[$currentRoomType]->title}}</h1>
                                 </div>
                                 @foreach($roomTypes[$currentRoomType]->roomtypeimgs as $img)
                                 <a href="{{ Storage::url($img->img_src) }}" data-lightbox="rgallery">
                                    <img class="img-thumbnail" src="{{ Storage::url($img->img_src) }}" style="width: 250px; height: 200px;" alt="">
                                 </a>
                                 @endforeach
                              </div>
                        </div>
                        @php
                        $currentRoomType++; // Move to the next room type
                        @endphp
                        @endif
                        @endfor
                     </div>
                  </div>
            </div>
         </div>
         @endfor
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>

   </div>

   <!-- projects section end -->

   <!-- contact section start -->
   <div class="contact_section layout_padding">
      <div id="contact" class="container">
         <div class="row">
            <div class="col-md-6">
               <h1 class="contact_text font-weight-bold">CONTACT US</h1>
               <div class="mail_sectin">
                  <input type="text" class="email-bt" placeholder="Name" name="Name">
                  <input type="text" class="email-bt" placeholder="Email" name="Name">
                  <input type="text" class="email-bt" placeholder="Phone Number" name="Name">
                  <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                  <div class="send_bt"><a href="#">SEND</a></div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="map_main"> <br> <br> <br>
                  <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252277.24602535696!2d125.5824476!3d8.8952094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3301e998b1704fcf%3A0x85e95810384ea2d6!2sButuan%20City%2C%20Agusan%20Del%20Norte!5e0!3m2!1sen!2sph!4v1700351680876!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- contact section end -->

      <!-- client section start -->
      <div class="clients_section layout_padding">
         <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <h1 class="client_text font-weight-bold">what is says our clients</h1>
                     <!-- <p class="text-black text-center">Lorem ipsum dolor sit amet, consectetur adipiscing</p> -->
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/client6.jpg')}}"></div>
                                 <div class="quote_icon"><img src="images1/quote-icon.png"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">Michelle</h1>
                                 <p class="dolor_ipsum_text">"From the moment we stepped into the lobby, the atmosphere felt inviting. The staff greeted us warmly, and their attention to detail was evident. Our check-in process was smooth, and we were pleasantly surprised by the elegant decor and ambiance of the hotel."</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/client1.webp')}}"></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png') }}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">Carl</h1>
                                 <p class="dolor_ipsum_text">"Our room was a haven of comfort. The bed was luxuriously comfortable, and the view from our window was breathtaking. The cleanliness and tidiness of the room were impeccable, making our stay even more enjoyable."</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="client_text font-weight-bold">what is says our clients</h1>
                     <!-- <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing</p> -->
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/client5.jpg') }}"></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png')}}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">Amy</h1>
                                 <p class="dolor_ipsum_text">"The hotel amenities were top-notch. We loved unwinding at the spa—such a relaxing experience after a day of exploring. The gym was well-equipped, and the pool area provided a serene escape amidst the bustling city."</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/client4.jpg')}}"></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png') }}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">James</h1>
                                 <p class="dolor_ipsum_text">"Dining at the hotel's restaurant was a culinary delight. The breakfast spread was extensive, offering a variety of delicious options. We also indulged in a dinner that exceeded our expectations—flavors that lingered long after the meal was over."</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="client_text font-weight-bold">what is says our clients</h1>
                     <!-- <p class="text-dark text-center">Lorem ipsum dolor sit amet, consectetur adipiscing</p> -->
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/client2.jpg')}}"></div>
                                 <div class="quote_icon"><img src="images1/quote-icon.png"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">Jen</h1>
                                 <p class="dolor_ipsum_text">"The location of the hotel was ideal for us. It was conveniently situated near key attractions, allowing us to explore the city easily. Additionally, the concierge service was helpful in recommending local spots and arranging transportation."</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/client3.jpg')}}"></div>
                                 <div class="quote_icon"><img src="images1/quote-icon.png"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">Mark</h1>
                                 <p class="dolor_ipsum_text">"Overall, our stay at this hotel was exceptional. The combination of exceptional service, comfortable accommodations, excellent amenities, and a prime location made our trip truly memorable. We'd highly recommend this establishment to anyone seeking a delightful and memorable stay."</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- client section end -->

   <!-- footer section start -->
   <div class="footer_section">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-sm-6">
               <h1 class="customer_text">INFORMATION</h1>
               <p class="footer_lorem_text">Our hotel offers more than accommodation—it's an immersive experience. Dive into luxury, comfort, and exceptional hospitality. From our exquisite rooms to cutting-edge facilities, every detail aims to make your stay unforgettable.</p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h1 class="customer_text">LET US HELP YOU</h1>
               <p class="footer_lorem_text">Your comfort is our priority. Our dedicated team ensures prompt and efficient assistance, from arranging tours to meeting special requests. Let us make your stay effortless and exceptional.</p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h1 class="customer_text">UseFul Links</h1>
               <p class="footer_lorem_text1">About Us<br>
                  Careers<br>
                  Sell on shopee<br>
                  Press & News<br>
                  Competitions<br>
                  Terms & Conditions
               </p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h1 class="customer_text">OUR Design</h1>
               <p class="footer_lorem_text">Experience elegance and modernity in our hotel's design. Contemporary aesthetics meet timeless sophistication in every corner. Meticulous design elements create a harmonious blend of comfort, style, and functionality.</p>
            </div>
         </div>
         <!-- <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="basic-addon2">
            <div class="input-group-append">
               <span class="input-group-text" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
         </div> -->
      </div>
   </div>
   <!--  footer section end -->
   @section('scripts')
   <!-- Bootstrap core JavaScript-->
   <script src=" {{ asset('vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
   @endsection
</body>

</html>

@endsection