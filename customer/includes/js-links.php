
<!--**********************************
    Scripts
***********************************-->
<script src="assets/js/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/vendor/wnumb/wNumb.js"></script>
<script src="assets/js/noui-slider.init.js"></script>
<script src="assets/vendor/nouislider/nouislider.min.js"></script>
<script src="assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/css/notifications/js/lobibox.min.js"></script>
<script src="assets/css/notifications/js/notification-custom-script.js"></script>
<script src="assets/css/notifications/js/notifications.min.js"></script>
<script src="assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<!-- <script src="index.js" defer></script> -->
<script>
    $(".stepper").TouchSpin();
</script>

<script>
    var toastItem = document.querySelectorAll('.dzToastBtn');
    toastItem.forEach(myFunction);
    function myFunction(item, index) {
        var toastID = item.id.split('toastbtn')[1]; 
        const toastTrigger = document.getElementById('toastbtn'+toastID)
        const toastLiveExample = document.getElementById('dzToast' + toastID )
        if (toastTrigger) {
          toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
          })
        }
    }
</script>

<script>
    
    function removeFromCart(value){

        var r_product_id = value;

        $.ajax({
            url:'remove-cart.php',
            method: 'POST',
            data:{
              r_product_id: r_product_id
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            }
          });

        location.reload();

        }
</script>

<?php
   if(isset($_SESSION['SuccessMessage']) AND !empty($_SESSION['SuccessMessage'])){
   ?>
   <script>
      Lobibox.notify('success', {
         pauseDelayOnHover: true,
         size: 'mini',
         rounded: true,
         icon: 'fa fa-check-circle',
         delayIndicator: false,
         continueDelayOnInactiveTab: false,
         position: 'top center',
         msg: '<?= $_SESSION['SuccessMessage']; ?>'
      })
   </script>
   <?php
      unset($_SESSION['SuccessMessage']);
   }else if(isset($_SESSION['ErrorMessage']) AND !empty($_SESSION['ErrorMessage'])){
   ?>
   <script>
      Lobibox.notify('error', {
         pauseDelayOnHover: true,
         size: 'mini',
         rounded: true,
         icon: 'fa fa-info-circle',
         delayIndicator: false,
         continueDelayOnInactiveTab: false,
         position: 'top center',
         msg: '<?= $_SESSION['ErrorMessage']; ?>'
      })
   </script>
   <?php
      unset($_SESSION['ErrorMessage']);
   }

?>

