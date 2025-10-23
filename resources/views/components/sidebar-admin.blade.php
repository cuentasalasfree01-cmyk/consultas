<div class="list-group">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
    <a href="{{ route('clients.index') }}" class="list-group-item list-group-item-action">Clientes</a>
    <a href="{{ route('procedures.index') }}" class="list-group-item list-group-item-action">Trámites</a>
    <a href="{{ route('custom-fields.index') }}" class="list-group-item list-group-item-action">Campos personalizados</a>
    <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">Mi perfil</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-2">
        @csrf
        <button class="btn btn-outline-danger btn-block">Cerrar sesión</button>
    </form>
</div>
