@props(['src', 'alt' => 'Trainer avatar'])

<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary" 
     style="background-image: url('{{ $src }}');" 
     aria-label="{{ $alt }}">
</div>