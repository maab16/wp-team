<div class="wp-team-container">
      <div class="form-group">
            <label for="wp-team-member-name">Name</label>
            <input 
                  name="wp-team-member-name" 
                  id="wp-team-member-name" 
                  type="text" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-member-name", true); ?>"
                  placeholder="Enter Name"
            >
            <strong><span>*</span>Required</strong>
      </div>
      <div class="form-group">
            <label for="wp-team-member-title">Title</label>
            <input 
                  name="wp-team-member-title" 
                  id="wp-team-member-title" 
                  type="text" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-member-title", true); ?>"
                  placeholder="Enter Title"
            >
            <strong><span>*</span>Required</strong>
      </div>
      <div class="form-group">
            <label for="wp-team-skill-1">Skill 1</label>
            <input 
                  name="wp-team-skill-1-name" 
                  type="text" 
                  id="wp-team-skill-1" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-skill-1-name", true); ?>"
                  placeholder="Enter Skill Name"
            >
            <input 
                  name="wp-team-skill-1-value" 
                  type="number"
                  min="0"
                  max="100" 
                  id="wp-team-skill-1-value" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-skill-1-value", true); ?>"
                  placeholder="Enter Skill Percentage"
            >
      </div>
      <div class="form-group">
            <label for="wp-team-skill-2">Skill 2</label>
            <input 
                  name="wp-team-skill-2-name" 
                  type="text" 
                  id="wp-team-skill-2" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-skill-2-name", true); ?>"
                  placeholder="Enter Skill Name"
            >
            <input 
                  name="wp-team-skill-2-value" 
                  type="number"
                  min="0"
                  max="100"
                  id="wp-team-skill-2-value" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-skill-2-value", true); ?>"
                  placeholder="Enter Skill Percentage"
            >
      </div>
      <div class="form-group">
            <label for="wp-team-skill-3">Skill 3</label>
            <input 
                  name="wp-team-skill-3-name" 
                  type="text" 
                  id="wp-team-skill-3" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-skill-3-name", true); ?>"
                  placeholder="Enter Skill Name"
            >
            <input 
                  name="wp-team-skill-3-value" 
                  type="number"
                  min="0"
                  max="100" 
                  id="wp-team-skill-3-value" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-skill-3-value", true); ?>"
                  placeholder="Enter Skill Percentage"
            >
      </div>
      <div class="form-group">
            <label for="wp-team-facebook">Facebook</label>
            <input 
                  name="wp-team-facebook" 
                  type="text" 
                  id="wp-team-facebook" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-facebook", true); ?>"
                  placeholder="Enter Facebook URL"
            >
            <strong>Aditional</strong>
      </div>
      <div class="form-group">
            <label for="wp-team-twitter">Twitter</label>
            <input 
                  name="wp-team-twitter" 
                  type="text" 
                  id="wp-team-twitter" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-twitter", true); ?>"
                  placeholder="Enter Twitter URL"
            >
            <strong>Aditional</strong>
      </div>
      <div class="form-group">
            <label for="wp-team-linked-in">Linked In</label>
            <input 
                  name="wp-team-linked-in" 
                  type="text" 
                  id="wp-team-linked-in" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-linked-in", true); ?>"
                  placeholder="Enter Linked In URL"
            >
            <strong>Aditional</strong>
      </div>
      <div class="form-group">
            <label for="wp-team-github">Github</label>
            <input 
                  name="wp-team-github" 
                  type="text" 
                  id="wp-team-github" 
                  value="<?php echo get_post_meta($object->ID, "wp-team-github", true); ?>"
                  placeholder="Enter Gitub URL"
            >
            <strong>Aditional</strong>
      </div>
</div>