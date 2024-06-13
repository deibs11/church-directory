<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $church->nombre }}</td>
    <td class="">{{ $church->descripcion }}</td>
    <td class="">{{ $church->direccion }}</td>
    <td class="">{{ $church->ciudad }}</td>
    <td class="">{{ $church->estado }}</td>
    <td class="">{{ $church->pais }}</td>
    <td class="">{{ $church->cp }}</td>
    <td class="">{{ $church->status }}</td>
    <td class="">{{ $church->telefono }}</td>
    <td class="">{{ $church->email }}</td>
    
    @if(getCrudConfig('Church')->delete or getCrudConfig('Church')->update)
        <td>

            @if(getCrudConfig('Church')->update && hasPermission(getRouteName().'.church.update', 1, 1, $church))
                <a href="@route(getRouteName().'.church.update', $church->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Church')->delete && hasPermission(getRouteName().'.church.delete', 1, 1, $church))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Church') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Church') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
