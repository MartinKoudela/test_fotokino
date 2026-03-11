<?php

use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public string $size = '9x13';
    public string $type = 'glossy';
    public string $frame = 'with';
    public string $flap = 'without';
    public array $photos = [];

    public array $sizes = [
        '9x13' => ['label' => '9×13 cm', 'price' => 7, 'img' => '/assets/images/photo-print/size1.jpg'],
        '10x15' => ['label' => '10×15 cm', 'price' => 8, 'img' => '/assets/images/photo-print/size2.jpg'],
        '13x18' => ['label' => '13×18 cm', 'price' => 12, 'img' => ''],
        '15x21' => ['label' => '15×21 cm', 'price' => 18, 'img' => ''],
        '18x24' => ['label' => '18×24 cm', 'price' => 28, 'img' => ''],
        '20x30' => ['label' => '20×30 cm', 'price' => 35, 'img' => ''],
        '24x30' => ['label' => '24×30 cm', 'price' => 55, 'img' => ''],
        '30x40' => ['label' => '30×40 cm', 'price' => 85, 'img' => ''],
        '30x45' => ['label' => '30×45 cm', 'price' => 95, 'img' => ''],
        '40x50' => ['label' => '40×50 cm', 'price' => 160, 'img' => ''],
        '40x60' => ['label' => '40×60 cm', 'price' => 190, 'img' => ''],
        '50x70' => ['label' => '50×70 cm', 'price' => 290, 'img' => ''],
    ];

    public array $types = [
        'glossy' => ['label' => 'Lesklý', 'img' => '/assets/images/photo-print/type1.jpeg'],
        'satin' => ['label' => 'Satén', 'img' => '/assets/images/photo-print/type2.jpeg'],
    ];

    public array $frames = [
        'with' => ['label' => 'S rámečkem', 'img' => '/assets/images/photo-print/frame2.jpeg'],
        'without' => ['label' => 'Bez rámečku', 'img' => '/assets/images/photo-print/frame1.jpg'],
    ];

    public array $flaps = [
        'without' => ['label' => 'Bez patek', 'img' => '/assets/images/photo-print/flap1.jpg'],
        'with' => ['label' => 'S patkami', 'img' => '/assets/images/photo-print/flap2.jpeg'],
    ];

    public function removePhoto(int $index): void
    {
        array_splice($this->photos, $index, 1);
    }

    public function addToCart(): void
    {
        $this->validate([
            'photos' => 'required|array|min:1',
            'photos.*' => 'image|max:32768',
            'size' => 'required|in:' . implode(',', array_keys($this->sizes)),
            'type' => 'required|in:' . implode(',', array_keys($this->types)),
            'frame' => 'required|in:' . implode(',', array_keys($this->frames)),
            'flap' => 'required|in:' . implode(',', array_keys($this->flaps)),
        ]);

        // TODO: uložit do databáze (cart_items) až budou migrace
        $pricePerPiece = $this->sizes[$this->size]['price'];
        $totalPhotos = count($this->photos);

        session()->flash('cart-message', "Přidáno {$totalPhotos} fotek ({$this->sizes[$this->size]['label']}, {$this->types[$this->type]['label']}) — celkem " . ($pricePerPiece * $totalPhotos) . " Kč");

        $this->photos = [];
    }
};
?>

<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-2">
            <span class="text-sm font-medium text-zinc-700">Velikost</span>
            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <button @click="open = !open" type="button"
                    class="flex w-full items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-3 transition hover:border-gray-300">
                    <span class="flex items-center gap-3">
                        @if ($sizes[$size]['img'])
                            <img src="{{ $sizes[$size]['img'] }}" alt="" class="h-8 w-12 rounded object-cover">
                        @endif
                        <span class="flex flex-col text-left">
                            <span class="text-sm font-semibold text-gray-900">{{ $sizes[$size]['label'] }}</span>
                            <span class="text-xs font-medium text-red-600">{{ $sizes[$size]['price'] }} Kč/ks</span>
                        </span>
                    </span>
                    <i class="fas fa-chevron-down text-gray-400 text-xs transition" :class="open && 'rotate-180'"></i>
                </button>

                <div x-show="open" x-transition x-cloak
                    class="absolute z-10 mt-1 max-h-80 w-full overflow-y-auto rounded-lg border border-gray-200 bg-white shadow-lg">
                    @foreach ($sizes as $key => $option)
                        <button type="button"
                            wire:click="$set('size', '{{ $key }}')"
                            @click="open = false"
                            class="flex w-full items-center gap-3 px-4 py-2.5 transition hover:bg-gray-50 {{ $size === $key ? 'bg-gray-50' : '' }}">
                            @if ($option['img'])
                                <img src="{{ $option['img'] }}" alt="" class="h-10 w-16 rounded object-cover">
                            @else
                                <div class="flex h-10 w-16 items-center justify-center rounded bg-gray-100 text-[10px] text-gray-400">
                                    {{ $option['label'] }}
                                </div>
                            @endif
                            <span class="flex flex-col text-left">
                                <span class="text-sm font-medium text-gray-900">{{ $option['label'] }}</span>
                                <span class="text-xs font-medium text-red-600">{{ $option['price'] }} Kč/ks</span>
                            </span>
                            @if ($size === $key)
                                <i class="fas fa-check ml-auto text-gray-800"></i>
                            @endif
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <span class="text-sm font-medium text-zinc-700">Typ papíru</span>
            <div class="grid grid-cols-2 gap-3">
                @foreach ($types as $key => $option)
                    <button
                        wire:click="$set('type', '{{ $key }}')"
                        class="flex items-center gap-3 rounded-lg border-2 p-3 transition
                            {{ $type === $key
                                ? 'border-red-600 bg-white shadow-sm'
                                : 'border-gray-200 bg-white hover:border-gray-300' }}"
                    >
                        <img src="{{ $option['img'] }}" alt="{{ $option['label'] }}" class="size-14 rounded object-cover">
                        <span class="text-sm font-medium text-gray-900">{{ $option['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <span class="text-sm font-medium text-zinc-700">Rámeček</span>
            <div class="grid grid-cols-2 gap-3">
                @foreach ($frames as $key => $option)
                    <button
                        wire:click="$set('frame', '{{ $key }}')"
                        class="flex items-center gap-3 rounded-lg border-2 p-3 transition
                            {{ $frame === $key
                                ? 'border-red-600 bg-white shadow-sm'
                                : 'border-gray-200 bg-white hover:border-gray-300' }}"
                    >
                        <img src="{{ $option['img'] }}" alt="{{ $option['label'] }}" class="size-14 rounded object-cover">
                        <span class="text-sm font-medium text-gray-900">{{ $option['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <span class="text-sm font-medium text-zinc-700">Patky</span>
            <div class="grid grid-cols-2 gap-3">
                @foreach ($flaps as $key => $option)
                    <button
                        wire:click="$set('flap', '{{ $key }}')"
                        class="flex items-center gap-3 rounded-lg border-2 p-3 transition
                            {{ $flap === $key
                                ? 'border-red-600 bg-white shadow-sm'
                                : 'border-gray-200 bg-white hover:border-gray-300' }}"
                    >
                        <img src="{{ $option['img'] }}" alt="{{ $option['label'] }}" class="size-14 rounded object-cover">
                        <span class="text-sm font-medium text-gray-900">{{ $option['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        <label class="group flex cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-10 transition hover:border-red-400 hover:bg-red-50/30">
            <div class="flex size-12 items-center justify-center rounded-full bg-red-100 text-red-600 transition group-hover:bg-red-200">
                <i class="fas fa-images text-xl"></i>
            </div>
            <div class="text-center">
                <span class="text-sm font-semibold text-red-600">Klikněte pro nahrání</span>
                <span class="text-sm text-gray-500"> nebo přetáhněte soubory</span>
            </div>
            <span class="text-xs text-gray-400">JPG, PNG — max 32 MB</span>
            <input wire:model="photos" type="file" multiple accept="image/jpeg,image/png" class="hidden">
        </label>

        <div wire:loading wire:target="photos" class="mt-3 flex items-center gap-2 text-sm text-gray-500">
            <i class="fas fa-spinner fa-spin"></i>
            Nahrávám fotky...
        </div>

        @if (count($photos))
            <div class="mt-4">
                <div class="mb-2 flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">{{ count($photos) }} {{ count($photos) === 1 ? 'fotka' : (count($photos) < 5 ? 'fotky' : 'fotek') }}</span>
                    <span class="text-sm text-gray-500">{{ $sizes[$size]['price'] * count($photos) }} Kč celkem</span>
                </div>
                <div class="grid grid-cols-4 gap-2 sm:grid-cols-6">
                    @foreach ($photos as $index => $photo)
                        <div class="group/photo relative">
                            <img src="{{ $photo->temporaryUrl() }}" alt="" class="aspect-square w-full rounded-lg object-cover">
                            <button
                                wire:click="removePhoto({{ $index }})"
                                class="absolute -right-1 -top-1 flex size-5 items-center justify-center rounded-full bg-red-600 text-xs text-white opacity-0 transition group-hover/photo:opacity-100"
                            >&times;</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @error('photos') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
        @error('photos.*') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <button
        wire:click="addToCart"
        wire:loading.attr="disabled"
        class="w-full rounded-xl bg-red-600 px-6 py-3.5 text-center text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 active:bg-red-800 disabled:opacity-50"
    >
        <span wire:loading.remove wire:target="addToCart">Přidat do košíku</span>
        <span wire:loading wire:target="addToCart"><i class="fas fa-spinner fa-spin mr-1"></i> Zpracovávám...</span>
    </button>

    @if (session()->has('cart-message'))
        <div class="rounded-lg bg-green-50 p-4 text-sm text-green-700">
            {{ session('cart-message') }}
        </div>
    @endif
</div>
