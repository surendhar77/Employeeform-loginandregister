<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>
            Employee Details
        </h1>
        <div class="col-md-12 mt-5">
            <a class="btn btn-primary btn-lg px-5 mb-3" style="margin-left:87%;" href="{{route('employee.create')}}">Create</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Profile Photo</th>
                        <th scope="col">Position</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Document</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->number}}</td>
                        @if($employee->gender==1)
                        <td>

                            {{'Male'}}
                        </td>
                        @else
                        <td>

                            {{'Female'}}

                        </td>
                        @endif
                        <td>{{$employee->address}}</td>
                        <td>
                        <img src="{{ asset('assets/employee'.$employee->image) }}"  alt="Employee profile">
                        </td>
                        <td>@if($employee->position==1)
                             Manager
                          @elseif($employee->position==2)
                          Supervisor
                          @elseif($employee->position==3)
                          Teamleader
                          @else
                          Employee
                          @endif
                        </td>
                        <td>{{$employee->salary}}</td>
                        <td>        
                        <a href="{{route('download',$employee->id)}}">{{$employee->proof}}</a>
                        </td>
                        <td>
                            <form action="{{route('employee.delete',$employee->id)}}" method="post">
                                @csrf    
                                @method('delete')                    
                            <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-success">Edit</a><br><br>
                           
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>