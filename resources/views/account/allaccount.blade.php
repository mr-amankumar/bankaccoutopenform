<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      h3{
        text-align: center;
        color: blue;
      }
    </style>
  </head>
  
  <body>
    <h3>All List Of Customer</h3>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th>ID</th>
            <th>Form_Number</th>
            <th>Form_filling_date</th>
            <th>Form_filling_time</th>
            <th>Cust_title</th>
            <th>Cust_first_name</th>
            <th>Cust_middle_name</th>
            <th>Cust_last_name</th>
            <th>Cust_sex</th>
            <th>Cust_date_of_birth</th>
            <th>Cust_age</th>
            <th>Cust_std_code</th>
            <th>Cust_telephone</th>
            <th>Cust_mobile</th>
            <th>Cust_email</th>
            <th>Cust_state_name</th>
            <th>Cust_city_name</th>
            <th>Cust_branch_name</th>
            <th>Cust_account_type</th>
            <th>Cust_preferred_language</th>
            </tr>
        </thead>
        <tbody>
             

         
            @foreach ($account as $account)
        <tr>
    <td> {{$loop->iteration  }}</td>
    <td>{{$loop->iteration}}</td>
    <td>{{$account->form_filling_date}}</td>
    <td>{{$account->form_filling_time}}</td>
    <td>
      {{
          $account->cust_title == 1 ? "Mr" :
          ($account->cust_title == 2 ? "Ms" :
          ($account->cust_title == 3 ? "Mrs" :
          ($account->cust_title == 4 ? "Mst" : "Baby")))
      }}
  </td>
    {{-- <td>{{$account->cust_title}}==1?"Mr":{{$account->cust_title}}==2?"Ms":{{$account->cust_title}}==3?"Mrs":{{$account->cust_title}}==4?"Mst":"Baby"</td> --}}
    <td>{{$account->cust_first_name}}</td>
    <td>{{$account->cust_middle_name}}</td>
    <td>{{$account->cust_last_name}}</td>
    {{-- <td>{{$account->cust_sex}}</td> --}}
    <td>
      {{
          $account->cust_sex == 1 ? "Male" :
          ($account->cust_sex == 2 ? "Female" :"Other")
      }}
  </td>
    <td>{{$account->cust_date_of_birth}}</td>
    <td>{{$account->age}}</td>
    <td>{{$account->cust_std_code}}</td>
    <td>{{$account->cust_telephone}}</td>
    <td>{{$account->cust_mobile}}</td>
    <td>{{$account->cust_email}}</td>
    {{-- <td>{{$state::find($account->cust_state_id)$state->state_name}}</td> --}}
    <td>{{ \App\Models\State::find($account->cust_state_id)->state_name }}</td>

    {{-- <td>{{$account->cust_city_id}}</td> --}}
    <td>
    {{ \App\Models\City::find($account->cust_city_id)->city_name }}</td>
    {{-- <td>{{$account->cust_branch_id}}</td> --}}
    <td>
    {{ \App\Models\Branch::find($account->cust_branch_id)->branch_name }}</td>

    {{-- <td>{{$account->cust_account_type}}</td> --}}
    <td>
      {{
          $account->cust_account_type == 1 ? "Savings" :
          ($account->cust_account_type == 2 ? "Current" :
          ($account->cust_title == 3 ? "Recurring Deposits" : "Term Loan"))
      }}
  </td>
    <td>{{$account->cust_preferred_language}}</td>
</tr>
@endforeach

      

        </tbody>
      </table>
  </body>
</html>