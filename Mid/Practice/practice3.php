<!DOCTYPE html>
<html>
<head>
  <title>Form Handler</title>

  <!-- css linked  -->
  <link rel="stylesheet" href="practice3.css"> 
</head>
<body>
 
  <h2>Registration Form</h2>
 
  <form onsubmit="return handleSubmit()">
    <label>Name:</label>
    <input type="text" id="name" placeholder="Enter Name"/>
 
    <label>ID:</label>
    <input type="text" id="studentId" placeholder="Enter ID"/>
 
    <label>Age:</label>
    <input type="number" id="age" placeholder="Enter Age"/>
 
    <label>Department:</label>
    <select id="department">
      <option value="">-- Select Department --</option>
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="BBA">BBA</option>
    </select>
    
    <button type="submit">Submit</button>
  </form>
 
  <!-- Output Section -->
  <div id="error"></div>
  <div id="output"></div>
 
  <!-- javascript file linked -->
  <script src="practice3.js"></script>
 
</body>
</html>