<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Preventivo {{ str_pad($build->id, 5, '0', STR_PAD_LEFT) }}</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'DejaVu Sans', sans-serif;
      font-size: 10.5px;
      color: #1a1a1a;
      padding: 34px 42px 80px 42px;
      line-height: 1.4;
    }

    .clearfix::after { content: ''; display: table; clear: both; }

    /* ── Intestazione ──────────────────────────── */
    .header {
      border-bottom: 2px solid #1a1a1a;
      padding-bottom: 14px;
      margin-bottom: 18px;
      overflow: hidden;
    }

    .brand-name {
      float: left;
      font-size: 26px;
      font-weight: 700;
      letter-spacing: -0.5px;
      line-height: 1;
    }

    .doc-block {
      float: right;
      text-align: right;
    }

    .doc-type {
      font-size: 18px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      line-height: 1;
    }

    .doc-ref {
      font-size: 10px;
      color: #555;
      margin-top: 5px;
    }

    /* ── Riquadro info build ───────────────────── */
    .info-row {
      border: 1px solid #c8c8c8;
      padding: 11px 14px;
      margin-bottom: 20px;
      overflow: hidden;
      background: #fafafa;
    }

    .info-cell {
      float: left;
      margin-right: 48px;
    }

    .info-cell:last-child {
      float: right;
      margin-right: 0;
      text-align: right;
    }

    .info-label {
      font-size: 8.5px;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #777;
      font-weight: 700;
    }

    .info-value {
      font-size: 13px;
      font-weight: 700;
      margin-top: 3px;
    }

    .info-value-sm {
      font-size: 11px;
      font-weight: 600;
      margin-top: 3px;
      color: #1a1a1a;
    }

    /* ── Tabella componenti ────────────────────── */
    .table-wrap { margin-bottom: 0; }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead tr {
      background: #1a1a1a;
      color: #fff;
    }

    thead th {
      padding: 7px 10px;
      text-align: left;
      font-size: 9px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    thead th.right { text-align: right; }

    tbody tr {
      border-bottom: 1px solid #e0e0e0;
    }

    tbody tr:nth-child(even) {
      background: #f7f7f7;
    }

    tbody td {
      padding: 7px 10px;
      vertical-align: middle;
    }

    .td-cat {
      font-size: 8.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #444;
      white-space: nowrap;
    }

    .td-name {
      font-weight: 700;
      font-size: 10.5px;
    }

    .td-sub {
      font-size: 9px;
      color: #666;
      margin-top: 1px;
    }

    .td-watt {
      text-align: right;
      font-size: 10px;
      color: #555;
      white-space: nowrap;
    }

    .td-price {
      text-align: right;
      font-weight: 700;
      font-size: 11px;
      white-space: nowrap;
    }

    /* ── Sezione totali ────────────────────────── */
    .totals-section {
      border-top: 2px solid #1a1a1a;
    }

    .total-row {
      overflow: hidden;
      padding: 6px 10px;
      border-bottom: 1px solid #e0e0e0;
    }

    .total-row .tl { float: left; color: #333; }
    .total-row .tr { float: right; font-weight: 600; }

    .total-row-final {
      overflow: hidden;
      padding: 10px 10px;
      background: #1a1a1a;
      color: #fff;
    }

    .total-row-final .tl {
      float: left;
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .total-row-final .tr {
      float: right;
      font-size: 16px;
      font-weight: 700;
    }

    /* ── Note ──────────────────────────────────── */
    .notes-section {
      margin-top: 22px;
      padding: 10px 14px;
      border-left: 3px solid #aaa;
      background: #f7f7f7;
    }

    .notes-title {
      font-size: 9px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #555;
      margin-bottom: 5px;
    }

    .notes-text {
      font-size: 9.5px;
      color: #444;
      line-height: 1.6;
    }

    /* ── Footer fisso ──────────────────────────── */
    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 9px 42px;
      border-top: 1px solid #ccc;
      background: #fff;
      overflow: hidden;
      font-size: 8.5px;
      color: #999;
    }

    .footer .fl { float: left; }
    .footer .fr { float: right; }
  </style>
</head>
<body>

  {{-- Intestazione --}}
  <div class="header clearfix">
    <div class="brand-name">PC Builder</div>
    <div class="doc-block">
      <div class="doc-type">Preventivo</div>
      <div class="doc-ref">
        N.&nbsp;{{ str_pad($build->id, 5, '0', STR_PAD_LEFT) }}
        &nbsp;&nbsp;|&nbsp;&nbsp;
        {{ now()->format('d/m/Y') }}
      </div>
    </div>
  </div>

  {{-- Info build --}}
  <div class="info-row clearfix">
    <div class="info-cell">
      <div class="info-label">Configurazione</div>
      <div class="info-value">{{ $build->name }}</div>
    </div>
    <div class="info-cell">
      <div class="info-label">Componenti</div>
      <div class="info-value-sm">{{ $build->components->count() }} pezzi</div>
    </div>
    <div class="info-cell">
      <div class="info-label">Consumo stimato</div>
      <div class="info-value-sm">{{ $build->total_wattage }} W</div>
    </div>
    <div class="info-cell">
      <div class="info-label">Totale</div>
      <div class="info-value">€ {{ number_format($build->total_price, 2, ',', '.') }}</div>
    </div>
  </div>

  {{-- Tabella --}}
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th style="width:14%">Categoria</th>
          <th style="width:54%">Descrizione</th>
          <th class="right" style="width:10%">Watt</th>
          <th class="right" style="width:22%">Prezzo unit.</th>
        </tr>
      </thead>
      <tbody>
        @foreach($build->components->sortBy('category.sort_order') as $component)
        <tr>
          <td class="td-cat">{{ $component->category->name }}</td>
          <td>
            <div class="td-name">{{ $component->name }}</div>
            <div class="td-sub">{{ $component->brand }}{{ $component->model !== $component->name ? ' · ' . $component->model : '' }}</div>
          </td>
          <td class="td-watt">{{ $component->wattage > 0 ? $component->wattage . ' W' : '—' }}</td>
          <td class="td-price">€ {{ number_format($component->price, 2, ',', '.') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Totali --}}
  @php
    $psu     = $build->components->first(fn($c) => $c->category->slug === 'psu');
    $psuWatt = (int)($psu?->specs->firstWhere('spec_key', 'wattage_max')?->spec_value ?? 0);
    $margine = $psuWatt > 0 ? $psuWatt - $build->total_wattage : null;
  @endphp

  <div class="totals-section">
    @if($psuWatt > 0)
    <div class="total-row clearfix">
      <span class="tl">Potenza PSU — {{ $psu->name }}</span>
      <span class="tr">
        {{ $psuWatt }} W &nbsp;(margine: {{ $margine }} W — {{ round(($margine / $psuWatt) * 100) }}%)
      </span>
    </div>
    @endif

    <div class="total-row clearfix">
      <span class="tl">Consumo stimato (con 10% overhead sicurezza)</span>
      <span class="tr">{{ $build->total_wattage }} W</span>
    </div>

    <div class="total-row-final clearfix">
      <span class="tl">Totale preventivo</span>
      <span class="tr">€ {{ number_format($build->total_price, 2, ',', '.') }}</span>
    </div>
  </div>

  {{-- Note --}}
  <div class="notes-section">
    <div class="notes-title">Note</div>
    <div class="notes-text">
      I prezzi indicati sono IVA inclusa e da considerarsi indicativi al momento della generazione del preventivo.
      La disponibilità dei componenti e i prezzi definitivi potrebbero subire variazioni al momento dell'ordine.
      Il consumo wattaggio riportato include un overhead del 10% per margine di sicurezza.
      Questo documento è generato automaticamente e non costituisce un ordine confermato.
    </div>
  </div>

  {{-- Footer --}}
  <div class="footer clearfix">
    <span class="fl">PC Builder &nbsp;·&nbsp; Preventivo N.&nbsp;{{ str_pad($build->id, 5, '0', STR_PAD_LEFT) }}</span>
    <span class="fr">Generato il {{ now()->format('d/m/Y') }} alle {{ now()->format('H:i') }}</span>
  </div>

</body>
</html>
