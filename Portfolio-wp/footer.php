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
</body>
</html>
