			<div class="right-col right">
				<div class="secciones">
					<section>
						<header>
							<h2>GIES Melgar
							</h2>
						</header>
						
							<div id="slider-logos" class="tac mt5">
								<div class="slide"><div><a href="<?php echo get_page_link(PAGE_GIES); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-gies-mini.png" /></a></div></div>
								<div class="slide"><div><a href="<?php echo get_page_link(PAGE_TIKARIY); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-tikariy.png" /></a></div></div>
								<div class="slide"><div><a href="<?php echo get_page_link(PAGE_APPAM); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-appam.png" /></a></div></div>
								<div class="slide"><div><a href="<?php echo get_page_link(PAGE_TARPUY); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-tarpuy.png" /></a></div></div>
							</div>
						
					</section>
					<section class="mt10">
						<header>
							<h2>Campañas</h2>
						</header>
						<div class="mt5 tac">
							<a href="//www.respiravida.pe" class="lnk-banner"><img src="<?php echo get_template_directory_uri(); ?>/img/banner-tbc-mini.gif"></a>
						</div>
					</section>
					<section class="mt10">
						<header>
							<h2 class="left">Folletos</h2>
						</header>
						<ul class="lista mt5">
							<?php
							$recent_pdf = wp_get_recent_posts(array(
								'numberposts' => 5
								, 'category' => CATE_FOLLETOS
							));
							foreach ($recent_pdf as $pdf): $pdf = (object) $pdf;
								?>
								<li><a href="<?php echo get_permalink($pdf->ID); ?>"><?php echo resumen($pdf->post_title,3,''); ?>
										<span class="icono-pdf right"></span></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</section>					
					<section class="mt10">
						<header>
							<h2>Facebook</h2>
						</header>
						<div class="mt5">
						<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcepas.puno&amp;width=240&amp;height=191&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false&amp;appId=217716198355030" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:191px;" allowTransparency="true"></iframe>
                    </div>
					</section>
				</div>
			</div>