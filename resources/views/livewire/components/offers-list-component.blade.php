<div>
    <div class="flex container justify-center">
        {{ $offers->links() }}
    </div>
    @if($count > 0)
        @foreach ($offers as $offer)
        <livewire:components.offers-item-component :offer="$offer"/>         
        @endforeach
        <div class="flex container justify-center py-3">
            {{ $offers->links() }}
        </div>
    @else
    <p class="text-center mt-3">Aucune donnée trouvée</p>
    @endif
</div>
