<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $cogear->get('site.lang', 'en'); ?>">
<head>
	<?= theme('head') ?>
</head>
<body>

<div class="secMenu">

	<div class="container_12">
		<div class="grid_3 prefix_9">
			<ul>
				<li><a href="#">Войти</a></li>
				<li><a href="#">Зарегистрироваться</a></li>
			</ul>
		</div>
	</div>

</div>

<div class="clear"></div>

<div class="mainMenu">
	<div class="container_12">
		<div class="grid_3">
			<div class="logo">
				<a href="<?= Url::link() ?>"><img src="<?= $theme->getFolder() ?>/img/logo.png" alt="cogear framework" width="280"/></a>
			</div>
		</div>
		<div class="grid_9">
			<?= theme('menu') ?>
		</div>
	</div>
</div>

<div class="slider">
	<div class="container_12">
		<div class="grid_12">
			<div id="engine_start"><a title="Download Cogear Framework" class="btn_engine_start" href="#"></a></div>
			
			<div class="coda-slider preload" id="coda-slider-1">
				<div class="panel cogear_framework">
					<div class="citates_framework"></div>
					<div class="advatages"></div>

					<div class="cogear"></div>
				</div>
				<div class="panel cogear_cms">
					<div class="citates_cms"></div>
					<div class="cogear2"></div>
					<div class="get_cms">
						<div class="get_button">
							<a title="Download Cogear2 CMS" class="btn_download_cms" href="#"></a>
						</div>

						<div class="get_button">
							<a title="Tour Cogear2 CMS" class="btn_tour_cms" href="#"></a>
						</div>
					</div>
				</div>
			</div><!-- .coda-slider -->
			
		</div>
	</div>
</div>

<div class="content">
	<div class="container_12 clearfix">
		<div id="coda-nav-1" class="slider_select">
		<ul>
			<li><a href="#1"></a></li>
			<li><a href="#1"></a></li>
		</ul>
		</div>
		<? $sidebar = theme('sidebar') ?>
		<div class="grid_<?= $sidebar ? '9' : '12' ?>" id="content">
			<?= theme('content') ?>
		</div>
		<? if ($sidebar): ?>
			<div class="grid_3" id="sidebar">
				<?= $sidebar ?>
			</div>
		<? endif ?>
	</div>
</div>

<div class="footer">
	<div class="container_12">
		<div class="grid_12">
			<?= theme('footer') ?>
		</div>
	</div>
</div>
<?= theme('after') ?>
</body>
</html>