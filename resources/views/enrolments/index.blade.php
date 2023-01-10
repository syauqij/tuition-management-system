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
            <x-table.heading :value="__('Created on')" class="text-center" />
            <x-table.heading :value="__('Status')" class="text-center" />
          </tr>
        </thead>
        <tbody>
          @foreach ($enrolments as $enrolment)
            <tr class="border-b">
              <x-table.cell :value="$loop->index+1" />
              <x-table.cell :value="$enrolment->student->fullName" class="truncate"/>
              <x-table.cell :value="$enrolment->student->email" />
              <x-table.cell :value="$enrolment->student->studentProfile->mykad" />
              <x-table.cell :value="$enrolment->course->name" />
              <x-table.cell :value="$enrolment->created_at->format('d/m/Y h:i A')" class="uppercase text-center"/>
              <td class="text-center">
                <x-forms.button-dropdown name="{{$enrolment->status}}" id="updateStatusBtn">
                  <x-slot name="menu">
                    <x-forms.dropdown-link link="{{route('enrolments.show', [$enrolment->id])}}"
                      :value="__('View Application')" />
                    @if (auth()->user()->role == 'admin')
                      <x-forms.dropdown-link link="{{route('enrolments.status', [$enrolment->id, 'accepted'])}}"
                        :value="__('Accept Application')" />
                      <x-forms.dropdown-link link="{{route('enrolments.status', [$enrolment->id, 'rejected'])}}"
                        :value="__('Reject Application')" />
                    @endif
                  </x-slot>
                </x-forms.button-dropdown>
              </td>
            </tr>
          @endforeach
          @if($enrolments->isEmpty())
          <tr>
            <x-table.cell colspan="7" class="text-lg text-blue-500 font-semibold text-center" >
                No enrolment records found.
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
