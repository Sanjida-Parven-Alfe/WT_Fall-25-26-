<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h1>Employe Management</h1>

    <?php

        class Employee {
            public $name;
            public $position;
            public $monthlySalary;


            function set_details($n, $p, $s) {
                $this->name = $n;            
                $this->position = $p;
                $this->monthlySalary = $s;
            }

            
            function getAnnualSalary() {
                return $this->monthlySalary * 12;
            }

            function checkBonusStatus() {
            
                if ($this->monthlySalary > 50000) {
                    return "Eligible for Bonus";
                } else {
                    return "Not Eligible";
                }
            }
        }

        $emp1 = new Employee();
        $emp1->set_details("Alice", "Manager", 60000);

        $emp2 = new Employee();
        $emp2->set_details("Bob", "Developer", 45000);

        $emp3 = new Employee();
        $emp3->set_details("Charlie", "Designer", 55000);


        $employeeList = array($emp1, $emp2, $emp3);

        echo "<h3>Employee Salary Sheet</h3>"; 

        foreach ($employeeList as $employee) {
            echo "<hr>";
            
            echo "Name: " . $employee->name . "<br>";
            echo "Position: " . $employee->position . "<br>";
            
            echo "Annual Salary: " . $employee->getAnnualSalary() . "<br>";
            echo "Bonus: " . $employee->checkBonusStatus() . "<br>";
        }

    ?>
</body>
</html>