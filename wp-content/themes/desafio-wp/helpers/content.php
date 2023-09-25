<?php 

function theme_get_posts($args){
  $posts = [];

  foreach (get_posts($args) as $key => $post) {
    $posts[] = theme_construct_post($post);
  }

  return $posts;
}

function theme_get_post($args){
  $post = is_array($args) ? theme_get_posts($args) : theme_construct_post(get_post($args));
  return is_array($post) && count($post) ? $post[0] : $post;
}

function theme_get_file($file, $size = "large"){
  return site_url().'/wp-content/uploads/'.$file['file'];
}

function theme_get_video_embed($video_url) {
  if (preg_match('/youtu\.be/', $video_url)) {
      preg_match('/youtu\.be\/([^\?]+)/', $video_url, $matches);
      if (isset($matches[1])) {
          $video_id = $matches[1];
          return 'https://www.youtube.com/embed/' . $video_id;
      }
  }
  
  if (preg_match('/youtube\.com/', $video_url)) {
      preg_match('/[?&]v=([^\?&]+)/', $video_url, $matches);
      if (isset($matches[1])) {
          $video_id = $matches[1];
          return 'https://www.youtube.com/embed/' . $video_id;
      }
  }
  
  if (preg_match('/vimeo\.com/', $video_url)) {
      preg_match('/vimeo\.com\/([^\?]+)/', $video_url, $matches);
      if (isset($matches[1])) {
          $video_id = $matches[1];
          return 'https://player.vimeo.com/video/' . $video_id;
      }
  }
  
  return false;
}

function theme_construct_post($post){

  if(isset($post->ID)){
    $post->fields = get_fields($post->ID);
    $post->taxonomies = wp_get_post_terms($post->ID, $post->post_type."_type");

    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $post->image = wp_get_attachment_metadata($thumbnail_id);
  }

  return $post;
}
