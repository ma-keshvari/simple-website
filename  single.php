<?php get_header(); ?>
<div class="container" style="max-width: 800px; background: #fff; padding: 30px; margin: 40px auto; border-radius: 20px;">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- دسته‌بندی -->
        <div style="margin-bottom: 15px;">
            <?php 
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $cat ) {
                    echo '<a href="' . get_category_link( $cat->term_id ) . '" style="background:#e9ecef; padding:4px 12px; border-radius:30px; text-decoration:none; margin-left:8px; font-size:0.8rem;">' . esc_html( $cat->name ) . '</a> ';
                }
            }
            ?>
        </div>

        <!-- عنوان -->
        <h1><?php the_title(); ?></h1>

        <!-- متا: نویسنده + تاریخ + زمان مطالعه -->
        <div style="color:#6c757d; margin-bottom: 20px; border-bottom:1px solid #ddd; padding-bottom:10px;">
            <span>✍️ <?php the_author(); ?></span> &nbsp;|&nbsp;
            <span>📅 <?php echo get_the_date(); ?></span> &nbsp;|&nbsp;
            <span>⏱️ <?php echo reading_time(); ?></span>
        </div>

        <!-- تصویر شاخص در بالا (اختیاری) -->
        <?php if ( has_post_thumbnail() ) : ?>
            <div style="margin-bottom: 25px;">
                <?php the_post_thumbnail('large', array('style' => 'width:100%; border-radius:12px;')); ?>
            </div>
        <?php endif; ?>

        <!-- محتوای کامل مقاله -->
        <div style="line-height: 1.7; font-size: 1.05rem;">
            <?php the_content(); ?>
        </div>

    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>