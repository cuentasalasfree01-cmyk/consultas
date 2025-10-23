<!DOCTYPE html>
<html lang="es">

<head>


    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: #f2f3fa;
        }

        .sidebar {
            min-height: 100vh;
            height: 100vh;
            background: linear-gradient(135deg, #222257 60%, #706eed 100%);
            color: #fff;
            position: fixed;
            width: 240px;
            left: 0;
            top: 0;
            padding: 0;
            border-top-right-radius: 24px;
            border-bottom-right-radius: 24px;
            box-shadow: 2px 0 14px #0002;
        }

        .sidebar .profile-circle {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: #fff3;
            font-size: 2.5rem;
            margin: 28px auto 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            font-size: 1.08rem;
            border-radius: 12px;
            margin-bottom: 6px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: #675eed;
            color: #fff;
        }

        .sidebar .nav-link i {
            width: 22px;
            display: inline-block;
            text-align: center;
            font-size: 1.2rem;
        }

        .main-content {
            margin-left: 240px;
            padding: 36px 48px 24px 48px;
        }

        @media(max-width: 900px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-radius: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 18px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar izquierdo -->
    <div class="sidebar p-4">
        <div class="mb-4 text-center">
            <div class="avatar mb-2">
                <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
            </div>
            <div><strong>{{ Auth::user()->name }}</strong></div>
            <div class="small text-muted">{{ Auth::user()->email }}</div>
        </div>

        <!-- Botón logout debajo del usuario -->
        <div class="mb-4 text-center">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link text-danger p-0" style="text-decoration: underline;">
                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                </button>
            </form>
        </div>

        <!-- Menú por rol -->
        <ul class="nav flex-column">
            @role('admin')
                <li><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                <li><a href="{{ route('clients.index') }}" class="nav-link">Clientes</a></li>
                <li><a href="{{ route('clients.create') }}" class="nav-link">Nuevo cliente</a></li>
                <!-- otros enlaces exclusivos de admin -->
                @elserole('cliente')
                <li><a href="{{ route('profile') }}" class="nav-link">Mi perfil</a></li>
                <!-- agrega menús solo para clientes -->
            @endrole
        </ul>
    </div>

</body>

</html>
