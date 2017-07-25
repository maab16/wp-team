<?php
/* Add Custom Meta Boxes in WordPress Posts */

wp_nonce_field(basename(__FILE__), "sitepoint-postseries");

?>
      <div>
            <label for="sitepoint-postseries-serial-number">Serial Number</label>
      <br>
      <input name="sitepoint-postseries-serial-number" type="text" value="<?php echo get_post_meta($object->ID, "sitepoint-postseries-serial-number", true); ?>">

      <br>

      <label for="sitepoint-postseries-id">Name</label>
      <br>
      <select name="sitepoint-postseries-id">
            <option value="">-</option>
            <?php
                  $posts = get_posts("post_type=sitepoint-postseries");
                  $selected_series = get_post_meta($object->ID, "sitepoint-postseries-id", true);
                  foreach($posts as $post) 
                  {
                        $id_post = $post->ID; 
                        if($id_post == $selected_series)
                        {
                              ?>
                                    <option selected value="<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></option>     
                              <?php
                        }
                        else
                        {
                              ?>
                                    <option value="<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></option>  
                              <?php 
                        }
                  }
            ?>    
      </select>
  </div>
<?php