<div class="horses-section">
        <table class="search-horse-area">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="horseInput" type="text" class="form-control horse_name" name="jorseinput" placeholder="Search Horse">
                    </div>
                </td>
                <td>
                    <button class="form-control horse-btn">SEARCH</button>
                </td>
                <td width="50%"></td>
                <!-- <td>
                    <select class="form-control select-season select-horse-season">
                        <option>All Records</option>
                        <option value="{{ date("Y") }}">Current Year</option>
                        <option value="{{ date("Y",strtotime("-1 year")) }}">Previous Year</option>
                    </select>
                </td> -->
                
            </tr>
        </table>
    </div>
    <div class="table-horse-container">
        
       {{--  <div class="col-sm-12">
            <div class="row">
                <div class="col-6 pagination-header">
                    <p><span class="t-spacing" style="font-weight:700;">SHOWING 20</span> OF <span>120</span> HORSES</p>
                </div>
                <div class="col-6 display-flex full-width-mb">
                    <div class="col-6 p-l-0 m-w-27" style="padding-right: 0;"><label class="sort-label" for="">SORT BY:</label></div>
                    <div class="col-6 full-width-mb" style="padding-left: 0;">
                            <select class="form-control filter-horse">
                                <option value="search-by-name-asc">Name, Ascending Order</option>
                                <option value="search-by-name-desc">Name, Descending Order</option>
                                <option value="search-by-weight-asc">Weight, Lowest to Highest</option>
                                <option value="search-by-weight-desc">Weight, Highest to Lowest</option>
                                <!-- <option value="search-by-time-asc">Time, Lowest to Highest</option>
                                <option value="search-by-time-desc">Time, Highest to Lowest</option> -->
                            </select>
                    </div>
                </div>
            </div>
        </div> --}}
       
        
       {{--  <div class="col-sm-12"> --}}
            <div class="table-dp-sorter display-flex">
            <label class="t-spacing">SORT BY:</label>
            <select class="form-control filter-horses">
                <option value="name-asc">Name, Ascending Order</option>
                <option value="name-desc">Name, Descending Order</option>
                <option value="weight-asc">Weight, Lowest to Highest</option>
                <option value="weight-desc">Weight, Highest to Lowest<</option>
                <option value="time-asc">Time, Lowest to Highest</option>
                <option value="time-desc">Time, Highest to Lowest</option>
            </select>
        </div>
            <table id="horseTable" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Horse Name</th>
                        <th>Horse Sex</th>
                        <th>Horse Age</th>
                        <th>Horse Color</th>
                        <th>Weight</th>
                        <th>Jockey Name</th>
                        <th>JRTE</th>
                        <th>Owner Name</th>
                        <th>Trainer Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['horses'] as $result)
                        <tr>
                            <td style="text-transform: capitalize;">
                                <a href="{{url('horsedetails', $id = $result->id)}}">
                                    {{ $result->h_name }}
                                </a>
                            </td>
                            <td>{{ $result->h_sex }}</td>
                            <td>{{ $result->h_age }}</td>
                            <td>{{ $result->h_color }}</td>
                            <td>{{ $result->h_weight }}</td>
                            <td>
                                <a href="{{url('jockeydetails', $id = $result->h_j_id)}}">{{ $result->j_name }}
                                </a>
                            </td>
                            <td>{{ $result->j_jrte }}</td>
                            <td>
                            <a href="{{url('ownerdetails', $id = $result->h_o_id)}}">{{ $result->o_name }}
                                </a>
                            </td>
                           
                            <td>
                            <a href="{{url('trainerdetails', $id = $result->h_t_id)}}">{{ $result->t_name }}
                                </a>
                            </td>
                           
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        {{-- </div> --}}
       
    </div>
</div>