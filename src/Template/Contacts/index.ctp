<div class="body w-clearfix">
  <div class="filter-bar">
    <div class="filter-header">
      <div class="filter-header">FILTER</div>
      <div class="symbol" data-ix="filter-cancel"></div>
    </div>
    <?= $this->Form->create(false,['type'=>'get','class'=>'w-clearfix']) ?>
    <?php $this->Form->templates(['inputContainer' => '{{content}}']); ?>
      <div class="filter">
          <div class="filter-criteria">Contact Name:</div>
          <?= $this->Form->input('contact_name',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Contact-Name','placeholder'=>'Enter contact name']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Organization Name:</div>
          <?= $this->Form->input('organization',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Organization','placeholder'=>'Enter org name']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Phone #:</div>
          <?= $this->Form->input('phone',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Phone','placeholder'=>'Enter phone number']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Email:</div>
          <?= $this->Form->input('email',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Email','placeholder'=>'Enter email']) ?>
      </div>
      <div class="filter">
          <div class="filter-criteria">Address:</div>
          <?= $this->Form->input('address',['class'=>'filter-criteria-select w-input','label'=>false,'id'=>'Address','placeholder'=>'Enter address']) ?>
      </div>

      <div class="filter-apply-cont">
        <a class="cancel filter-button w-button" href="<?= $this->Url->build(["action"=>"index"])?>">Cancel</a>
        <button id="filterContacts" type="submit" class="apply filter-button w-button" data-ix="button-click" href="#">APPLY FILTER</button>
      </div>
    <?= $this->Form->end() ?>
  </div>
  <div class="column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="cat-header">
      <div class="cat-sort w-clearfix w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle"><?= $this->Html->image('up-arrow.png', ['width'=>12, 'sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw']); ?>
          <div class="cat-sort-text">Sort</div>
        </div>
        <nav class="w-dropdown-list"><a class="cat-sort-dropdown w-dropdown-link">Name Descending</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Age</a><a class="cat-sort-dropdown w-dropdown-link" href="#">Cat ID</a>
        </nav>
      </div>
      <div class="cat-filter cat-sort w-dropdown" data-delay="0">
        <div class="cat-sort-cont w-clearfix w-dropdown-toggle" data-ix="filter-hideshow">
          <?= $this->Html->image('filter-filled-tool-symbol.png', ['sizes'=>'(max-width: 479px) 100vw, (max-width: 991px) 12px, 1vw', 'width'=>"12"]); ?>
          <div class="cat-sort-text">Filter</div>
        </div>
        <nav class="w-dropdown-list"></nav>
      </div><?= $this->Html->link('+ New Contact', ['controller'=>'contacts','action'=>'add'],['class'=>'cat-add w-button']); ?>
    </div>
    <div class="list-wrapper scroll1 w-dyn-list">
      <div class="list scroll1 w-dyn-items">
        <?php foreach ($contacts as $contact): ?>
            <div class="card-wrapper w-dyn-item">
              <div class="card-full-cont">
                <div class="card-cont">
                  <a class="card w-clearfix w-inline-block" href="<?= $this->Url->build(['controller'=>'contacts','action'=>'edit', $contact->id]); ?>"><?= $this->Html->image('contacts-menu.png', ['class'=>'card-pic', 'sizes'=>'(max-width:479px) 21vw, 96px']); ?>
                  <div class="card-h1"><?= $contact['contact_name']; ?></div>
                    <div>
                      <div class="card-h2"><?= $contact['organization']; ?></div>
                    </div>
                    <div class="card-field-wrap">

                    <?php if(!empty($phones)) :?>
                        <?php foreach ($phones as $number): ?>
                            <?php if ($number->entity_type === 2): ?>
                                <?php $type = "";
                                    if ($number->phone_type === 0) {$type = "Mobile: "; } 
                                    else if ($number->phone_type === 1) {$type = "Home: ";}
                                    else if ($number->phone_type === 2) {$type = "Organization: ";} 
                                    else if ($number->phone_type === 3) {$type = "Other: ";} 
                                ?>
                            <?php endif; ?>
                            <?php if ($number->entity_id === $contact->id): ?>
                        
                                <div class="card-field-cont left-justify">
                                  <div class="card-h3"><?= $type; ?></div>
                                  <div class="catlist-field-content"><?= $number->phone_num; ?></div>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?> 
                    <?php endif; ?>

                      <div class="card-field-cont left-justify">
                        <div class="card-h3">E-mail:</div>
                        <div class="catlist-field-content"><?= $contact['email']; ?></div>
                      </div>
                      <div class="card-field-cont left-justify">
                        <div class="card-h3">Address:</div>
                        <div class="catlist-field-content"><?= $contact['address']; ?></div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="pagination-w">
            <div class="pagination-wrap">
              <div class="pagination-cont">
                <div class="pagination"><?= $this->Paginator->prev('') ?></div>
              </div>
              <div class="pagination-cont">
                <?php if(count($contacts) < 21): ?>  
                    <div class="pagination-index">1</div>
                <?php else: ?>  
                    <?= $this->Paginator->numbers() ?>
                <?php endif; ?> 
              </div>
              <div class="pagination-cont">
                <div class="pagination"><?= $this->Paginator->next('') ?></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="floating-overlay"></div><img class="button-paw" data-ix="paw-click" src="img/add-paw.png" width="60">
<div class="button-cont">
  <div class="button-01">
    <div class="button-icon-text">Add Contact</div><?= $this->Html->image("add-01.png", ["data-ix"=>"add-click", "width"=>"55", "url"=>["controller"=>"contacts", "action"=>"add"]]); ?>
  </div>
  <div class="button-02">
    <div class="button-icon-text">Sort/Filter</div><img data-ix="filter-click" src="img/filter-01.png" width="55">
  </div>
  <div class="button-03" data-ix="add-click">
    <div class="button-icon-text">Export</div><img data-ix="add-click" src="img/export-01.png" width="55">
  </div>
  <div class="button-04">
    <div class="button-icon-text">Delete</div><img data-ix="add-click" src="img/delete-01.png" width="55">
  </div>
</div>



