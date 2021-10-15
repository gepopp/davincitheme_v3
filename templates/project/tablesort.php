<?php
$sort_by = '';
extract($args);

?>


<div class="flex flex-col" x-data="{ sort : '<?php echo $sort_by ?>' }">
    <div @click="$dispatch('sort', {sort:sort, direction: 'up'})"
         class="border-b border-black hover:bg-gray-200"
         :class="$store.sort == sort && $store.direction == 'up' ? 'bg-darkblue text-white' : ''"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
        </svg>
    </div>
    <div @click="$dispatch('sort', {sort:sort, direction: 'down'})"
         class="hover:bg-gray-200"
         :class="$store.sort == sort && $store.direction == 'down' ? 'bg-darkblue text-white' : ''"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
</div>
