function addStudent() { 

    var name = document.getElementById("name").value;
    var marks = document.getElementById("marks").value;
    var message = document.getElementById("msg");
    var table = document.getElementById("tableBody");

    
    if (name === "") {
        message.innerHTML = "Name cannot be empty!";
        return;    
    }
    
    if (marks === "" || marks < 0 || marks > 100) {
        message.innerHTML = "Marks must be between 0 and 100!";
        return;
    }
       
    message.innerHTML = "";

   
    var row = table.insertRow(); 
    var cell1 = row.insertCell(0); 
    var cell2 = row.insertCell(1);    
    cell1.innerHTML = name;    
    cell2.innerHTML = marks;
    
    if (Number(marks) > 50) {
        row.className = "green"; // ৫০ এর বেশি হলে সবুজ
    } 
    else {
        row.className = "red";   // ৫০ বা কম হলে লাল
    }
    
    
    document.getElementById("name").value = "";
    document.getElementById("marks").value = "";
}
 