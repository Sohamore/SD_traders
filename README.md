# ⚡ SD Traders - Electric Toys Store Documentation

Welcome to **SD Traders**, an e-commerce catalog and order management portal for high-quality electric toys for children.

---

## 📌 Table of Contents
1. [Project Overview](#-project-overview)
2. [Directory Structure](#-directory-structure)
3. [Features & Components](#-features--components)
4. [Technology Stack](#-technology-stack)
5. [Prerequisites](#-prerequisites)
6. [How to Run the Project](#-how-to-run-the-project)
   - [1. Web Application & Local Server](#1-web-application--local-server)
   - [2. Python Toy Calculator](#2-python-toy-calculator)
   - [3. C++ Discount System](#3-c-discount-system)
7. [Form Handling Logic](#-form-handling-logic)
8. [Troubleshooting & Gotchas](#-troubleshooting--gotchas)

---

## 🚀 Project Overview

**SD Traders** is designed to showcase electric toys such as Electric Racing Cars, Smart Robots, Remote-Controlled Helicopters, and Electric Bikes. The project consists of:
- A responsive, multi-page frontend website.
- Client-side JavaScript form validation.
- Interactive backend form simulation (orders & customer feedback).
- CLI utility tools written in Python and C++ for calculating order costs, bulk volume discounts, and invoice summaries.

---

## 📁 Directory Structure

```text
sd-traders/
├── css/
│   └── style.css            # Global modern layout & responsive stylesheet
├── js/
│   ├── reviews.js            # Review form validation
│   └── script.js             # Client-side form validation & interactive scripts
├── images/
│   ├── car.jpg               # High-res product image (Electric Racing Car)
│   ├── robot.jpg             # High-res product image (Smart Robot)
│   ├── helicopter.jpg        # High-res product image (RC Helicopter)
│   └── bike.jpg              # High-res product image (Electric Bike)
├── tools/
│   ├── toy_calculator.py     # Python CLI tool for calculating toy order totals
│   ├── toy_discount.cpp      # C++ source code for tiered discount calculation
│   └── toy_discount.exe      # Compiled C++ executable
├── about.html                # About Us & store background page
├── contact.php               # Store contact info & location details
├── feedback.php              # Customer review & rating form page
├── gallery.html              # Interactive photo gallery showcase
├── index.html                # Homepage with hero section & featured products
├── order.php                 # Toy order placement form page
├── products.html             # Full product catalog & price list
├── reviews.html              # Legacy customer reviews page
├── server.py                 # Custom Python development server with POST handling
└── README.md                 # Complete project documentation
```

---

## 🛠️ Features & Components

### 🌐 Web Pages
- **Home (`index.html`)**: Features a banner with navigation links, store summary, and interactive cards for top toy categories.
- **Products (`products.html`)**: Complete product catalog listing prices in INR (`₹`), product descriptions, and instant order buttons.
- **Gallery (`gallery.html`)**: Visual showcase featuring high-res imagery for electric cars, robots, helicopters, and bikes.
- **About Us (`about.html`)**: Highlights the brand history, mission statement, and key customer guarantees.
- **Order Form (`order.php`)**: Interactive form allowing customers to select a product, choose quantities (1–10), enter contact details, and submit orders.
- **Feedback Form (`feedback.php`)**: Customer review portal with 1–5 star rating selection and message submission.
- **Contact Page (`contact.php`)**: Displays address details, customer support phone number, and support email.

### 🐍 Python Utilities
- **Development Server (`server.py`)**:
  - Serves static assets (HTML, CSS, JS, Images).
  - Simulates PHP form handling for `order.php` and `feedback.php` without requiring a separate PHP installation.
  - Automatically handles port binding with automatic fallback (`8000`, `8001`, etc.) to prevent socket errors (`WinError 10048`).
- **Toy Calculator (`tools/toy_calculator.py`)**:
  - Interactive terminal menu for product selection.
  - Automatic calculation of subtotal, quantity multipliers, and 10% bulk discount for orders ≥ Rs. 3,000.

### ⚡ C++ Utility Tool
- **Discount Calculator (`tools/toy_discount.cpp` / `tools/toy_discount.exe`)**:
  - Console application providing tiered discount rules:
    - **≥ Rs. 5,000**: 15% discount
    - **≥ Rs. 3,000**: 10% discount
    - **≥ Rs. 1,500**: 5% discount
    - **< Rs. 1,500**: 0% discount

---

## 💻 Technology Stack

- **Frontend**: HTML5, CSS3 (Flexbox/Grid), Vanilla JavaScript (ES6)
- **Backend / Web Server**: Python 3.11 (`http.server` & `socketserver`)
- **CLI Utilities**: Python 3.11, C++ (GCC 6.3 / MinGW)

---

## 📋 Prerequisites

To run all parts of this project, ensure you have:
1. **Python 3.x** installed (for `server.py` and `tools/toy_calculator.py`).
2. **Any Web Browser** (Chrome, Edge, Firefox, Safari).
3. *(Optional)* **g++ / MinGW** if you wish to recompile the C++ tool (`tools/toy_discount.cpp`).

---

## 🚀 How to Run the Project

### 1. Web Application & Local Server

To view the website in your browser:
```powershell
python server.py
```

Output:
```text
SD Traders Dev Server running at http://localhost:8000
Press Ctrl+C to stop the server.
```

Open your browser and navigate to:
👉 **`http://localhost:8000`**

---

### 2. Python Toy Calculator

To run the interactive item & discount calculator:
```powershell
python tools/toy_calculator.py
```

**Example Run:**
```text
================================
       SD TRADERS
  ELECTRIC TOY CALCULATOR
================================
1. Electric Racing Car - Rs. 1499
2. Smart Robot         - Rs. 999
3. RC Helicopter       - Rs. 1799
4. Electric Bike        - Rs. 2499
5. RC Drift Car        - Rs. 650
6. Dancing Frog        - Rs. 410

Enter product number: 3
Enter quantity: 9

Quantity: 9
Total Amount: Rs. 16191.00
Discount (10%): Rs. 1619.10
Final Amount: Rs. 14571.90
```

---

### 3. C++ Discount System

To calculate purchase discounts based on total bill amount:
```powershell
.\tools\toy_discount.exe
```

**To recompile from source:**
```powershell
g++ tools/toy_discount.cpp -o tools/toy_discount.exe
```

---

## 🔄 Form Handling Logic

- **Client-Side Validation (`js/script.js`)**:
  Before submitting orders, `validateOrder()` ensures that:
  - The customer's name is not empty.
  - The email field is filled.
  - Quantity is at least 1.
- **Server-Side Simulation (`server.py`)**:
  When form POST requests are sent to `order.php` or `feedback.php`, `server.py` parses the form payload and dynamically renders a styled receipt confirmation message.

---

## 💡 Troubleshooting & Gotchas

| Issue | Cause | Solution |
| :--- | :--- | :--- |
| `WinError 10048` | Port 8000 is already in use by another instance. | `server.py` now automatically binds to the next free port (`8001`, `8002`, etc.). |
| `UnicodeEncodeError` in terminal | Windows cmd/PowerShell default output encoding (`cp1252`). | Reconfigured Python stdout encoding to UTF-8 and updated currency labels to `Rs.`. |
| Broken Images in Gallery | Missing `images/` directory. | High-quality imagery generated and placed in `images/`. |
