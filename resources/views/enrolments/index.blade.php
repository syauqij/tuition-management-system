<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight truncate">
      {{ __('Manage Enrolments') }}
    </h2>
  </x-slot>
  <x-content.card>
    <div class="mb-4">
      <form method="get" action="{{ route('enrolments.search') }}">
        <x-forms.search-input  name="keywords" value="{{ $keywords ?? null }}"
          position="justify-left" class="xl:w-7/12" marginBtm='mb-2'
          placeholder="Enter a name, email or mykad"/>
      </form>
      <table class="min-w-full">
        <thead class="border-b">
          <tr>
            <x-table.heading :value="__('#')" />
            <x-table.heading :value="__('Student Name')" />
            <x-table.heading :value="__('Email')" />
            <x-table.heading :value="__('MyKad')" />
            <x-table.heading :value="__('Course')" />
            <x-table.heading :value="__('Created on')" />
            <x-table.heading :value="__('Status')" class="text-center" />
          </tr>
        </thead>
        <tbody>
          @foreach ($enrolments as $enrolment)
            <tr class="border-b">
              <x-table.cell :value="$loop->index+1" />
              <x-table.cell class="truncate" >
                {{ $enrolment->student_profile['first_name'] . ' ' .
                  $enrolment->student_profile['last_name'] }}
              </x-table.cell>
              <x-table.cell :value="$enrolment->student_profile['email']" />
              <x-table.cell :value="$enrolment->student_profile['mykad']" />
              <x-table.cell :value="$enrolment->course->name" />
              <x-table.cell>
                <span class="font-semibold">
                  {{ $enrolment->created_at->diffForHumans(['parts' => 2]) }}
                </span><br/>
                {{ $enrolment->created_at->format('d/m/Y h:i A') }}
              </x-table.cell>
              <x-table.cell class="text-center">
                <x-forms.button-dropdown name="{{$enrolment->status}}" id="updateStatusBtn">
                  <x-slot name="menu">
                    <x-forms.dropdown-link link="{{route('enrolments.show', [$enrolment->id])}}"
                      :value="__('View Application')" />
                    @if (auth()->user()->role == 'admin')
                      <x-forms.dropdown-link
                        link="{{route('enrolments.status', [$enrolment->id, 'accepted'])}}"
                        :value="__('Accept Application')" />
                      <x-forms.dropdown-link
                        link="{{route('enrolments.status', [$enrolment->id, 'rejected'])}}"
                        :value="__('Reject Application')" />
                    @endif
                  </x-slot>
                </x-forms.button-dropdown>
              </x-table.cell>
            </tr>
          @endforeach
          @if($enrolments->isEmpty())
          <tr>
            <x-table.cell colspan="7" class="text-lg text-red-500 font-semibold text-center" >
                No records found.
                @if (auth()->user()->role == "student")
                  Click <x-content.link :value="__('here')" href="{{ route('courses.list') }}" />
                  to apply our courses.
                @endif
            </x-table.cell>
          </tr>
        @endif
        </tbody>
      </table>
      <div class="py-4">
        {{ $enrolments->links() }}
      </div>
    </div>
  </x-content.card>
</x-app-layout>
