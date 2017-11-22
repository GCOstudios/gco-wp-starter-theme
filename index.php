<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="manifest" href="site.webmanifest">
		<link rel="apple-touch-icon" href="icon.png">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header>
			<h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		</header>

		<main>
			<div class="container">
				<div class="row">
					<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

						<article role="main" <?php post_class(); ?>>
							<header>
								<?php if( is_single() ): ?>
									<h1><?php the_title(); ?></h1>
								<?php else: ?>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php endif; ?>

								<p class="byline">
									Posted on <time><?php echo get_the_date(); ?></time>, in <?php the_category(' and '); ?>
								</p>
							</header>

							<?php if( is_single() ): ?>
								<?php the_content(); ?>

								<?php comments_template(); ?>
							<?php else: ?>
								<div class="excerpt"><?php the_excerpt(); ?></div>
								<p class="read-more"><a href="<?php the_permalink(); ?>">Read full post &raquo;</a></p>
							<?php endif; ?>
						</article>

					<?php endwhile; endif; ?>

					<nav class="page-nav clearfix">
						<?php if( is_single() ): ?>
						<div class="align-left">
								<?php previous_post_link( '%link', '&laquo; previous post' ); ?>
							</div>
							<div class="align-right">
								<?php next_post_link( '%link', 'next post &raquo;'); ?>
							</div>
						<?php else: ?>
							<div class="align-left">
								<?php next_posts_link( '&laquo; previous posts'); ?>
							</div>
							<div class="align-right">
								<?php previous_posts_link( 'next posts &raquo;' ); ?>
							</div>
						<?php endif; ?>
					</nav>
				</div>
			</div>
		</main>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info text-center">
				&copy; <?php echo date('Y'); ?> GCO Starter Theme
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'GCO Studios' ), 'GCO Studios', '<a href="https://gcostudios.com/">GCO Studios</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

		<?php wp_footer(); ?>

	</body>
</html>
