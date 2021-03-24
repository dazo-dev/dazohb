<div class="horse-slider-sect">
@php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    @endphp
  <div class="col-sm-12 header-text">
        <h3>Horses You May Also Like</h3>
    </div>
    <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false }'>
    @foreach ($data['horseRandom'] as $result)
      <div class="carousel-cell">
          <img class="d-block w-100" src="{{ $url }}/dazoAdmin/public/uploads/horse-img/{{ $result->h_img_path }}" alt="1 slide">
                <h5><a href="{{url('horsedetails',$id = $result->id)}}">{{$result->h_name}}</a></h5>
                <div class="details-divider"></div>
                <table>
                  <tr>
                    <td>WINS:</td>
                    <td>{{$result->wins1}}</td>
                  </tr>
                  <tr>
                    <td>Jockey:</td>
                    <td><a href="{{url('jockeydetails',$id = $result->h_j_id)}}">{{$result->j_name}}</a></td>
                  </tr>
                  
                  <tr>
                    <td>Owner:</td>
                    <td><a href="{{url('ownerdetails',$id = $result->h_o_id)}}">{{$result->o_name}}</a></td>
                  </tr>
                  <tr>
                    <td>Trainer:</td>
                    <td><a href="{{url('trainerdetails',$id = $result->h_t_id)}}">{{$result->t_name}}</a></td>
                  </tr>
                </table>
      </div>
    @endforeach
      
  </div>
    
  <div class="col-sm 12 bottom-link">
    <a href="{{url('horses')}}">view all horses</a>
  </div>
</div>