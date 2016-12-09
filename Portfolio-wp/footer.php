<!-- ==================== Footer ==================== -->
<footer>
  <p class="footer-text">&copy; Thao Ha 2016<br/>Last Updated: December 2016</p>
</footer>
<!-- ==================== End Footer ==================== -->

<!-- SHORT JQUERY SCRIPT FOR NAV ANIMATION -->
<script>
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
            return false;
        }
      }
    });
  });
</script>

  <!-- SCRIPT FOR LIGHTBOX -->
<script>
  var thumbs = $('.thumbnails');
  var lbImg = $('.lightbox-img');
  var lb = $('.lightbox');
  var btnClose = $('.btn-close');
  var lbHeading = $('.lightbox-heading');
  var lbText = $('.lightbox-text');

  thumbs.on('click', 'a', function (e) {
    e.preventDefault();
    var big = $(this).attr('href');
    lbImg.attr('src', big);
    lb.attr('data-state', 'visible');
    lbHeading.html($(this).attr('data-title'));
    lbText.html($(this).attr('data-text'));
  });

  btnClose.on('click', function (){
    lb.attr('data-state', 'hidden');
  });
</script>
</body>
</html>
