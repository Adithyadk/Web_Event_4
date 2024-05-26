<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
        <style>
            body{
                background-color: #a798fd;
                display:flex; 
                flex-direction:column; 
                justify-content:center;
            }
            .container {
                display: flex;
                /* align-items: center; */
                flex-direction: column;
                width: 40%;
                padding: 1rem 0.5rem;
                margin: 2rem 26rem;
                background-color: white;
                font-size: larger;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            }
            h1 {
                color: #333;
            }
            .info {
                margin: 15px 0;
            }
            .info span {
                font-weight: bold;
            }
            button{
            margin-top: 1rem;
            padding: 1rem;
            border: none;
            border-radius: 2rem;
            background-color: #a798fd;
            font-size: larger;
            color: white;
        }
        button:hover{
            cursor: pointer;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;            
        }
        </style>
    </head>
    <body>
        <h1 style="color: white; text-align: center;">Task 2 Output</h1>
        <div class="container">
            <a href='index.html'><button>Go Back</button></a>
            <h1>Your GPA is: <span id='gpa'></span></h1>
        </div>

        <script>
            // Fetch session data from PHP session
            fetch('get_session_data.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('gpa').textContent = data.gpa;
                });
        </script>
    </body>
</html>