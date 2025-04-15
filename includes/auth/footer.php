 </div>
 </div>
 </div>

 <script src="../assets/vendor/libs/jquery/jquery.js"></script>
 <script src="../assets/vendor/libs/popper/popper.js"></script>
 <script src="../assets/vendor/js/bootstrap.js"></script>
 <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
 <script src="../assets/vendor/js/menu.js"></script>

 <script src="../assets/js/main.js"></script>
 <script>
     var swiper = new Swiper('.mySwipper', {
         loop: true,
         slidesPerView: 1,
         spaceBetween: 10,
         pagination: {
             el: ".swiper-pagination",
             clickable: true,
             renderBullet: function(index, className) {
                 return '<span class="' + className + '"></span>';
             },
         },
         autoplay: {
             delay: 3000,
             disableOnInteraction: false,
         },
     });
 </script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const form = document.querySelector('form');
         const submitBtn = document.getElementById('submitBtn');
         const spinner = document.getElementById('spinner');
         const buttonText = document.getElementById('buttonText');

         form.addEventListener('submit', function() {
             spinner.classList.remove('d-none');
             buttonText.classList.add('d-none');

             submitBtn.setAttribute('disabled', 'true');
         });
     });
 </script>

 </html>