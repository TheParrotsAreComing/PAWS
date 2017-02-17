<div class="catlist-wrapper scroll1 w-dyn-list">
    <div class="catlist scroll1 w-dyn-items">
    <!-- Foreach -->
    <?php foreach($fosters as $foster): ?>
      <div class="cat-card-cont w-dyn-item">
        <div class="catlist-profile-cont">
          <div class="catlist-cat-cont">
          <a class="cat-card w-clearfix w-inline-block"><?= $this->Html->image('cat-profile-foster-01.png', ['class'=>'catlist-profile-pic']); ?>
              <div class="catlist-name"><?php echo $foster['first_name'].' '.$foster['last_name']; ?></div>
              <div>
                <div class="cat-age">Availability:</div>
                <div class="cat-age"><?php echo $foster['avail']; ?></div>
              </div>
              <div class="catlist-field-cont">
                <div class="catlist-field-wrap left-justify">
                  <div class="cat-list-field-text">Address:</div>
                  <div class="catlist-field-content"><?php echo $foster['address']; ?></div>
                </div>
                <div class="catlist-field-wrap left-justify">
                  <div class="cat-list-field-text">Phone:</div>
                  <div class="catlist-field-content"><?php echo $foster['phone']; ?></div>
                </div>
                <div class="catlist-field-wrap left-justify">
                  <div class="cat-list-field-text">E-mail:</div>
                  <div class="catlist-field-content"><?php echo $foster['email']; ?></div>
                </div>
              </div>
            </a>
            <?php if (empty($foster_cats[$foster['id']])): ?>
                <a class="dropdown-cont w-inline-block" data-ix="dropdown">
                  <div class="dropdown-text" style="padding-top:0.5em; padding-bottom:0.5em;">No Cats</div>
                </a>
            <?php else: ?>
                <a class="dropdown-cont w-inline-block" data-ix="dropdown">
                  <div class="dropdown-text" style="padding-top:0.5em;">Expand for Cats</div><?= $this->Html->image('expand-01.png', ['class'=>'dropdown-icon', 'style'=>'margin-bottom:0.5em;']); ?>
                </a>
                <div class="dropdown-results-cont">
                  <?php foreach ($foster_cats[$foster['id']] as $cat): ?>
                      <a class="dropdown-cat-cont w-inline-block"><?= $this->Html->image('cat-01.png', ['class'=>'dropdown-cat-pic']); ?>
                          <div class="dropdown-cat-name"><?php echo $cat['cat_name']; ?></div>
                      </a>
                  <?php endforeach; ?>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <!-- Foreach -->
    <?php endforeach; ?>
    </div>
</div>
