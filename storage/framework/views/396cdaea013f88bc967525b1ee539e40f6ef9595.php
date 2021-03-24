<section class="accordion-section">
  <div class="row block-header">
    <?php
      $stat = substr(url()->current(), strrpos(url()->current(), '/') + 1);
    ?>
    <?php if($stat == 'dazocoin'): ?>
      <h1>Why Subscribe to Dazo?</h1>
    <?php else: ?>
      <h1>Register to Have Guides on Placing Your Bet</h1>
    <?php endif; ?>
    
  </div>
  <div class="row block-sub">
    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet</p>
  </div>
  <div class="accordion block-accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <div class="row">
          <div class="col-sm-11 col-9">
            <h2 class="mb-0 title-block">
                View race results
            </h2>
          </div>
          <div class="col-sm-1 col-1">
            <h2 class="mb-0 btn-block">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-plus"></i>
              </button>
            </h2>
          </div>
        </div>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <div class="row">
          <div class="col-sm-11 col-9">
            <h2 class="mb-0 title-block">
                know the horses' records and details
            </h2>
          </div>
          <div class="col-sm-1 col-1">
            <h2 class="mb-0 btn-block">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-plus"></i>
              </button>
            </h2>
          </div>
        </div>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <div class="row">
          <div class="col-sm-11 col-9">
            <h2 class="mb-0 title-block">
                access the calendar of events
            </h2>
          </div>
          <div class="col-sm-1 col-1">
            <h2 class="mb-0 btn-block">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-plus"></i>
              </button>
            </h2>
          </div>
        </div>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingFour">
        <div class="row">
          <div class="col-sm-11 col-9">
            <h2 class="mb-0 title-block">
                access the calendar of events
            </h2>
          </div>
          <div class="col-sm-1 col-1">
            <h2 class="mb-0 btn-block">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-plus"></i>
              </button>
            </h2>
          </div>
        </div>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet
        </div>
      </div>
    </div>
  </div>
  <div class="row register-block">
    <button class="register-now" data-toggle="modal" data-target="#registerModal">REGISTER NOW</button>
  </div>
</section><?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/accordion-section.blade.php ENDPATH**/ ?>