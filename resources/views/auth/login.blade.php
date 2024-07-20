<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Login Page | sL Code Hub</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
        :root {
            --primary-color: #2015ea;
            --primary-color-light: #6861f1;
            --secondary-color: #c0dbea;
            --text-dark: #020617;
            --text-light: #94a3b8;
            --white: #ffffff;
            --max-width: 1200px;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
        }

        .container {
            min-height: 100vh;
            padding-inline: 1rem;
            display: grid;
            overflow: hidden;
        }

        .containerContent {
            width: 100%;
            padding-block: 2rem;
            max-width: 400px;
            margin-inline: auto;
        }

        .containerContent h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .containerContent h1 {
            margin-bottom: 1rem;
            font-size: 3rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .containerContent form {
            display: grid;
            gap: 5px;
        }

        .containerContent label {
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .inputRow {
            margin-bottom: 1rem;
            width: 100%;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            background-color: var(--secondary-color);
            border-radius: 5px;
        }

        .containerContent input {
            width: 100%;
            outline: none;
            border: none;
            font-size: 1rem;
            color: var(--text-dark);
            background-color: transparent;
        }

        .containerContent input::placeholder {
            color: var(--text-dark);
        }

        #password-eye {
            color: var(--primary-color);
        }

        .inputFP {
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .inputFP a {
            font-size: 0.9rem;
            color: var(--text-light);
            text-decoration: none;
            transition: 0.3s;
        }

        .inputFP a:hover {
            color: var(--text-dark);
        }

        .containerContent button {
            max-width: 80%;
            margin-left: 10%;
            margin-block: 1rem 2rem;
            padding: 0.75rem 2rem;
            outline: none;
            border: none;
            font-size: 1rem;
            color: var(--white);
            background-color: var(--primary-color);
            border-radius: 5rem;
        }

        .containerContent button:hover {
            background-color: var(--primary-color-light);
        }

        .containerContent h6 {
            margin-bottom: 2rem;
            font-size: 1rem;
            font-weight: 400;
            color: var(--text-dark);
            text-align: center;
        }

        .logins {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .logins a {
            padding: 0.5rem 2.5rem;
            border: 2px solid var(--text-dark);
            border-radius: 5rem;
        }

        .logins a:hover {
            background: var(--secondary-color);
            border: 2px solid var(--primary-color);
        }

        .logins img {
            display: flex;
            max-width: 20px;
        }

        .containerContent p {
            color: var(--text-light);
            text-align: center;
        }

        .containerContent p a {
            text-decoration: none;
            font-weight: 500;
            color: var(--primary-color);
        }

        .containerImg {
            position: relative;
            isolation: isolate;
            display: grid;
        }

        .containerImg::before {
            position: absolute;
            content: "";
            top: 0;
            left: 10rem;
            height: 100%;
            width: 100vw;
            background-color: var(--secondary-color);
            border-top-left-radius: 2rem;
            border-bottom-left-radius: 2rem;
            z-index: -1;
        }

        .containerImg img {
            width: 100%;
            max-width: 600px;
            align-self: flex-end;
        }

        @media (width > 768px) {
            .container {
                grid-template-columns:
                    minmax(1rem, 1fr) minmax(0, calc(var(--max-width) / 2)) minmax(0, calc(var(--max-width) / 2)) minmax(1rem, 1fr);
            }

            .containerContent {
                margin-inline-start: unset;
                grid-area: 1/2/2/3;
                align-self: center;
            }

            .containerImg {
                padding-block: 2rem;
                grid-area: 1/3/2/4;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="containerContent">
            <h3>Welcome back!</h3>
            <h1>Log In</h1>
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <label for="email">Email</label>
                <div class="inputRow">
                    <input type="email" id="email" name="email" placeholder="Enter your Email" required />
                </div>
                <label for="password">Password</label>
                <div class="inputRow">
                    <input type="password" id="password" name="password" placeholder="Enter your Password" required />
                    <span id="password-eye"><i class="ri-eye-off-line"></i></span>
                </div>
                <div class="inputFP">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit">LOGIN</button>
            </form>
            <h6>Or continue with</h6>
            <div class="logins">
                <a href="#"><img src="img/search.png" alt="google" /></a>
                <a href="#"><img src="img/github.png" alt="github" /></a>
                <a href="#"><img src="img/facebook.png" alt="facebook" /></a>
            </div>
            <p>Don't have an account yet? <a href="#">Sign up</a></p>
        </div>
        <div class="containerImg">
            <img src="img/1.png" alt="header" />
        </div>
    </div>

    <script>
        const passwordBtn = document.getElementById("password-eye");

        passwordBtn.addEventListener("click", (e) => {
            const passwordInput = document.getElementById("password");
            const icon = passwordBtn.querySelector("i");
            const isVisible = icon.classList.contains("ri-eye-line");
            passwordInput.type = isVisible ? "password" : "text";
            icon.setAttribute("class", isVisible ? "ri-eye-off-line" : "ri-eye-line");
        });
    </script>
</body>
</html>
