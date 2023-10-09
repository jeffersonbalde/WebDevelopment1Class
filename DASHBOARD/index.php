<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&family=Poppins:wght@200;300;400;500;600;800;900&display=swap" rel="stylesheet">
    <title>Jefferson Balde</title>
    <style>
        
    body {
        background-color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        height: 80vh;
        border-radius: 10px;
        width: 1450px;
        margin: auto;
        background-color: #EFEEEE;
        padding: 20px;

        display: flex;
        justify-content: space-around; 

    }

    .title {
        color: #009DF7;
        text-align: center;
    }

    .first,
    .second,
    .third,
    .fourth,
    .five,
    .six {
        height: 590px;
        width: 250px;
        background-color: white;
        border-radius: 5px;
    }

    .second,
    .third {
        height: 300px;
        width: 290px;
    }

    .fourth {
        margin-top: -41px;
        width: 500px;
        height: 230px;
    }

    .six {
        height: 400px;
    }

    .first_container {
        display: flex;
        flex-direction: column;
        padding: 30px;
    }

    button {
        margin-top: 10px;
        height: 50px;
        background-color: #009DF7;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .three_div{
        width: 620px;

        display: flex;
        flex-wrap: wrap;
        gap: 39px;
    }

    </style>
</head>
<body>
    <h1 class="title">Jefferson Balde </h1>

    <div class="container">
        
        <div class="first">
            <div class="first_container">
                <button>DASHBOARD</button>
                <button>ADD PATIENT</button>
                <button>ADD USER</button>
            </div>
        </div>

        <div class="three_div">
            <div class="second">
                
            </div>
            <div class="third"></div>
            <div class="fourth"></div>
        </div>

        <div class="five"></div>
        <div class="six"></div>

    </div>
</body>
</html>