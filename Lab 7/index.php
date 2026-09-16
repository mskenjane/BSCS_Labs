<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nigga</title>

    <script>
        function Final_grade(){
            let option = document.getElementById("option").value
            let message = document.getElementById("info")
            
            let num1 = Number(document.getElementById("score").value)
            let num2 = Number(document.getElementById("total").value)

            let percentage = (num1/num2) * 100
            let has_passed = percentage >= 75

            
            switch(option){
                case "percent": {
                    let m = "" 
                    if (percentage < 75) m = "Oh no!"
                    else if (percentage >= 75 && percentage <= 80) m = "Nice!"
                    else if (percentage >= 81 && percentage <= 85) m = "Good!"
                    else if (percentage >= 86 && percentage <= 90) m = "Great!"
                    else if (percentage >= 91) m = "Excellent!"

                    message.textContent = `${m} Your grade is ${percentage}%.`
                    break
                }
                case "passfail" : {
                    message.textContent = `${has_passed ? "Passed!" : "Failed!"}`
                    break
                }
            }
            ToggleLight(has_passed)
        }

        function ToggleLight(state) {
            document.getElementById("bulb").src = state ? "./Images/On.png" : "./Images/Off.png"
        }
    </script>
</head>
<body>
    
    <p id="info">Enter a score to check your Grade </p> <br>
    <input type="number" id="score" placeholder="Enter your grade">
    <input type="number" id="total" placeholder="Total Score:">

    <select id="option">
        <option value="percent">Percentage</option>
        <option value="Pass" >Pass/Fail</option>
    </select>

    <button onclick="Final_grade()">Calculate Grade</button> <br>

    <img src="./Images/Off.png" id="bulb" width="20%">
</body>
</html>