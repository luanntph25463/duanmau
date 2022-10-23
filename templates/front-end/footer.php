<footer>
    <div class="footer-flex">
        <div>
            <img src="imgh/logo-footer.webp" alt=""> <br>
            <i class="fa-solid fa-location-dot"></i> Tòa nhà số 7 , đường Trịnh Văn Bô , Nam Từ Liêm Hà Nội ,
            Vietnam <br>
            <i class="fa-solid fa-phone"></i> 1900 0009 <br>
            <i class="fa-solid fa-envelope"></i> thuandan@gmail.com <br>
        </div>
        <div style="padding-left: 30px;">
            <samp>Về Chúng Tôi</samp> <br>
            Trang chủ <br>
            Giới thiệu <br>
            Sản phẩm <br>
            Tin tức <br>
            Bản đồ <br>
            Liên hệ <br>
        </div>

        <div>
            <samp>Về Dịch Vụ</samp> <br>
            Trang chủ <br>
            Giới thiệu <br>
            Sản phẩm <br>
            Tin tức <br>
            Bản đồ <br>
            Liên hệ <br>
        </div>
        <div>
            <samp>Về Liên Hệ</samp> <br>
            Trang chủ <br>
            Giới thiệu <br>
            Sản phẩm <br>
            Tin tức <br>
            Bản đồ <br>
            Liên hệ <br>
        </div>
    </div>
</footer>
</body>
<script src="public/layout/js/bootstrap.js"></script>
<script src="public/layout/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/layout/js/scripts.js"></script>
<script src="public/layout/js/jquery.slimscroll.js"></script>
<script src="public/layout/js/jquery.nicescroll.js"></script>
<script src="public/layout/js/vendor/jquery-3.5.0.min.js"></script>
<script src="public/layout/js/popper.min.js"></script>
<script src="public/layout/js/bootstrap.min.js"></script>
<script src="public/layout/js/isotope.pkgd.min.js"></script>
<script src="public/layout/js/imagesloaded.pkgd.min.js"></script>
<script src="public/layout/js/jquery.magnific-popup.min.js"></script>
<script src="public/layout/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="public/layout/js/bootstrap-datepicker.min.js"></script>
<script src="public/layout/js/jquery.nice-select.min.js"></script>
<script src="public/layout/js/jquery.countdown.min.js"></script>
<script src="public/layout/js/swiper-bundle.min.js"></script>
<script src="public/layout/js/jarallax.min.js"></script>
<script src="public/layout/js/slick.min.js"></script>
<script src="public/layout/js/wow.min.js"></script>
<script src="public/layout/js/nav-tool.js"></script>
<script src="public/layout/js/plugins.js"></script>
<script src="public/layout/js/main.js"></script>
<script src="public/layout/js/choices.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="public/layout/js/jquery.scrollTo.js"></script>

<script>
  const menu = document.querySelector('#menu');
  const list = document.querySelector('#list');

  menu.addEventListener('click', () => {
    list.classList.toggle('hidden');
    chuyen1.classList.toggle('dropdown-menu');
    chuyen1.classList.toggle('hidden');
  });
  const choices = new Choices('[data-trigger]',
  {
    searchEnabled: false,
    itemSelectText: '',
  });

  $("select").click(function() {
    var open = $(this).data("isopen");
    if(open) {
      window.location.href = $(this).val()
    }
    //set isopen to opposite so next time when use clicked select box
    //it wont trigger this event
    $(this).data("isopen", !open);
  });
</script>
</html>