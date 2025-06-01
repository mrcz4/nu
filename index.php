<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NU Student Photo Finder</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
      background-color: #050505;
      color: #00ffe7;
      font-family: 'Orbitron', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
      background-image: radial-gradient(circle at top left, #000000, #0f0f0f, #000000);
    }

    h2 {
      font-size: 2.2em;
      margin-top: 20px;
      text-align: center;
      color: #00ffe7;
      text-shadow: 0 0 5px #0ff, 0 0 15px #0ff, 0 0 25px #0ff;
    }

    .input-group {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
    }

    label {
      font-size: 1.1em;
      text-shadow: 0 0 8px #0ff;
    }

    select, input {
      background: #111;
      border: 2px solid #00ffe7;
      color: #00ffe7;
      padding: 10px 14px;
      border-radius: 6px;
      font-size: 1em;
      width: 180px;
      box-shadow: 0 0 10px #00ffe7;
      outline: none;
    }

    button {
      background: transparent;
      border: 2px solid #00ffe7;
      color: #00ffe7;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 1em;
      cursor: pointer;
      transition: all 0.3s ease;
      text-shadow: 0 0 8px #00ffe7;
      box-shadow: 0 0 15px #00ffe7;
    }

    button:hover {
      background-color: #00ffe7;
      color: #000;
      box-shadow: 0 0 25px #00ffe7, 0 0 10px #00ffe7 inset;
    }

    .photo-box {
      margin-top: 40px;
      width: 320px;
      height: 320px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #000;
      border: 4px solid #00ffe7;
      border-radius: 10px;
      box-shadow:
        0 0 25px #00ffe7,
        0 0 40px #00ffe7 inset,
        0 0 5px #00ffe7;
      overflow: hidden;
    }

    .photo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 6px;
      box-shadow: 0 0 20px #00ffe7;
    }

    #errorMsg {
      color: #ff4444;
      text-shadow: 0 0 5px red;
      margin-top: 20px;
      text-align: center;
      font-size: 1em;
    }

    @media (max-width: 480px) {
      .input-group {
        flex-direction: column;
        align-items: center;
      }

      select, input, button {
        width: 100%;
        max-width: 300px;
      }

      .photo-box {
        width: 90vw;
        height: 90vw;
        max-width: 320px;
        max-height: 320px;
      }
    }
  </style>
</head>
<body>

  <h2>NU Student Photo Finder</h2>

  <div class="input-group">
    <label for="season">Season:</label>
    <select id="season">
      <option value="2023-2024">2023-2024</option>
      <option value="2022-2023">2022-2023</option>
      <option value="2021-2022">2021-2022</option>
      <option value="2020-2021">2020-2021</option>
    </select>

    <label for="roll">Roll:</label>
    <input type="text" id="roll" placeholder="e.g., 7047630" pattern="\d*" inputmode="numeric">

    <button onclick="showPhoto()">FIND</button>
  </div>

  <div class="photo-box" id="photoBox"></div>
  <p id="errorMsg"></p>

  <script>
    function showPhoto() {
      const season = document.getElementById("season").value;
      const roll = document.getElementById("roll").value.trim();
      const photoBox = document.getElementById("photoBox");
      const errorMsg = document.getElementById("errorMsg");

      if (!roll) {
        errorMsg.textContent = "Please enter a roll number.";
        photoBox.innerHTML = "";
        return;
      }

      const imgUrl = `http://103.113.202.33/photos/hons/${season}/${roll}.jpg`;
      const img = new Image();
      img.width = 320;
      img.height = 320;

      img.onload = function () {
        photoBox.innerHTML = "";
        errorMsg.textContent = "";
        photoBox.appendChild(img);
      };

      img.onerror = function () {
        photoBox.innerHTML = "";
        errorMsg.textContent = "Photo not found. Please check the roll number and season.";
      };

      img.src = imgUrl;
    }
  </script>

</body>
</html>
