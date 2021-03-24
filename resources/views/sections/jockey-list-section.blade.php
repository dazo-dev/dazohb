<div class="jockey-section">
        <table class="search-jockey-area">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="jockeyInput" type="text" class="form-control jockey_search" name="jockeyinput" placeholder="Search Jockey">
                    </div>
                </td>
                <td>
                    <button class="form-control jockey-btn">SEARCH</button>
                </td>
                <td width="50%"></td>
                <td>
                    <select class="form-control select-jockey-season select-season">
                        <option>All Records</option>
                        <option value="{{ date("Y") }}">Current Year</option>
                        <option value="{{ date("Y",strtotime("-1 year")) }}">Previous Year</option>
                    </select>
                </td>
                
            </tr>
        </table>
    </div>
    <div class="table-jockey-container">      
        <div class="table-dp-sorter display-flex">
            <label>SORT BY:</label>
            <select class="form-control filter-jockey">
                <option value="total-rides-desc">Ranking, Highest to Lowest</option>
                <option value="total-rides-asc">Ranking, Lowest to Highest</option>
                <option value="total-win-desc">Win, Highest to Lowest</option>
                <option value="total-win-asc">Win, Lowest to Highest</option>
                <option value="total-stake-desc">Stake, Highest to Lowest</option>
                <option value="total-stake-asc">Stake, Lowest to Highest</option>
            </select>
        </div>
        
        <table id="jockeyTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Nationality</th>
                    <th>JRTE</th>
                    <th>Total Races</th>
                    <th>Number of Wins</th>
                    <th>Number of 2nds</th>
                    <th>Number of 3rds</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['jList'] as $result)
                    <tr>
                        <td><a class="j-id" href="{{url('jockeydetails', $id = $result->id)}}">{{ $result->j_name }}</a></td>
                        <td>{{ $result->j_sex }}</td>
                        <td>{{ $result->j_age }}</td>
                        <td>{{ $result->j_nation }}</td>
                        <td>{{ $result->j_jrte }}</td>
                        <td>{{ $result->totalrace }}</td>
                        <td>{{ $result->wins1 }}</td>
                        <td>{{ $result->wins2 }}</td>
                        <td>{{ $result->wins3 }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        
        </table>
    </div>