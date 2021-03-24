<div class="trainer-section p-t-1">
        <table class="search-trainer-area" style="width:50%;">
            <tr>
                <td>
                    <div class="input-group">
                      <span class="input-group-addon" style="padding: 7px 2%;border-color: #262626;"><i class="fas fa-search" style="color: #fff;"></i></span>
                      <input id="trainerInput" type="text" class="form-control trainer_search" name="trainerinput" placeholder="Search Trainer">
                    </div>
                </td>
                <td>
                    <button class="form-control trainer-btn">SEARCH</button>
                </td>
                
                
                
            </tr>
        </table>
    </div>
    <div class="table-trainer-container">      
       
        
        <table id="trainerTable" class="table table-striped table-bordered">
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
                @foreach ($data['trainer'] as $result)
                    <tr>
                        <td><a class="t-id" href="{{url('trainerdetails', $id = $result->id)}}">{{ $result->t_name }}</a></td>
                        <td>{{ $result->t_sex }}</td>
                        <td>{{ $result->t_age }}</td>
                        <td>{{ $result->t_nation }}</td>
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