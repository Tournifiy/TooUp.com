<?php
// এটা শুধু PHP ফাইল হিসাবে কাজ করার জন্য ব্যবহৃত হচ্ছে।
// এখানে কোনো server-side প্রক্রিয়া হচ্ছে না, সব JavaScript দিয়ে।
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Top-Up Shop</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #0f172a;
      color: white;
    }
    header {
      background: #1e293b;
      padding: 20px;
      text-align: center;
    }
    header h1 {
      margin: 0;
      color: #facc15;
    }
    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 15px;
      padding: 20px;
    }
    .product {
      background: #334155;
      padding: 15px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }
    .product h3 {
      margin: 10px 0;
      color: #38bdf8;
    }
    .product p {
      margin: 5px 0;
      color: #cbd5e1;
    }
    .product input {
      width: 90%;
      padding: 8px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
    }
    .product button {
      padding: 10px;
      background: #10b981;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    .product button:hover {
      background: #059669;
    }
    footer {
      background: #1e293b;
      color: #94a3b8;
      text-align: center;
      padding: 15px;
      margin-top: 30px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Diamond & Subscription Shop</h1>
  </header>

  <div class="container" id="productContainer">
    <!-- Products will be added by JS -->
  </div>

  <footer>
    © Ahmed Rabby
  </footer>

  <script>
    const products = [
      { name: "25 Diamonds", price: "30 Tk" },
      { name: "50 Diamonds", price: "50 Tk" },
      { name: "115 Diamonds", price: "85 Tk" },
      { name: "240 Diamonds", price: "185 Tk" },
      { name: "610 Diamonds", price: "420 Tk" },
      { name: "1240 Diamonds", price: "820 Tk" },
      { name: "2530 Diamonds", price: "1610 Tk" },
      { name: "Weekly Membership", price: "175 Tk" },
      { name: "Monthly Membership", price: "850 Tk" },
      { name: "Weekly Lite", price: "45 Tk" },
      { name: "Level Up Pass", price: "165 Tk" },
      { name: "YouTube Premium (1 Month)", price: "150 Tk" },
      { name: "Canva Pro (1 Year)", price: "180 Tk" },
      { name: "Amazon Prime (3 Months)", price: "480 Tk" },
      { name: "Netflix (1 Month)", price: "400 Tk" },
      { name: "Netflix + Prime Combo", price: "580 Tk" }
    ];

    const productContainer = document.getElementById('productContainer');

    products.forEach((product, index) => {
      const div = document.createElement('div');
      div.classList.add('product');
      div.innerHTML = `
        <h3>${product.name}</h3>
        <p>Price: ${product.price}</p>
        <input type="text" id="userInput${index}" placeholder="Enter your ID / Number">
        <button onclick="buyNow('${product.name}', '${product.price}', 'userInput${index}')">Buy Now</button>
      `;
      productContainer.appendChild(div);
    });

    function buyNow(name, price, inputId) {
      const userInput = document.getElementById(inputId).value.trim();
      if (!userInput) {
        alert("Please enter your ID / Number first.");
        return;
      }

      const message = `Order Details:
Product: ${name}
Price: ${price}
User Info: ${userInput}`;

      const encodedMessage = encodeURIComponent(message);
      const whatsappURL = `https://wa.me/8801819441618?text=${encodedMessage}`;
      window.open(whatsappURL, '_blank');
    }
  </script>

</body>
</html>