<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourist Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
      <!-- JavaScript -->
      <script src="js/swiper.min.js"></script>
      <link rel="stylesheet" href="css/swiper.min.css" />
      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="css/testing2.css">

</head>
<body>

  
    <!-- Header with search form -->
    <nav class="navbar navbar-expand-lg  text-light fixed-top navopcity ">
            <div class="container-fluid bg-boxes ">
                <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar3">
                    <ul class="navbar-nav mx-auto text-center ">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div class="profile-icon text-light">
                                    <i class="fa fa-user"></i>
                                    <span class="username"><img src="images/logo.svg" width="50" alt=""></span>
                                  </div>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto  text-center">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"><i class="bi bi-person"> Destnation </i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"><i class="bi bi-cart"> Tour Gide </i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"><i class="bi bi-list"> About us </i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"><i class="bi bi-bell"> Contact </i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"><i class="bi bi-bell"> Plans </i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <header class="d-flex justify-content-center my-img-bg-dark ">
        <div class=" col-12 container  text-white d-flex justify-content-center  " >
            <div class="col-md-12 col-sm-6 col-xs-12  mt-5" >
                    <div class="card  glass-effect "  > 
                        <div class="container mx-auto p-5">
                            <h1 class="text-center mb-4 text-light"> Start Now </h1>
                            <form id="travel-form" class="  text-left">
                                <div class="mb-4 ">
                                    <label for="destination" class="form-label font-weight-bold "> Enter city </label>
                                    <input type="text" id="destination" name="destination" required class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label for="num-people" class="form-label font-weight-bold"> How Many Person </label>
                                    <input type="number" id="num-people" name="num-people" required class="form-control">
                                </div>

                                <div class="container-fluid d-flex justify-content-center">
                                    <div class="form-row w-100">
                                        <div class=" p-3 w-50">
                                            <input type="date"   id="date" name="date" required class="form-control rounded-btn  ">
                                        </div>
                                        <div class="p-3 w-50">
                                            <input type="time" id="time" name="time" required class="form-control  rounded-btn">
                                        </div>
                                        </div>
                                </div>

                                <div class="form-row">
                                    <div class=" container pb-3 d-flex justify-content-center ">
                                <div class="form-check form-check-inline mx-2">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Round Trip
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mx-2">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                    One Way
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mx-2">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                                    <label class="form-check-label" for="exampleRadios3">
                                    Multiydestination
                                    </label>
                                </div>
                                </div>
                                </div>
                                <div class="container d-flex  justify-content-center">
                                    <button type="submit" class="btn  w-50  p-3 mt-3 rounded-btn bg-btn-secondry"> See Your Trip </button>
                                </div>
                                
                            </form>
                            <div id="results"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 order-md-1 text-center text-md-start ">
                        <!-- <h1 class="text-center p-3" >  Traveling and tourism  </h1>
                        <p class="lead p-3 text-center ">  Traveling and tourism can be one of the most rewarding and enriching experiences in a person's life. It allows you to explore new cultures, meet people from all walks of life, and create memories that will last a lifetime. Whether you're traveling solo, with friends or family, or as part of a group, there's always something new and exciting to discover.  </p> -->
                        <div class="d-flex flex-row justify-content-center text-light w-100 ">
                            <div class="card m-2  glass-effect  w-100">
                              <div class="card-body  d-flex align-items-center  ">
                                <i class="fas fa-user fa-2x mr-3">   </i>
                                <div>
                                  <h5 class="card-title"> Riyadh  </h5>
                                  <p class="card-text"> Plan Trip </p>
                                </div>
                              </div>
                            </div>
                            <div class="card m-2 glass-effect  w-100">
                              <div class="card-body d-flex align-items-center  ">
                                <i class="fas fa-cog fa-2x mr-3">  </i>
                                <div>
                                    <h5 class="card-title"> Ola  </h5>
                                    <p class="card-text"> Plan Trip </p>                    </div>
                              </div>
                            </div>
                            <div class="card m-2  glass-effect w-100">
                              <div class="card-body d-flex align-items-center  ">
                                <i class="fas fa-chart-line fa-2x mr-3"> </i>
                                <div>
                                    <h5 class="card-title"> Jeddah  </h5>
                                    <p class="card-text"> Plan Trip </p>                    </div>
                              </div>
                            </div>
                          </div>
                    </div>
            </div>
        </div>
    </header>

  
<!-- Section 1: Most Popular Trips -->
<section>
  <div class="container mt-3 pupular-container">
        <h3 class="bg-light p-4 text-center text-dark" >Next Trip Plans</h3>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card ">
                  <div class="position-relative">
                    <img src="images/home.png" class="img-fluid2" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                      <h5 class="card-title text-white text-center">Trip Name</h5>
                      <p class="card-text text-white text-center">Trip details and description</p>
                      <p class="card-text text-white text-center"><small>$Price</small></p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card " style="background-color: #FF385C;">
                  <div class="position-relative">
                    <img src="images/home_gide.png" class="img-fluid2" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                      <h5 class="card-title text-white text-center">Trip Name</h5>
                      <p class="card-text text-white text-center">Trip details and description</p>
                      <p class="card-text text-white text-center"><small>$Price</small></p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card ">
                  <div class="position-relative">
                    <img src="images/home.png" class="img-fluid2" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                      <h5 class="card-title text-white text-center">Trip Name</h5>
                      <p class="card-text text-white text-center">Trip details and description</p>
                      <p class="card-text text-white text-center"><small>$Price</small></p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                  <div class="position-relative">
                    <img src="images/home_gide.png" class="img-fluid2" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                      <h5 class="card-title text-white text-center">Trip Name</h5>
                      <p class="card-text text-white text-center">Trip details and description</p>
                      <p class="card-text text-white text-center"><small>$Price</small></p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card ">
                  <div class="position-relative">
                    <img src="images/home.png" class="img-fluid2" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                      <h5 class="card-title text-white text-center">Trip Name</h5>
                      <p class="card-text text-white text-center">Trip details and description</p>
                      <p class="card-text text-white text-center"><small>$Price</small></p>
                    </div>
                  </div>
              </div>
            </div>
            

          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
</section>

<!-- Section 3: Tour Guides --> 
<!-- gallery section starts  -->
<section id="gallery" class="gallery text-center">
  <style>
    
      .gallery{
        min-height: 100vh;
      }

      .gallery .box-container{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        width: 90%;
        margin:0 auto;
        border-radius: 15px;
      }

      .gallery .box-container .box{
        height:20rem;
        width:30rem;
        margin:2rem;
        cursor: pointer;
        overflow: hidden;
        position: relative;
      }

      .gallery .box-container .box img{
        height:100%;
        width:100%;
        object-fit: cover;
        border-radius: 15px;
      }

      .gallery .box-container .box .icons{
        position: absolute;
        top:120%; left: 0;
        background:linear-gradient(transparent, #333);
        display: flex;
        align-items: flex-end;
        justify-content: space-around;
        height:100%;
        width: 100%;
        opacity: 0;
        transition: .2s linear;
      }

      .gallery .box-container .box:hover .icons{
        opacity: 1;
        top:0;
      }

      .gallery .box-container .box .icons a{
        color:#fff;
        text-shadow: 0 .1rem .3rem #000;
        font-size: 3rem;
        padding-bottom: 2rem;
      }

      .gallery .box-container .box .icons a:hover{
        color:#FF385C;
      }

  </style>

  <h1 class="heading"><span>g</span>allery</h1>

  <div class="box-container">

      <div class="box">
          <img src="images/home.png" alt="">
          <div class="icons">
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-share"></a>
              <a href="#" class="fas fa-search"></a>
          </div>
      </div>

      <div class="box">
          <img src="images/home_gide.png" alt="">
          <div class="icons">
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-share"></a>
              <a href="#" class="fas fa-search"></a>
          </div>
      </div>

      <div class="box">
          <img src="images/home.png" alt="">
          <div class="icons">
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-share"></a>
              <a href="#" class="fas fa-search"></a>
          </div>
      </div>

      <div class="box ">
          <img src="images/home_gide.png" alt="">
          <div class="icons">
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-share"></a>
              <a href="#" class="fas fa-search"></a>
          </div>
      </div>

  </div>

</section>
<!-- gallery section ends -->

<!-- Section 4: Tour Gides -->

<section  class="p-4">
<h3 class="bg-light p-4 text-center text-dark" >  Ture Gides</h3>
      <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card bg-btn-secondry ">
            <div class="card-body text-center">
              <img src="images/logo.png" class="img-fluid rounded-circle mb-3" alt="Profile Image">
              <h5 class="card-title">John Doe</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc vel bibendum bibendum, velit sapien aliquet velit, vel bibendum bibendum, velit sapien aliquet velit.</p>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
              <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-success mr-3"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="btn btn-primary"><i class="fas fa-phone"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-btn-secondry ">

            <div class="card-body text-center">
              <img src="images/logo.png" class="img-fluid rounded-circle mb-3" alt="Profile Image">
              <h5 class="card-title">John Doe</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc vel bibendum bibendum, velit sapien aliquet velit, vel bibendum bibendum, velit sapien aliquet velit.</p>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
              <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-success mr-3"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="btn btn-primary"><i class="fas fa-phone"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card bg-btn-secondry ">

            <div class="card-body text-center">
              <img src="images/logo.png" class="img-fluid rounded-circle mb-3" alt="Profile Image">
              <h5 class="card-title">John Doe</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc vel bibendum bibendum, velit sapien aliquet velit, vel bibendum bibendum, velit sapien aliquet velit.</p>
                            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
              <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-success mr-3"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="btn btn-primary"><i class="fas fa-phone"></i></a>
              </div>
            </div>
          </div>
        </div>
</section>

    <!-- Section 5: Tourist Comments -->
  <section id="comments" class="bg-light py-5">
  <div class="container">
  <h2 class="text-center mb-5"> Tourist Comments </h2>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
        // اتصال بقاعدة البيانات
        $conn = mysqli_connect('localhost', 'root', '', 'Darb');

        // استعلام لاسترداد التعليقات المحمل
        $sql = "SELECT * FROM comments ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        // إرجاع التعليقات كنص HTML
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="swiper-slide">';
          echo '<div class="card">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row['name'] . '</h5>';
          echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['rating'] . ' نجمة</h6>';
          echo '<p class="card-text">' . $row['description'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        // إغلاق اتصال قاعدة البيانات
        mysqli_close($conn);
      ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  </div>

  <script>
  $(document).ready(function() {
  var mySwiper = new Swiper('.swiper-container', {
    // تكوين Swiper.js
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  setInterval(function() {
    mySwiper.slideNext();
  }, 3000);
  });
  </script>
  </section>




      
        <footer>
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <h4>About Us</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, urna eu fringilla bibendum, elit sapien convallis velit, vel ultricies enim sapien vel velit.</p>
                </div>
                <div class="col-md-4">
                  <h4>Connect With Us</h4>
                  <ul class="social-media">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <h4>Quick Links</h4>
                  <ul class="quick-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
 


  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        var swiper = new Swiper('.swiper-container', {
          slidesPerView: 3,
          spaceBetween: 30,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
      </script>
       <!-- التحكم في اظهار واخفاي الناف بار  -->
      <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
          var currentScrollPos = window.pageYOffset;
          if (prevScrollpos > currentScrollPos) {
            document.querySelector(".navbar").style.top = "-100px";
          } else {
            document.querySelector(".navbar").style.top = "0px";
          }
          prevScrollpos = currentScrollPos;
        }
      </script>

      <style>
        .navbar {
          transition: top 0.3s;
        }
      </style>
            
  </body>
  </html>
  