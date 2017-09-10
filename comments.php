<?php 

if( post_password_required() ){
  return;
}
?>

<div id="comments" class="comments-area">
  
  <?php 
    if( have_comments() ):
  ?>
  
    <h2 class="comment-title">
      <?php
        
        printf(
          esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wppersonal' ) ),
          number_format_i18n( get_comments_number() ),
          '<span>' . get_the_title() . '</span>'
        );
          
      ?>
    </h2>
    
    <ol class="comment-list">
      
      <?php 
        
        $args = array(
          'walker'        => null,
          'max_depth'     => '',
          'style'         => 'ol',
          'callback'      => null,
          'end-callback'  => null,
          'type'          => 'all',
          'reply_text'    => 'Reply',
          'page'          => '',
          'per_page'      => '',
          'avatar_size'   => 64,
          'reverse_top_level' => null,
          'reverse_children'  => '',
          'format'        => 'html5',
          'short_ping'    => false,
          'echo'          => true
        );
        
        wp_list_comments( $args );
      ?>
      
    </ol>
    
    <?php  

      the_comments_pagination( array(
        'prev_text' => __( 'Previous', 'wppersonal' ),
        'next_text' => __( 'Next', 'wppersonal' ),
      ) );
    ?>
    
    <?php 
      if( !comments_open() && get_comments_number() ):
    ?>
       
       <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wppersonal' ); ?></p>
       
    <?php
      endif;
    ?>
    
  <?php 
    endif;
  ?>
  
  <?php 
    
    $fields = array(
      
      'author' =>
        '<div class="form-group"><label for="author">' . __( 'Name', 'wppersonal' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control-input" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
        
      'email' =>
        '<div class="form-group"><label for="email">' . __( 'Email', 'wppersonal' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control-input" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
        
      'url' =>
        '<div class="form-group last-field"><label for="url">' . __( 'Website', 'wppersonal' ) . '</label><input id="url" name="url" class="form-control-input" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
        
    );
    
    $args = array(
      
      'class_submit' => 'wppersonal-btn',
      'label_submit' => __( 'Submit Comment','wppersonal' ),
      'comment_field' =>
        '<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun','wppersonal' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control-input" name="comment" rows="4" required="required"></textarea></div>',
      'fields' => apply_filters( 'comment_form_default_fields', $fields )
      
    );
    
    comment_form( $args ); 


    
  ?>
  
</div><!-- .comments-area -->

