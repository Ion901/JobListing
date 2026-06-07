
 <x-panel class="gap-x-6 items-center flex-col sm:flex-row ">
     <div class="flex h-[50px]">
         <x-employer-logo :employer="$job->employer" aditionalStyle="mx-auto h-full md:max-h-[100px] object-contain" />
     </div>

     <div class="flex-1 flex flex-col">
         <a href="#" class="self-start text-sm mb-2 text-gray-400">{{ $job->employer->name }}</a>

         <h3 class="font-bold text-xl group-hover:text-blue-800 transition-colors duration-300">
             <a href="{{ route('job', ['job' => $job->title_slug]) }}">
                 {{-- target="_blank" --}}
                 {{ $job->title }}
             </a>
         </h3>
         <h2 class="text-sm mt-2 text-gray-500">{{ $job->created_at->diffForHumans() }}</h2>
         <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - From {{ $job->salary }}</p>
     </div>

     <div class="flex gap-y-2 gap-x-1 justify-start flex-col sm:flex-row ">
         @foreach ($job->tags as $tag)
         <div class="flex">
             <x-tag :$tag />
         </div>
         @endforeach
     </div>

 </x-panel>
