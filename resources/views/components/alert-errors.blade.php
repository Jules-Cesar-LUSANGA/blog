@if ($errors->any())
    <div class="alert alert-danger mt-3" role="alert">
        
        <ul>
        
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach 

        </ul>  

    </div>  
@endif

