<section class="accordion-section">

  <div class="row block-header">

    @php

      $stat = substr(url()->current(), strrpos(url()->current(), '/') + 1);

    @endphp

    @if ($stat == 'dazocoin')

      <h1>Why Subscribe to Dazo?</h1>

    @else

      <h1>Register to Have Guides on Placing Your Bet</h1>

    @endif

    

  </div>

  <div class="row block-sub">

    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet</p>

  </div>

  <div class="accordion block-accordion" id="accordionExample">

    <div class="card">

      <div class="card-header" id="headingOne">

        <div class="d-flex"> 

          <div class="col-sm-11 col-9 margin-y-auto">

            <div class="title-block">

                View race results

            </div>

          </div>

          <div class="col-sm-1 col-1">

            <div class="btn-block">

              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#viewRaceResults" aria-expanded="true" aria-controls="collapseOne">

                <i class="fas fa-plus"></i>

              </button>

            </div>

          </div>

        </div>

      </div>



      <div id="viewRaceResults" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">

        <div class="card-body">

          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet

        </div>

      </div>

    </div>

    <div class="card">

      <div class="card-header" id="headingTwo">

        <div class="d-flex">

          <div class="col-sm-11 col-9 margin-y-auto">

            <div class="title-block">

                know the horses' records and details

            </div>

          </div>

          <div class="col-sm-1 col-1">

            <h2 class="mb-0 btn-block">

              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#knowTheHorses" aria-expanded="true" aria-controls="collapseOne">

                <i class="fas fa-plus"></i>

              </button>

            </h2>

          </div>

        </div>

      </div>

      <div id="knowTheHorses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

        <div class="card-body">

          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet

        </div>

      </div>

    </div>

    <div class="card">

      <div class="card-header" id="headingThree">

        <div class="d-flex">

          <div class="col-sm-11 col-9 margin-y-auto">

            <div class="title-block">

                access the calendar of events

            </div>

          </div>

          <div class="col-sm-1 col-1">

            <h2 class="mb-0 btn-block">

              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#calendarEvents" aria-expanded="true" aria-controls="collapseOne">

                <i class="fas fa-plus"></i>

              </button>

            </h2>

          </div>

        </div>

      </div>

      <div id="calendarEvents" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">

        <div class="card-body">

          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet

        </div>

      </div>

    </div>

    <div class="card">

      <div class="card-header" id="headingFour">

        <div class="d-flex">

          <div class="col-sm-11 col-9 margin-y-auto">

            <div class="title-block">

                Get the latest news in horse racing

            </div>

          </div>

          <div class="col-sm-1 col-1">

            <h2 class="mb-0 btn-block">

              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#latestNews" aria-expanded="true" aria-controls="collapseOne">

                <i class="fas fa-plus"></i>

              </button>

            </h2>

          </div>

        </div>

      </div>

      <div id="latestNews" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">

        <div class="card-body">

          Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi lorem ipsum dolor sit amet

        </div>

      </div>

    </div>

  </div>

  <div class="row register-block">

    <button class="register-now" data-toggle="modal" data-target="#registerModal">REGISTER NOW</button>

  </div>

</section>