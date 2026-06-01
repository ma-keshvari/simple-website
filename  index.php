<?php get_header(); ?>
<div class="container">
    <div class="posts-grid">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="card">
                    <!-- تصویر شاخص -->
                    <div class="card-img" style="background-image: url('<?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail_url('card-image');
                        } else {
                            echo 'https://via.placeholder.com/600x400?text=No+Image';
                        }
                    ?>');"></div>

                    <div class="card-content">
                        <!-- دسته‌بندی اول -->
                        <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . get_category_link( $categories[0]->term_id ) . '" class="card-cat">' . esc_html( $categories[0]->name ) . '</a>';
                        }
                        ?>

                        <!-- عنوان -->
                        <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- نویسنده و زمان مطالعه -->
                        <div class="card-meta">
                            <span>✍️ <?php the_author(); ?></span>
                            <span>⏱️ <?php echo reading_time(); ?></span>
                        </div>

                        <!-- خلاصه (معادل "بیشتر…" در سایت نمونه) -->
                        <div class="card-excerpt">
                            <?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="read-more">ادامه مطلب →</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>