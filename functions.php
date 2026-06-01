<?php
// پشتیبانی از تصویر شاخص (Featured Image)
add_theme_support('post-thumbnails');

// سایز سفارشی برای تصاویر کارت
add_image_size('card-image', 600, 400, true);

// تابع محاسبه زمان مطالعه (بر اساس تعداد کلمات)
function reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $minutes = floor($word_count / 200); // سرعت خواندن ۲۰۰ کلمه در دقیقه
    if ($minutes < 1) $minutes = 1;
    return $minutes . ' دقیقه مطالعه';
}
?>