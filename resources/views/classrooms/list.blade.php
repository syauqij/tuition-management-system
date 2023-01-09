<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-lg text-gray-800 leading-tight truncate">
      {{ __('Manage Classrooms > ') .
        $courseSubject->course->name . ' > ' .
        $courseSubject->subject->name }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-2">
      @if (auth()->user()->role == 'admin' ||
        auth()->user()->role == 'teacher')
      <div class="pb-2">
        <a href="{{ route('classrooms.create', [
            'courseSubjectId' => $courseSubject->id
          ]) }}">
          <x-forms.button-primary>
            {{ __('Create') }}
          </x-forms.button-primary>
        </a>
      </div>
      @endif
      <table class="w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Class Name')" />
            <x-table.heading :value="__('School Grade')" />
            <x-table.heading :value="__('Room No')" />
            <x-table.heading :value="__('Teacher')" />
            <x-table.heading :value="__('Total Students')" class="text-center"/>
            <x-table.heading :value="__('Action')" class="text-center"/>
          </tr>
        </thead>
        <tbody>
          @if($classrooms->isEmpty())
              <tr>
                <x-table.cell :value="__('No classroom records found. Please create at least one.')"
                  colspan="6" class="text-lg text-red-500 font-semibold text-center" />
              </tr>
          @endif
          @foreach ($classrooms as $class)
            <tr class="border-b">
              <x-table.cell :value="($classrooms->currentPage() - 1) * $classrooms->perPage() + $loop->iteration" />
              <x-table.cell :value="$class->name" />
              <x-table.cell :value="$class->schoolGrade->name" />
              <x-table.cell :value="$class->room_no" />
              <x-table.cell :value="$class->teacher->fullName" />
              <x-table.cell :value="$class->class_students_count" class="text-center"/>
              <td>
                <div class="flex justify-center">
                <a href="{{ route('classrooms.edit', $class->id)}}">
                  <x-forms.button-primary class="text-xs">
                    {{ __('Edit') }}
                  </x-forms.button-primary>
                </a>

                @if ($class->classStudents->count() == 0)
                  <form method="post" action="{{route('classrooms.destroy',$class->id)}}">
                    @method('delete')
                    @csrf
                      <x-forms.button-primary class="text-xs">
                        {{ __('Delete') }}
                      </x-forms.button-primary>
                  </form>
                @endif
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="pt-4">
        {{ $classrooms->links() }}
      </div>
    </div>
  </x-content.card>
</x-app-layout>
