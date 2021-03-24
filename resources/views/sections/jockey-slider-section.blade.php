<div class="jockey-slider-sect" id="jockey-slider-sect">
@php
        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    @endphp
  <div class="col-sm-12 header-text">
      <h3>Jockeys You May Also Like</h3>
  </div>
  <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false }'>
  @foreach ($data['jockeyRandom'] as $result)
    <div class="carousel-cell">
        <img class="d-block w-100" src="{{ $url }}/dazoAdmin/public/uploads/jockey-img/{{ $result->j_img_path }}" alt="1 slide">
              <h5><a href="{{url('jockeydetails',$id = $result->id)}}">{{$result->j_name}}</a></h5> 
              <div class="details-divider"></div>
              <table>
                {{-- <tr>
                  <td>Jockey:</td>
                  <td><a href="{{url('jockeydetails',$id = $result->id)}}">{{$result->j_name}}</a></td>
                </tr> --}}
                <tr>
                  <td>JRTE:</td>
                  <td>{{$result->j_jrte}}</td>
                </tr>
                <tr>
                  <td>WINS:</td>
                  <td>{{$result->wins1}}</td>
                </tr>
              </table>
    </div>
  @endforeach
    
  </div>
  
  <div class="col-sm 12 bottom-link">
    <a href="{{url('jockey')}}">view all jockeys</a>
  </div>
</div>
