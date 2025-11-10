 <x-panel class="gap-x-6">
     <div class="flex items-center">
         <x-employer-logo :employer="$job->employer" aditionalStyle="x-auto max-h-[50px] md:max-h-[100px] object-contain" width="100"/>
     </div>

     <div class="flex-1 flex flex-col">
         <a href="#" class="self-start text-sm mb-2 text-gray-400">{{ $job->employer->name }}</a>

         <h3 class="font-bold text-xl group-hover:text-blue-800 transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
         <h2 class="text-sm mt-2 text-gray-500">{{ $job->created_at->diffForHumans()}}</h2>
         <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - From {{ $job->salary }}</p>
     </div>

     <div>
        @foreach ($job->tags as $tag)
                    <x-tag :$tag />
        @endforeach
     </div>

 </x-panel>
