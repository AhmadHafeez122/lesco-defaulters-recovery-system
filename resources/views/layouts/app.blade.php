<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'LESCO EMS')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --bg: #e4e4e4;
            --surface: #ffffff;
            --surface-2: #f0f0f0;
            --text: #333333;
            --muted: #666666;
            --line: #dddddd;
            --primary: #006633;
            --primary-dark: #004d26;
            --danger: #e74c3c;
            --info: #3498db;
            --warning: #f1c40f;
            --success: #2ecc71;
            --purple: #9b59b6;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0; padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 14px;
        }

        .app { display: flex; min-height: 100vh; }

        /* Sidebar Styles */
        .sidebar {
            width: 240px;
            background: var(--primary);
            color: #fff;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            border-right: 2px solid var(--primary-dark);
            overflow-y: auto;
        }

        .brand {
            display: flex; align-items: center; gap: 10px;
            padding: 15px; border-bottom: 1px solid #004d26;
            background: #00592c;
        }

        .brand-logo {
            width: 40px; height: 40px; background: #fff;
            padding: 2px; border: 1px solid #000;
            display: flex; align-items: center; justify-content: center;
            font-weight: bold; color: var(--primary); font-size: 20px;
        }

        .brand-title { font-size: 16px; font-weight: bold; margin: 0; }
        .brand-subtitle { margin: 2px 0 0; font-size: 11px; color: #ccc; }

        .nav { padding: 10px 0; }
        .nav-group-title {
            color: #a3c2b3; font-size: 11px; font-weight: bold;
            text-transform: uppercase; padding: 10px 15px 5px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 15px; color: #e6e6e6; text-decoration: none;
            cursor: pointer; border-left: 4px solid transparent;
        }

        .nav-item:hover, .nav-item.active {
            background: var(--primary-dark); color: #fff; border-left-color: #fff;
        }

        .nav-icon { width: 24px; text-align: center; }

        .sidebar-footer {
            position: absolute; left: 0; right: 0; bottom: 0;
            border-top: 1px solid #004d26; background: var(--primary);
        }

        .logout-btn {
            width: 100%;
            background: transparent;
            border: none;
            text-align: left;
            font-family: inherit;
            font-size: inherit;
            cursor: pointer;
        }

        /* Main Workspace Styles */
        .main {
            margin-left: 240px; width: calc(100% - 240px);
            padding: 20px 30px;
        }

        /* Reusable UI Components */
        .header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 25px; background: var(--surface); padding: 15px 20px;
            border: 1px solid var(--line); border-left: 5px solid var(--primary);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .header h1 { margin: 0 0 5px; font-size: 20px; color: var(--primary-dark); }
        .header p { margin: 0; color: var(--muted); font-size: 13px; }

        .card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .card-header {
            display: flex; justify-content: space-between; align-items: center;
            border-bottom: 1px solid var(--line);
            padding-bottom: 10px; margin-bottom: 15px;
        }

        .card-header h3 { margin: 0; font-size: 16px; color: var(--text); }
    </style>

    @stack('styles')
</head>
<body>
    <div class="app">
        <aside class="sidebar">
            <div class="brand">
                <div><img
        src="{{ asset('images/download.png') }}"
        alt="LESCO Logo"
        style="min-width: 40px; min-height: 50px; width: 50px; height: 50px; object-fit: contain; display: block;"
    ></div>
                <div>
                    <p class="brand-title">LESCO EMS</p>
                    <p class="brand-subtitle">Defaulters Management</p>
                </div>
            </div>

            <nav class="nav">
                <div class="nav-group-title">Analytics & Tracking</div>

                <a href="{{ route('dashboard') }}" style="text-decoration: none;">
                    <div class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <div class="nav-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <span class="nav-text">Dashboard Reports</span>
                    </div>
                </a>

                <a href="/consumers" style="text-decoration: none;">
                    <div class="nav-item {{ request()->is('consumers*') ? 'active' : '' }}">
                        <div class="nav-icon"><i class="fa-solid fa-users-gear"></i></div>
                        <span class="nav-text">Consumers Data</span>
                    </div>
                </a>

                <a href="/exports" style="text-decoration: none;">
                    <div class="nav-item {{ request()->is('exports*') ? 'active' : '' }}">
                        <div class="nav-icon"><i class="fa-solid fa-file-export"></i></div>
                        <span class="nav-text">Export & Generation</span>
                    </div>
                </a>
            </nav>

            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn nav-item">
                        <div class="nav-icon"><i class="fa-solid fa-power-off"></i></div>
                        <span class="nav-text">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
