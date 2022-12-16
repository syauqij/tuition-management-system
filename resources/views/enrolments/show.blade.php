<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Course Enrolment') }}
    </h2>
  </x-slot>
  <div>
    <div class="grid md:grid-cols-3 gap-4">
      <div class="col-span-2">
        @include('courses.info')
        @include('users.show', [
          'student' => $enrolment->studentProfile,
          'parent' => $enrolment->parentProfile
        ])
      </div>
      <div class="">
        <x-content.card>
          <div class="flex flex-row">
            <div class="basis-2/6 pr-2 font-semibold text-gray-600">Status</div>
            <div class="basis-4/6">
              <x-forms.button-dropdown name="{{$enrolment->status}}" id="updateStatusBtn">
                <x-slot name="menu">
                  <x-forms.dropdown-link link="{{route('enrolments.status', [$enrolment->id, 'accepted'])}}"
                    :value="__('Accept Application')" />
                  <x-forms.dropdown-link link="{{route('enrolments.status', [$enrolment->id, 'rejected'])}}"
                    :value="__('Reject Application')" />
                </x-slot>
              </x-forms.button-dropdown>
            </div>
          </div>

          <hr class="my-4">
          <div class="flex flex-row pr-2">
            <div class="basis-4/12 pt-1 text-gray-500">Applied By</div>
            <div class="basis-4/6">
              <x-content.tag>
                {{$enrolment->student->fullName}}
              </x-content.tag>
              <p class="text-xs px-4 py-2">
                {{$enrolment->created_at->format('d/m/Y h:i A')}}
              </p>
            </div>
          </div>
          @isset($enrolment->staff->fullName)
            <div class="flex flex-row pr-2 pt-2">
              <div class="basis-2/6 pt-1 text-gray-500">Verified By</div>
              <div class="basis-4/6">
                <x-content.tag>
                  {{$enrolment->staff->fullName}}
                </x-content.tag>
                <p class="text-xs px-4 py-2">
                  {{$enrolment->updated_at->format('d/m/Y h:i A')}}
                </p>
              </div>
            </div>
          @endisset
        </x-content.card>
      </div>
    </div>
  </div>
</x-app-layout>
