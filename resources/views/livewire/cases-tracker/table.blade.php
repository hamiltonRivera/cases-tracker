<div class="relative overflow-x-auto">
    <table class="table">
        <thead class="table-thead">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Cases per day</th>
                <th scope="col" class="px-6 py-3">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cases as $case)
              <tr class="tr">
                <td class="td">{{ $loop->iteration }}) </td>
                <td class="td">{{ $case->date }} </td>
                <td class="td">{{ $case->count_per_day }} </td>
                <td class="td">
                    <button type="button" class="green-bottom" wire:click="edit({{ $case->id }})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button type="button" class="rose-bottom" wire:click="destroy({{ $case->id }})" wire:confirm="Seguro que deseas eliminar el registro?">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
              </tr>
            @endforeach

        </tbody>
    </table>
    <div class=" flex justify-left">
        <nav aria-label="Page navigation example">
          <ul class="flex list-style-none">
            <li class="page-item disabled ">
              {{ $cases->links() }}
            </li>
          </ul>
        </nav>
      </div>
</div>
