<!DOCTYPE html>
<html>


    <head>
    <title>

    </title>
</head>

<body>
        <style>
        ul {
    list-style-type: none;

    margin: 0;

    padding: 0;

    overflow: hidden;

    background-color: #002C91
  
}

li {
    float: left;
}

li a {
    display: block;

    color: white;

    text-align: center;

    padding: 14px 16px;

    text-decoration: none;
}

li a:hover:not(.active) {

    background-color: #111;
}

.active {

   
    background-color: #ACEDED
}
#deneme {
              text-align: center;
              margin-top: 200px;
              margin-bottom: 100px;
              margin-right: 200px;
              margin-left: 600px;
            
            
        }

    </style>
    <ul>


  <li><a href="instructorcourses.php">My Courses</a></li>
  <li><a href="iweekly.php">My Weekly Schedule</a></li>
  <li><a href="iprojects.php">Projects I Manage</a></li>
  <li><a class=' active'href="#iprojectsw.php">Projects I Work</a></li>
  <li><a href="iadvising.php">Students I Advise</a></li>
  <li><a href="isupervising.php">Students I Supervise</a></li>
  <li><a href="ifreehours.php">Free Hours</a></li>
  <li><a href="idisplayexams.php">My Course' Exams</a></li> 
  <li><a href="iaddexam.php.php">Add Exam</a></li> 
  

</ul>
<div id="deneme">
     <?php
    include 'dbconnect.php';
 session_start();
 $issn = $_SESSION['currentid'] ;
$result = mysqli_query($con, "select i.iName, p.pName, p.subject from project_has_instructor pi, project p, instructor i where pi.issn = '$issn' and pi.pName = p.pName and i.ssn = pi.issn;"); 

    while ($obj = mysqli_fetch_object($result)) {
        echo ( "<br>\r</br>" . $obj->iName . "  ". $obj->pName . "  ".$obj->subject );   
    }
    
   echo "<table style='border: solid 1px black;'>";
                echo "<tr><th>Course Code</th><th>Section</th><th>Year</th><th>Semester</th><th>Day</th><th>Hour</th></tr>";
                if (mysqli_num_rows($result)>0) {
                    while ($obj = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $obj["courseCode"] . "</td><td>" . $obj["sectionId"] . "</td> <td>" . $obj["yearr"] . "</td><td>" . $obj["semester"] . "</td><td>" . $obj["dayy"] . "</td><td>" . $obj["hourr"] . "</td></tr> ";
                    }
                }
                ?>
</div>
    
   