<?php  

function redirect_to($new_location)
{
    header("Location: " . $new_location);
    exit;
}
function escape_string($text){
    global $connection;
    return mysqli_real_escape_string($connection, $text);
}
   

function getUsers(){

	global $connection;

	$sql = "SELECT * FROM User;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 01");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getEmployees(){

    global $connection;

    $sql = "SELECT * FROM Employee;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 02");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getOneEmployeeByID($employeeID){

    global $connection;

    $sql = "SELECT * FROM Employee where employeeID={$employeeID};";
    $result = mysqli_query($connection, $sql);


    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }else{
        die("Error 02b");
    }


}

function getStudents(){

	global $connection;

	$sql = "SELECT * FROM Student;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 03");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getAbsenses(){

	global $connection;

	$sql = "SELECT * FROM Absenses;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 04");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getCourses(){

	global $connection;

	$sql = "SELECT * FROM Course;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 05");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getDepartments(){

	global $connection;

	$sql = "SELECT * FROM Department;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 06");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getEnrolls($stID){

	global $connection;

	$sql = "SELECT * FROM Enroll WHERE studentID={$stID};";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 07");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getGrades(){

	global $connection;

	$sql = "SELECT * FROM Enroll;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 08");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getMajors(){

	global $connection;

	$sql = "SELECT * FROM Major;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 09");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getMinors(){

	global $connection;

	$sql = "SELECT * FROM Minor;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 10");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getNews(){

	global $connection;

	$sql = "SELECT * FROM News ORDER BY newsID DESC";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 11");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getNewsByID($newsID){

    global $connection;

    $sql = "SELECT * FROM News WHERE newsID = {escape_string($newsID)}";
    $result = mysqli_query($connection, $sql);


    if (!$result) {
        die("Error 11");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function getProfessors(){

	global $connection;

	$sql = "SELECT * FROM Professor ORDER BY professorGivenName ASC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 12");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getSections(){

	global $connection;

	$sql = "SELECT * FROM 
            Section sec JOIN
            Course co JOIN
            Semester sem JOIN
            Professor pro JOIN
            Department dt 
            ON (sec.courseID=co.courseID)
            AND (co.semesterID=sem.semesterID)
            AND (co.departmentID=dt.departmentID)
            AND (sec.professorID=pro.professorID) ORDER BY co.courseID DESC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 13");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getSemesters(){

	global $connection;

	$sql = "SELECT sem.*, count(co.courseID) as 'numberSemesterCourses'
            FROM Semester sem 
            JOIN Course co 
            ON (sem.semesterID=co.semesterID)
            GROUP BY sem.semesterID
            ORDER BY semesterYear DESC, semesterName ASC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 14");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getStudentReview(){

	global $connection;

	$sql = "SELECT * FROM StudentReview;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 15");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}


function getOneUser($name,$pass){

    global $connection;

    $sql = "SELECT * FROM User WHERE userName='$name' and userPassword='$pass';";
    $result = mysqli_query($connection, $sql);

    //$myArray = array();

    if (!$result) {
        die("Error 16");
    }
    //$i = 0;
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
    //return $myArray;

}

function getOneEmployeeID($userID){

    global $connection;

    $sql = "SELECT * from EMPLOYEE e JOIN User u
            ON (e.userID = u.userID)
            AND e.userID = $userID;";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 17");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }

}
function getOneProfessorID($userID){

    global $connection;

    $sql = "SELECT * from Professor JOIN User
            ON (User_userID = userID)
            AND userID = $userID;";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 18");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }

}


function updateEmployee($userID, $givenName, $middleName,
                    $familyName, $email, $phone, $profilePic, $startingDate, $jobTitle, $quote, $birth)
{
    global $connection;

    $query = "UPDATE Employee SET
      employeeGivenName = '{$givenName}',
      employeeMiddleName = '{$middleName}', 
      employeeFamilyName = '{$familyName}',
      employeeEmail = '{$email}',
      employeePhone = '{$phone}',
      employeeProfilePic = '{$profilePic}',
      employeeStartingDate = '{$startingDate}',
      employeeJobTitle = '{$jobTitle}',
      employeeQuote = '{$quote}',
      employeeBirthdate='{$birth}'
      WHERE userID = {$userID}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';
        print_r($query);
        redirect_to("profile.php");
    } else {
        $_SESSION['message'] = 'Error while uploading. Please try again!';
        //die("Error!!!");
        print_r($query);
    }
}

function updateWithoutImageEmployee($userID, $givenName, $middleName,
                    $familyName, $email, $phone, $startingDate, $jobTitle, $quote, $birth)
{
    global $connection;

    $query = "UPDATE Employee SET
      employeeGivenName = '{$givenName}',
      employeeMiddleName = '{$middleName}', 
      employeeFamilyName = '{$familyName}',
      employeeEmail = '{$email}',
      employeePhone = '{$phone}',
      employeeStartingDate = '{$startingDate}',
      employeeJobTitle = '{$jobTitle}',
      employeeQuote = '{$quote}',
      employeeBirthdate='{$birth}'
      WHERE userID = {$userID}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';
        print_r($query);
        redirect_to("profile.php");
    } else {
        print_r($query);
        $_SESSION['message'] = 'Error while uploading. Please try again!';
    }
}
function updateWithoutImageStudent($stID, $givenName, $middleName, $familyName, $email, $phone, $startingDate, $quote, $birth)
{
    global $connection;

      $query = "UPDATE Student SET
      studentGivenName = '{$givenName}',
      studentMiddleName = '{$middleName}', 
      studentFamilyName = '{$familyName}',
      studentEmail = '{$email}',
      studentPhone = '{$phone}',
      studentStartingYear = '{$startingDate}',
      studentQuote = '{$quote}',
      dateOfBirth='{$birth}'
      WHERE studentID = {$stID}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';        
        redirect_to("profile.php");
        
    } else {
        $_SESSION['message'] = 'Error while uploading. Please try again!';
        
    }
}
function updateStudentByStudent($stID, $givenName, $middleName, $familyName, $email, $phone, $startingDate, $quote, $profi,$birth)
{
    global $connection;
    $query = "UPDATE Student SET
      studentGivenName = '{$givenName}',
      studentMiddleName = '{$middleName}', 
      studentFamilyName = '{$familyName}',
      studentEmail = '{$email}',
      studentPhone = '{$phone}',
      studentStartingYear = '{$startingDate}',
      studentQuote = '{$quote}',
      dateOfBirth='{$birth}',
      studentProfilePic='{$profi}'
      WHERE studentID = {$stID}";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';        
        redirect_to("profile.php");
    } else {
        $_SESSION['message'] = 'Error while uploading. Please try again!';
    }
}
function updateWithoutImageProfessor($proID, $givenName, $middleName,
                    $familyName, $email, $phone, $startingDate, $jobTitle, $quote, $office, $isPhone, $background)
{
    global $connection;

    $query = "UPDATE Professor SET
      professorGivenName = '{$givenName}',
      professorMiddleName = '{$middleName}', 
      professorFamilyName = '{$familyName}',
      professorEmail = '{$email}',
      professorPhone = '{$phone}',
      professorJoinDay = '{$startingDate}',
      professorJobTitle = '{$jobTitle}',
      professorQuote = '{$quote}',
      professorOffice='{$office}',
      isPhoneAvailable={$isPhone},
      professorBackground='{$background}' 
      WHERE professorID = {$proID}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';
        //print_r($query);
        redirect_to("profile.php");
    } else {
        print_r($query);
        $_SESSION['message'] = 'Error while uploading. Please try again!';
    }
}
function updateProfessor($proID, $givenName, $middleName,
                    $familyName, $email, $phone, $startingDate, $jobTitle, $quote, $office, $isPhone, $imgURL,$background)
{
    global $connection;

    $query = "UPDATE Professor SET
      professorGivenName = '{$givenName}',
      professorMiddleName = '{$middleName}', 
      professorFamilyName = '{$familyName}',
      professorEmail = '{$email}',
      professorPhone = '{$phone}',
      professorJoinDay = '{$startingDate}',
      professorJobTitle = '{$jobTitle}',
      professorQuote = '{$quote}',
      professorOffice='{$office}',
      isPhoneAvailable={$isPhone},
      professorProfileImage='{$imgURL}',
      professorBackground='{$background}' 
      WHERE professorID = {$proID}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';
        //print_r($query);
        redirect_to("profile.php");
    } else {
        print_r($query);
        $_SESSION['message'] = 'Error while uploading. Please try again!';
    }
}
function updateProfessorCertificates($certArray,$certLocation)
{
    global $connection;

    foreach ($certArray as $key => $value) {
        $query = "UPDATE proCertificates SET
                  proCerName = '{$value}'
                  WHERE proCID = {intval($key)}";
        $result = mysqli_query($connection, $query);
    }

    foreach ($certLocation as $key => $value) {
        $query = "UPDATE proCertificates SET
                  proLocation = '{$value}'
                  WHERE proCID = {intval($key)}";
        $result = mysqli_query($connection, $query);
    }

    if ($result) {
        $_SESSION['message'] = 'Updated!';
        print_r($query);
    } else {
        print_r($query);
        $_SESSION['message'] = 'Error while uploading. Please try again!';
    }
}

function setNews($title,$content,$date,$employeeID)
{
    global $connection;

    $query = "INSERT INTO NEWS VALUES (null, '$title', '$content','$date',$employeeID)";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['newsMessage'] = 'Your message has been sent.';
    } else {
        $_SESSION['newsMessageFail'] = 'Error 42: Failed to send message.';
    }

}
function updateNews($newsID, $title,$content,$date, $employeeID)
{
    global $connection;

    $query = "UPDATE NEWS SET
              newsTitle = '{$title}',
              newsContent = '{$content}',
              newsValidity = '{$date}'
              WHERE newsID = {$newsID}
              AND   employeeID = {$employeeID}";

    $result = mysqli_query($connection, $query);
    if ($result) {

        $_SESSION['newsUpdate'] = 'Your message has been updated.';
        redirect_to("news_edit.php?nid=$newsID");
        
    } else {
        print_r($query);
        $_SESSION['newsUpdateFail'] = 'Error 42a: Fail to update!';
        redirect_to("news_edit.php?nid=$newsID");
    }
}
function deleteNews($newsID,$employeeID)
{
    global $connection;

    $query = "DELETE FROM NEWS

               WHERE newsID = $newsID
               AND employeeID = $employeeID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['newsDelete'] = 'Your message has been deleted.';
        redirect_to("all_news.php");
    } else {
        $_SESSION['newsDeleteFail'] = 'Error 42c: Fail to delete!';
        redirect_to("all_news.php");
    }
}
function getStudentYear($startingYear, $departName){

    global $connection;

    $sql = "SELECT * from STUDENT st JOIN Degree de JOIN Major ma JOIN DEPARTMENT dt
            ON (st.studentID = de.studentID)
            AND (de.majorID = ma.majorID)
            AND (ma.departmentID = dt.departmentID)
            AND (dt.departmentName = '{$departName}')
            AND st.studentStartingYear LIKE '%{$startingYear}';";

    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 19");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getStudentYear2($startingYear){

    global $connection;

    $sql = "SELECT * from STUDENT st JOIN MAJOR ma JOIN DEPARTMENT dt
            ON (st.majorID = ma.majorID)
            AND (ma.departmentID = dt.departmentID)
            
            AND st.studentStartingYear = {$startingYear};";

    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 20");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}


function getStudentByID($id){

    global $connection;

    $sql = "SELECT * from STUDENT st JOIN Degree de JOIN MAJOR ma JOIN MINOR mi JOIN DEPARTMENT dt
            ON  (st.studentID=de.studentID)
            AND (de.majorID=ma.majorID)
            AND (de.minorID=mi.minorID)
            AND (ma.departmentID=dt.departmentID)
            AND st.studentID = {$id};";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 21");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function getOneStudent($id){

    global $connection;

    $sql = "SELECT * FROM 
            STUDENT st JOIN 
            CurrentAddress ca JOIN
            PermanentAddress pa JOIN
            Guardian ga JOIN
            Degree de JOIN
            Major ma JOIN
            Minor mi JOIN
            Department dt JOIN
            User us 
            ON  (st.studentID=ca.studentID)
            AND (st.studentID=pa.studentID)
            AND (st.studentID=ga.studentID)
            AND (st.studentID=de.studentID)
            AND (de.majorID=ma.majorID)
            AND (de.minorID=mi.minorID)
            AND (ma.departmentID=dt.departmentID)
            AND (us.userID=st.userID)
            AND st.studentID={$id};";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 22");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function getStudentSemesters($id){

    global $connection;

    $sql = "SELECT sem.* FROM 
            Student st JOIN
            Enroll en JOIN
            Section se JOIN
            Course co JOIN
            Semester sem
            ON (st.studentID=en.studentID)
            AND (en.sectionID=se.sectionID)
            AND (en.courseID=se.courseID)
            AND (se.courseID=co.courseID)
            AND (sem.semesterID=co.semesterID)
            AND st.studentID={$id}
            GROUP BY sem.semesterName, sem.semesterYear
            ORDER BY 
            sem.semesterYear ASC,
                          CASE WHEN sem.semesterName = 'Summer' THEN 1
                          WHEN sem.semesterName = 'Winter' THEN 2
                          WHEN sem.semesterName = 'Spring' THEN 3
                          WHEN sem.semesterName = 'Fall' THEN 4
                          END;";

    $result = mysqli_query($connection, $sql);
    $myarray = array();
    $i = 0;
    if (!$result) {
        die("Error 23a");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $myarray[$i++]=$row;
    }
    return $myarray;
}

function getStudentAcademic($id,$sName,$sYear){

    global $connection;

    $sql = "SELECT * FROM 
            Student st JOIN
            Enroll en JOIN
            Section se JOIN
            Course co JOIN
            StudentGrade sg JOIN
            Semester sem
            ON (st.studentID=en.studentID)
            AND (en.sectionID=se.sectionID)
            AND (en.courseID=se.courseID)
            AND (se.courseID=co.courseID)
            AND (sg.Enroll_studentID=en.studentID)
            AND (sg.Enroll_courseID=en.courseID)
            AND (sg.Enroll_sectionID=en.sectionID)
            AND (sem.semesterID=co.semesterID)
            AND st.studentID={$id}
            AND sem.semesterName='{$sName}'
            AND sem.semesterYear='{$sYear}'";
            

    $result = mysqli_query($connection, $sql);
    $myarray = array();
    $i = 0;
    if (!$result) {
        die("Error 23b");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $myarray[$i++]=$row;
    }
    return $myarray;
}

function getStudentSemesterYear($id){

    global $connection;

    $sql = "SELECT distinct(sem.semesterYear) FROM 
            Student st JOIN
            Enroll en JOIN
            Section se JOIN
            Course co JOIN
            Semester sem
            ON (st.studentID=en.studentID)
            AND (en.sectionID=se.sectionID)
            AND (en.courseID=se.courseID)
            AND (se.courseID=co.courseID)
            AND (sem.semesterID=co.semesterID)
            AND st.studentID={$id}
            GROUP BY sem.semesterYear
            ORDER BY sem.semesterYear DESC";

    $result = mysqli_query($connection, $sql);
    $myarray = array();
    $i = 0;
    if (!$result) {
        die("Error 23c");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $myarray[$i++]=$row;
    }
    return $myarray;
}
function getStudentSemesterName($id){

    global $connection;

    $sql = "SELECT distinct(sem.semesterName) FROM 
            Student st JOIN
            Enroll en JOIN
            Section se JOIN
            Course co JOIN
            Semester sem
            ON (st.studentID=en.studentID)
            AND (en.sectionID=se.sectionID)
            AND (en.courseID=se.courseID)
            AND (se.courseID=co.courseID)
            AND (sem.semesterID=co.semesterID)
            AND st.studentID={$id}
            GROUP BY sem.semesterName";

    $result = mysqli_query($connection, $sql);
    $myarray = array();
    $i = 0;
    if (!$result) {
        die("Error 23d");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $myarray[$i++]=$row;
    }
    return $myarray;
}


function getOneStudentReview($studentID,$pID,$cID,$sID){

    global $connection;

    $sql = "SELECT * from
            StudentReview sr JOIN
            Professor pr
            ON (pr.professorID=sr.professorID)
            AND sr.studentID={$studentID}
            AND sr.professorID={$pID}
            AND sr.courseID={$cID}
            AND sr.sectionID={$sID}";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 24");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function updateStudentPersonal($id, $gName, $mName, $fName,
                    $dBirth, $pBirth, $gender, $national, $country, $email, $semail, $sPhone)
{
    global $connection;

    $query = "UPDATE Student SET
  studentGivenName = '{$gName}',
  studentMiddleName = '{$mName}',
  studentFamilyName = '{$fName}',
  dateOfBirth = '{$dBirth}',
  placeOfBirth = '{$pBirth}',
  studentSex = '{$gender}',
  nationality = '{$national}',
  country = '{$country}',
  studentEmail = '{$email}',
  studentSecondaryEmail = '{$semail}',
  studentPhone = '{$sPhone}'
  WHERE studentID = {$id}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['stPersonal'] = 'Updated.';
        redirect_to("students_change.php?sid=$id");
    } else {
        $_SESSION['stPersonalFail'] = 'Error 25: Fail to update.';
        redirect_to("students_change.php?sid=$id");
        //die("Error 25");
    }
}
function updateStudentCurrentAddress($id, $address, $city, $state,
                    $country, $houseNo, $streetNo)
{
    global $connection;
    $query = "UPDATE CurrentAddress SET
              caAddress = '{$address}',
              caCity = '{$city}',
              caState = '{$state}',
              caCountry = '{$country}',
              caHouseNo = '{$houseNo}',
              caStreetNo = '{$streetNo}'
              WHERE studentID = {$id}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['stPersonal'] = 'Updated.';
    } else {
        $_SESSION['stPersonalFail'] = 'Error 25a: Fail to update.';
    }
}
function updateStudentPermanantAddress($id, $address, $city, $state,
                    $country, $houseNo, $streetNo)
{
    global $connection;
    $query = "UPDATE PermanentAddress SET
              paAddress = '{$address}',
              paCity = '{$city}',
              paState = '{$state}',
              paCountry = '{$country}',
              paHouseNo = '{$houseNo}',
              paStreetNo = '{$streetNo}'
              WHERE studentID = {$id}";

    $result = mysqli_query($connection, $query);

    if ($result) {
        $_SESSION['stPersonal'] = 'Updated.';
    } else {
        $_SESSION['stPersonalFail'] = 'Error 25b: Fail to update.';
    }
}
function updateStudentGuardian($id, $gRelate, $gTitle, $gGiven,$gMiddle, $gFamily, $gOccu, $gAddr, $gDate, $gPlace, $gGender, $gEmail, $gPhone, $gLan)
{
    global $connection;

    $query = "UPDATE Guardian SET
              gRelation = '{$gRelate}',
              gTitle = '{$gTitle}',
              gGivenName = '{$gGiven}',
              gMiddleName = '{$gMiddle}',
              gFamilyName = '{$gFamily}',
              gOccupation = '{$gOccu}',
              gAddress = '{$gAddr}',
              gDateOfBirth = '{$gDate}',
              gPlaceOfBirth = '{$gPlace}',
              gGender = '{$gGender}',
              gEmail = '{$gEmail}',
              gPhone = '{$gPhone}',
              gLanguage = '{$gLan}'
              WHERE studentID = {$id}";

    $result = mysqli_query($connection, $query);

    if ($result) {
        $_SESSION['stPersonal'] = 'Updated.';
    } else {
        $_SESSION['stPersonalFail'] = 'Error 25c: Fail to update.';
    }
}
function updateStudentGrade($sId,$courseID,$sectionID, $letter, $points,$gradeQuality)
{
    global $connection;

    $query = "UPDATE StudentGrade SET
              gradeLetter = '{$letter}',
              gradePoints = {$points},
              gradeQuality = {$gradeQuality}
              WHERE Enroll_studentID = {$sId}
              AND   Enroll_courseID = {$courseID}
              AND   Enroll_sectionID = {$sectionID};";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['stGradeUpdate'] = 'Updated.';
        redirect_to("students_change_course.php?sid=$sId");
    } else {
        $_SESSION['stGradeUpdateFail'] = 'Error 29: Fail to update.!';
    }
}
function getStudentAcademicSearch($id,$sName,$sYear,$courseID){

    global $connection;

    $sql = "SELECT * FROM 
            Student st JOIN
            Enroll en JOIN
            Section se JOIN
            Course co JOIN
            StudentGrade sg JOIN
            Semester sem
            ON (st.studentID=en.studentID)
            AND (en.sectionID=se.sectionID)
            AND (en.courseID=se.courseID)
            AND (se.courseID=co.courseID)
            AND (sg.Enroll_studentID=en.studentID)
            AND (sg.Enroll_courseID=en.courseID)
            AND (sg.Enroll_sectionID=en.sectionID)
            AND (sem.semesterID=co.semesterID)
            AND st.studentID={$id}
            AND sem.semesterName='{$sName}'
            AND sem.semesterYear='{$sYear}'
            AND courseCode = '{$courseID}'";
            

    $result = mysqli_query($connection, $sql);
    $myarray = array();
    $i = 0;
    if (!$result) {
        die("Error 30");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $myarray[$i++]=$row;
    }
    return $myarray;
}

function gradePoint($letter){
    
    if($letter=="A"){
        $point = 4;
    }else if($letter=="A-"){
        $point = 3.7;
    }else if($letter=="B+"){
        $point = 3.3;
    }else if($letter=="B"){
        $point = 3.0;
    }else if($letter=="B-"){
        $point = 2.7;
    }else if($letter=="C+"){
        $point = 2.3;
    }else if($letter=="C"){
        $point = 2.0;
    }else if($letter=="C-"){
        $point = 1.7;
    }else if($letter=="D+"){
        $point = 1.3;
    }else if($letter=="D"){
        $point = 1.0;
    }else if($letter=="F" || $letter=="In Progress" || $letter=="W" || $letter=="WF"){
        $point = 0;
    }
    return $point;
}
function updateStudentAcademic($sId,$admission,$sStatus, $sPresence)
{
    global $connection;

    $query = "UPDATE Student SET
              studentStartingYear = '{$admission}',
              academicStatus = '{$sStatus}',
              studentPresence = '{$sPresence}'
              WHERE studentID = {$sId}";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['stAcademic'] = 'Updated.';
        redirect_to("students_change_academic.php?sid=$sId");
    } else {
        $_SESSION['stAcademicFail'] = 'Error 31: Fail to update.';
        //die("Error 31");
    }
}
function updateStudentMajorMinor($sId,$maID,$miID)
{
    global $connection;

    $query = "UPDATE Degree SET 
                majorID = {$maID},
                minorID = {$miID}
                WHERE studentID = {$sId};";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['stAcademic'] = 'Updated.';
    } else {
        $_SESSION['stAcademicFail'] = 'Error 31a: Fail to update.';
    }
}
function getMajorID($majorName){

    global $connection;

    $sql = "SELECT majorID FROM Major where majorName='{$majorName}';";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 33");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }

}
function getMinorID($minorName){

    global $connection;

    $sql = "SELECT minorID FROM Minor where minorName='{$minorName}';";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 34");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function getUsersStudents($profileType, $profileType2){

    global $connection;

    $sql = "SELECT * FROM User JOIN Profile_Type ON (profileTypeID=profileID) where profileType IN ('{$profileType}' , '{$profileType2}') ORDER BY userID DESC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 35");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getUserByID($uID, $proType1){

    global $connection;

    $sql = "SELECT * FROM User JOIN Profile_Type ON (profileTypeID=profileID) where profileType='$proType1' AND userID={$uID};";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 34");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function updateUserStudent($uID,$uName,$uEmail, $uPass)
{
    global $connection;

    $query = "UPDATE User SET 
                userName = '{$uName}',
                userPassword = '{$uPass}',
                userEmail = '{$uEmail}'
                WHERE userID = {$uID};";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';
        redirect_to("students_users_change.php?userID=$uID&search=Search%21");
        print_r($query);
    } else {
        print_r($query);
        die("Error 35");
    }
}
function updateUserByUser($uID, $uPass)
{
    global $connection;

    $query = "UPDATE User SET 
                userPassword = '{$uPass}'
                WHERE userID = {$uID};";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Updated!';
        
    } else {
        die("Error 35a");
    }
}
function createUser($uName, $uPass, $uEmail, $type, $pageName)
{
    global $connection;

    $query = "INSERT INTO User (userName, userPassword,userEmail,profileTypeID) 

               VALUES ('$uName','$uPass','$uEmail',$type)";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Created!';
        redirect_to($pageName);
        //print_r($query);
    } else {
        print_r($query);
        die("Error 36");
    }
}

function deleteUser($userID, $pageName)
{
    global $connection;

    $query = "DELETE FROM User

               WHERE userID = $userID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['userDelete'] = 'Deleted!';
        redirect_to("users.php");
        //print_r($query);
    } else {
        redirect_to("users.php");
        print_r($query);
        die("Error 48");
    }
}

function createStudent($userID, $sGiven, $sMiddle,
    $sFamily,$sEmail,$sSex,$sPhone,$sSEmail,$sAdmission,
    $sHighSch,$sDBirth,$sPBirth,$sNation,$sCoun,$sAcademic,$sPresence)
{
    global $connection;

    $query = "INSERT INTO Student VALUES 
            (null,$userID,'$sGiven','$sMiddle','$sFamily',
            '$sEmail','$sSex','$sPhone','$sSEmail','$sAdmission',
            null,null,'$sHighSch','$sDBirth','$sPBirth',
            '$sNation','$sCoun','$sAcademic','$sPresence');";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Created!';
        //redirect_to("students_new.php");
       
    } else {
        print_r($query);
        die("Error 37");
    }
}
function createStudentAcademic($maID, $miID)
{
    global $connection;

    $max = "SELECT max(studentID) FROM Student";
    $result2 = mysqli_query($connection, $max);

    if ($row = mysqli_fetch_assoc($result2)) {
        $idVal = $row['max(studentID)'];


    $query = "INSERT INTO Degree VALUES ($idVal, $maID, $miID);";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Created!';
        //redirect_to("students_new.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 38");
    }

}
}

function createStudentCA( $caAdd, $caCi,
    $caSta,$caCou,$caHou,$caStr)
{
    global $connection;


    $max = "SELECT max(studentID) FROM Student";
    $result2 = mysqli_query($connection, $max);
    //print_r($result2);

    if ($row = mysqli_fetch_assoc($result2)) {
        $idVal = $row['max(studentID)'];
    

        $query = "INSERT INTO CurrentAddress VALUES 
                (null,$idVal,'$caAdd','$caCi','$caSta','$caCou','$caHou','$caStr');";


        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['message'] = 'Created!';
            //redirect_to("students_new.php");
            //print_r($query);
        } else {
            print_r($query);
            die("Error 39");
        }

}



}

function createStudentPA($paAdd, $paCi,
    $paSta,$paCou,$paHou,$paStr)
{
    
    global $connection;


    $max = "SELECT max(studentID) FROM Student";
    $result2 = mysqli_query($connection, $max);

    if ($row = mysqli_fetch_assoc($result2)) {
        $idVal = $row['max(studentID)'];


    $query = "INSERT INTO PermanentAddress VALUES 
            (null,$idVal,'$paAdd','$paCi','$paSta','$paCou','$paHou','$paStr');";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Created!';
        //redirect_to("students_new.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 40");
    }
}

}
function createStudentGuardian($gRel, $gTi,
    $gGiv,$gMid,$gFami,$gOccu,$gAdd,$gDBirth,
    $gPBirth,$gSex,$gEmail,$gPhone,$gLan)
{
    global $connection;

    $max = "SELECT max(studentID) FROM Student";
    $result2 = mysqli_query($connection, $max);

    if ($row = mysqli_fetch_assoc($result2)) {
        $idVal = $row['max(studentID)'];


    $query = "INSERT INTO Guardian VALUES 
    (null,$idVal,'$gRel','$gTi','$gGiv','$gMid',
    '$gFami','$gOccu','$gAdd','$gDBirth','$gPBirth',
    '$gSex','$gEmail','$gPhone','$gLan');";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['message'] = 'Created!';
        redirect_to("students_new.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 41");
    }

}
}

function getDepartmentsMajor(){

    global $connection;

    $sql = "SELECT ma.departmentID, dt.departmentName ,count(ma.departmentID) 
            FROM Major ma JOIN Department dt 
            ON ma.departmentID = dt.departmentID 
            GROUP BY departmentID;";
    
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 43");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getDepartmentsMinor(){

    global $connection;

    $sql = "SELECT mi.departmentID, dt.departmentName ,count(mi.departmentID) 
            FROM Minor mi JOIN Department dt 
            ON mi.departmentID = dt.departmentID 
            GROUP BY departmentID;";
    
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 44");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getDepartmentID($dName){

    global $connection;

    $sql = "SELECT departmentID FROM Department where departmentName='{$dName}';";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 45");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }

}

function updateDepartmentIDByName($dID, $dName){

    global $connection;

    $sql = "UPDATE Department SET departmentName='{$dName}' WHERE departmentID=$dID;";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['messageUpdate'] = 'Updated!';
        redirect_to("courses_departments.php");
        print_r($query);
    } else {
        print_r($query);
        die("Error 46". mysqli_error($connection));
    }

}
function deleteDepartment($dID)
{
    global $connection;

    $query = "DELETE FROM Department

               WHERE departmentID = $dID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageDelete'] = 'Deleted!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 48");
    }
}


function insertDepartment($dName)
{
    global $connection;

    $query = "INSERT INTO Department

               VALUES (null,'$dName')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageInsert'] = 'Created!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 49");
    }
}

function getDepartmentsNameMajors($dName){

    global $connection;

    $sql = "SELECT *
            FROM Major ma JOIN Department dt 
            ON ma.departmentID = dt.departmentID
            AND dt.departmentName = '$dName';";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
  
    if (!$result) {
        die("Error 50");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getDepartmentsNameMinors($dName){

    global $connection;

    $sql = "SELECT *
            FROM Minor mi JOIN Department dt 
            ON mi.departmentID = dt.departmentID
            AND dt.departmentName = '$dName';";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
  
    if (!$result) {
        die("Error 51");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function insertMajor($mName,$dID)
{
    global $connection;

    $query = "INSERT INTO Major

               VALUES (null,'$mName',$dID)";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageInsertMinorMajor'] = 'Created!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        //print_r($query);
        die("Error 51");
    }
}
function insertMinor($mName,$dID)
{
    global $connection;

    $query = "INSERT INTO Minor

               VALUES (null,'$mName',$dID)";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageInsertMinorMajor'] = 'Created!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        //print_r($query);
        die("Error 51");
    }
}

function insertMajorMinor($majorName,$minorName,$dID)
{
    global $connection;

    $queryMajor = "INSERT INTO Major

               VALUES (null,'$majorName',$dID)";

    $queryMinor = "INSERT INTO Minor

               VALUES (null,'$minorName',$dID)";

    $resultMajor = mysqli_query($connection, $queryMajor);
    $resultMinor = mysqli_query($connection, $queryMinor);

    if ($resultMajor && $resultMinor) {
        $_SESSION['messageInsertMinorMajor'] = 'Created!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        //print_r($query);
        die("Error 52");
    }
}
//Majors
function getAllDepartmentsMajor(){

    global $connection;

    $sql = "SELECT dt.departmentName, ma.majorName 
            FROM Department dt JOIN Major ma
            ON (dt.departmentID = ma.departmentID);";
    
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 53");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getMajorDepartmentID($majorNa){

    global $connection;

    $sql = "SELECT dt.departmentID 
            FROM Department dt JOIN Major ma
            ON (dt.departmentID = ma.departmentID)
            AND ma.majorName = '{$majorNa}'";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 54".mysqli_error($connection));
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function updateMajor($majorName, $departmentID, $majID){

    global $connection;

    $sql = "UPDATE Major SET 
            majorName='{$majorName}', 
            departmentID={$departmentID} 
            WHERE majorID=$majID";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['messageMajorUpdate'] = 'Updated!';
        redirect_to("courses_departments.php");
        print_r($query);
    } else {
        print_r($query);
        die("Error 55". mysqli_error($connection));
    }

}
function deleteMajor($majorID)
{
    global $connection;

    $query = "DELETE FROM Major

               WHERE majorID = $majorID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageMajorDelete'] = 'Deleted!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 56");
    }
}


//Minors
function getAllDepartmentsMinor(){

    global $connection;

    $sql = "SELECT dt.departmentName, mi.minorName 
            FROM Department dt JOIN Minor mi
            ON (dt.departmentID = mi.departmentID);";
    
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 57");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getMinorDepartmentID($minorNa){

    global $connection;

    $sql = "SELECT dt.departmentID 
            FROM Department dt JOIN Minor mi
            ON (dt.departmentID = mi.departmentID)
            AND mi.minorName = '{$minorNa}'";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 58".mysqli_error($connection));
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function updateMinor($minorName, $departmentID, $minID){

    global $connection;

    $sql = "UPDATE Minor SET 
            minorName='{$minorName}', 
            departmentID={$departmentID} 
            WHERE minorID=$minID";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['messageMinorUpdate'] = 'Updated!';
        redirect_to("courses_departments.php");
        print_r($query);
    } else {
        print_r($query);
        die("Error 59". mysqli_error($connection));
    }

}
function deleteMinor($minorID)
{
    global $connection;

    $query = "DELETE FROM Minor

               WHERE minorID = $minorID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageMinorDelete'] = 'Deleted!';
        redirect_to("courses_departments.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 60");
    }
}

function insertSemester($sYear,$sName)
{
    global $connection;

    $query = "INSERT INTO Semester

               VALUES (null,'$sYear','$sName',1)";
    $result = mysqli_query($connection, $query);


    if ($result) {
        $_SESSION['messageSemesterCreate'] = "Created!";
        //redirect_to("courses_departments_courses.php");
        print_r($query);
    } else {
        print_r($query);
        die("Error 61");
    }
}
function getBeforeLastSemesterID()
{
    global $connection;

    $query = "SELECT semesterID FROM Semester ORDER BY semesterID DESC LIMIT 1,1";

    $result = mysqli_query($connection, $query);
     if (!$result) {
        die("Error 61a");
    }
    if ($row = mysqli_fetch_assoc($result)) {
       
        return $row;
    }
}
function updateCurrentSemester($semID){

    global $connection;

    $sql = "UPDATE Semester SET 
                currentSemester=0
                WHERE semesterID= $semID";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        redirect_to("courses_departments_courses.php");
    } else {
        die("Error 61b". mysqli_error($connection));
    }

}

function deleteSemester($semesterID)
{
    global $connection;

    $query = "DELETE FROM Semester

               WHERE semesterID = $semesterID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageSemesterDelete'] = 'Deleted!';
        redirect_to("courses_departments_courses.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 62");
    }
}
function semesterDuplicateCheck($semesterName, $semesterYear)
{
    global $connection;

    $query = "SELECT semesterID from Semester where semesterYear = '$semesterYear' && semesterName = '$semesterName';";

    $result = mysqli_query($connection, $query);
     if (!$result) {
        die("Error 63");
    }
    if ($row = mysqli_fetch_assoc($result)) {
       
        return $row;
    }
}
function getCoursesWithSemestersWithDepartments(){

    global $connection;

    $sql = "SELECT * FROM 
            Course co JOIN
            Semester sem JOIN
            Department dt 
            ON (co.semesterID=sem.semesterID)
            AND (co.departmentID=dt.departmentID) 
            ORDER BY 
            sem.semesterYear DESC,
                          CASE WHEN sem.semesterName = 'Summer' THEN 4
                          WHEN sem.semesterName = 'Winter' THEN 2
                          WHEN sem.semesterName = 'Spring' THEN 3
                          WHEN sem.semesterName = 'Fall' THEN 1
                          END;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 64");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getCoursesSelection($value){

    global $connection;

    $sql = "SELECT * FROM 
            Course co JOIN
            Semester sem JOIN
            Department dt JOIN
            Section sec
            ON (co.semesterID=sem.semesterID)
            AND (co.departmentID=dt.departmentID)
            AND (co.courseID=sec.courseID)
            WHERE co.courseCode LIKE '%$value%' or co.courseName LIKE '%$value%' or 
            (sem.semesterName LIKE '%$value%' or sem.semesterYear LIKE '%$value')";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 65");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}

function insertCourse($cCode, $cName, $cDescription, $cCredit, $semID, $deID, $isGen)
{
    global $connection;

    $query = "INSERT INTO Course

               VALUES (null,'$cCode','$cName','$cDescription',$cCredit,$semID,$deID,$isGen)";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageCourseCreated'] = 'Created!';
        redirect_to("courses_new.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 66");
    }
}
function insertCoursePre($cID, $cPre)
{
    global $connection;
    foreach ($cPre as $value) {
        if ($cID!=$value){
            $query = "INSERT INTO CoursePre (courseID, preID) VALUES ($cID,$value)";
            $result = mysqli_query($connection, $query);
        }else{
            $_SESSION['theValue'] = '<span class="text-red"> Except '. selectCourseByID($value)['courseCode'] . ". This can't be its own prerequisite.</span>";
        }
    }
    if ($result) {
        $_SESSION['messageCoursePreCreated'] = 'Created!';
        redirect_to("courses_new.php");
        //print_r($query);
    } else {
        print_r($query);
        die("Error 67");
    }

}

function selectCourseByID($cID){

    global $connection;

    $sql = "SELECT courseCode FROM Course WHERE courseID = $cID";
    $result = mysqli_query($connection, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }else{
        die("Error 68");
    }

}
function getSectionsSelection($value){

    global $connection;

    $sql = "SELECT * FROM 
            Section sec JOIN
            Course co JOIN
            Semester sem JOIN
            Professor pro
            ON (sec.courseID=co.courseID)
            AND (co.semesterID=sem.semesterID)
            AND (sec.professorID=pro.professorID)
            WHERE co.courseCode LIKE '%$value%' or sec.sectionDate LIKE '%$value%' or sec.sectionLocation LIKE '%$value%' or
            sem.semesterName LIKE '%$value%' or sem.semesterYear LIKE '%$value' or
            pro.professorGivenName LIKE '%$value%' or pro.professorMiddleName LIKE '%$value%'
            ORDER BY co.courseID DESC";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 69");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function insertSection($sSecID, $sCouID, $sSecDate, $sSecTime, $sSecLoc, $sSecSeat,$sSecPro)
{
    global $connection;

    $query = "INSERT INTO Section

               VALUES ($sSecID,$sCouID,'$sSecDate','$sSecTime','$sSecLoc',$sSecSeat,$sSecPro)";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['messageSectionSuccessCreated'] = 'Created!';
        redirect_to("sections_new.php");
        //print_r($query);
    } else {
        $_SESSION['messageSectionFail'] = 'Already created!';
        //print_r($query);
        //die("Error 70");
    }
}
function getCourseDetailsBycIDsID($cID,$sID){

    global $connection;

    $sql = "SELECT * FROM 
                Section sec JOIN
                Course co JOIN
                Semester sem JOIN
                Professor pro JOIN 
                Department dt
                ON (sec.courseID=co.courseID)
                AND (co.semesterID=sem.semesterID)
                AND (sec.professorID=pro.professorID)
                AND (co.departmentID=dt.departmentID)
                AND sec.courseID=$cID
                AND sec.sectionID=$sID";
    $result = mysqli_query($connection, $sql);

        
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }else{
        //print_r(mysqli_error($connection));
        //die("Error 71");
        print_r('nice try!');
    }
}

function updateCourse($cID, $secID, $cCode, $cName, $cDescription, $cCredit, $cDepartment, $cSemesterID, $secDate, $secTime, $secLocate, $secSeat, $secProf, $cPre, $isGen)
{
    global $connection;
    
    //Course Table
    $query = "UPDATE Course SET
              courseCode = '{$cCode}',
              courseName = '{$cName}', 
              courseDescription = '{$cDescription}',
              courseCreditHour = {$cCredit},
              semesterID = {$cSemesterID},
              departmentID = {$cDepartment},
              isGeneral = {$isGen}
              WHERE courseID = {$cID}";

    $result = mysqli_query($connection, $query);


    //Section Table
    $query2 = "UPDATE Section SET
              sectionID = {$secID},
              sectionDate = '{$secDate}',
              sectionTime = '{$secTime}',
              sectionLocation = '{$secLocate}',
              sectionSeat = {$secSeat},
              professorID = {$secProf}
              WHERE sectionID={$secID} and courseID = {$cID}";

    $result2 = mysqli_query($connection, $query2);


    //CourePre Table
    foreach ($cPre as $value) {
        if ($cID!=$value){
            $query3 = "UPDATE CoursePre SET preID = {$value} WHERE courseID = {$cID}";
            $result3 = mysqli_query($connection, $query);
        }
        // else{
        //     $_SESSION['theValue'] = '<span class="text-red"> Except '. selectCourseByID($value)['courseCode'] . ". This can't be its own prerequisite.</span>";
        // }
    }


    if ($result && $result2 && $result3) {
        $_SESSION['messageCourseUpdate'] = 'Updated!';
        redirect_to("courses_info_edit.php?c=$cID&s=$secID");
    } else {
        $_SESSION['messageCourseUpdateFail'] = 'Error while updating. Please try again!';
        redirect_to("courses_info_edit.php?c=$cID&s=$secID");
        //die("Error 72");
        //print_r($query);
    }
}

function deleteSection($cID, $sID)
{
    global $connection;

    $query = "DELETE FROM Section

               WHERE courseID = $cID && sectionID = $sID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['sectionDelete'] = 'Deleted!';
        redirect_to("courses_edit.php");
    } else {
        $_SESSION['sectionDeleteFail'] = 'Fail to delete! Students might be enrolled in this course section.';
        redirect_to("courses_info_edit.php?c=$cID&s=$sID");
        //die("Error 74");
    }
}
function getCoursePrerequisite($cID){

    global $connection;

    $sql = "SELECT preID from CoursePre where courseID={$cID}";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 75");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}

function getCoursesWithSections(){

    global $connection;

    $sql = "SELECT * FROM 
            Course co JOIN
            Semester sem JOIN
            Department dt JOIN
            Section sec
            ON (co.semesterID=sem.semesterID)
            AND (co.departmentID=dt.departmentID)
            AND (co.courseID=sec.courseID)
            ORDER BY 
            sem.semesterYear DESC,
                          CASE WHEN sem.semesterName = 'Summer' THEN 4
                          WHEN sem.semesterName = 'Winter' THEN 2
                          WHEN sem.semesterName = 'Spring' THEN 3
                          WHEN sem.semesterName = 'Fall' THEN 1
                          END;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 76");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}


function insertEnroll($sID, $courseID, $sectionID)
{
    global $connection;

    $query = "INSERT INTO Enroll VALUES ($sID, $sectionID, $courseID)";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $_SESSION['studentEnrolled'] = 'Enrolled.';
    } else {
        $_SESSION['studentEnrolledFailed'] = 'Error 77a: Failed to enroll student.';
    }

}
function insertEnrollGrade($sID, $courseID, $sectionID)
{
    global $connection;


    $query2 = "INSERT INTO StudentGrade (Enroll_studentID, Enroll_courseID, Enroll_sectionID) VALUES ($sID, $courseID, $sectionID)";
    $result2 = mysqli_query($connection, $query2);
    
}
function insertStudentReview($revieTest, $proID, $stID, $couID, $sectID)
{
    global $connection;


    $query2 = "INSERT INTO StudentReview VALUES (null, '$revieTest', $proID, $stID, $couID, $sectID)";
    $result2 = mysqli_query($connection, $query2);
    
    if ($result2) {
        redirect_to("enrollment.php");
    } else {
        redirect_to("enrollment.php");
    }

}
function deleteEnroll($sID, $coID, $secID)
{
    global $connection;

    $query = "DELETE FROM Enroll

               WHERE studentID = $sID && courseID = $coID && sectionID = $secID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['enrollDeleted'] = 'Dropped!';
        redirect_to("students_change_course.php?sid=$sID");
    } else {
        $_SESSION['enrollDeletedFail'] = 'Error 78: Fail to drop student in course!';
        redirect_to("students_change_course.php?sid=$sID");
        //die("Error 74");
    }
}

function deleteStudentGrade($sID, $coID, $secID)
{
    global $connection;

    $query = "DELETE FROM StudentGrade

               WHERE Enroll_studentID = $sID && Enroll_courseID = $coID && Enroll_sectionID = $secID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['enrollDeleted'] = 'Deleted!';
    } else {
        $_SESSION['enrollDeletedFail'] = 'Error 79: Fail to drop student in course!';
        //die("Error 74");
    }
}  
function deleteStudentReview($sID, $coID, $secID)
{
    global $connection;

    $query = "DELETE FROM StudentReview

               WHERE studentID = $sID && courseID = $coID && sectionID = $secID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['enrollDeleted'] = 'Deleted!';
    } else {
        $_SESSION['enrollDeletedFail'] = 'Error 79b: Fail to drop student in course!';
        //die("Error 74");
    }
} 
function getProfessorsDetails(){

    global $connection;

    $sql = "SELECT * FROM 
            Professor pro JOIN
            User us JOIN
            Department dt
            ON (pro.userID = us.userID)
            AND (pro.departmentID=dt.departmentID)
            ORDER BY pro.professorGivenName ASC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 80");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}
function getProfessorsDetailsSearch($value){

    global $connection;

    $sql = "SELECT * FROM 
            Professor pro JOIN
            User us JOIN
            Department dt
            ON (pro.userID = us.userID)
            AND (pro.departmentID=dt.departmentID)
            WHERE pro.professorGivenName LIKE '%$value%' or pro.professorMiddleName LIKE '%$value%' or
            pro.professorFamilyName LIKE '%$value' or dt.departmentName LIKE '%$value%'
            ORDER BY pro.professorGivenName ASC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 81");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getProfessorsXNumber($value){

    global $connection;

    $sql = "SELECT pro.professorID, pro.professorGivenName, pro.professorProfileImage, professorJoinDay, dt.departmentName, pro.departmentID FROM 
            Professor pro JOIN
            User us JOIN
            Department dt
            ON (pro.userID = us.userID)
            AND (pro.departmentID=dt.departmentID) 
            ORDER BY pro.professorID DESC LIMIT $value;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 82");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getProfessorsByID($id){

    global $connection;

    $sql = "SELECT pro.*,us.userID, dt.departmentID, dt.departmentName FROM 
            Professor pro JOIN
            User us JOIN
            Department dt
            ON (pro.userID = us.userID)
            AND (pro.departmentID=dt.departmentID)
            AND pro.professorID=$id;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 82");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function getProfessorsClassesTaught($id){

    global $connection;

    $sql = "SELECT * FROM ProfessorClassesTaught
            WHERE professorID=$id;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
    if (!$result) {
        die("Error 83");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getProfessorsCertificates($id){

    global $connection;

    $sql = "SELECT * FROM proCertificates
            WHERE professorID=$id;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
    if (!$result) {
        die("Error 84");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getProfessorsClasses($id, $currentSem){

    global $connection;

    $sql = "SELECT * FROM 
            Section sec JOIN
            Course co JOIN
            Semester sem JOIN
            Professor pro JOIN
            Department dt 
            ON (sec.courseID=co.courseID)
            AND (co.semesterID=sem.semesterID)
            AND (co.departmentID=dt.departmentID)
            AND (sec.professorID=pro.professorID)
            WHERE pro.professorID=$id
            AND sem.currentSemester=$currentSem;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
    if (!$result) {
        die("Error 85");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getStudentIDBYUserID($id){

    global $connection;

    $sql = "SELECT studentID FROM 
            Student
            WHERE userID=$id;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 86");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function getEnrollmentTime(){

    global $connection;

    $sql = "SELECT * FROM Enrollment_Time ORDER BY etID DESC LIMIT 1";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 87");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function insertEnrollmentTime($from, $to)
{
    global $connection;


    $query2 = "INSERT INTO Enrollment_Time VALUES (null, '{$from}', '{$to}')";
    $result2 = mysqli_query($connection, $query2);
    
    if ($result2) {
        $_SESSION['enrollTime'] = 'Opened!';
        redirect_to("enrollment.php");
    } else {
        $_SESSION['enrollTimeFail'] = 'Error 88: Failed to open registration.';
        redirect_to("enrollment.php");
        //print_r($query);
    }
}
function getCourseForRegisterStudent($departID, $courseCode){

    global $connection;

    $sql = "SELECT * FROM 
            Course co JOIN 
            Semester sem JOIN 
            Section sec JOIN
            Professor pro
            ON ( co.courseID =sec.courseID )
            AND (co.semesterID =sem.semesterID)
            AND (sec.professorID=pro.professorID)
            AND sem.currentSemester=1
            AND co.departmentID={$departID}
            AND co.courseCode='{$courseCode}';";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
    if (!$result) {
        die("Error 89");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function getGeneralCourse($cCode){

    global $connection;
    $sql = "SELECT * FROM 
            Course co JOIN 
            Semester sem JOIN 
            Section sec JOIN
            Professor pro
            ON ( co.courseID =sec.courseID )
            AND (co.semesterID =sem.semesterID)
            AND (sec.professorID=pro.professorID)
            AND sem.currentSemester=1
            AND co.courseCode='{$cCode}'
            AND co.isGeneral=1";
    $result = mysqli_query($connection, $sql);

    $myArray = array();
    if (!$result) {
        die("Error 90");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}
function numberOfEnrolledStudentInCourse($coID, $secID){

    global $connection;
    $sql = "SELECT courseID, sectionID, count(studentID) AS 'num' 
            FROM Enroll 
            where courseID = {$coID}
            AND sectionID = {$secID}
            GROUP BY sectionID;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 91");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function insertEnrollByStudent($sID, $courseID, $sectionID)
{
    global $connection;

    $query = "INSERT INTO Enroll VALUES ($sID, $sectionID, $courseID)";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $_SESSION['studentEnrollByStudent'] = 'Enrolled.';
    } else {
        $_SESSION['studentEnrollByStudentFail'] = 'Error 91a: Failed to enroll.';
    }

}
function insertEnrollGradeByStudent($sID, $courseID, $sectionID)
{
    global $connection;


    $query2 = "INSERT INTO StudentGrade (Enroll_studentID, Enroll_courseID, Enroll_sectionID) VALUES ($sID, $courseID, $sectionID)";
    $result2 = mysqli_query($connection, $query2);
}
function insertStudentReviewByStudent($revieTest, $proID, $stID, $couID, $sectID)
{
    global $connection;

    $query2 = "INSERT INTO StudentReview VALUES (null, '$revieTest', $proID, $stID, $couID, $sectID)";
    $result2 = mysqli_query($connection, $query2);
    
    if ($result2) {
        redirect_to("academics_registration.php");
    } else {
        redirect_to("academics_registration.php");
    }
}

function getProfessorsDetailsByDepartment($departID){

    global $connection;

    $sql = "SELECT * FROM 
            Professor pro 
            WHERE departmentID = {$departID}
            ORDER BY pro.professorGivenName ASC;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 92a");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}

function getProfessorIDBYUserID($id){

    global $connection;

    $sql = "SELECT pro.*, us.* FROM 
            Professor pro JOIN User us 
            ON (pro.userID=us.userID)
            WHERE us.userID=$id;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 93a");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function numberOfStudentsPerCourse($courseID, $secID){

    global $connection;

    $sql = "SELECT count(studentID) AS 'numSt' 
            FROM Enroll 
            WHERE courseID={$courseID} 
            AND sectionID = {$secID}
            GROUP BY courseID,sectionID;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        //die("Error 94a");
        print_r("Error 94a, nice try!");
    }
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}
function getStudentsByCourseID($coID, $secID){

    global $connection;

    $sql = "SELECT st.studentID, co.courseCode,co.courseName, en.sectionID, st.studentGivenName, st.studentMiddleName, st.studentFamilyName, sg.gradeLetter, sem.semesterName, sem.semesterYear, sr.studentReviewID ,sr.reviewText, sg.isSubmitted, sg.isSaved, co.courseID
            FROM Student st 
            JOIN Enroll en
            JOIN Section se
            JOIN Course co
            JOIN Semester sem
            JOIN StudentGrade sg
            JOIN StudentReview sr
            ON (st.studentID = en.studentID)
            AND (en.courseID=se.courseID)
            AND (en.sectionID=se.sectionID)
            AND (se.courseID=co.courseID)
            AND (co.semesterID=sem.semesterID)
            AND (en.studentID=sg.Enroll_studentID)
            AND (en.courseID=sg.Enroll_courseID)
            AND (en.sectionID=sg.Enroll_sectionID)
            AND (en.studentID=sr.studentID)
            AND (en.sectionID=sr.sectionID)
            AND (en.courseID=sr.courseID)
            AND en.courseID = {$coID}
            AND en.sectionID = {$secID};";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 93a");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;

}



function getStudentPerviousSemester($id){

    global $connection;

    $sql = "SELECT * FROM 
            Student st JOIN
            Enroll en JOIN
            Section se JOIN
            Course co JOIN
            StudentGrade sg JOIN
            Semester sem
            ON (st.studentID=en.studentID)
            AND (en.sectionID=se.sectionID)
            AND (en.courseID=se.courseID)
            AND (se.courseID=co.courseID)
            AND (sg.Enroll_studentID=en.studentID)
            AND (sg.Enroll_courseID=en.courseID)
            AND (sg.Enroll_sectionID=en.sectionID)
            AND (sem.semesterID=co.semesterID)
            AND st.studentID={$id}
            AND sem.semesterID=(SELECT semesterID FROM mydb.Semester ORDER BY semesterID DESC LIMIT 1,1);";
            

    $result = mysqli_query($connection, $sql);
    $myarray = array();
    $i = 0;
    if (!$result) {
        die("Error 94a");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $myarray[$i++]=$row;
    }
    return $myarray;
}

function insertCertificate($name, $location, $proID)
{
    global $connection;

    $query = "INSERT INTO proCertificates VALUES (null, $proID, '$location','$name')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        //$_SESSION['newsMessage'] = 'Your message has been sent.';
        redirect_to('profile.php');
    } else {
        //$_SESSION['newsMessageFail'] = 'Error 42: Failed to send message.';
    }
}

function deleteCertificate($certID,$proID)
{
    global $connection;

    $query = "DELETE FROM proCertificates

               WHERE proCID = $certID
               AND professorID = $proID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['certDelete'] = 'Your certificate has been deleted.';
        redirect_to("profile.php");
    } else {
        $_SESSION['certDeleteFail'] = 'Error 96a: Fail to delete!';
        redirect_to("profile.php");
    }
}

function updateProfessorClassesTaught($classArray,$classLocation)
{
    global $connection;

    foreach ($classArray as $key => $value) {
        $query = "UPDATE ProfessorClassesTaught SET
                  pctClassName = '{$value}'
                  WHERE pctID = {intval($key)}";
        $result = mysqli_query($connection, $query);
    }

    foreach ($classLocation as $key => $value) {
        $query = "UPDATE ProfessorClassesTaught SET
                  pctLocation = '{$value}'
                  WHERE pctID = {intval($key)}";
        $result = mysqli_query($connection, $query);
    }

    if ($result) {
        $_SESSION['message'] = 'Updated!';
        print_r($query);
    } else {
        print_r($query);
        $_SESSION['message'] = 'Error while uploading. Please try again!';
    }
}

function insertClassesTaught($name, $location, $proID)
{
    global $connection;

    $query = "INSERT INTO ProfessorClassesTaught VALUES (null, $proID, '$name','$location')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        //$_SESSION['newsMessage'] = 'Your message has been sent.';
        redirect_to('profile.php');
    } else {
        //$_SESSION['newsMessageFail'] = 'Error 42: Failed to send message.';
    }
}
function deleteClassesTaught($pctID,$proID)
{
    global $connection;

    $query = "DELETE FROM ProfessorClassesTaught

               WHERE pctID = $pctID
               AND professorID = $proID;";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['pctDelete'] = 'Your certificate has been deleted.';
        redirect_to("profile.php");
    } else {
        $_SESSION['pctDeleteFail'] = 'Error 96a: Fail to delete!';
        redirect_to("profile.php");
    }
}

function getAdmin($id){

    global $connection;

    $sql = "SELECT * FROM Admin ad JOIN User us ON (ad.userID=us.userID) AND us.userID={$id}";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 97a");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
}

function updateStudentGradeByProfessor($studentIDsWithGrade, $coID, $secID, $isSave, $isSubmit)
{
    global $connection;

    foreach ($studentIDsWithGrade as $key => $value) {

        $point = gradePoint($value);
        $quality = $point * 3;
        
        $query = "UPDATE StudentGrade SET
                  gradeLetter = '{$value}',
                  gradePoints = {$point},
                  gradeQuality = {$quality},
                  status = 'Completed', 
                  isSaved = {$isSave},
                  isSubmitted = {$isSubmit}
                  WHERE Enroll_studentID = {$key}
                  AND   Enroll_courseID = {$coID}
                  AND   Enroll_sectionID = {$secID};";
        $result = mysqli_query($connection, $query);

    }
    if ($result) {
        $_SESSION['stGradeUpdate'] = 'Updated.';
        //redirect_to("grading.php");
        var_dump($query);
    } else {
        $_SESSION['stGradeUpdateFail'] = 'Error 98a: Fail to update.!';
    }
}

function updateStudentEvaluationByProfessor($reviewArray, $isSave, $isSubmit)
{
    global $connection;

    foreach ($reviewArray as $key => $value) {
    
        $query = "UPDATE StudentReview SET
                  reviewText = '{$value}',
                  isSaved = {$isSave},
                  isSubmitted = {$isSubmit}
                  WHERE studentReviewID={$key}";
        $result = mysqli_query($connection, $query);

    }
    if ($result) {
        $_SESSION['stEvaluationUpdate'] = 'Updated.';
        redirect_to("grading.php");
    } else {
        $_SESSION['stEvaluationUpdateFail'] = 'Error 99a: Fail to update.!';
    }
}

function isSavedisSubmitted($coID, $secID){

    global $connection;

    $sql = "SELECT Enroll_courseID, Enroll_sectionID, isSaved, isSubmitted 
            FROM StudentGrade
            WHERE Enroll_courseID={$coID} AND Enroll_sectionID={$secID};";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 100a");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    }
    return $myArray;
}

function getVisibility(){

    global $connection;

    $sql = "SELECT * FROM Visibility ORDER BY idVisibility DESC LIMIT 1;";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error 101a");
    }
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } 
}
function updateWebsiteConfigWithoutImage($blockBackColor, $blockTextColor, $boxBorderColor ,$btnBack, $btnText, $fb, $fbName, $tweet)
{
    global $connection;

      $query = "UPDATE Visibility SET
      blockBackgroundColor = '{$blockBackColor}',
      blockTextColor = '{$blockTextColor}',
      boxBorderColor = '{$boxBorderColor}',
      buttonBackground = '{$btnBack}',
      buttonText = '{$btnText}',
      facebook = '{$fb}',
      facebookName = '{$fbName}',
      twitter = '{$tweet}'
      WHERE idVisibility = 1";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['webConfig'] = 'Updated!';        
        redirect_to("index.php");
    } else {
        $_SESSION['webConfigFail'] = 'Error 102a: Please try again!';
    }
}
function updateWebsiteConfig($background, $blockBackColor, $blockTextColor, $boxBorderColor ,$btnBack, $btnText, $fb, $fbName, $tweet)
{
    global $connection;

      $query = "UPDATE Visibility SET
      background = '{$background}',
      blockBackgroundColor = '{$blockBackColor}',
      blockTextColor = '{$blockTextColor}',
      boxBorderColor = '{$boxBorderColor}',
      buttonBackground = '{$btnBack}',
      buttonText = '{$btnText}',
      facebook = '{$fb}',
      facebookName = '{$fbName}',
      twitter = '{$tweet}'
      WHERE idVisibility = 1";

    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['webConfig'] = 'Updated!';        
        //redirect_to("users.php");
    } else {
        $_SESSION['webConfigFail'] = 'Error 103a: Please try again!';
    }
}


function insertAttendance($studentArray, $date)
{
    global $connection;

    for ($i=0; $i < count($studentArray); $i++) { 
                $v1 = (int)$studentArray[$i][1]; //Student ID
                $v2 = (int)$studentArray[$i][2]; //Course ID
                $v3 = (int)$studentArray[$i][3]; //Section ID
                $v4 = (int)$studentArray[$i][0]; //isPresent

            $query = "INSERT INTO Attendance VALUES ($v1, $v2, $v3, '$date',$v4)";
            $result = mysqli_query($connection, $query);
    }

    if ($result) {
        //$_SESSION['newsMessage'] = 'Your message has been sent.';
        redirect_to('attendance.php');
    } else {
        //$_SESSION['newsMessageFail'] = 'Error 42: Failed to send message.';
    }
}

function getAttendance($coID, $secID, $date){

    global $connection;

    $sql = "SELECT * FROM Attendance WHERE courseID=$coID AND sectionID=$secID AND aDate='$date';";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 104a");
    }
    
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    } 
    return $myArray;
}


function updateAttendance($studentArray, $date){

    global $connection;


    for ($i=0; $i < count($studentArray); $i++) { 
        $v1 = (int)$studentArray[$i][1]; //Student ID
        $v2 = (int)$studentArray[$i][2]; //Course ID
        $v3 = (int)$studentArray[$i][3]; //Section ID
        $v4 = (int)$studentArray[$i][0]; //isPresent


    $sql = "UPDATE Attendance SET isPresent = {$v4}
            WHERE studentID=$v1 AND courseID=$v2 AND sectionID=$v3 AND aDate='$date';";
        $result = mysqli_query($connection, $sql);

        print_r($sql);
        echo "<br>";
    }

    if ($result) {
        $_SESSION['attendanceUpdate'] = 'Updated!';
        //print_r($sql);
        redirect_to("attendance.php");        
    } else {
        $_SESSION['attendanceUpdateFail'] = 'Error 103a: Please try again!';
    }
}
function getAttendancePerStudentPerClass($stID, $coID, $secID){

    global $connection;

    $sql = "SELECT count(aDate) as 'number' FROM Attendance 
            WHERE studentID=$stID AND courseID=$coID AND sectionID=$secID AND isPresent=0
            GROUP BY studentID, courseID, sectionID;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 104a");
    }
    
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    } 
    return $myArray;
}


function getAttendancePerSemester($stID, $semID){

    global $connection;

    $sql = "SELECT * FROM
            Section se JOIN
            Course co JOIN
            Enroll en JOIN
            Semester sem JOIN
            Attendance att
            ON (en.studentID=att.studentID)
            AND(en.sectionID=att.sectionID)
            AND(en.courseID=att.courseID)
            AND(se.sectionID=en.sectionID)
            AND(se.courseID=en.courseID)
            AND(se.courseID=co.courseID)
            AND (co.semesterID=sem.semesterID)
            AND att.studentID=$stID AND co.semesterID=$semID AND att.isPresent=0;";
    $result = mysqli_query($connection, $sql);

    $myArray = array();

    if (!$result) {
        die("Error 105a");
    }
    
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $myArray[$i++] = $row;
    } 
    return $myArray;
}

?>
