<style>
.swiper-slide img{
	width:260px;
	height:130px;
}
</style>
</body>
    <!-- Footer -->
	<div style="position:relative;bottom:0px;height:270px;width:100%;"></div>
    <footer class="w-100 fixed-bottom" style='background: url("images/greenbg.jpg");'>
		<div class="container my-2">
			<div class="d-lg-flex d-block">
				<div class="text-white h3">
					Pick&nbsp;Your&nbsp;Sport
				</div>
				<a href="<?php $site_url; ?>/matches" class="btn btn-dark mx-lg-5 mx-0 btn-block">MATCHES</a>
			</div>
		</div>
		  <div class="swiper-container container">
			<div class="swiper-wrapper">
			  <div class="swiper-slide"><img src="<?php echo $site_url; ?>/images/futbol.jpg"><p class="text-white text-center h3">Football</p></div>
			  <div class="swiper-slide"><img src="<?php echo $site_url; ?>/images/basketbol.jpg"><p class="text-white text-center h3">Basketball</p></div>
			  <div class="swiper-slide"><img src="<?php echo $site_url; ?>/images/tenis.jpg"><p class="text-white text-center h3">Tennis</p></div>
			  <div class="swiper-slide"><img src="<?php echo $site_url; ?>/images/voleybol.jpg"><p class="text-white text-center h3">Volleyball</p></div>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		  </div>
    </footer>
	<script src="<?php echo $site_url; ?>/js/jquery.js<?php echo '?v='.$version;?>"></script>
    <script src="<?php echo $site_url; ?>/js/bootstrap.js<?php echo '?v='.$version;?>"></script>
	<script src="<?php echo $site_url; ?>/js/swiper.js<?php echo '?v='.$version;?>"></script>
	<script src="<?php echo $site_url; ?>/js/sweetalert2.js<?php echo '?v='.$version;?>"></script>
	<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js<?php echo '?v='.$version;?>"></script>
	<script>
		var swiper = new Swiper('.swiper-container', {
		  slidesPerView: 1,
		  spaceBetween: 20,
		  loop: true,
		  autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		  },
		  navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		  },
		  breakpoints: {
			998: {
			  slidesPerView: 4,
			  spaceBetween: 30,
			},
			444: {
			  slidesPerView: 2,
			  spaceBetween: 30,
			},
		  }
		});
  </script>
</html>