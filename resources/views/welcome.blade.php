<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet-test.css" />
    <style>
        body {
            background-image: url("{{ asset('asset/img/bg.jpg') }}");
            background-repeat: repeat;
            margin: 0;
            padding: 0;
            font-family: "Calibri", "Times New Roman", Serif;
        }

        .transbox {
            width: 50%;
            margin: 30px auto;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            padding: 2em;
        }

        .transbox2 {
            width: 50%;
            margin: 30px auto;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 25px;
            padding: 1em 2em;
            overflow: hidden; /* Menambahkan overflow untuk menangani float di dalamnya */
        }

        .transbox2 div {
            float: right;
        }

        /* Style for the navigation links */
        .transbox2 a {
            margin-left: 10px;
            color: #000;
            text-decoration: none;
        }


        .transbox p {
            margin: 30px 40px;
            font-weight: bold;
            color: #000000;
        }

        #minimal_table_for_Master_Evan {
            font-size: 12px;
            font-weight: bold;
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        #minimal_table_for_Master_Evan td {
            color: #000;
            padding: 6px 8px;
            border-bottom: 1px solid #000;
        }
    </style>
    <title>Your Title</title>
</head>

<body>

    <div class="transbox2">
        <div>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <div class="transbox">

        <h2>Header</h2>

        <p>
            Nice paragraph
        </p>

        <h4>Header</h4>

        <ol>
            <li>Blank text</li>
            <li>Blank text</li>
            <li>Blank text</li>
        </ol>

        <form method="post" action="mailto:name@email.com">

            <table id="minimal_table_for_Master_Evan">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <p></p>

            <input type="submit" value="Save" id="save">
        </form>
    </div>

</body>

</html>
