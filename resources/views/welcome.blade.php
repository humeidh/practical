<!DOCTYPE html>
<html>
<head>
    <title>Patient Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Patient Records</h1>
        <p><a href="#" data-toggle="modal" data-target="#createPatientModal">Create Patient</a></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody id="patients-table">
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->dob }}</td>
                    <td>{{ $patient->address->house }} {{ $patient->address->street }}, {{ $patient->address->island->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--create patient form modal -->
    <div class="modal fade" id="createPatientModal" tabindex="-1" role="dialog" aria-labelledby="createPatientModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="createPatientModalLabel">New Patient</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <form method="POST" id="create-patient-form">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="name">ID:</label>
                    <input type="text" class="form-control" id="national_id" name="national_id" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                
                <div class="form-group">
                    <label for="address">Address:</label>
                    <select class="form-control" id="address" name="address_id">
                        @foreach($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->house }}, {{ $address->street }}, {{ $address->island->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popperjs.min.js"
        integrity="sha384-2QsJt+fW8Edv7TbJeC/NpDWJLhckylnX+eazRJj33rHPzssr3ZHzqNxZo+dxlDd1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // Handle form submission
  document.getElementById('create-patient-form').addEventListener('submit', async (event) => {
    event.preventDefault(); // prevent default form submit behavior

    // Get form data
    const formData = new FormData(event.target);

    try {
      // Submit form data using fetch API
      const response = await fetch('/practical/public/api/patients', {
        method: 'POST',
        body: formData
      });

      // Check if response is ok
      if (!response.ok) {
        throw new Error('There was an error submitting the form.');
        console.log(response);
      }

      // Update table with new data
      const responseData = await response.json();
      // code to update table here

      // Show success message
      alert('Form submitted successfully!');
    } catch (error) {
      console.error(error);
      alert('There was an error submitting the form.');
    }
  });
    </script>
</body>
</html>
