<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Edit </h1>
        <div class="col-md-12">
            <form class="row g-3" action="{{route('employee.update',$employee->id)}}" method="post"   enctype="multipart/form-data">
             
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{$employee->name}}">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$employee->email}}">
                </div>
                <div class="col-md-6">
                    <label for=" number" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="number" name="number" value="{{$employee->number}}">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Position</label>
                    <select id="inputState" class="form-select" name="position">
                        <option value="1"  {{$employee->position == '1' ? 'selected' : ''}}>Manager</option>
                        <option value="2"  {{$employee->position == '2' ? 'selected' : ''}}>Supervisor</option>
                        <option value="3"  {{$employee->position == '3' ? 'selected' : ''}}>Teamleader</option>
                        <option value="4"  {{$employee->position == '4' ? 'selected' : ''}}>Employee</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="number" class="form-label">Gender</label>
                    <div class="form-check">
                    <input type=radio name="gender" value="1" {{ $employee->gender == 1 ? 'checked' : ''}}>
                      <label class="form-check-label" for="male">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                     <input type=radio name="gender" value="2" {{ $employee->gender == 2 ? 'checked' : ''}}
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="salary" class="form-control" id="salary" name="salary" value="{{$employee->salary}}">
                </div>
                <label for="address" class="form-label">Address</label>
                <div class="col-12">
                    
                    <textarea name="address" id="address" cols="100" rows="10">{{$employee->address}}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="image" class="form-label">Profile photo</label>
                    <br>
                    <img src="assets/employee/{{ $employee->image }}" id="image" height="100" width="100"><br><br>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-md-6">
                    <label for="proof" class="form-label">Employe proof</label>
                    <br><br>
                   <!-- {{$employee->proof}} -->
                   <a href="{{route('download',$employee->id)}}">{{$employee->proof}}</a>
                   <br><br>
                    <input type="file" class="form-control" id="proof" name="proof" >
                    
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>