<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- boot cdn link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- js cdn  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .outer{
            height: 600px;
            width: 80%;
            margin: 2%;
            border-radius: 15px;
            margin: auto;
            border: 1px solid black;
            
        }
        .h2{
            background-color: blue;
            color: white;
            text-align: center;
        

        }

        .outer2{
            height: 450px;
            width: 100%;
            margin-top: 30px;
            /* border: 1px solid black; */
            
        }
        span{
            gap:40px;
        }

        #check {
  display: flex;
  justify-content: space-between;
  padding: 10px;
}
    </style>
     <script>
        function updateSex() {
               var title = document.getElementById("title").value;
               var sex = document.getElementById("sex");
               
               if (title == "1" || title == "4") {
                   sex.value = "1";
               } else {
                   sex.value = "2";
        }
}


function calculateAge() {
                // Get the selected date of birth
                var dobInput = document.getElementById("dobInput").value;
                
                // Create Date objects for the selected date of birth and current date
                var dob = new Date(dobInput);
                var currentDate = new Date();
                
                // Calculate the age
                var age = currentDate.getFullYear() - dob.getFullYear();
        
                // Adjust age if the birthday hasn't occurred yet this year
                if (currentDate.getMonth() < dob.getMonth() || 
                    (currentDate.getMonth() === dob.getMonth() && currentDate.getDate() < dob.getDate())) {
                    age--;
                }
        
                // Display the calculated age
                document.getElementById("ageInput").value = age;
            }

       </script>
</head>
<body>
<div class="outer" style="margin-top:30px;">
<div class="container">
    @if (session('message'))
    <div class="btn btn-success">
       {{session('message')}}
    </div>
@endif

<div class="row">

    <div class="col-md-12" style="background-color:blue;border-radius:15px 15px 0px 0px;"><h2 class="h2" >Bank Account Opening Form
    </h2></div>
 <div class="row" id="check">
    
    <div class="col-md-8" style="padding-top:5px;"><h3 style="padding-left: 80px;">  <a href="{{route('account.open')}}" class="btn btn-primary">New Account</a> <a href="{{route('my.allaccount')}}" class="btn btn-primary" style="position: absolute;right:180px;">All Accounts</a></h3>  </div>
    <div class="col-md-2"></div>
 </div>
</div>
</div>
<hr style="height: 1px;color: black;"/>
<div class="outer2">
    <form action="{{route('account.store')}}" id="myForm" method="post">
        @csrf

   

    <div class="row" id="check" style="">
        
        {{-- <div class="col-md-2" style=""><label for="title"><b style="padding-left:5px;"\>Title:</b></label><br> &nbsp;
            <select  id="title" class="form-select"  onchange="updateSex()">
            <option value="1">Mr</option>
            <option value="2">Ms</option>
            <option value="3">Mrs</option>
            <option value="4">Mst</option>
            <option value="5">Baby</option>
        </select>
        </div> --}}
        <div class="col-md-3"><label for="firstname"><b>Title:</b></label>
            <select  id="title" name="title" class="form-select"  onchange="updateSex()">
                <option value="">Select Title</option>
                <option value="1">Mr</option>
                <option value="2">Ms</option>
                <option value="3">Mrs</option>
                <option value="6">Mst</option>
                <option value="5">Baby</option>
            </select>
            
        </div>
        <div class="col-md-3"><label for="firstname"><b>First Name:</b></label><input name="firstname" type="text" value="firstname" class="form-control" required/></div>
        <div class="col-md-3"><label for="firstname"><b>Middle:</b></label><input name="middle" type="text" value="middle" class="form-control"></div>
        <div class="col-md-3"><label for="firstname"><b>Last:</b></label><input name="lastname" type="text" value="last" class="form-control"></div>
        <div class="col-md-1"></div>
    </div>

    {{-- anothoer row --}}

    <div class="row" style="" id="check">
        
        {{-- <div class="col-md-4" style="margin-bottom:10px;margin-left:10px;"><label for="title"><b style="padding-left:10px;">Sex: </b></label> <br> &nbsp;
            <select  class="form-select" id="sex" name="sex">
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
        </select>
        </div> --}}

       
        {{-- <div class="col-md-4"><label for="firstname"><b>DOB:</b></label><input type="date" value="firstname" name="dob"  id="dobInput" class="form-control"></div>
        <div class="col-md-3"><label for="firstname"><b>Age:</b></label><input type="number" value="age" name="age" id="ageInput" class="form-control"></div> --}}


        <div class="col-md-3">
            <label for="dob"><b>Sex:</b></label>
            <select  class="form-select" id="sex" name="sex">
                <option value="">Select Sex</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="dob"><b>DOB:</b></label>
            <input type="date" id="dobInput" name="dob" class="form-control" onchange="calculateAge()">
        </div>
        <div class="col-md-3">
            <label for="age"><b>Age:</b></label>
            <input type="text" id="ageInput" name="age" class="form-control" readonly>
        </div>
        
        <div class="col-md-3"><label for="firstname"><b>STD:</b></label><input type="number" value="std" name="std" class="form-control"></div>
      
        

        
    </div>



    <div class="row" id="check">
        
        
        <div class="col-md-3"><label for="firstname"><b>Telephone:</b></label><input type="number" value="age" name="telephone" class="form-control"placeholder="Telephone"></div>
        <div class="col-md-3"><label for="firstname"><b>Mobile Number:</b></label><input type="number" value="age" name="number" class="form-control" placeholder="Mobile Number"/></div>
        <div class="col-md-3"><label for="email"><b>Email:</b></label><input type="email" value="email" name="email" class="form-control"></div>
        <div class="col-md-3">
            <label for="state"><b>State:</b></label><br>
            <select name="state" id="" class="form-select states">
                <option value="">Select State</option>

             @foreach ($state as $data)
                 <option value="{{$data->id}}">{{$data->state_name}}</option>
             @endforeach
            </select>
        </div>
    </div>

   
    
<div class="row" id="check">
 

    
    <div class="col-md-3">
        <label for="state"><b>City:</b></label><br>
        <select name="city" id="" class="form-select cities">
            <option value="">Select City</option>
             @foreach ($city as $data)
                 <option value="{{$data->city_code}}">{{$data->city_name}}</option>
             @endforeach
           
        </select>
    </div>

    <div class="col-md-3">
        <label for="branch"><b>Branch Name:</b></label><br> 
        <select name="branchname" id="" class="form-select branch" required>
            <option value="">Select Branch</option>
            @foreach ($branch as $data)
                <option value="{{$data->id}}">{{$data->branch_name}}</option>
            @endforeach
        </select>

        


        {{-- <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select> --}}
    </div>
    <div class="col-md-3" >
        <label for="state"><b>Type of account:</b></label><br>
        <select name="typeaccount" id="" class="form-select" >
            <option value="">Select Account Type</option>
            <option value="1">Savings</option>
            <option value="2">Current</option>
            <option value="3">Recurring Deposits</option>
            <option value="4">Term Loan</option>
            

        </select>
    </div>
    <div class="col-md-3">
        <label for="state"><b>Preferred language:</b></label><br>
        <select name="preferlanguage" id="" class="form-select">
            <option value="">Select Lanaguage</option>
            <option value="hindi">Hindi</option>
            <option value="english">English</option>
            <option value="bangali">Bengali</option>
            <option value="bangali">Tamil</option>
            <option value="bangali">Telgu</option>
            <option value="bangali">Gujrati</option>
            <option value="bangali">Marathi</option>
            <option value="bangali">Bhojpuri</option>
        </select>
        
    </div>
</div>

<div class="row" style="">

   

    <div class="row" style="margin-top: 26px;">
        <div class="col-md-4"></div>
        <div class="col-md-2"><button type="submit" style="background-color: blue;border-radius:10px;color:white" class="form-control">Save</button></form></div>
        <div class="col-md-2"><button type="submit" id="exitButton" onclick="exitForm()" style="background-color: blue;border-radius:10px;color:white" class="form-control">Exit</button></div>
        <div class="col-md-3"></div>
    </div>
        


        {{-- <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select> --}}
    </div>
</div>





</div>


</div>

{{-- script --}}

{{-- <input type="text" id="ageInput" name="age" class="form-control" readonly>
</div> --}}

<script>
    function calculateAge() {
        // Get the selected date of birth
        var dobInput = document.getElementById("dobInput").value;
        
        // Create Date objects for the selected date of birth and current date
        var dob = new Date(dobInput);
        var currentDate = new Date();

        // Calculate the age
        var age = currentDate.getFullYear() - dob.getFullYear();

        // Adjust age if the birthday hasn't occurred yet this year
        if (currentDate.getMonth() < dob.getMonth() || 
            (currentDate.getMonth() === dob.getMonth() && currentDate.getDate() < dob.getDate())) {
            age--;
        }

        // Display the calculated age
        document.getElementById("ageInput").value = age;
    }

    function exitForm() {
    // Get the form by its ID
    var myForm = document.getElementById('myForm');

    // You can perform additional actions before closing the form if needed

    // Close the form using plain JavaScript
    myForm.style.display = 'none';
}


</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
         $('.states').on('change',function(){
         var ids=$(this).val();
         
         $.ajax({
    url: "{{ route('get.city') }}",
    method: "GET",
    data: { ids: ids },
    success: function (data) {
        // Assuming data is an array of cities with id and name properties
        $('.cities').empty(); // Clear existing options

        // Append new options based on the fetched cities
        $.each(data, function(index, city) {
           
            $('.cities').append(`<option value="${city.id}">${city.city_name}</option>`);
        });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});


    });
 

    $('.cities').on('change',function(){
         var ids=$(this).val();
         
         $.ajax({
    url: "{{ route('get.branch') }}",
    method: "GET",
    data: { ids: ids },
    success: function (data) {
        // Assuming data is an array of cities with id and name properties
        $('.branch').empty(); // Clear existing options

        // Append new options based on the fetched cities
        $.each(data, function(index, branch) {
           
            $('.branch').append(`<option value="${branch.id}">${branch.branch_name}</option>`);
        });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});


    });
});
</script>
<script src="{{ asset('js/exitForm.js') }}"></script>
</body>
</html>