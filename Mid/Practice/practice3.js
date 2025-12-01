function handleSubmit() {
      // Get values from form
      var name = document.getElementById("name").value
      var id = document.getElementById("studentId").value
      var age = document.getElementById("age").value
      var department = document.getElementById("department").value;
 
      var errorDiv = document.getElementById("error");
      var outputDiv = document.getElementById("output");
 
    // Clear previous messages
    //   errorDiv.innerHTML = "";
    //   outputDiv.innerHTML = "";
 
      // Validation
      if (name === "" || id === "" || age === "" || department === "") {
        errorDiv.innerHTML = "Please fill in all fields.";
        return false;
      }
 
      if (isNaN(id)) {
        errorDiv.innerHTML = " Student ID must be numeric.";
        return false;
      }
 
      if (age > 150) {
        errorDiv.innerHTML = " Age cannot be more than 150.";
        return false;
      }
 
 
      outputDiv.innerHTML = `
        <strong>Registration Complete!</strong><br><br>
        Name: ${name}<br>
        ID: ${id}<br>
        Age: ${age}<br>
        Department: ${department}
      `;
 
      return false;
    }