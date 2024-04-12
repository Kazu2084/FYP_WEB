<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script src="body.js"></script>

<!-- CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-gIwyRfoZkbzN+s+k4K24X+hG4mxx6UyB6UJ+SZOjw6THFfxb23ZJdjmZvGRM7AmW8sYbV7MkzJHrV7bh1JGZfQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky">
        <div class="app-header">
          <div class="app-header-left">
            <!-- <span class="app-icon"></span> -->

            <div class="p app-icon" id="aside-toggle-btn">
            </div>
            <p class="app-name">Teacher Dashboard</p>
            
          </div>
          <div class="app-header-right">
            <button class="mode-switch" title="Switch Theme">
              <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
              </svg>
            </button>
            
          </div>
         
        </div>
      </div>
     <div style="float:right;padding-top: 1rem ;">
  
            <!-- === wrapper section === -->
    <section id="wrapper" class="d-flex w-100">
    <!-- <div class="messages-section"> -->
        <!-- aside nav-->
        <aside class="border-right shadow-sm backgound text" id="aside-nav">
            <!-- aside logo brand -->
           
            <!-- /aside logo brand -->

            <!-- aside nav ul list -->
            
            <ul class="nav flex-column" id="aside-nav-ul">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/CMS/Dashboard/index.php#">
                        <!-- svg -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-sliders align-middle">
                            <line x1="4" y1="21" x2="4" y2="14"></line>
                            <line x1="4" y1="10" x2="4" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12" y2="3"></line>
                            <line x1="20" y1="21" x2="20" y2="16"></line>
                            <line x1="20" y1="12" x2="20" y2="3"></line>
                            <line x1="1" y1="14" x2="7" y2="14"></line>
                            <line x1="9" y1="8" x2="15" y2="8"></line>
                            <line x1="17" y1="16" x2="23" y2="16"></line>
                        </svg>
                        <!-- /svg -->
                        <span style="font-size: 18px;" class="ms-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-calendar-check" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Manage Exam</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-calendar-minus" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Manage Examinee</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-file-alt" style="font-size: 20px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Ranking</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-comment-alt" style="font-size: 19px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Report</span>
                        <span class="aside-badge ms-2">40</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <!-- <i class="far fa-sign-out-alt" style="font-size: 16px;"></i> -->
                        <i class="fas fa-sign-out-alt" style="font-size: 16px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Feedback</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <!-- <i class="far fa-sign-out-alt" style="font-size: 16px;"></i> -->
                        <i class="fas fa-sign-out-alt" style="font-size: 16px;"></i>
                        <span style="font-size: 18px;" class="ms-2">Logout</span>
                    </a>
                </li>
            </ul>
            </aside>
<!-- </div> -->
            <!-- /aside nav ul list -->
        
        <!-- /aside nav-->

        <!-- === main === -->
        <div class="projects-section background text">
        <!-- <main class="w-100 bg-light d-flex flex-column" id="main"> -->
            <!-- === header === -->
           
            <!-- === /header === -->

            <!-- === main body section start === -->

            <!-- <section class="container-fluid"> -->
                <h2>Dashboard</h2>
                <!-- <p class="small text-primary">Responsive Dashboard UI using Bootstrap, CSS, Scss, Jquery.</p> -->
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, assumenda eligendi itaque adipisci, earum fugiat fugit distinctio impedit delectus quibusdam vero dignissimos debitis officiis, repudiandae rerum eius tempora tenetur! Repellat velit suscipit impedit. Facilis, aperiam suscipit. Vel nulla aliquid similique eius odit quod repellendus temporibus sequi, sunt mollitia cupiditate ea totam blanditiis facere perferendis esse vero! Perferendis vitae assumenda in quod, ea ab facere dolore repellat veritatis placeat suscipit nesciunt aliquam fuga officia, minima earum. Et atque consequatur obcaecati! Corporis, voluptates commodi ex natus voluptatum sed soluta qui harum, nam est ratione architecto repudiandae rem! Tempora consequuntur rem corrupti pariatur ex ea voluptas fugit, exercitationem perspiciatis quaerat nihil, officia quos qui autem ipsam. Ipsum deleniti mollitia tenetur! Animi tempore mollitia fugiat tempora eius dignissimos labore totam repellendus? Dolores sint nobis voluptatem qui beatae quas nisi ullam eum iste, incidunt at voluptatum asperiores repellendus veniam numquam corrupti culpa. Beatae, temporibus eum deserunt aperiam harum fugit aliquam! Voluptate, atque? Reprehenderit voluptatum hic aliquid eius possimus porro molestias nam voluptatem doloremque sequi asperiores delectus, iusto eligendi facere iste culpa debitis nostrum? Eos modi doloribus commodi neque perferendis, incidunt eius placeat totam vero iure expedita, exercitationem ex. Accusantium eum doloremque, nesciunt earum qui quia mollitia? Voluptatem vero quam tempore perspiciatis dolorem? Magni fuga excepturi ab quisquam facilis doloribus quod quas quasi quidem cumque nisi nostrum, voluptates ad dolorem sapiente sequi beatae similique? Iure voluptatum enim sed officia totam eius perspiciatis possimus modi recusandae natus odio quasi maiores dolorum quos quis magnam assumenda nemo provident laborum consequatur repellendus ullam, voluptas esse. Inventore possimus voluptas suscipit fuga, modi corporis omnis ut saepe architecto, ipsum repudiandae ea vero! Iusto expedita earum assumenda numquam sint, eum eius eligendi consectetur fugiat excepturi voluptas ad dignissimos explicabo consequuntur tenetur sapiente quas temporibus dolores eaque et ipsa nobis fugit doloremque laudantium?</p>            
                <!-- </section> -->

            <!-- === /main body section end === -->

            <!-- === footer === -->
            <!-- <footer id="footer" class="bg-dark py-3 text-white text-center shadow-sm mt-auto">
                <div>© All Rights Reserved</div>
            </footer> -->
            <!-- === /footer === -->

        <!-- </main> -->
    </div>
        <!-- === /main === -->


    </section>
    <!-- === /wrapper section === -->
     </div> 
  </div>    
</body>
<!-- SCRIPT -->

</html>