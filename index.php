<html>
  <head>
    <title>Calculator</title>
  </head>

  <body>
    
     <script>
        function gradeCalculator(grade) {
          if (isNaN(grade) || grade < 0 || grade > 100) {
            return "Error:  Input must be a number between 0  - 100";
          } 
          else if (grade >= 90) {
            return "A";
          } 
          else if (grade >= 80) {
            return "B";
          } 
          else if (grade >= 70) {
            return "C";
          } 
          else if (grade >= 60) {
            return "D";
          } 
          else {
            return "F";
          }
        }
        document.write(gradeCalculator(75));
     </script>
  </body>
</html>