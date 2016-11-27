<script type="text/javascript">
//Gender
a = ["A", "A-", "B+", "B", "B-", "C+", "C", "C-", "D+", "D", "F", "In Progress", "W", "WF"];

var myData = [<?php 
      while ($row = mysqli_fetch_array($result)) {
          echo $row['gender'].','; 
      } ?>];
var myLabels = [<?php 
      while ($row = mysqli_fetch_array($result2)) {
          echo '"'.$row['studentSex'].'",'; 
      } ?>];

var letterData = [<?php 
      while ($row1 = mysqli_fetch_array($resultGrades1)) {
          echo $row1['numLetter'].','; 
      } ?>];
var letterLabel = [<?php 
      while ($row1 = mysqli_fetch_array($resultGrades2)) {
          echo '"'.$row1['gradeLetter'].'",'; 
      } ?>];

var majorStudentsNum = [<?php 
      while ($row1 = mysqli_fetch_array($majorStudents)) {
          echo $row1['num'].','; 
      } ?>];
var majorNames = [<?php 
      while ($row1 = mysqli_fetch_array($majorName)) {
          echo '"'.$row1['majorName'].'",'; 
      } ?>];

var minorStudentsNum = [<?php 
      while ($row1 = mysqli_fetch_array($minorStudents)) {
          echo $row1['num'].','; 
      } ?>];
var minorNames = [<?php 
      while ($row1 = mysqli_fetch_array($minorName)) {
          echo '"'.$row1['minorName'].'",'; 
      } ?>];

window.onload = function() {

  //Gender
  zingchart.render({
    id: "genderChart",
    width: "100%",
    height: 400,
    data: {
      "type": "pie",
      "legend": {},
      "title": {
        "text": "Gender"
      },
      "series": [{
        "values": [myData[0]],
        "text": myLabels[0]
      }, {
        "values": [myData[1]],
        "text": myLabels[1]
      }],
    }
  });

  //Grades
  zingchart.render({
    id: "gradeChart",
    width: "100%",
    height: 400,
    data: {
      "type": "bar",
      "legend": {},
      "scale-x": {
        "labels": [letterLabel[0], letterLabel[1], letterLabel[2], letterLabel[3], letterLabel[4], letterLabel[5], letterLabel[6], letterLabel[7], letterLabel[8], letterLabel[9], letterLabel[10], letterLabel[11], letterLabel[12]]

      },
      "title": {
        "text": "Grade"
      },
      "series": [{
          "values": [letterData[0], letterData[1], letterData[2], letterData[3], letterData[4], letterData[5], letterData[6], letterData[7], letterData[8], letterData[9], letterData[10], letterData[11], letterData[12]],
          "text": "Number of Students",

          "styles": [{
            "background-color": "#4dbac0"
          }, {
            "background-color": "#25a6f7"
          }, {
            "background-color": "#ad6bae"
          }, {
            "background-color": "#707d94"
          }, {
            "background-color": "#f3950d"
          }, {
            "background-color": "#e62163"
          }, {
            "background-color": "#4e74c0"
          }, {
            "background-color": "#9dc012"
          }, {
            "background-color": "#B24C60"
          }, {
            "background-color": "#8A9B0F"
          }, {
            "background-color": "#490A3D"
          }, {
            "background-color": "#E97F02"
          }, {
            "background-color": "#025464"
          }, ]

        },

      ]
    }
  });

  //major
  zingchart.render({
    id: "majorChart",
    width: "100%",
    height: 400,
    data: {
      "type": "ring",
      "plot":{
        "slice":"35%",
        "value-box":{
          "visible":true,
          "placement":"out",
          "text": "%v students in %t"
        }
      },
      "title": {
        "text": "Students Per Major"
      },
      "series": [
      {
        "values": [majorStudentsNum[0]],
        "text": majorNames[0]
      }, 
      {
        "values": [majorStudentsNum[1]],
        "text": majorNames[1]
      },
      {
        "values": [majorStudentsNum[2]],
        "text": majorNames[2]
      },
      {
        "values": [majorStudentsNum[3]],
        "text": majorNames[3]
      },
      {
        "values": [majorStudentsNum[4]],
        "text": majorNames[4]
      },
      {
        "values": [majorStudentsNum[5]],
        "text": majorNames[5]
      },
      {
        "values": [majorStudentsNum[6]],
        "text": majorNames[6]
      },
      ],
    }
  });

//minor
  zingchart.render({
    id: "minorChart",
    width: "100%",
    height: 400,
    data: {
      "type": "ring",
      "plot":{
        "slice":"35%",
        "value-box":{
          "visible":true,
          "placement":"out",
          "text": "%v students in %t"
        }
      },
      "title": {
        "text": "Students Per Minor"
      },
      "series": [
      {
        "values": [minorStudentsNum[0]],
        "text": minorNames[0]
      }, 
      {
        "values": [minorStudentsNum[1]],
        "text": minorNames[1]
      },
      {
        "values": [minorStudentsNum[2]],
        "text": minorNames[2]
      },
      {
        "values": [minorStudentsNum[3]],
        "text": minorNames[3]
      },
      {
        "values": [minorStudentsNum[4]],
        "text": minorNames[4]
      },
      {
        "values": [minorStudentsNum[5]],
        "text": minorNames[5]
      },
      {
        "values": [minorStudentsNum[6]],
        "text": minorNames[6]
      },
      ],
    }
  });




}; //End of window load.








</script>