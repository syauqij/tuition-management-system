<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Manage Classrooms') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-80">
      <table class="min-w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Course')" />
            <x-table.heading :value="__('Subjects')" />
            <x-table.heading :value="__('Total Classroom')" class="text-center"/>
            <x-table.heading :value="__('Action')" class="text-center"/>
          </tr>
        </thead>
        <tbody>
          @foreach ($courses as $course)
            <tr class="border-b">
              <x-table.cell :value="$loop->index+1" />
              <x-table.cell :value="$course->name" />

              <td colspan="3" class="text-sm">
                @if($course->courseSubjects->isNotEmpty())
                  @foreach ($course->courseSubjects as $courseSubject)
                  <div class="h-12 grid grid-cols-3 gap-4 content-center">
                      <div>{{ $courseSubject->subject->name }}</div>
                      <div class="text-center">{{ $courseSubject->classrooms->count() }}</div>
                      <div class="text-right">
                        <a href="{{ route('classrooms.list', $courseSubject->id) }}">
                          <x-forms.button-primary class="text-xs">
                            {{ __('View') }}
                          </x-forms.button-primary>
                        </a>
                      </div>
                    </div>
                  @endforeach
                @else
                  <div class="flex">
                    <span class="text-red-600 py-2">Subjects Unassigned</span>
                    <div class="flex ml-auto my-1">
                      <a href="{{ route('courses.edit', $course->id)}}">
                        <x-forms.button-primary class="text-xs">
                          {{ __('Edit') }}
                        </x-forms.button-primary>
                      </a>
                    </div>
                  </div>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-content.card>
</x-app-layout>
