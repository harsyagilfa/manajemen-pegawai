<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error - Page Not Found</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #ff6b6b, #ff6b6b);
      color: #fff;
      text-align: center;
    }

    .error-container {
      background: rgba(0, 0, 0, 0.7);
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
      max-width: 400px;
      width: 100%;
      transition: all 0.3s ease;
    }

    .error-container:hover {
      transform: scale(1.02);
      box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.3);
    }

    .error-title {
      font-size: 5rem;
      font-weight: bold;
      color: #ff6b6b;
      margin-bottom: 20px;
    }

    .error-message {
      font-size: 1.25rem;
      color: #e1e1e1;
      margin-bottom: 20px;
    }

    .error-description {
      font-size: 1rem;
      color: #cccccc;
      margin-bottom: 30px;
    }

    .back-button {
      padding: 10px 20px;
      font-size: 1rem;
      color: #4a90e2;
      background-color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .back-button:hover {
      background-color: #ff6b6b;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="error-container">
    <div class="error-title">404</div>
    <p class="error-message">Error</p>
    <p class="error-description">Mohon maaf,halaman ini tidak bisa diakses</p>
    <a href="login" class="back-button">Go to Homepage</a>
  </div>
</body>
</html>
