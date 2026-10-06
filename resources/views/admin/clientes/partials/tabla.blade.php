<div class="admin-table-wrapper">

    <div class="table-responsive">

        <table class="table admin-table">

            <thead>

                <tr>

                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Zona</th>
                    <th>Compras</th>
                    <th class="text-end">Acciones</th>

                </tr>

            </thead>


            <tbody>

                @forelse ($clientes as $cliente)

                    <tr>

                        <td>

                            <strong>
                                {{ $cliente->nombre }}
                                {{ $cliente->apellido }}
                            </strong>

                        </td>


                        <td>
                            {{ $cliente->telefono }}
                        </td>


                        <td>
                            {{ $cliente->direccion }}
                        </td>


                        <td>

                            <span class="admin-badge admin-badge-blue">

                                {{ $cliente->zona }}

                            </span>

                        </td>


                        <td>
                            {{ $cliente->compras_realizadas }}
                        </td>


                        <td class="text-end">

                            <a
                                href="{{ route('cliente.edit', $cliente->id) }}"
                                class="admin-action admin-action-edit"
                                title="Editar">

                                <i class="fa-solid fa-pen"></i>

                            </a>


                            <form
                                action="{{ route('cliente.destroy', $cliente->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="admin-action admin-action-delete"
                                    title="Eliminar">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-5">

                            <div class="text-muted">

                                <i class="fa-solid fa-users-slash fs-2 mb-3"></i>

                                <div>
                                    No se encontraron clientes.
                                </div>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- PAGINACIÓN --}}

    @if ($clientes->hasPages())

        <div class="d-flex justify-content-center py-4">

            <nav aria-label="Paginación">

                <ul class="pagination mb-0">

                    @if ($clientes->onFirstPage())

                        <li class="page-item disabled">

                            <span class="page-link">
                                ‹
                            </span>

                        </li>

                    @else

                        <li class="page-item">

                            <a
                                class="page-link"
                                href="{{ $clientes->previousPageUrl() }}">

                                ‹

                            </a>

                        </li>

                    @endif


                    @foreach ($clientes->getUrlRange(1, $clientes->lastPage()) as $page => $url)

                        <li class="page-item
                            {{ $page == $clientes->currentPage() ? 'active' : '' }}">

                            <a
                                class="page-link"
                                href="{{ $url }}">

                                {{ $page }}

                            </a>

                        </li>

                    @endforeach


                    @if ($clientes->hasMorePages())

                        <li class="page-item">

                            <a
                                class="page-link"
                                href="{{ $clientes->nextPageUrl() }}">

                                ›

                            </a>

                        </li>

                    @else

                        <li class="page-item disabled">

                            <span class="page-link">
                                ›
                            </span>

                        </li>

                    @endif

                </ul>

            </nav>

        </div>

    @endif

</div>