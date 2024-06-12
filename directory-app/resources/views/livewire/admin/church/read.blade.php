<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Church')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Church')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Church')->create && hasPermission(getRouteName().'.church.create', 1, 1))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.church.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Church') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Church')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('nombre')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'nombre') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'nombre') fa-sort-amount-up ml-2 @endif'></i> {{ __('Nombre') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('descripcion')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'descripcion') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'descripcion') fa-sort-amount-up ml-2 @endif'></i> {{ __('Descripcion') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('direccion')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'direccion') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'direccion') fa-sort-amount-up ml-2 @endif'></i> {{ __('Direccion') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ciudad')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ciudad') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ciudad') fa-sort-amount-up ml-2 @endif'></i> {{ __('Ciudad') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('estado')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'estado') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'estado') fa-sort-amount-up ml-2 @endif'></i> {{ __('Estado') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('pais')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'pais') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'pais') fa-sort-amount-up ml-2 @endif'></i> {{ __('Pais') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('cp')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'cp') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'cp') fa-sort-amount-up ml-2 @endif'></i> {{ __('Cp') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('status')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'status') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'status') fa-sort-amount-up ml-2 @endif'></i> {{ __('Status') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('telefono')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'telefono') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'telefono') fa-sort-amount-up ml-2 @endif'></i> {{ __('Telefono') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('email')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'email') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'email') fa-sort-amount-up ml-2 @endif'></i> {{ __('Email') }} </th>
                            
                            @if(getCrudConfig('Church')->delete or getCrudConfig('Church')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($churchs as $church)
                            @livewire('admin.church.single', [$church], key($church->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $churchs->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
