<div class="list-group">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
    <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">Mi perfil</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-2">
        @csrf
        <button class="btn btn-outline-danger btn-block">Cerrar sesión</button>
    </form>
</div>
