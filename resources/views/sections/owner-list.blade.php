<div class="owner-section">
        <table class="search-owner-area" style="width:50%;">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="ownerInput" type="text" class="form-control owner_search" name="ownerinput" placeholder="Search Owner">
                    </div>
                </td>
                <td>
                    <button class="form-control owner-btn">SEARCH</button>
                </td>
                
                
                
            </tr>
        </table>
    </div>
    <div class="table-owner-container">      
       
        
        <table id="ownerTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Nationality</th>
                    <th>Total Races</th>
                    <th>Number of Wins</th>
                    <th>Number of 2nds</th>
                    <th>Number of 3rds</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['owners'] as $result)
                    <tr>
                        <td><a class="o-id" href="{{url('ownerdetails', $id = $result->id)}}">{{ $result->o_name }}</a></td>
                        <td>{{ $result->o_sex }}</td>
                        <td>{{ $result->o_age }}</td>
                        <td>{{ $result->o_nation }}</td>
                        <td>{{ $result->totalraces }}</td>
                        <td>{{ $result->wins1 }}</td>
                        <td>{{ $result->wins2 }}</td>
                        <td>{{ $result->wins3 }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        
        </table>
    </div>
</div> 