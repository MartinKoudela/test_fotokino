<?php

use Livewire\Component;

new class extends Component
{
    public string $img = 'tisk-fotek.jpeg';
    public string $base = '/assets/images/photo-print/';

    public array $imgs = [
        'tisk-fotek.jpeg',
        'tisk-fotek-vice-setu.jpeg',
        'tisk-fotek-set-2.jpeg',
        'tisk-fotek-set.jpeg',
        'tisk-fotek-lab.jpeg',
    ];

    public function selectImage(string $img): void
    {
        $this->img = $img;
    }
};
?>

<div>
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">
        <img src="{{ asset($base . $img) }}" alt="Tisk fotografií"
             class="aspect-[4/3] w-full object-cover">
    </div>
    <div class="mt-3 grid grid-cols-6 gap-2">
        @foreach($imgs as $key)
            <div
                wire:click="selectImage('{{ $key }}')"
                class="cursor-pointer overflow-hidden rounded-lg border-2 transition
                    {{ $img === $key ? 'border-red-600' : 'border-transparent hover:border-red-300' }}"
            >
                <img src="{{ asset($base . $key) }}" alt="{{ $key }}" class="aspect-square w-full object-cover">
            </div>
        @endforeach
    </div>
</div>
