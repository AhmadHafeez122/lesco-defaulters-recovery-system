<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LESCO EMS - Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #e4e4e4;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Simplified Header */
        .header {
            background-color: #006633; /* Classic LESCO Green */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid #004d26;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-box {
            background: white;
            padding: 5px;
            border: 1px solid #000;
            width: 50px;
            height: 50px;
            text-align: center;
        }

        .logo-box img {
            max-width: 100%;
            max-height: 100%;
        }

        .title-block h1 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        .title-block p {
            margin: 2px 0 0 0;
            font-size: 11px;
            color: #ccffcc;
            font-weight: bold;
        }

        .auth-actions a {
            text-decoration: none;
            color: #333;
            background: #f0f0f0;
            border: 1px solid #999;
            padding: 8px 16px;
            font-weight: bold;
            font-size: 13px;
            margin-left: 10px;
            cursor: pointer;
        }

        .auth-actions a:hover {
            background: #e0e0e0;
        }

        .auth-actions a.btn-primary {
            background: #003399; /* Standard Blue */
            color: white;
            border-color: #002266;
        }

        .auth-actions a.btn-primary:hover {
            background: #002266;
        }

        /* Main Content */
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border: 1px solid #ccc;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            flex: 1;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .welcome-message h2 {
            color: #006633;
            margin: 0 0 10px 0;
            font-size: 24px;
        }

        .welcome-message p {
            color: #666;
            margin: 0;
            font-size: 14px;
        }

        /* Services Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            border: 1px solid #b3b3b3;
            padding: 25px;
            background: #fafafa;
            text-align: center;
            text-decoration: none;
            color: #333;
            display: block;
            transition: all 0.2s ease;
        }

        .card:hover {
            background: #e6f2ec;
            border-color: #006633;
        }

        .card i {
            font-size: 36px;
            color: #006633;
            margin-bottom: 15px;
        }

        .card h3 {
            margin: 0 0 10px 0;
            font-size: 18px;
            color: #003399;
        }

        .card p {
            margin: 0;
            font-size: 13px;
            color: #555;
            line-height: 1.4;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #666;
            background: white;
            border-top: 1px solid #ccc;
            margin-top: auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .grid { grid-template-columns: 1fr; }
            .header { flex-direction: column; gap: 15px; text-align: center; }
            .header-left { flex-direction: column; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="header-left">
            <div class="logo-box">
                <img src="{{ asset('images/lesco.png') }}" alt="LESCO" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 50 50\'><rect width=\'50\' height=\'50\' fill=\'%23006633\'/><text x=\'50%\' y=\'50%\' fill=\'white\' font-size=\'14\' text-anchor=\'middle\' dy=\'.3em\'>L</text></svg>'">
            </div>
            <div class="title-block">
                <h1>Lahore Electric Supply Company</h1>
                <p>EMPLOYEE MANAGEMENT PORTAL</p>
            </div>
        </div>
        <div class="auth-actions">
            <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            <a href="{{ route('register') }}" class="btn-primary"><i class="fa-solid fa-user-plus"></i> Register</a>
        </div>
    </header>

    <main class="container">
        <div class="welcome-message">
            <h2>Welcome to LESCO EMS Portal Services</h2>
            <p>Please select a module below or log in to access secure system functions.</p>
        </div>

        <div class="grid">
            <a href="{{ route('login') }}" class="card">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <h3>Customer Bill</h3>
                <p>Generate, review, and verify consumer electricity bills securely.</p>
            </a>

            <a href="{{ route('login') }}" class="card">
                <i class="fa-solid fa-triangle-exclamation" style="color: #cc0000;"></i>
                <h3 style="color: #cc0000;">Complaints Registration</h3>
                <p>Track technical faults, power outages, and emergency service tickets.</p>
            </a>

            <a href="{{ route('login') }}" class="card">
                <i class="fa-solid fa-bolt"></i>
                <h3>New Connections</h3>
                <p>Process applications for industrial, commercial, and residential logs.</p>
            </a>

            <a href="{{ route('login') }}" class="card">
                <i class="fa-solid fa-id-card"></i>
                <h3>CNIC Registration</h3>
                <p>Maintain profile identity and update consumer reference numbers.</p>
            </a>
        </div>
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} LESCO IT Infrastructure Core. Authorized WAPDA Personnel Only.
    </footer>

</body>
</html>
