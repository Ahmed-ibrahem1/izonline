<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ Route::is("admin.$name.*")?'active':'' }}">
    <a class="nav-link collapsed"
       href="#"
       data-toggle="collapse"
       data-target="#collapse-{{ $name }}">
        <i class="fas fa-fw {{ $icon }}"></i>
        <span>{{ ucfirst($name) }}</span>
    </a>
    <div id="collapse-{{ $name }}"
         class="collapse {{ Route::is("admin.$name.*")?'show':'' }}">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::is(["admin.$name.index","admin.$name.show","admin.$name.edit"])?'active':'' }}"
               href="{{ route("admin.$name.index") }}">View {{ ucfirst($name) }}</a>
            <a class="collapse-item {{ Route::is("admin.$name.create")?'active':'' }}"
               href="{{ route("admin.$name.create") }}">Add {{ ucfirst($name) }}</a>
        </div>
    </div>
</li>