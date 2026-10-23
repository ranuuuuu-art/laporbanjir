<div class="card">
    <h3>{{ $item['nama'] }}</h3>
    <p><strong>Lokasi:</strong> {{ $item['lokasi'] }}</p>
    <p><strong>Tinggi Genangan:</strong> {{ $item['tinggi'] }} cm</p>

    @if($item['tinggi'] < 30)
        <p>Status: <span style="color:green;">Waspada</span></p>
    @elseif($item['tinggi'] <= 70)
        <p>Status: <span style="color:orange;">Siaga</span></p>
    @else
        <p>Status: <span style="color:red;">Awas</span></p>
    @endif
</div>