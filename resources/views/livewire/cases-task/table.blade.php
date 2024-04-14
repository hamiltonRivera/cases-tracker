<div class="relative overflow-x-auto">
    <table class="table">
        <thead class="table-thead">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Admin</th>
                <th scope="col" class="px-6 py-3">Case #</th>
                <th scope="col" class="px-6 py-3">Comment</th>
                <th scope="col" class="px-6 py-3">Case Status</th>
                <th scope="col" class="px-6 py-3">priority</th>
                <th scope="col" class="px-6 py-3">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cases as $case)
              <tr class="tr">
                <td class="td">{{ $loop->iteration }}) </td>
                <td class="td">{{ $case->date }} </td>
                <td class="td">{{ $case->admin }} </td>
                <td class="td">{{ $case->case_number }} </td>
                <td class="td">{{ $case->comment }} </td>
                @if ($case->task_status == 'Pending')
                <td class="td" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert""><i class="fa-solid fa-ban"></i> {{ $case->task_status}} </td>
                @else
                <td class="td" class=""><i class="fa-solid fa-check"></i> {{ $case->task_status}} </td>
                @endif
                <td class="td">{{ $case->priority }} </td>
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
