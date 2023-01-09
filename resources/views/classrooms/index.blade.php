<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Manage Classrooms') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-4">
      <form method="get" action="{{ route('classrooms.search') }}">
        <x-forms.search-input  name="keywords" value="{{ $keywords ?? null }}"
          position="justify-left" class="xl:w-7/12" marginBtm='mb-2'
          placeholder="Enter a course or subject name"/>
          <div class="form-check">
            <x-forms.checkbox-input type="checkbox" name="subject_only" value="1"
              :selected="$subjectOnly ?? old('subject_only')" />

            <label class="form-check-label inline-block">
              Subjects Only
            </label>
          </div>
      </form>
      <table class="min-w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Course')" />
            <x-table.heading :value="__('Total Enrolments')" class="text-center"/>
            <x-table.heading :value="__('Subjects')" />
            <x-table.heading :value="__('Total Classroom')" class="text-center"/>
            <x-table.heading :value="__('Action')" class="text-right"/>
          </tr>
        </thead>
        <tbody>
          @foreach ($courses as $course)
            <tr class="border-b">
              <x-table.cell :value="($courses->currentPage() - 1) * $courses->perPage() + $loop->iteration" />
              <x-table.cell :value="$course->name" />
              <x-table.cell :value="$course->enrolments_count" class="text-center"/>

              <td colspan="3" class="text-sm">
                @if($course->courseSubjects->isNotEmpty())
                  @foreach ($course->courseSubjects as $courseSubject)

                    @if (!empty($courseSubject->subject->name ))
                    <div class="h-12 grid grid-cols-3 gap-4 content-center border-b">
                      <div>{{ $courseSubject->subject->name }}</div>
                      <div class="text-center">{{ $courseSubject->classrooms->count() }}</div>
                      <div class="text-right">
                        @if (auth()->user()->role == 'admin' ||
                            auth()->user()->role == 'teacher')
                          <a href="{{ route('classrooms.create', [
                              'courseSubjectId' => $courseSubject->id
                            ]) }}">
                            <x-forms.button-primary class="text-xs">
                              {{ __('Create') }}
                            </x-forms.button-primary>
                          </a>
                        @endif
                        <a href="{{ route('classrooms.list', $courseSubject->id) }}">
                          <x-forms.button-secondary class="text-xs">
                            {{ __('View') }}
                          </x-forms.button-secondary>
                        </a>
                      </div>
                    </div>
                    @endif
                  @endforeach
                @else
                  <div class="h-12 grid grid-cols-2 gap-4 content-center">
                    <span class="text-red-600 py-2">Subjects Unassigned</span>
                    <div class="text-right">
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
      <div class="pt-4">
        {{ $courses->links() }}
      </div>
    </div>
  </x-content.card>
</x-app-layout>
