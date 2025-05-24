<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login & Signup Page</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #a1c4fd, #c2e9fb);
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }
    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 1rem;
    }
    .tab {
      padding: 0.5rem 1rem;
      cursor: pointer;
      border: none;
      background: #e0e0e0;
      margin: 0 0.25rem;
      border-radius: 0.5rem;
    }
    .tab.active {
      background: #4f46e5;
      color: white;
    }
    .form {
      display: none;
    }
    .form.active {
      display: block;
    }
    input {
      width: 100%;
      padding: 0.75rem;
      margin: 0.5rem 0;
      border: 1px solid #ccc;
      border-radius: 0.5rem;
    }
    button {
      width: 100%;
      padding: 0.75rem;
      border: none;
      background: #4f46e5;
      color: white;
      border-radius: 0.5rem;
      cursor: pointer;
      margin-top: 1rem;
    }
    button:hover {
      background: #4338ca;
    }
    .message {
      text-align: center;
      margin-top: 1rem;
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="tabs">
      <button class="tab active" onclick="showForm('login')">Login</button>
      <button class="tab" onclick="showForm('signup')">Signup</button>
    </div>

    <div id="login" class="form active">
      <h2>Login</h2>
      <input type="text" placeholder="Username" id="loginUsername" />
      <input type="password" placeholder="Password" id="loginPassword" />
      <button onclick="login()">Login</button>
      <div id="loginMessage" class="message"></div>
    </div>

    <div id="signup" class="form">
      <h2>Signup</h2>
      <input type="text" placeholder="Full Name" id="signupName" />
      <input type="number" placeholder="Age" id="signupAge" />
      <input type="email" placeholder="Email (Username)" id="signupEmail" />
      <input type="password" placeholder="Password" id="signupPassword" />
      <button onclick="signup()">Sign Up</button>
      <div id="signupMessage" class="message"></div>
    </div>
  </div>

  <script>
    function showForm(formId) {
      document.querySelectorAll('.form').forEach(f => f.classList.remove('active'));
      document.getElementById(formId).classList.add('active');

      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      const activeTab = [...document.querySelectorAll('.tab')].find(tab =>
        tab.textContent.toLowerCase() === formId
      );
      if (activeTab) activeTab.classList.add('active');
    }

    const users = {};

    function login() {
      const username = document.getElementById('loginUsername').value;
      const password = document.getElementById('loginPassword').value;
      const message = document.getElementById('loginMessage');

      if (users[username] && users[username].password === password) {
        message.textContent = 'Login successful!';
        message.style.color = 'green';
      } else {
        message.textContent = 'Invalid credentials';
        message.style.color = 'red';
      }
    }

    function signup() {
      const name = document.getElementById('signupName').value;
      const age = document.getElementById('signupAge').value;
      const email = document.getElementById('signupEmail').value;
      const password = document.getElementById('signupPassword').value;
      const message = document.getElementById('signupMessage');

      if (!name || !age || !email || !password) {
        message.textContent = 'Please fill in all fields';
        message.style.color = 'red';
        return;
      }

      users[email] = { name, age, password };
      message.textContent = 'Signup successful! You can now login.';
      message.style.color = 'green';
    }
  </script>
</body>
</html>
